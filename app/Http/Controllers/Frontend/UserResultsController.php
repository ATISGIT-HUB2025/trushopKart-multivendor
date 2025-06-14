<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserResultsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Result;
use Barryvdh\DomPDF\Facade\Pdf;
class UserResultsController extends Controller

{
    public function index(UserResultsDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.results.index');
    }

    public function download($id)
    {
        $result = Result::with(['user', 'exam'])->findOrFail($id);
        
        // Generate a simple progress bar instead of chart
        $totalWidth = 200;
        $correctPercentage = ($result->correct_answers / $result->total_questions) * 100;
        
        $data = [
            'result' => $result,
            'correctPercentage' => $correctPercentage,
        ];
        
        $pdf = PDF::loadView('frontend.dashboard.results.result-pdf', $data);
        
        return $pdf->download('result-'.$result->id.'.pdf');
    }

    public function downloadCertificate($id)
    {
        $result = Result::with(['user', 'exam'])->findOrFail($id);
        
        if (!$result->exam->is_certificate || !$result->passed) {
            abort(404);
        }
        
        $data = [
            'result' => $result,
        ];
        
        $pdf = PDF::loadView('frontend.dashboard.results.certificate-pdf', $data);
        
        return $pdf->download('certificate-'.$result->id.'.pdf');
    }
    

}
