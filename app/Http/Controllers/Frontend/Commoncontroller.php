<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Commoncontroller extends Controller
{
 public function products(){
    return view('frontend.pages.products');
 }

 public function online_store(){
    return view('frontend.pages.online_store');
 }

}