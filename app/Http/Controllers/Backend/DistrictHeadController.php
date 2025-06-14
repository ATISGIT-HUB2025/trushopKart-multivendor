<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Standard;
use App\Models\Order;
use App\Models\SchoolForVisiting;
use App\Imports\SchoolForVisitingImport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\StudentAdmission;


class DistrictHeadController extends Controller
{


    public function index()
    {
        $userId = Auth::id();
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        // Total Orders
        $data['todaysOrders'] = Order::where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->count();
            $data['todaysOrdersPending'] = Order::where('user_id', $userId)
            ->where('order_status', 'pending')
            ->count();     

        $data['totalOrders'] = Order::where('user_id', $userId)->count();

        $data['totalAdmissions'] = SchoolForVisiting::where('created_by', $userId)->count();

        $data['monthlyEarning'] = SchoolForVisiting::where('created_by', $userId)->sum('total_bill');

        $data['subDistrictTodaysOrders'] = Order::where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'subdistrict_head');
            })->whereDate('created_at', Carbon::today());
        })->count();

        $data['subDistrictPendingOrders'] = Order::where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'subdistrict_head');
            })->whereDate('order_status', 'pending');
        })->count();

        $data['subDistrictTotalOrders'] = Order::where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'subdistrict_head');
            });
        })->count();

        $data['subDistrictTotalAdmissions'] = SchoolForVisiting::where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'subdistrict_head');
            });
        })->count();

        // $data['subDistrictMonthlyEarning'] = SchoolForVisiting::where(function ($query) {
        //     $query->whereHas('user', function ($q) {
        //         $q->where('role', 'subdistrict_head');
        //     });
        // })->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('total_bill');
         $data['subDistrictMonthlyEarning'] = SchoolForVisiting::where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'subdistrict_head');
            });
        })->sum('total_bill');


        $data['schoolForVisitingsCount'] = SchoolForVisiting::where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'district_head');
            })->orWhere('created_by', auth()->id());
        })->count();

        $data['BulkAdmission_count'] =  StudentAdmission::where('teacher_id', auth()->id())->count();
        
        return view('districthead.dashboard.index', $data);
    }


    public function schoolForVisitingGet()
{ 
    $data['schoolForVisitings'] = SchoolForVisiting::where(function ($query) {
        $query->whereHas('user', function ($q) {
            $q->where('role', 'subdistrict_head');
        })->orWhere('created_by', auth()->id());
    })->get();
    return view('districthead.school_for_visiting.index', $data);
}

public function schoolForVisitingCreate()
{
   $data['standards'] = Standard::limit(10)->get();
    return view('districthead.school_for_visiting.create', $data);
}

public function schoolForVisitingStore(Request $request)
{
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

    return redirect()->route('district.school-for-visiting.index')->with('success', 'visit added successfully.');
}

public function schoolForVisitingExcel(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    try {
        Excel::import(new SchoolForVisitingImport(auth()->id()), $request->file('excel_file'));
        toastr('visite imported successfully!', 'success');
        return redirect()->route('district.school-for-visiting.index');
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
    
    return view('districthead.school_for_visiting.edit', $data);
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

    return redirect()->route('district.school-for-visiting.index')->with('success', 'visit Update successfully.');
}

public function schoolForVisitingDestroy($id)
{
    SchoolForVisiting::where('id',$id)->delete();
    return redirect()->route('district.school-for-visiting.index')->with('success', 'visit Delete successfully.');
}

  
}
