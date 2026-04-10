<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Validation\Rule;


class PartnerController extends Controller
{

    public function index(Request $request)
    {
        $query = Partner::query();

        // 🔍 Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('mobile', 'like', "%$search%")
                    ->orWhere('location', 'like', "%$search%")
                    ->orWhere('country', 'like', "%$search%")
                    ->orWhere('status', 'like', "%$search%");
            });
        }

        //  Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by country
        if ($request->filled('country')) {
            $query->where('country', 'like', "%{$request->country}%");
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        //  Filter by date
        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->date_from)->startOfDay(),
                Carbon::parse($request->date_to)->endOfDay(),
            ]);
        } elseif ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', Carbon::parse($request->date_from));
        } elseif ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', Carbon::parse($request->date_to));
        }

        // 🧾 Get filtered results
        $partners = $query->latest()->paginate(10)->appends($request->query());

        // Dashboard stats
        $totalPartners = Partner::count();
        $activePartners = Partner::where('status', 'active')->count();
        $inactivePartners = Partner::where('status', 'inactive')->count();

        return view('admin.partner', compact('partners', 'totalPartners', 'activePartners', 'inactivePartners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:partners,email',
            'location' => 'required|string|max:255',
            'country' => 'required|string',
            'password' => 'required|min:8',

            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'aadhar_card' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'pan_card' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'cv_resume' => 'nullable|mimes:pdf,doc,docx|max:4096',
            'previous_work' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Generate unique partner ID
        do {
            $uniqueCode = 'GAP' . mt_rand(100000, 999999);
        } while (Partner::where('partner_id', $uniqueCode)->exists());

        $partner = new Partner();
        $partner->partner_id = $uniqueCode;
        $partner->full_name = $request->full_name;
        $partner->mobile = $request->mobile;
        $partner->email = $request->email;
        $partner->location = $request->location;
        $partner->country = $request->country;
        $partner->password = bcrypt($request->password);

        // ✅ Store files like User registration
        $fileFields = [
            'photo',
            'aadhar_card',
            'pan_card',
            'cv_resume',
            'previous_work'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $partner->$field = $request->file($field)->store('partners', 'public');
            }
        }

        $partner->save();

        return redirect()->route('login')
            ->with('success', 'Partner Registered successfully!! Please login.');
    }

    public function show()
    {
        return view('admin.partner');
    }


    // public function update(Request $request)
    // {
    //     $partner = Partner::findOrFail($request->id);

    //     $partner->full_name = $request->full_name;
    //     $partner->email = $request->email;
    //     $partner->mobile = $request->mobile;
    //     $partner->location = $request->location;
    //     $partner->country = $request->country;
    //     $partner->status = $request->status;
    //     $partner->description = $request->description;

    //     if ($request->hasFile('photo')) {
    //         $photoName = time() . '_' . $request->photo->getClientOriginalName();
    //         $request->photo->move(public_path('uploads/partners'), $photoName);
    //         $partner->photo = $photoName;
    //     }

    //     $partner->save();

    //     return redirect()->back()->with('success', 'Partner updated successfully!');
    // }

    public function update(Request $request)
{
    $partner = Partner::findOrFail($request->id);

    $request->validate([
        'full_name' => 'required|string|max:255',
        'mobile' => 'required|string|max:15',
        'email' => [
            'required',
            'email',
            Rule::unique('partners', 'email')->ignore($partner->id),
        ],
        'location' => 'nullable|string',
        'country' => 'nullable|string',
        'status' => 'required',
        'description' => 'nullable|string',
    ]);

    $partner->full_name = $request->full_name;
    $partner->email = $request->email;
    $partner->mobile = $request->mobile;
    $partner->location = $request->location;
    $partner->country = $request->country;
    $partner->status = $request->status;
    $partner->description = $request->description;

    if ($request->hasFile('photo')) {
        $photoName = time() . '_' . $request->photo->getClientOriginalName();
        $request->photo->move(public_path('uploads/partners'), $photoName);
        $partner->photo = $photoName;
    }

    $partner->save();

    return redirect()->back()->with('success', 'Partner updated successfully!');
}



    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        // Redirect back to partner list with success message
        return redirect()->route('admin.partner.index')->with('success', 'Partner deleted successfully!');
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
        fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

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

