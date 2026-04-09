<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\User;
use App\Models\Partner;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $query = Notification::query();

        // 🔍 Search by title or message
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('message', 'like', "%{$request->search}%");
            });
        }

        // 🧩 Filter by Recipient Type
        if ($request->filled('recipient_type')) {
            $query->where('recipient_code', $request->recipient_type);
        }

        // 🧩 Filter by Specific Recipient
        if ($request->filled('specific_recipient')) {
            $query->where('recipient_id', $request->specific_recipient);
        }

        // 🆔 Filter by Customer ID
        if ($request->filled('customer_id')) {
            $query->where('recipient_id', $request->customer_id);
        }

        // 📊 Fetch paginated notifications
        $notifications = $query->latest()->paginate(10)->appends($request->query());

        // 📊 Stats
        $totalNotifications = Notification::count();
        $readNotifications = Notification::where('status', 'read')->count();
        $unreadNotifications = Notification::where('status', 'unread')->count();
        $todayNotifications = Notification::whereDate('created_at', today())->count();

        // 👇 Fetch users and partners dynamically
        $users = User::select('id', 'name')->get();
        $partners = Partner::select('id', 'full_name')->get();

        return view('admin.notifications.index', compact(
            'notifications',
            'totalNotifications',
            'readNotifications',
            'unreadNotifications',
            'todayNotifications',
            'users',
            'partners'
        ));
    }

    /**
     * Fetch recipients based on type (user or partner)
     */
    public function getRecipients($type)
    {
        if ($type === 'user') {
            $recipients = User::select('id', 'name')->get();
        } elseif ($type === 'partner') {
            $recipients = Partner::select('id', 'full_name as name')->get();
        } else {
            $recipients = collect();
        }

        return response()->json($recipients);
    }

    /**
     * Store a new notification
     */
   public function nstore(Request $request)
{
    try {
        Log::info('Notification store request data:', $request->all());

        $validated = $request->validate([
            'recipient_code' => 'required|string|in:user,partner', // make sure it’s selected
            'specific_recipient' => 'nullable|string',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'customer_id' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        //  Determine recipient model based on recipient_type
        $recipientType = $validated['recipient_code'];

        // If customer_id is provided
        if (!empty($validated['customer_id'])) {

            // Choose table to match based on recipient type
            if ($recipientType === 'user') {
                $exists = \App\Models\User::where('customer_id', $validated['customer_id'])->exists();
            } elseif ($recipientType === 'partner') {
                $exists = \App\Models\Partner::where('customer_id', $validated['customer_id'])->exists();
            } else {
                $exists = false;
            }

            if (!$exists) {
                return redirect()->back()->with('error', 'No matching customer found in the selected recipient type.');
            }

            // If customer_id is used, ignore specific_recipient
            $validated['specific_recipient'] = null;
        } else {
            // If no customer_id, then specific_recipient is required
            if (empty($validated['specific_recipient'])) {
                return redirect()->back()->with('error', 'Please select a specific recipient or enter a customer ID.');
            }
        }

        // 🖼 Handle image upload if exists
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('notifications', $filename, 'public');
            $validated['image'] = 'notifications/' . $filename;
        }

        // 💾 Store notification
        Notification::create($validated);

        Log::info('Notification created successfully.', $validated);
        return redirect()->back()->with('success', 'Notification created successfully!');
    } catch (Exception $e) {
        Log::error('Error creating notification: ' . $e->getMessage(), [
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ]);

        return redirect()->back()->with('error', 'Something went wrong while creating the notification.');
    }
}

    /**
     * Resend a notification
     */
    public function resend($id)
    {
        $notification = Notification::findOrFail($id);

        Notification::create([
            'recipient_code' => $notification->recipient_code,
            'recipient_id' => $notification->recipient_id,
            'title' => $notification->title,
            'message' => $notification->message,
            'image' => $notification->image,
            'status' => 'unread',
        ]);

        return redirect()->route('notifications.index')
            ->with('success', 'Notification resent successfully!');
    }

    /**
     * Delete a notification
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->back()->with('success', 'Notification deleted successfully!');
    }

    /**
     * Export notifications
     */
    public function export(Request $request)
    {
        $request->validate([
            'format' => 'required|in:csv,excel,pdf',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $format = $request->format;

        // Apply same filters as index()
        $query = Notification::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('message', 'like', "%{$request->search}%");
            });
        }

        if ($request->filled('recipient_code')) {
            $query->where('recipient_code', $request->recipient_code);
        }

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $notifications = $query->latest()->get();

        if ($notifications->isEmpty()) {
            return back()->with('error', 'No notifications found for export.');
        }

        switch ($format) {
            case 'csv':
                return $this->exportCSV($notifications);
            case 'excel':
                return $this->exportExcel($notifications);
            case 'pdf':
                return $this->exportPDF($notifications);
            default:
                return back()->with('error', 'Invalid format selected.');
        }
    }

    private function exportCSV($notifications)
    {
        $filename = 'notifications_' . now()->format('Ymd_His') . '.csv';
        $handle = fopen('php://temp', 'w+');
        fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($handle, [
            'Sr.No', 'ID', 'Date & Time', 'Image', 'Recipient Type', 
            'Title', 'Message', 'Status',
        ]);

        foreach ($notifications as $i => $n) {
            fputcsv($handle, [
                $i + 1,
                $n->id,
                optional($n->created_at)->format('d M Y, h:i A'),
                $n->image ? asset('storage/' . $n->image) : '-',
                ucfirst($n->recipient_code ?? '-'),
                $n->title,
                $n->message,
                ucfirst($n->status ?? 'Unread'),
            ]);
        }

        rewind($handle);
        $csvContent = stream_get_contents($handle);
        fclose($handle);

        return response($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
            'Cache-Control' => 'no-store, no-cache',
        ]);
    }

    private function exportExcel($notifications)
    {
        $filename = 'notifications_' . now()->format('Ymd_His') . '.xls';
        $html = '
    <html>
    <head><meta charset="UTF-8">
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background-color: #4CAF50; color: white; }
    </style>
    </head>
    <body>
        <h2>Notifications Report</h2>
        <p>Generated on: ' . now()->format('d M Y, h:i A') . '</p>
        <table>
            <thead>
                <tr>
                    <th>Sr.No</th><th>ID</th><th>Date & Time</th><th>Image</th>
                    <th>Recipient Type</th><th>Title</th><th>Message</th><th>Status</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($notifications as $i => $n) {
            $imagePath = $n->image ? asset('storage/' . $n->image) : '-';
            $html .= '<tr>
            <td>' . ($i + 1) . '</td>
            <td>' . $n->id . '</td>
            <td>' . optional($n->created_at)->format('d M Y, h:i A') . '</td>
            <td>' . ($n->image ? '<img src="' . $imagePath . '" width="40">' : '-') . '</td>
            <td>' . ucfirst($n->recipient_code ?? '-') . '</td>
            <td>' . htmlspecialchars($n->title) . '</td>
            <td>' . htmlspecialchars($n->message) . '</td>
            <td>' . ucfirst($n->status ?? 'Unread') . '</td>
        </tr>';
        }

        $html .= '</tbody></table></body></html>';

        return response($html, 200, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }

    private function exportPDF($notifications)
    {
        $filename = 'notifications_' . now()->format('Ymd_His') . '.html';

        $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Notifications PDF</title>
        <style>
            body { font-family: Arial, sans-serif; font-size: 12px; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #ddd; padding: 8px; }
            th { background-color: #4CAF50; color: white; }
            img { width: 40px; height: auto; border-radius: 4px; }
        </style>
    </head>
    <body>
        <h2>Notifications Report</h2>
        <p>Generated on: ' . now()->format('d M Y, h:i A') . '</p>
        <table>
            <thead>
                <tr>
                    <th>Sr.No</th><th>ID</th><th>Date & Time</th><th>Image</th>
                    <th>Recipient Type</th><th>Title</th><th>Message</th><th>Status</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($notifications as $i => $n) {
            $imagePath = $n->image ? asset('storage/' . $n->image) : '-';
            $html .= '<tr>
            <td>' . ($i + 1) . '</td>
            <td>' . $n->id . '</td>
            <td>' . optional($n->created_at)->format('d M Y, h:i A') . '</td>
            <td>' . ($n->image ? '<img src="' . $imagePath . '">' : '-') . '</td>
            <td>' . ucfirst($n->recipient_code ?? '-') . '</td>
            <td>' . htmlspecialchars($n->title) . '</td>
            <td>' . htmlspecialchars($n->message) . '</td>
            <td>' . ucfirst($n->status ?? 'Unread') . '</td>
        </tr>';
        }

        $html .= '</tbody></table></body></html>';

        return response($html)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}