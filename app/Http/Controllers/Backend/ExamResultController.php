<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ResultsExport;
use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ExamResultController extends Controller
{

    public function getFilteredQuery(Request $request) 
{
    $query = Result::with(['user', 'exam']);

    // Filter by student name
    if ($request->filled('student_name')) {
        $query->whereHas('user', function($q) use ($request) {
            $q->where('name', 'like', '%' . $request->student_name . '%');
        });
    }

    // Filter by pass/fail status
    if ($request->filled('status')) {
        $query->where('passed', $request->status);
    }

    // Filter by date range
    if ($request->filled('start_date')) {
        $query->whereDate('completed_at', '>=', $request->start_date);
    }
    
    if ($request->filled('end_date')) {
        $query->whereDate('completed_at', '<=', $request->end_date);
    }

    // Performance filter
    if ($request->filled('performance_filter')) {
        switch($request->performance_filter) {
            case 'top10':
                $query->orderBy('correct_answers', 'desc')
                      ->limit(10);
                break;
            case 'bottom10':
                $query->orderBy('correct_answers', 'asc')
                      ->limit(10);
                break;
        }
    }

    return $query;
}

public function index(Request $request)
{
    $query = $this->getFilteredQuery($request);
    $results = $query->orderBy('created_at', 'desc')->paginate(10);
    return view('admin.exam-result.index', compact('results'));
}

public function export(Request $request)
{
    $query = $this->getFilteredQuery($request);
    $results = $query->get();

    $type = $request->type ?? 'pdf';
    $fileName = 'exam_results_' . date('Y-m-d') . '.' . $type;

    switch($type) {
        case 'pdf':
            $pdf = PDF::loadView('admin.exam-result.pdf', compact('results'));
            return $pdf->download($fileName);
        case 'excel':
            return Excel::download(new ResultsExport($results), $fileName);
        case 'csv':
            return Excel::download(new ResultsExport($results), $fileName);
    }
}


}
