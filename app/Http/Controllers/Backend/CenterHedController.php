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

class CenterHedController extends Controller
{
    public function dashboard()
    {
        
        return view('center_hed.dashboard.dashboard', );
}

public function questions()
{


    // $exams = Exam::orderBy('id', 'DESC')->paginate(10);
    // $questions = ExamQuestion::with('exam')
    // ->whereHas('exam', function($query) {
    //     $query->whereJsonContains('center_hed', strval(Auth::id()));
    // })
    // ->orderBy('id', 'DESC')
    // ->paginate(10);

    $authId = Auth::id();

    // Pehle exams fetch karte hain jisme center_hed me authId ho
    $examIds = Exam::whereJsonContains('center_hed', (string)$authId)
                    ->pluck('id')
                    ->toArray();
    
    // Ab ExamQuestion se wahi questions fetch karte hain jinka exam_id in examIds me ho
    $questions = ExamQuestion::with('exam')->whereIn('exam_id', $examIds) ->orderBy('id', 'DESC')
    ->paginate(10);

    return view('center_hed.questions',  compact('questions'));
}

public function generatePdf()
    {
        $authId = Auth::id();

        $examIds = Exam::whereJsonContains('center_hed', (string)$authId)
            ->pluck('id')
            ->toArray();

        $questions = ExamQuestion::with('exam')->whereIn('exam_id', $examIds)->get();

        // return view('center_hed.pdf',  compact('questions'));
        $pdf = PDF::loadView('center_hed.pdf', compact('questions'));

        return $pdf->download('questions.pdf');
    }

    
}
