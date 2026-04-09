<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notification;
use App\Http\routes\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class UserController extends Controller
{
    public function index(Request $request)
{
    $query = User::query();
    
    // Search functionality
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('company', 'LIKE', "%{$search}%")
              ->orWhere('mobile', 'LIKE', "%{$search}%")
              ->orWhere('created_at', 'LIKE', "%{$search}%");
        });
    }
    
    // Filter by company type
    if ($request->has('type') && $request->type != '') {
        $query->where('type', $request->type);
    }
    
    // Filter by country
    if ($request->has('country') && $request->country != '') {
        $query->where('country', 'LIKE', "%{$request->country}%");
    }
    
    // Filter by location
    if ($request->has('location') && $request->location != '') {
        $query->where('location', 'LIKE', "%{$request->location}%");
    }
    
    // Filter by date range
    if ($request->has('date_from') && $request->date_from != '') {
        $query->whereDate('created_at', '>=', $request->date_from);
    }
    
    if ($request->has('date_to') && $request->date_to != '') {
        $query->whereDate('created_at', '<=', $request->date_to);
    }
    
    // Get paginated results (latest first)
    $users = $query->latest()->paginate(10);
    
    // Append query parameters to pagination links
    $users->appends($request->all());
    
    return view('admin.users', compact('users'));
}

    public function getallusers()
    { {
            $users = User::all();
            return view('admin.use  rs', compact('users'));
        }
    }
    // Store new user
    // public function registerstore(Request $request)
        public function store(Request $request)

    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required',
            'email' => 'required|email|unique:users',
            'company_name' => 'required',
            'company_type' => 'required',
            'location' => 'required',
            'country' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'password' => 'required|min:8',
        ]);
        // dd($request->all());

        do {
            $uniqueCode = 'GAU' . mt_rand(100000, 999999);
        } while (\App\Models\User::where('user_id', $uniqueCode)->exists());

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
        }

        // dd($uniqueCode);
        $user = User::create([
            'user_id' => $uniqueCode,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'company' => $request->company_name,
            'type' => $request->company_type,
            'location' => $request->location,
            'country' => $request->country,
            'image' => $imagePath,
            'description' => $request->description,
            'role' => "user",
            'password' => bcrypt($request->password),
        ]);
        // die();
        // return redirect()->route('user_login')->with('success', 'User saved successfully! Please login.');
        return redirect()->route('login')->with('success', 'User  Registered successfully! Please login.');


    }
    // Show single user
    public function show(User $user)
    {
        $user = User::findOrFail($user->id);
        return view('admin.users', compact('user'));
    }

    // Update user
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'company' => 'required|string',
            'type' => 'required|string',
            'location' => 'required|string',
            'country' => 'required|string',
            'status' => 'required|string',
            'joined_at' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::findOrFail($request->id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        $user->update($request->only([
            'name',
            'mobile',
            'email',
            'company',
            'type',
            'location',
            'country',
            'joined_at',
            'description'
        ]));

        // Optional password update
        if ($request->password) {
            $user->password = $request->password; // auto hashed
            $user->save();
        }

        return redirect()->back()->with('success', 'User updated successfully!');
    }


    // Delete user
    public function destroy($id)
{
    // dd($id);
    $user = User::findOrFail($id);

    // Optional: delete user image from storage
    if ($user->image && file_exists(storage_path('app/public/' . $user->image))) {
        unlink(storage_path('app/public/' . $user->image));
    }

    $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully!');
}
public function export(Request $request)
{
    $request->validate([
        'format' => 'required|in:csv,excel,pdf',
        'range' => 'required|in:all,last7,last30,custom',
        'start_date' => 'required_if:range,custom|nullable|date',
        'end_date' => 'required_if:range,custom|nullable|date|after_or_equal:start_date',
    ]);

    $format = $request->format;
    $range = $request->range;

    // Build query based on filters
    $query = Partner::query();

    if ($range === 'last7') {
        $query->where('created_at', '>=', now()->subDays(7));
    } elseif ($range === 'last30') {
        $query->where('created_at', '>=', now()->subDays(30));
    } elseif ($range === 'custom' && $request->start_date && $request->end_date) {
        $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
    }

    $partners = $query->orderBy('created_at', 'desc')->get();

    if ($partners->isEmpty()) {
        return back()->with('error', 'No data available to export for the selected criteria.');
    }

    try {
        if ($format === 'csv') {
            return $this->exportPartnerCSV($partners);
        } elseif ($format === 'excel') {
            return $this->exportPartnerExcel($partners);
        } elseif ($format === 'pdf') {
            return $this->exportPartnerPDF($partners);
        }
    } catch (\Exception $e) {
        return back()->with('error', 'Export failed: ' . $e->getMessage());
    }

    return back()->with('error', 'Invalid export format selected.');
}

