<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserResultsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Result;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class UserHallTicketController extends Controller
{
    public function index(UserResultsDataTable $dataTable)
    {
        $user = Auth::user();
        $admission = Admission::where('email', $user->email)->first();
        $center = $admission ? $admission->center : null;
        
        
        return view('frontend.dashboard.hall-ticket.index', compact('admission', 'center','dataTable'));
    }
    


    public function download($id)
    {
        $user = Auth::user();
        $admission = Admission::where('email', $user->email)->first();
        $center = $admission ? $admission->center : null;
        
        $data = [
            'user' => $user,
            'admission' => $admission,
            'center' => $center
        ];
        
        $pdf = PDF::loadView('frontend.dashboard.hall-ticket.hall-ticket-pdf', $data)
            ->setPaper('a4')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif',
                'chroot' => public_path(),
                'enable_remote' => true,
                'enable_css_float' => true,
                'enable_javascript' => true,
                'images' => true
            ]);
        
        return $pdf->download('hall-ticket-'.$user->id.'.pdf');
    }
    
    



}
