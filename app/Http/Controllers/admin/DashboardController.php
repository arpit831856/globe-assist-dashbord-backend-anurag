<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Partner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function apiDashboard(Request $request)
    {
        /* ===============================
         | Dropdown Periods
         =============================== */
        $periods = [
            'today' => 'Today',
            'week'  => 'This Week',
            'month' => 'This Month',
            'year'  => 'This Year',
        ];

        $selectedPeriod = $request->get('period', 'month');

        /* ===============================
         | Dashboard Statistics
         =============================== */
        $totalUsers     = User::count();
        $totalPartners  = Partner::count();
        $newUsers       = User::where('created_at', '>=', now()->subMonth())->count();
        $activePartners = Partner::where('status', 'active')->count();

        /* ===============================
         | View Mode (5 or 10 records)
         =============================== */
        $viewMode = $request->get('view', 'limited'); // limited | all
        $perPage  = ($viewMode === 'all') ? 10 : 5;

        /* ===============================
         | Recent Users (Pagination)
         =============================== */
        $recentUsers = User::latest()
            ->paginate($perPage, ['*'], 'users_page')
            ->appends($request->query());

        /* ===============================
         | Recent Partners (Pagination)
         =============================== */
        $recentPartners = Partner::latest()
            ->paginate($perPage, ['*'], 'partners_page')
            ->appends($request->query());

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPartners',
            'newUsers',
            'activePartners',
            'periods',
            'selectedPeriod',
            'recentUsers',
            'recentPartners',
            'viewMode'
        ));
    }
}
