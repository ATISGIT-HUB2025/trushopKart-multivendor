<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ExamCenterDataTable;
use App\Http\Controllers\Controller;
use App\Models\PrimaryResult;
use Illuminate\Http\Request;

class StateListController extends Controller
{
    public function index()
    {

        $states =  PrimaryResult::select('state', 'state_status', \DB::raw('MIN(id) as id'))
        ->groupBy('state', 'state_status')
        ->get();
       
        return view('admin.state.index',  compact('states'));
        
    }



    public function changeStatus(Request $request)
{

    if($request->ids){
        $ids = $request->input('ids');
    $status = $request->input('status');

    // Update all selected Talukas in the database
    PrimaryResult::query()->update(['state_status' => $request->status]);


    return response()->json(['success' => true, 'message' => 'Status updated successfully']);

    }

    // $center = PrimaryResult::find($request->id);
    $centers = PrimaryResult::where('state',$request->examCenter)->get();


   if ($centers->isNotEmpty()) {
    PrimaryResult::where('state', $request->examCenter)
        ->update(['state_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);
   }
    return response()->json(['success' => false, 'message' => 'Center not found']);
}

}
