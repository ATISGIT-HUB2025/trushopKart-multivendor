<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestAccess;

class RequestAccessController extends Controller
{
     public function showform()
    {
        return view('frontend.pages.request_access');
    }

    public function handleRequestForm(Request $request)
    {
        $request->validate([
            'name'    => ['nullable', 'max:200'],
            'lname'   => ['nullable', 'max:200'],
            'email'   => ['nullable', 'email'],
            'mobile'  => ['nullable', 'max:20'],
            'address' => ['nullable', 'max:500'],
            'subject' => ['nullable', 'max:200'],
            'details' => ['nullable', 'max:1000'],
            'comment' => ['nullable', 'max:1000'],
        ]);
    
        if ($request->filled('email')) {
            $exists = RequestAccess::where('email', $request->email)->exists();
    
            if ($exists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'A request has already been sent with this email address.'
                ], 409); 
            }
        }
        RequestAccess::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Your request has been submitted!'
        ]);
    }
    
}
