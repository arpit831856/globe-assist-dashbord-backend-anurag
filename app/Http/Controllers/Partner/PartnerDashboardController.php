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

        return view('partner.main.dashboard');
    }
      public function services()
    {

        return view('partner.main.services');
    }

      public function timeSlot()
    {

        return view('partner.main.timeslot');
    }
    public function notifications()
    {

        return view('partner.activity.notifications');
    }
  public function complaints()
    {

        return view('partner.activity.complaints');
    }
     public function serviceHistory()
    {

        return view('partner.activity.services-history');
    }
     public function payments()
    {

        return view('partner.finance.payments');
    }
      public function help()
    {

        return view('partner.support.help');
    }
    public function showLinks()
    {
        $addLinks = AddLink::latest()->get();

        return view('partner.links.show-links', compact('addLinks'));
    }
}
