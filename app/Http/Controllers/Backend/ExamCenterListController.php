<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ExamCenterDataTable;
use App\Http\Controllers\Controller;
use App\Models\PrimaryResult;
use Illuminate\Http\Request;

class ExamCenterListController extends Controller
{
    public function index()
    {
        $centers = PrimaryResult::select('exam_centre', 'exam_center_status', \DB::raw('MIN(id) as id'))
        ->groupBy('exam_centre', 'exam_center_status')
        ->get();
    
        return view('admin.exam-center.index',  compact('centers'));
        
    }



    public function changeStatus(Request $request)
{

    if($request->ids){
        $ids = $request->input('ids');
    $status = $request->input('status');

    // Update all selected Talukas in the database
    PrimaryResult::query()
    ->update(['exam_center_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);

    }


    // $center = PrimaryResult::find($request->id);
    $centers = PrimaryResult::where('exam_centre',$request->examCenter)->get();


   if ($centers->isNotEmpty()) {
    PrimaryResult::where('exam_centre', $request->examCenter)
        ->update(['exam_center_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);
   }
    return response()->json(['success' => false, 'message' => 'Center not found']);
}

}
