<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class SupportController extends Controller
{
    public function index()
    {
        // $faqs = Faq::latest()->get(); // or ->where('status', 1)->get() later
        //  $faqs = Faq::orderBy('created_at', 'asc')->get();
         $faqs = Faq::orderBy('id', 'desc')->get();
        return view('web.support', compact('faqs'));
    }
}
