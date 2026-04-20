<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;
 use App\Models\Booking;
  use App\Models\PartnerService;

use Illuminate\Support\Facades\Validator;
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
    
  public function services(Request $request)
{
    $baseQuery = PartnerService::with(['service', 'partner'])
        ->where('status', 'active');

    $filterOptions = [
        'categories' => (clone $baseQuery)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->orderBy('category')
            ->pluck('category')
            ->unique()
            ->values(),
        'locations' => (clone $baseQuery)
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->orderBy('location')
            ->pluck('location')
            ->unique()
            ->values(),
    ];

    $servicesQuery = (clone $baseQuery);

    if ($request->filled('search')) {
        $search = trim($request->search);

        $servicesQuery->where(function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhereHas('partner', function ($partnerQuery) use ($search) {
                    $partnerQuery->where('full_name', 'like', "%{$search}%");
                });
        });
    }

    if ($request->filled('category') && $request->category !== 'all') {
        $servicesQuery->where('category', $request->category);
    }

    if ($request->filled('location') && $request->location !== 'all') {
        $servicesQuery->where('location', $request->location);
    }

    if ($request->filled('service_date')) {
        $servicesQuery->whereDate('service_date', $request->service_date);
    }

    switch ($request->get('sort')) {
        case 'price_low':
            $servicesQuery->orderBy('price');
            break;
        case 'price_high':
            $servicesQuery->orderByDesc('price');
            break;
        case 'service_date':
            $servicesQuery->orderBy('service_date')->orderByDesc('created_at');
            break;
        default:
            $servicesQuery->orderByDesc('created_at');
            break;
    }

    $services = $servicesQuery->get();

    return view('user.dash-service', compact('services', 'filterOptions'));
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
        public function updatePassword(Request $request)
        {
            $request->validate([
                'current_password' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = Auth::guard('user')->user();

            if (! $user || ! Hash::check($request->current_password, $user->password)) {
                return back()->withErrors([
                    'current_password' => 'Current password is incorrect.',
                ]);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            return back()->with('success', 'Password updated successfully.');
        }
      public function support()
        {
    
            return view('user.dash-support');
            // echo $user;
        }
        
       

public function bookService(Request $request)
{
    try {
        $user = Auth::guard('user')->user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'Please login first.');
        }
        $validator = Validator::make($request->all(), [
            'service_id'   => 'required|integer',
            'partner_id'   => 'required|integer',
         'budget' => 'nullable|numeric',

            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'email'        => 'nullable|email|max:255',
            'booking_date' => 'required|date',  
            'location'     => 'required|string|max:255',
            'requirements' => 'nullable|string',
            'start_time'   => 'required|date_format:H:i',
            'end_time'     => 'required|date_format:H:i|after:start_time',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fill all required fields correctly.');
        }
$exists = Booking::where('user_id', $user->id)
    ->where('service_id', $request->service_id)
    ->exists();

if ($exists) {
    return redirect()->back()
        ->withInput()
        ->with('error', 'You have already booked this service.');
}
        Booking::create([
            'service_id'   => $request->service_id,
            'partner_id'   => $request->partner_id,
            'service_name'     => $request->service_name,
            'budget'     => $request->budget,
            'user_id'      => $user->id,
            'name'         => $request->name,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'booking_date' => $request->booking_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'location'     => $request->location,
            'requirements' => $request->requirements,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->back()->with('success', 'Service booked successfully.');

    } catch (\Exception $e) {

        return redirect()->back()
            ->withInput()
            ->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}
}
