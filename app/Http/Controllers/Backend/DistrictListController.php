<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ExamCenterDataTable;
use App\Http\Controllers\Controller;
use App\Models\PrimaryResult;
use Illuminate\Http\Request;

class DistrictListController extends Controller
{
    public function index()
    {

        $districts =  PrimaryResult::select('district', 'district_status', \DB::raw('MIN(id) as id'))
        ->groupBy('district', 'district_status')
        ->get();
       
        return view('admin.district.index',  compact('districts'));
        
    }



    public function changeStatus(Request $request)
{

    if($request->ids){
        $ids = $request->input('ids');
    $status = $request->input('status');

    // Update all selected Talukas in the database
    PrimaryResult::query()
    ->update(['district_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);

    }

    // $center = PrimaryResult::find($request->id);
    $centers = PrimaryResult::where('district',$request->examCenter)->get();


   if ($centers->isNotEmpty()) {
    PrimaryResult::where('district', $request->examCenter)
        ->update(['district_status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Status updated successfully']);
   }
    return response()->json(['success' => false, 'message' => 'Center not found']);
}




}
