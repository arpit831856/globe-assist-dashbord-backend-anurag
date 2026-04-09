<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{


    public function index()
    {
        // Fetch all contact messages (latest first)
        $contacts = Contact::latest()->paginate(10);

        // Return to admin view
        return view('admin.contacts.index', compact('contacts'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

         Contact::create($request->only(['name', 'email', 'phone', 'message']));

        return back()->with('success', 'Your message has been submitted successfully!');
    }
}