<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\StudentAdmission;
use App\Models\SchoolForVisiting;
use App\Models\Standard;
use App\Models\Order;
use App\Imports\SchoolForVisitingImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class TalukaHeadController extends Controller
{


    public function index() 
    {
        $userId = Auth::id();
        $data['talukaTodaysOrders'] = Order::where('user_id', $userId)->where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'taluka_head');
            // })->whereDate('created_at', Carbon::today());
        });
        })->count();

        $data['talukaTotalOrders'] = Order::where('user_id', $userId)->where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'taluka_head');
            });
        })->count();

        $data['talukaTotalOrdersPending'] = Order::where('user_id', $userId)->where('order_status', 'pending')->where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'taluka_head');
            });
        })->count();

        $data['talukaTotalAdmissions'] = SchoolForVisiting::where('created_by', $userId)->where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'taluka_head');
            });
        })->count();

        $data['talukaMonthlyEarning'] = SchoolForVisiting::where('created_by', $userId)->where(function ($query) {
            $query->whereHas('user', function ($q) {
                $q->where('role', 'taluka_head');
            });
        })->sum('total_bill');
        

        $data['BulkAdmission_count'] =  StudentAdmission::where('teacher_id', auth()->id())->count();

   //     return 'ok';
        return view('talukahead.dashboard.index', $data);
    }


    public function admission()
    {
        $students = StudentAdmission::where('teacher_id', auth()->id())->get();
        return view('talukahead.bulkadmission.index', compact('students'));
    }

    public function admissioncreate()
    {
        return view('talukahead.bulkadmission.create');
    }

    public function admissionstore(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new StudentsImport(auth()->id()), $request->file('excel_file'));
            toastr('Students imported successfully!', 'success');
            return redirect()->route('taluka.admission');
        } catch (\Exception $e) {
            toastr('Error importing students: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }
    public function admissionview($id)
    {
        $student = StudentAdmission::findOrFail($id);
        return view('talukahead.bulkadmission.view', compact('student'));
    }

    public function admissionedit($id)
    {
        $student = StudentAdmission::findOrFail($id);
        return view('talukahead.bulkadmission.edit', compact('student'));
    }


    public function admissionupdate(Request $request, $id)
    {
        $student = StudentAdmission::findOrFail($id);
        $student->update($request->all());
        toastr('Student updated successfully!', 'success');
        return redirect()->route('taluka.admission');
    }

    public function admissiondelete($id)
    {
        $student = StudentAdmission::findOrFail($id);
        $student->delete();
        return response(['status' => 'success', 'message' => 'Student deleted successfully!']);
    }

    public function schoolForVisitingGet()
    { 
       $data['schoolForVisitings'] = SchoolForVisiting::where('created_by',auth()->id())->get();
        return view('talukahead.school_for_visiting.index', $data);
    }
    
    public function schoolForVisitingCreate()
    {
       $data['standards'] = Standard::limit(10)->get();
        return view('talukahead.school_for_visiting.create', $data);
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
    
        return redirect()->route('taluka.school-for-visiting.index')->with('success', 'visit added successfully.');
    }
    
    public function schoolForVisitingExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);
    
        try {
            Excel::import(new SchoolForVisitingImport(auth()->id()), $request->file('excel_file'));
            toastr('visite imported successfully!', 'success');
            return redirect()->route('taluka.school-for-visiting.index');
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
        
        return view('talukahead.school_for_visiting.edit', $data);
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
    
        return redirect()->route('taluka.school-for-visiting.index')->with('success', 'visit Update successfully.');
    }
    
    public function schoolForVisitingDestroy($id)
    {
        SchoolForVisiting::where('id',$id)->delete();
        return redirect()->route('taluka.school-for-visiting.index')->with('success', 'visit Delete successfully.');
    }
}
