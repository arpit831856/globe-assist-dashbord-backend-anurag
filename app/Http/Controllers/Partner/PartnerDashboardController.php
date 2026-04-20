<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\AddLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PartnerSlot;
use App\Models\PartnerProfile;
use App\Models\PartnerService;

class PartnerDashboardController extends Controller
{

public function save(Request $request)
{
    $request->validate([
        'business_name' => 'required',
        'bio' => 'required',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $profile = PartnerProfile::where('partner_id', auth()->id())->first();

    $photo = $profile->profile_photo ?? null;

    if ($request->hasFile('profile_photo')) {
        $photo = $request->file('profile_photo')->store('profiles', 'public');
    }

    PartnerProfile::updateOrCreate(
        ['partner_id' => auth()->id()],
        [
            'business_name' => $request->business_name,
            'bio' => $request->bio,
            'experience' => $request->experience,
            'projects_completed' => $request->projects_completed,
            'service_areas' => $request->service_areas,
            'languages' => $request->languages,
            'phone' => $request->phone,
            'email' => $request->email,
            'rating' => $request->rating,
            'reviews_count' => $request->reviews_count,
            'skill_tags' => $request->skill_tags,
            'profile_photo' => $photo
        ]
    );

    return response()->json([
        'status' => true,
        'message' => 'Profile Saved Successfully'
    ]);
}
    public function index()
    {
        // Logged-in partner
        $partner = Auth::guard('partner')->user();

        return view('web.home', compact('partner'));
    }

    public function getProfile()
{
    $profile = \App\Models\PartnerProfile::where('partner_id', auth()->id())->first();

    return response()->json($profile);
}
     public function dashboard()
    {
        // Logged-in partner

        return view('partner.main.dashboard');
    }
    public function services()
{
    $categories = \App\Models\Service::select('id', 'name')->get();
    
    return view('partner.main.services', compact('categories'));
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
    public function changePassword()
    {
        return view('partner.activity.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $partner = Auth::guard('partner')->user();

        if (! $partner || ! Hash::check($request->current_password, $partner->password)) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        $partner->password = Hash::make($request->password);
        $partner->save();

        return back()->with('success', 'Password updated successfully.');
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
    
public function saveSlots(Request $request)
{
    try {
        $partner = Auth::guard('partner')->user();

        if (!$partner) {
            return response()->json([
                'success' => false,
                'message' => 'Partner not logged in'
            ]);
        }

        foreach ($request->slots as $slot) {

            PartnerSlot::updateOrCreate(
                [
                    'partner_id' => $partner->id,
                    'day' => $slot['day']
                ],
                [
                    'start_time' => $slot['start_time'],
                    'end_time'   => $slot['end_time'],
                    'location'   => $partner->location ,
                    'status'     => 'Free'
                ]
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Selected slots saved successfully'
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}

public function saveService(Request $request)
{
    $partner = Auth::guard('partner')->user();

    if (!$partner) {
        return response()->json([
            'status' => false,
            'message' => 'Partner not logged in.',
        ], 401);
    }

    $validated = $request->validate([
        'service_id' => 'required|exists:services,id|unique:partner_services,service_id,NULL,id,partner_id,' . $partner->id,
        'category' => 'required|string',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|string|max:255',
        'availability' => 'nullable|string|max:255',

        'service_date' => 'required|date',
        'start_time'   => 'required',
        'end_time'     => 'required|after:start_time',

        'location' => 'nullable|string|max:255',
        'experience_years' => 'nullable|integer|min:0',
        'team_size' => 'nullable|string|max:255',
        'languages' => 'nullable|string|max:255',
        'highlights' => 'nullable|string',

        'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
    ]);

    /* Upload Photos */
    $photoPaths = [];

    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $photoPaths[] = $photo->store('partner-services', 'public');
        }
    }

    /* Save Service */
    $service = PartnerService::create([
        'partner_id' => $partner->id,
        'service_id' => $validated['service_id'],
        'category' => $validated['category'],

        'title' => $validated['title'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'availability' => $validated['availability'] ?? null,

        // ✅ New Fields
        'service_date' => $validated['service_date'],
        'start_time'   => $validated['start_time'],
        'end_time'     => $validated['end_time'],

        'location' => $validated['location'] ?? null,
        'experience_years' => $validated['experience_years'] ?? null,
        'team_size' => $validated['team_size'] ?? null,
        'languages' => $validated['languages'] ?? null,
        'highlights' => $validated['highlights'] ?? null,

        'photos' => json_encode($photoPaths),

        // Default Pending
        'status' => 0,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Service added successfully.',
        'service' => $this->formatPartnerService($service),
    ]);
}

public function getServices()
{
    $partner = Auth::guard('partner')->user();

    if (!$partner) {
        return response()->json([]);
    }

    $services = PartnerService::where('partner_id', $partner->id)
        ->latest()
        ->get()
        ->map(function ($service) {
            return $this->formatPartnerService($service);
        })
        ->values();

    return response()->json($services);
}

private function formatPartnerService(PartnerService $service): array
{
    $photos = collect($service->photos ?? [])
        ->filter()
        ->map(function ($path) {
            return asset('storage/' . $path);
        })
        ->values()
        ->all();

    return [
        'id' => $service->id,
        'category' => $service->category,
        'status' => $service->status,
        'title' => $service->title,
        'description' => $service->description,
        'price' => $service->price,
        'availability' => $service->availability,
        'location' => $service->location,
        'experience_years' => $service->experience_years,
        'team_size' => $service->team_size,
        'languages' => $service->languages,
        'highlights' => $service->highlights,
        'photos' => $photos,
    ];
}
}
