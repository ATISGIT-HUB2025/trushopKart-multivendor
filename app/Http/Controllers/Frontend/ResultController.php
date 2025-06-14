<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryResult;
use App\Models\AdminResult;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultController extends Controller
{

    public function index(Request $request)
    {

        // return 'ok';
        // Existing code
        $searchBarcode = $request->input('barcode');
        $examId = $request->input('exam_id');
        $primaryResult = null;
        $logos = null;
        if ($searchBarcode && $examId) {
            $primaryResult = PrimaryResult::where('exam_center_status', 1)
                ->where('barcode', $searchBarcode)
                ->where('admin_result_id', $examId)
                ->first();
                
           if($primaryResult){
           $logos=  AdminResult::where('id',$primaryResult->admin_result_id)->first();
           }     
        }
    
        $exams = AdminResult::orderBy('exam_name', 'asc')->get();

        return view('frontend.result.index', compact('primaryResult','exams','logos'));
    }
    

    public function downloadPDF(Request $request)
    { 
        $barcode = $request->input('barcode');
        $primaryResult = PrimaryResult::where('barcode', $barcode)->first();
    
        // Calculate rankings
        $students = PrimaryResult::where('state', $primaryResult->state)
        ->where('std', $primaryResult->std)
        ->where('medium', $primaryResult->medium)
        ->orderByDesc('percentage')
        ->pluck('percentage')
        ->unique()
        ->values();
    
    $stateRank = $students->search($primaryResult->percentage) + 1;

    $students = PrimaryResult::where('state', $primaryResult->state)
    ->where('std', $primaryResult->std)
    ->where('medium', $primaryResult->medium)
    ->where('admin_result_id', $primaryResult->admin_result_id) // filter by exam
    ->orderByDesc('percentage')
    ->pluck('percentage')
    ->unique()
    ->values();

$stateRank = $students->search($primaryResult->percentage) + 1;

    
        
       // Division Rank
$divisionPercentages = PrimaryResult::where('state', $primaryResult->state)
->where('division', $primaryResult->division)
->where('std', $primaryResult->std)
->where('medium', $primaryResult->medium)
->where('admin_result_id', $primaryResult->admin_result_id)
->orderByDesc('percentage')
->pluck('percentage')
->unique()
->values();

$divisionRank = $divisionPercentages->search($primaryResult->percentage) + 1;

// District Rank
$districtPercentages = PrimaryResult::where('state', $primaryResult->state)
->where('division', $primaryResult->division)
->where('district', $primaryResult->district)
->where('std', $primaryResult->std)
->where('medium', $primaryResult->medium)
->where('admin_result_id', $primaryResult->admin_result_id)
->orderByDesc('percentage')
->pluck('percentage')
->unique()
->values();

$districtRank = $districtPercentages->search($primaryResult->percentage) + 1;

// Taluka Rank
$talukaPercentages = PrimaryResult::where('state', $primaryResult->state)
->where('division', $primaryResult->division)
->where('district', $primaryResult->district)
->where('taluka', $primaryResult->taluka)
->where('std', $primaryResult->std)
->where('medium', $primaryResult->medium)
->where('admin_result_id', $primaryResult->admin_result_id)
->orderByDesc('percentage')
->pluck('percentage')
->unique()
->values();

$talukaRank = $talukaPercentages->search($primaryResult->percentage) + 1;

// Center Rank
$centerPercentages = PrimaryResult::where('state', $primaryResult->state)
->where('division', $primaryResult->division)
->where('district', $primaryResult->district)
->where('taluka', $primaryResult->taluka)
->where('exam_centre', $primaryResult->exam_centre)
->where('std', $primaryResult->std)
->where('medium', $primaryResult->medium)
->where('admin_result_id', $primaryResult->admin_result_id)
->orderByDesc('percentage')
->pluck('percentage')
->unique()
->values();

$centerRank = $centerPercentages->search($primaryResult->percentage) + 1;

    
        // Update the rankings in primary result  state_merit,division_merit,district_merit,taluka_merit,center_merit
        $primaryResult->state_merit = $stateRank;
        $primaryResult->division_merit = $divisionRank;
        $primaryResult->district_merit = $districtRank;
        $primaryResult->taluka_merit = $talukaRank;
        $primaryResult->center_merit = $centerRank;
        $primaryResult->total_marks = $primaryResult->first_paper + $primaryResult->second_paper;
    

    
        if (!$primaryResult) {
            return redirect()->route('result')
                ->with('error', 'No result found to download.');
        }
        // return view('frontend.result.certificate_two', compact('primaryResult'));
    
        $pdf = Pdf::loadView('frontend.result.certificate_two', compact('primaryResult'));
        // $pdf = Pdf::loadView('frontend.result.certificate_pdf', compact('primaryResult'));
        $pdf->setPaper([0, 0, 715, 980]);
        
        return $pdf->download('certificate.pdf');
        // return $pdf->stream('certificate.pdf');
    }
    public function downloadmarkshit(Request $request)
    {
        $barcode = $request->input('barcode');
        $primaryResult = PrimaryResult::where('barcode', $barcode)->first();
    
        // Calculate rankings
        $stateRank = PrimaryResult::where('percentage', '>', $primaryResult->percentage)->count() + 1;
        
        $divisionRank = PrimaryResult::where('division', $primaryResult->division)
            ->where('percentage', '>', $primaryResult->percentage)
            ->count() + 1;
        
        $districtRank = PrimaryResult::where('district', $primaryResult->district)
            ->where('percentage', '>', $primaryResult->percentage)
            ->count() + 1;
        
        $talukaRank = PrimaryResult::where('taluka', $primaryResult->taluka)
            ->where('percentage', '>', $primaryResult->percentage)
            ->count() + 1;
            
        $centerRank = PrimaryResult::where('exam_centre', $primaryResult->exam_centre)
            ->where('percentage', '>', $primaryResult->percentage)
            ->count() + 1;
    
        // Update the rankings in primary result
        $primaryResult->state_merit = $stateRank;
        $primaryResult->division_merit = $divisionRank;
        $primaryResult->district_merit = $districtRank;
        $primaryResult->taluka_merit = $talukaRank;
        $primaryResult->center_merit = $centerRank;
    

    
        if (!$primaryResult) {
            return redirect()->route('result')
                ->with('error', 'No result found to download.');
        }
    
        // return view('frontend.result.certificate_pdf', compact('primaryResult'));

        // $pdf = Pdf::loadView('frontend.result.certificate_two', compact('primaryResult'));
        $pdf = Pdf::loadView('frontend.result.certificate_pdf', compact('primaryResult'));
        // $pdf->setPaper([0, 0, 715, 980]);
        
        return $pdf->download('certificate.pdf');

        // return $pdf->stream('certificate.pdf');
    }
    
}
