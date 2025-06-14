<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HelpInquiry;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        return view('frontend.help.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        HelpInquiry::create($request->all());

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
    }
}
