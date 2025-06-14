<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\DataTables\StudentAccountDataTable;
use App\Models\BankAccount;
use App\Models\User;

class StudentAccountController extends Controller
{
    public function index(StudentAccountDataTable $dataTable)
    {
        return $dataTable->render('admin.student-accounts.index');
    }

    public function show(BankAccount $bankAccount)
    {
        return view('admin.student-accounts.show', compact('bankAccount'));
    }

    public function allStudent()
    {
        // $students = User::where('role', 'user')
        // ->with(['admition.standard'])
        // ->orderBy('id', 'desc')
        // ->get();

        $students = User::where('role', 'user')
        ->leftJoin('admissions', 'users.email', '=', 'admissions.email')
        ->leftJoin('standards', 'admissions.standard', '=', 'standards.id')
        ->select('users.*', 'standards.start_date', 'standards.end_date', 'standards.standard',  'standards.fees')
        ->orderBy('users.id', 'desc')
        ->paginate(10);

        // foreach($students as $students){
        //     echo $students->start_date;
        //     echo $students->end_date;
        //     echo "<br>";
        // }
        // die;   
    
        return view('admin.student-accounts.all-student', compact('students'));
    }
}
