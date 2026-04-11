<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {

        return view('user.dashboard');
        // echo $user;
    }

     public function overview()
    {

        return view('user.dash-overview');
        // echo $user;
    }
    public function services()
    {

        return view('user.dash-service');
        // echo $user;
    }

     public function notifications()
    {

        return view('user.dash-notification');
        // echo $user;
    }

     public function payments()
    {

        return view('user.dash-payment');
        // echo $user;
    }

        public function profile()
        {
    
            return view('user.dash-profile');
            // echo $user;
        }

        public function changePassword()
        {
    
            return view('user.dash-password');
            // echo $user;
        }
      public function support()
        {
    
            return view('user.dash-support');
            // echo $user;
        }
        
}

