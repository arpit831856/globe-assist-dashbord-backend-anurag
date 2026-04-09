<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    // List all FAQs
    public function index()
    {
        // $faqs = Faq::latest()->get();
        $faqs = Faq::latest()->paginate(5);
        return view('admin.faqs', compact('faqs'));
    }

    // Store new FAQ
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->only(['question', 'answer']));
        return redirect()->back()->with('success', 'FAQ added successfully.');
    }

    // Update FAQ
    public function update(Request $request, Faq $faq)
    {
        //    dd($request->all());
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
        //  dd($request->all());

        $faq->update($request->only(['question', 'answer']));
        return redirect()->back()->with('success', 'FAQ updated successfully.');
    }

    // Delete FAQ
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }
}
