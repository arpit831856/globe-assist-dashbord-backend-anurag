<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\AddLink;
use Illuminate\Support\Facades\Auth;

class PartnerDashboardController extends Controller
{
    public function index()
    {
        // Logged-in partner
        $partner = Auth::guard('partner')->user();

        return view('web.home', compact('partner'));
    }

     public function dashboard()
    {
        // Logged-in partner

        return view('partner.dashboard');
    }

    public function showLinks()
    {
        $addLinks = AddLink::latest()->get();

        return view('partner.links.show-links', compact('addLinks'));
    }
}
