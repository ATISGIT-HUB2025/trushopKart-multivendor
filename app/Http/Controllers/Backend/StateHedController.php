<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ProductReview;
use App\Models\Standard;
use App\Models\SchoolForVisiting;
use App\Imports\SchoolForVisitingImport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\StudentAdmission;
class StateHedController extends Controller
{
    public function dashboard()
    {


        $userId = Auth::id();
       
        
        $today = Carbon::today();
        
        // Total Orders
        $data['totalOrders'] = Order::where('user_id', $userId)->count();
        
        // Today's Orders
        $data['todaysOrders'] = Order::where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->count();
        
        // Pending Orders (assuming 'pending' is the status value)
        $data['pendingOrders'] = Order::where('user_id', $userId)
            ->where('order_status', 'pending')
            ->count();
        
        // Total Purchase Price of Orders
        // $data['totalPurchasePrice'] = Order::where('user_id', $userId)
        //     ->sum('amount'); 

        // $data['totalPurchasePrice'] = SchoolForVisiting::whereDate('date', $today)
        $data['totalPurchasePrice'] = SchoolForVisiting::where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'divisional_head');
            })->Where('created_by', auth()->id());
        })
        ->sum('total_bill');


            $data['divisionalHeadOrders'] = Order::whereHas('userOrder', function ($query) {
                $query->where('role', 'divisional_head');
            })->count();

            $data['divisionalHeadTodaysOrders'] = Order::whereHas('userOrder', function ($query) {
                $query->where('role', 'divisional_head');
            })->whereDate('created_at', $today)
            ->count();

            $data['divisionalHeadPendingOrders'] = Order::whereHas('userOrder', function ($query) {
                $query->where('role', 'divisional_head');
            })->where('order_status', 'pending')
            ->count();
        
        // Total Purchase Price of Orders
        $data['divisionalHeadTotalPurchasePrice'] = Order::whereHas('userOrder', function ($query) {
            $query->where('role', 'divisional_head');
        })->sum('amount'); // 

        // return   $data['divisionalHeadTotalPurchasePrice'];

              // Total Orders
        $data['BulkAdmission_count'] =  StudentAdmission::where('teacher_id', auth()->id())->count();
          
        
        return view('state_head.dashboard.dashboard', $data);
}

public function schoolForVisitingGet()
{
   

    $data['schoolForVisitings'] = SchoolForVisiting::where(function ($query) {
        $query->whereHas('user', function ($q) {
            $q->where('role', 'divisional_head');
        })->orWhere('created_by', auth()->id());
    })->get();
    
    return view('state_head.school_for_visiting.index', $data);
}

public function schoolForVisitingCreate()
{
   $data['standards'] = Standard::limit(10)->get();
    return view('state_head.school_for_visiting.create', $data);
}

public function schoolForVisitingStore(Request $request)
{ //echo "<pre>"; print_r($request->all());die;
    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'phone' => 'required|string|max:15',
    //     'role' => 'required',
    //    'email' => 'required|email|unique:users,email',
    //     'password' => 'required|string|min:8',
    //     'status' => 'required|in:active,inactive',
    // ]);




    SchoolForVisiting::create([
       'created_by' => auth()->id(),
        'date' => $request->date,
        'visit_sr_no' => $request->visit_sr_no,
        'traveling_start_time' => $request->traveling_start_time,
        'traveling_end_time' => $request->traveling_end_time,
        'district' => $request->district,
        'taluka' => $request->taluka,
        'village' => $request->village,
        'school_name' => $request->school_name,
        'udise_no' => $request->udise_no,
        'hm_name' => $request->hm_name,
        'mobile_no' => $request->mobile_no,
        'total_students' => $request->total_students,
        'std_marathi' => $request->std_marathi,
        'std_semi' => $request->std_semi,
        'std_english' => $request->std_english,
        'final_marathi' => $request->final_marathi,
        'final_semi' => $request->final_semi,
        'final_english' => $request->final_english,
        'total_bill' => $request->total_bill,
        'online_bill' => $request->online_bill,
        'cash_bill' => $request->cash_bill,
       
        
    ]);

    return redirect()->route('state_head.school-for-visiting.index')->with('success', 'visit added successfully.');
}

public function schoolForVisitingExcel(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    try {
        Excel::import(new SchoolForVisitingImport(auth()->id()), $request->file('excel_file'));
        toastr('Students imported successfully!', 'success');
        return redirect()->route('state_head.school-for-visiting.index');
    } catch (\Exception $e) {
        toastr('Error importing students: ' . $e->getMessage(), 'error');
        return redirect()->back();
    }
}

public function schoolForVisitingEdit($id)
{
   

    $data['schoolForVisiting'] = SchoolForVisiting::where('id',$id)->first();

    $data['standards'] = Standard::limit(10)->get();

    // echo "<pre>"; print_r($data['schoolForVisiting']);die;
    
    return view('state_head.school_for_visiting.edit', $data);
}


public function schoolForVisitingUpdate($id,Request $request)
{
    // $request->validate([
    //     'date' => 'required|string|max:255',
    //     'visit_sr_no' => 'required|string|max:15',
    //     'role' => 'required',
    //    'email' => 'required|email|unique:users,email',
    //     'password' => 'required|string|min:8',
    //     'status' => 'required|in:active,inactive',
    // ]);




    SchoolForVisiting::where('id',$id)->update([
    //    'created_by' => auth()->id(),
        'date' => $request->date,
        'visit_sr_no' => $request->visit_sr_no,
        'traveling_start_time' => $request->traveling_start_time,
        'traveling_end_time' => $request->traveling_end_time,
        'district' => $request->district,
        'taluka' => $request->taluka,
        'village' => $request->village,
        'school_name' => $request->school_name,
        'udise_no' => $request->udise_no,
        'hm_name' => $request->hm_name,
        'mobile_no' => $request->mobile_no,
        'total_students' => $request->total_students,
        'std_marathi' => $request->std_marathi,
        'std_semi' => $request->std_semi,
        'std_english' => $request->std_english,
        'final_marathi' => $request->final_marathi,
        'final_semi' => $request->final_semi,
        'final_english' => $request->final_english,
        'total_bill' => $request->total_bill,
        'online_bill' => $request->online_bill,
        'cash_bill' => $request->cash_bill,
       
        
    ]);

    return redirect()->route('state_head.school-for-visiting.index')->with('success', 'visit Update successfully.');
}

public function schoolForVisitingDestroy($id)
{
    SchoolForVisiting::where('id',$id)->delete();
    return redirect()->route('state_head.school-for-visiting.index')->with('success', 'visit Delete successfully.');
}

    
}
