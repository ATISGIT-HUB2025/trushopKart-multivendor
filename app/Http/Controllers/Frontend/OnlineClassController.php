<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class OnlineClassController extends Controller
{
    public function index()
    {
    return view('frontend.onlineclass.index');
    }
    public function details()
    {
    return view('frontend.onlineclass.onlineclassdetails');
    }
}
