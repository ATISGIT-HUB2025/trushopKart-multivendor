<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use PDF;

class UserPaymentController extends Controller
{
    public function transctions()
    {
        $admissions = Admission::where('email', auth()->user()->email)->get();
        return view('frontend.dashboard.payment.index', compact('admissions'));
    }
    

}
