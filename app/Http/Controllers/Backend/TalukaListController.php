<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ExamCenterDataTable;
use App\Http\Controllers\Controller;
use App\Models\PrimaryResult;
use Illuminate\Http\Request;

class TalukaListController extends Controller
{
    public function index()
    {

        $talukas =  PrimaryResult::select('taluka', 'taluka_status', \DB::raw('MIN(id) as id'))
        ->groupBy('taluka', 'taluka_status')
        ->get();
       
        return view('admin.taluka.index',  compact('talukas'));
        
    }



    public function changeStatus(Request $request)
{

    if($request->ids){
        $ids = $request->input('ids');
    $status = $request->input('status');

    // Update all selected Talukas in the database
    PrimaryResult::query()
    ->update(['taluka_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);

    }
    
    // $center = PrimaryResult::find($request->id);
    $centers = PrimaryResult::where('taluka',$request->examCenter)->get();


   if ($centers->isNotEmpty()) {
    PrimaryResult::where('taluka', $request->examCenter)
        ->update(['taluka_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);
   }
    return response()->json(['success' => false, 'message' => 'Center not found']);
}

}
