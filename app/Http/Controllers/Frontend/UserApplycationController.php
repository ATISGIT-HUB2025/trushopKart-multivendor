<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use PDF;

class UserApplycationController extends Controller
{
    public function applycation()
    {
        $admissions = Admission::where('email', auth()->user()->email)->get();
        return view('frontend.dashboard.application.index', compact('admissions'));
    }
    
    public function downloadPDF($id)
    {
        $admission = Admission::findOrFail($id);
        $pdf = PDF::loadView('frontend.dashboard.application.pdf', compact('admission'));
        return $pdf->download('admission-'.$id.'.pdf');
    }
}
