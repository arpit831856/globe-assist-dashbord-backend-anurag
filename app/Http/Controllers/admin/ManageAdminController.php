<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ManageAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = ManageAdmin::query();
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('sr_no', 'like', "%{$search}%");
            });
        }
        // dd($request->all());
        
        // Status filter
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }
        
        // Role filter
        if ($request->has('role') && $request->role !== '') {
            $query->where('role', $request->role);
        }
        
        // Date range filter
        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        
        $admins = $query->latest()->paginate(10);
        // echo'<pre>';
        // print_r($admins->toArray());
        // die();
        
        return view('admin.manage_admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.manage_admin.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:manage_admins,email',
    //         'password' => 'required|min:8|confirmed',
    //         'role' => 'required|string',
    //         'status' => 'required|in:active,inactive',
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $path = null;
    //     if ($request->hasFile('photo')) {
    //         $path = $request->file('photo')->store('admin_photos', 'public');
    //     }

    //     ManageAdmin::create([
    //         'sr_no' => 'ADM' . str_pad(ManageAdmin::count() + 1, 3, '0', STR_PAD_LEFT),
    //         'photo' => $path,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => $request->role,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('manage_admin.index')->with('success', 'Admin created successfully!');
    // }
    public function store(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:manage_admins',
        'password' => 'required|string|min:6',
        'role' => 'required|string',
    ]);

    // Get the last admin for ID generation
    $latest = \App\Models\ManageAdmin::latest()->first();
    $nextNumber = $latest ? ((int) substr($latest->sr_no, 3)) + 1 : 1;
    $customId = 'ADM' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    // Create admin
    \App\Models\ManageAdmin::create([
        'sr_no' => $customId,
        'photo' => $request->photo,
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
        'status' => 'active',
    ]);

    return redirect()->route('manage_admin.index')->with('success', 'Admin created successfully!');
}


    public function edit($id)
    {
        $manageAdmin = ManageAdmin::findOrFail($id);
        return view('admin.manage_admin.edit', compact('manageAdmin'));
    }

    public function update(Request $request, $id)
    {
        $manageAdmin = ManageAdmin::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:manage_admins,email,' . $manageAdmin->id,
            'role' => 'required|string',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $data = $request->only(['name', 'email', 'role', 'status']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            if ($manageAdmin->photo) {
                Storage::disk('public')->delete($manageAdmin->photo);
            }
            $data['photo'] = $request->file('photo')->store('admin_photos', 'public');
        }

        $manageAdmin->update($data);

        return redirect()->route('manage_admin.index')->with('success', 'Admin updated successfully!');
    }

    public function destroy($id)
    {
        $manageAdmin = ManageAdmin::findOrFail($id);
        
        if ($manageAdmin->photo) {
            Storage::disk('public')->delete($manageAdmin->photo);
        }
        
        $manageAdmin->delete();

        return back()->with('success', 'Admin deleted successfully!');
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
        $query = ManageAdmin::query();
        
        if ($range === 'last7') {
            $query->where('created_at', '>=', now()->subDays(7));
        } elseif ($range === 'last30') {
            $query->where('created_at', '>=', now()->subDays(30));
        } elseif ($range === 'custom' && $request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }
        
        if (!$request->has('include_inactive')) {
            $query->where('status', 'active');
        }
        
        $admins = $query->orderBy('created_at', 'desc')->get();
        
        // Check if there's data to export
        if ($admins->isEmpty()) {
            return back()->with('error', 'No data available to export for the selected criteria.');
        }
        
        // Export based on format
        try {
            if ($format === 'csv') {
                return $this->exportCSV($admins);
            } elseif ($format === 'excel') {
                return $this->exportExcel($admins);
            } elseif ($format === 'pdf') {
                return $this->exportPDF($admins);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Export failed: ' . $e->getMessage());
        }
        
        return back()->with('error', 'Invalid export format selected.');
    }

    /**
     * Export admins data as CSV
     */
    private function exportCSV($admins)
    {
        $filename = 'admins_export_' . date('Y-m-d_His') . '.csv';
        $handle = fopen('php://temp', 'r+');
        
        // Add UTF-8 BOM for proper Excel encoding
        fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Add CSV headers
        fputcsv($handle, [
            'Sr.No', 
            'ID', 
            'Name', 
            'Email', 
            'Role', 
            'Status', 
            'Last Login', 
            'Created At'
        ]);
        
        // Add data rows
        foreach ($admins as $index => $admin) {
            fputcsv($handle, [
                $index + 1,
                $admin->sr_no ?? $admin->id,
                $admin->name,
                $admin->email,
                ucfirst(str_replace('_', ' ', $admin->role)),
                ucfirst($admin->status),
                $admin->last_login ? $admin->last_login->format('d M Y, h:i A') : 'Never',
                $admin->created_at->format('d M Y, h:i A')
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

    /**
     * Export admins data as Excel
     */
    private function exportExcel($admins)
    {
        $filename = 'admins_export_' . date('Y-m-d_His') . '.xls';
        
        // Create HTML table for Excel
        $html = '
        <html xmlns:x="urn:schemas-microsoft-com:office:excel">
        <head>
            <meta charset="UTF-8">
            <xml>
                <x:ExcelWorkbook>
                    <x:ExcelWorksheets>
                        <x:ExcelWorksheet>
                            <x:Name>Admin Users</x:Name>
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
            <h2>Admin Users Report</h2>
            <p>Generated on: ' . date('d M Y, h:i A') . '</p>
            <p>Total Records: ' . count($admins) . '</p>
            <table>
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>';
        
        foreach ($admins as $index => $admin) {
            $html .= '<tr>
                <td>' . ($index + 1) . '</td>
                <td>' . ($admin->sr_no ?? $admin->id) . '</td>
                <td>' . htmlspecialchars($admin->name) . '</td>
                <td>' . htmlspecialchars($admin->email) . '</td>
                <td>' . ucfirst(str_replace('_', ' ', $admin->role)) . '</td>
                <td>' . ucfirst($admin->status) . '</td>
                <td>' . ($admin->last_login ? $admin->last_login->format('d M Y, h:i A') : 'Never') . '</td>
                <td>' . $admin->created_at->format('d M Y, h:i A') . '</td>
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

    /**
     * Export admins data as PDF (HTML format)
     */
    private function exportPDF($admins)
    {
        $filename = 'admins_export_' . date('Y-m-d_His') . '.html';
        
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Admin Users Report</title>
            <style>
                @media print {
                    body { margin: 0; }
                    @page { size: A4 landscape; margin: 1cm; }
                }
                body { 
                    font-family: Arial, sans-serif; 
                    margin: 20px;
                    font-size: 12px;
                }
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                    padding-bottom: 10px;
                    border-bottom: 2px solid #4CAF50;
                }
                h1 { 
                    color: #333; 
                    margin: 0 0 10px 0;
                    font-size: 24px;
                }
                .info {
                    color: #666;
                    font-size: 11px;
                }
                table { 
                    width: 100%; 
                    border-collapse: collapse; 
                    margin-top: 20px; 
                }
                th, td { 
                    border: 1px solid #ddd; 
                    padding: 10px 8px; 
                    text-align: left; 
                    font-size: 11px;
                }
                th { 
                    background-color: #4CAF50; 
                    color: white;
                    font-weight: bold;
                }
                tr:nth-child(even) {
                    background-color: #f9f9f9;
                }
                tr:hover {
                    background-color: #f5f5f5;
                }
                .badge {
                    display: inline-block;
                    padding: 3px 8px;
                    border-radius: 3px;
                    font-size: 10px;
                    font-weight: bold;
                }
                .badge-success {
                    background-color: #d4edda;
                    color: #155724;
                    border: 1px solid #c3e6cb;
                }
                .badge-warning {
                    background-color: #fff3cd;
                    color: #856404;
                    border: 1px solid #ffeaa7;
                }
                .footer {
                    margin-top: 30px;
                    text-align: center;
                    font-size: 10px;
                    color: #999;
                    border-top: 1px solid #ddd;
                    padding-top: 10px;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Admin Users Report</h1>
                <div class="info">
                    <strong>Generated on:</strong> ' . date('d M Y, h:i A') . ' | 
                    <strong>Total Records:</strong> ' . count($admins) . '
                </div>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">Sr.No</th>
                        <th style="width: 10%;">ID</th>
                        <th style="width: 15%;">Name</th>
                        <th style="width: 20%;">Email</th>
                        <th style="width: 12%;">Role</th>
                        <th style="width: 8%;">Status</th>
                        <th style="width: 15%;">Last Login</th>
                        <th style="width: 15%;">Created At</th>
                    </tr>
                </thead>
                <tbody>';
        
        foreach ($admins as $index => $admin) {
            $statusClass = $admin->status == 'active' ? 'badge-success' : 'badge-warning';
            $html .= '<tr>
                <td>' . ($index + 1) . '</td>
                <td>' . ($admin->sr_no ?? $admin->id) . '</td>
                <td>' . htmlspecialchars($admin->name) . '</td>
                <td>' . htmlspecialchars($admin->email) . '</td>
                <td>' . ucfirst(str_replace('_', ' ', $admin->role)) . '</td>
                <td><span class="badge ' . $statusClass . '">' . ucfirst($admin->status) . '</span></td>
                <td>' . ($admin->last_login ? $admin->last_login->format('d M Y, h:i A') : 'Never') . '</td>
                <td>' . $admin->created_at->format('d M Y, h:i A') . '</td>
            </tr>';
        }
        
        $html .= '</tbody>
            </table>
            
            <div class="footer">
                <p>© ' . date('Y') . ' Admin Management System | This is a system-generated report</p>
            </div>
            
            <script>
                // Optional: Auto-print when opened
                // window.onload = function() { window.print(); }
            </script>
        </body>
        </html>';
        
        return Response::make($html, 200, [
            'Content-Type' => 'text/html',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}