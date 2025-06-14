<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ExamCenterDataTable;
use App\Http\Controllers\Controller;
use App\Models\PrimaryResult;
use Illuminate\Http\Request;

class DivisionListController extends Controller
{
    public function index()
    {

        $divisions =  PrimaryResult::select('division', 'division_status', \DB::raw('MIN(id) as id'))
        ->groupBy('division', 'division_status')
        ->get();
       
        return view('admin.division.index',  compact('divisions'));
        
    }



    public function changeStatus(Request $request)
{

    if($request->ids){
        $ids = $request->input('ids');
    $status = $request->input('status');

    // Update all selected Talukas in the database
    PrimaryResult::query()
    ->update(['division_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);

    }

    // $center = PrimaryResult::find($request->id);
    $centers = PrimaryResult::where('division',$request->examCenter)->get();


   if ($centers->isNotEmpty()) {
    PrimaryResult::where('division', $request->examCenter)
        ->update(['division_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);
   }
    return response()->json(['success' => false, 'message' => 'Center not found']);
}

}
