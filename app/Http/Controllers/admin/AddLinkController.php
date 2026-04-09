<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AddLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddLinkController extends Controller
{
    public function index()
    {
        $addLinks = AddLink::latest()->paginate(10);

        return view('admin.add-links', compact('addLinks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'youtube_link' => 'required|url|max:1000',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['image'] = $request->file('image')->store('add-links', 'public');

        AddLink::create($validated);

        return redirect()->back()->with('success', 'Add Link entry created successfully.');
    }

    public function update(Request $request, AddLink $addLink)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'youtube_link' => 'required|url|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($addLink->image && Storage::disk('public')->exists($addLink->image)) {
                Storage::disk('public')->delete($addLink->image);
            }

            $validated['image'] = $request->file('image')->store('add-links', 'public');
        }

        $addLink->update($validated);

        return redirect()->back()->with('success', 'Add Link entry updated successfully.');
    }

    public function destroy(AddLink $addLink)
    {
        if ($addLink->image && Storage::disk('public')->exists($addLink->image)) {
            Storage::disk('public')->delete($addLink->image);
        }

        $addLink->delete();

        return redirect()->back()->with('success', 'Add Link entry deleted successfully.');
    }
}
