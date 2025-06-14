<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class DivisionalHedController extends Controller
{
    public function index()
    {
        
        return view('divisional_head.dashboard.dashboard', );
}


    
}
