<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller; 
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of roles
     */
    public function index(Request $request)
    {
        $query = Role::query();
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('display_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Status filter
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }
        
        // Permission level filter
        if ($request->has('permission_level') && $request->permission_level !== '') {
            $level = $request->permission_level;
            
            if ($level === 'full') {
                $query->whereRaw('JSON_LENGTH(permissions) >= 10');
            } elseif ($level === 'partial') {
                $query->whereRaw('JSON_LENGTH(permissions) BETWEEN 5 AND 9');
            } elseif ($level === 'limited') {
                $query->whereRaw('JSON_LENGTH(permissions) < 5');
            }
        }
        
        // Date range filter
        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('updated_at', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('updated_at', '<=', $request->end_date);
        }
        
        $roles = $query->latest()->paginate(10);
        
        // Calculate statistics
        $stats = [
            'total_roles' => Role::count(),
            'active_roles' => Role::where('status', 'active')->count(),
            'inactive_roles' => Role::where('status', 'inactive')->count(),
            'avg_permissions' => round(Role::get()->avg(function($role) {
                return is_array($role->permissions) ? count($role->permissions) : 0;
            }), 1),
        ];
        
        return view('admin.roles.index', compact('roles', 'stats'));
    }

    /**
     * Store a newly created role
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_type' => 'required|string',
            'custom_name' => 'required_if:role_type,custom|nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string|max:500',
            'permissions' => 'nullable|array',
        ]);

        // Determine role name
        if ($request->role_type === 'custom') {
            $displayName = $request->custom_name;
            $name = Str::slug($request->custom_name, '_');
        } else {
            $displayName = ucwords(str_replace('_', ' ', $request->role_type));
            $name = $request->role_type;
        }

        // Check if role already exists
        if (Role::where('name', $name)->exists()) {
            return back()->with('error', 'A role with this name already exists.');
        }

        // Process permissions
        $permissions = [];
        if ($request->has('permissions')) {
            foreach ($request->permissions as $key => $value) {
                if ($value === 'on' || $value === true || $value === '1') {
                    $permissions[] = $key;
                }
            }
        }

        Role::create([
            'name' => $name,
            'display_name' => $displayName,
            'description' => $request->description,
            'status' => $request->status,
            'permissions' => $permissions,
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    /**
     * Update the specified role
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'display_name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string|max:500',
            'permissions' => 'nullable|array',
        ]);

        // Process permissions
        $permissions = [];
        if ($request->has('permissions')) {
            foreach ($request->permissions as $key => $value) {
                if ($value === 'on' || $value === true || $value === '1') {
                    $permissions[] = $key;
                }
            }
        }

        $role->update([
            'name' => Str::slug($request->name, '_'),
            'display_name' => $request->display_name,
            'description' => $request->description,
            'status' => $request->status,
            'permissions' => $permissions,
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified role
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        
        // Check if any admins are using this role
        $adminCount = \App\Models\ManageAdmin::where('role', $role->name)->count();
        
        if ($adminCount > 0) {
            return back()->with('error', "Cannot delete this role. {$adminCount} admin(s) are assigned to it.");
        }
        
        $role->delete();

        return back()->with('success', 'Role deleted successfully!');
    }

    /**
     * Export roles data
     */
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
        $query = Role::query();
        
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
        
        $roles = $query->orderBy('created_at', 'desc')->get();
        
        // Check if there's data to export
        if ($roles->isEmpty()) {
            return back()->with('error', 'No data available to export for the selected criteria.');
        }
        
        // Export based on format
        try {
            if ($format === 'csv') {
                return $this->exportCSV($roles);
            } elseif ($format === 'excel') {
                return $this->exportExcel($roles);
            } elseif ($format === 'pdf') {
                return $this->exportPDF($roles);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Export failed: ' . $e->getMessage());
        }
        
        return back()->with('error', 'Invalid export format selected.');
    }

    /**
     * Export roles as CSV
     */
    private function exportCSV($roles)
    {
        $filename = 'roles_export_' . date('Y-m-d_His') . '.csv';
        $handle = fopen('php://temp', 'r+');
        
        // Add UTF-8 BOM
        fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Headers
        fputcsv($handle, [
            'Sr.No', 
            'Role Name', 
            'Display Name', 
            'Description',
            'Permissions Count',
            'Status', 
            'Created At',
            'Last Updated'
        ]);
        
        // Data rows
        foreach ($roles as $index => $role) {
            fputcsv($handle, [
                $index + 1,
                $role->name,
                $role->display_name,
                $role->description ?? 'N/A',
                is_array($role->permissions) ? count($role->permissions) : 0,
                ucfirst($role->status),
                $role->created_at->format('d M Y, h:i A'),
                $role->updated_at->format('d M Y, h:i A')
            ]);
        }
        
        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);
        
        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Export roles as Excel
     */
    private function exportExcel($roles)
    {
        $filename = 'roles_export_' . date('Y-m-d_His') . '.xls';
        
        $html = '
        <html xmlns:x="urn:schemas-microsoft-com:office:excel">
        <head>
            <meta charset="UTF-8">
            <style>
                table { border-collapse: collapse; width: 100%; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #4CAF50; color: white; font-weight: bold; }
            </style>
        </head>
        <body>
            <h2>Roles Report</h2>
            <p>Generated on: ' . date('d M Y, h:i A') . '</p>
            <table>
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Role Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Permissions</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                </thead>
                <tbody>';
        
        foreach ($roles as $index => $role) {
            $permissionsList = is_array($role->permissions) 
                ? implode(', ', array_map(function($p) {
                    return ucwords(str_replace('_', ' ', $p));
                }, $role->permissions))
                : 'None';
                
            $html .= '<tr>
                <td>' . ($index + 1) . '</td>
                <td>' . htmlspecialchars($role->name) . '</td>
                <td>' . htmlspecialchars($role->display_name) . '</td>
                <td>' . htmlspecialchars($role->description ?? 'N/A') . '</td>
                <td>' . htmlspecialchars($permissionsList) . '</td>
                <td>' . ucfirst($role->status) . '</td>
                <td>' . $role->created_at->format('d M Y') . '</td>
                <td>' . $role->updated_at->format('d M Y') . '</td>
            </tr>';
        }
        
        $html .= '</tbody></table></body></html>';
        
        return Response::make($html, 200, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Export roles as PDF
     */
    private function exportPDF($roles)
    {
        $filename = 'roles_export_' . date('Y-m-d_His') . '.html';
        
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Roles Report</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; font-size: 12px; }
                .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #4CAF50; padding-bottom: 10px; }
                h1 { color: #333; margin: 0 0 10px 0; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #ddd; padding: 10px 8px; text-align: left; font-size: 11px; }
                th { background-color: #4CAF50; color: white; font-weight: bold; }
                tr:nth-child(even) { background-color: #f9f9f9; }
                .badge { padding: 3px 8px; border-radius: 3px; font-size: 10px; font-weight: bold; }
                .badge-success { background-color: #d4edda; color: #155724; }
                .badge-danger { background-color: #f8d7da; color: #721c24; }
                .permissions { font-size: 10px; color: #666; }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Roles & Permissions Report</h1>
                <p>Generated on: ' . date('d M Y, h:i A') . ' | Total: ' . count($roles) . '</p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="15%">Role Name</th>
                        <th width="20%">Description</th>
                        <th width="40%">Permissions</th>
                        <th width="10%">Status</th>
                        <th width="10%">Created</th>
                    </tr>
                </thead>
                <tbody>';
        
        foreach ($roles as $index => $role) {
            $statusClass = $role->status == 'active' ? 'badge-success' : 'badge-danger';
            $permissionsList = is_array($role->permissions) && count($role->permissions) > 0
                ? implode(', ', array_map(function($p) {
                    return ucwords(str_replace('_', ' ', $p));
                }, $role->permissions))
                : 'No permissions assigned';
                
            $html .= '<tr>
                <td>' . ($index + 1) . '</td>
                <td><strong>' . htmlspecialchars($role->display_name) . '</strong></td>
                <td>' . htmlspecialchars($role->description ?? 'N/A') . '</td>
                <td class="permissions">' . htmlspecialchars($permissionsList) . '</td>
                <td><span class="badge ' . $statusClass . '">' . ucfirst($role->status) . '</span></td>
                <td>' . $role->created_at->format('d M Y') . '</td>
            </tr>';
        }
        
        $html .= '</tbody></table></body></html>';
        
        return Response::make($html, 200, [
            'Content-Type' => 'text/html',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }

    /**
     * Get role data for editing (AJAX)
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }
}