private function exportPartnerCSV($partners)
{
    $filename = 'partners_export_' . date('Y-m-d_His') . '.csv';
    $handle = fopen('php://temp', 'r+');
    fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

    fputcsv($handle, [
        'Sr.No', 
        'Partner ID',
        'Full Name', 
        'Email', 
        'Mobile',
        'Status',
        'Location',
        'Country',
        'Created At'
    ]);

    foreach ($partners as $index => $p) {
        fputcsv($handle, [
            $index + 1,
            $p->id,
            $p->full_name,
            $p->email,
            $p->mobile,
            ucfirst($p->status),
            $p->location,
            $p->country,
            $p->created_at->format('d M Y, h:i A')
        ]);
    }

    rewind($handle);
    $csv = stream_get_contents($handle);
    fclose($handle);

    return Response::make($csv, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
}

private function exportPartnerExcel($partners)
{
    $filename = 'partners_export_' . date('Y-m-d_His') . '.xls';

    $html = '
    <html xmlns:x="urn:schemas-microsoft-com:office:excel">
    <head>
        <meta charset="UTF-8">
        <xml>
            <x:ExcelWorkbook>
                <x:ExcelWorksheets>
                    <x:ExcelWorksheet>
                        <x:Name>Partners</x:Name>
                        <x:WorksheetOptions>
                            <x:Print>
                                <x:ValidPrinterInfo/>
                            </x:Print>
                        </x:WorksheetOptions>
                    </x:ExcelWorksheet>
                </x:ExcelWorksheets>
            </x:ExcelWorkbook>
        </xml>
        <style>
            table { border-collapse: collapse; width: 100%; }
            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            th { background-color: #4CAF50; color: white; font-weight: bold; }
            tr:nth-child(even) { background-color: #f2f2f2; }
        </style>
    </head>
    <body>
        <h2>Partners Report</h2>
        <p>Generated on: ' . date('d M Y, h:i A') . '</p>
        <p>Total Records: ' . count($partners) . '</p>
        <table>
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Partner ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Country</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($partners as $index => $p) {
        $html .= '<tr>
            <td>' . ($index + 1) . '</td>
            <td>' . $p->id . '</td>
            <td>' . htmlspecialchars($p->full_name) . '</td>
            <td>' . htmlspecialchars($p->email) . '</td>
            <td>' . htmlspecialchars($p->mobile) . '</td>
            <td>' . ucfirst($p->status) . '</td>
            <td>' . htmlspecialchars($p->location) . '</td>
            <td>' . htmlspecialchars($p->country) . '</td>
            <td>' . $p->created_at->format('d M Y, h:i A') . '</td>
        </tr>';
    }

    $html .= '</tbody></table></body></html>';

    return Response::make($html, 200, [
        'Content-Type' => 'application/vnd.ms-excel',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
}

private function exportPartnerPDF($partners)
{
    $filename = 'partners_export_' . date('Y-m-d_His') . '.html';

    $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Partners Report</title>
        <style>
            @media print {
                @page { size: A4 landscape; margin: 1cm; }
            }
            body { font-family: Arial, sans-serif; font-size: 11px; margin: 20px; }
            .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #4CAF50; }
            h1 { font-size: 24px; margin: 0; color: #333; }
            .info { color: #666; font-size: 11px; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #ddd; padding: 8px 6px; text-align: left; font-size: 10px; }
            th { background-color: #4CAF50; color: #fff; }
            tr:nth-child(even) { background-color: #f9f9f9; }
            .footer { text-align: center; margin-top: 30px; color: #999; font-size: 10px; }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Partners Report</h1>
            <div class="info">
                Generated on: ' . date('d M Y, h:i A') . ' | Total Records: ' . count($partners) . '
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Partner ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Country</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($partners as $index => $p) {
        $html .= '<tr>
            <td>' . ($index + 1) . '</td>
            <td>' . $p->id . '</td>
            <td>' . htmlspecialchars($p->full_name) . '</td>
            <td>' . htmlspecialchars($p->email) . '</td>
            <td>' . htmlspecialchars($p->mobile) . '</td>
            <td>' . ucfirst($p->status) . '</td>
            <td>' . htmlspecialchars($p->location) . '</td>
            <td>' . htmlspecialchars($p->country) . '</td>
            <td>' . $p->created_at->format('d M Y') . '</td>
        </tr>';
    }

    $html .= '</tbody></table>
        <div class="footer">© ' . date('Y') . ' Partner Management System | Auto-generated report</div>
    </body></html>';

    return Response::make($html, 200, [
        'Content-Type' => 'text/html',
        'Content-Disposition' => 'inline; filename="' . $filename . '"',
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
}
}

