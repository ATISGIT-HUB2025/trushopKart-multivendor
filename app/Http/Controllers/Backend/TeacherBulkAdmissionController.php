<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StudentAdmission;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

class TeacherBulkAdmissionController extends Controller
{
    public function index()
    {
        $students = StudentAdmission::where('teacher_id', auth()->id())->get();
        return view('teacher.bulk-admission.index', compact('students'));
    }

    public function create()
    {
        return view('teacher.bulk-admission.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);
    
        try {
            Excel::import(new StudentsImport(auth()->id()), $request->file('excel_file'));
            toastr('Students imported successfully!', 'success');
            return redirect()->route('teacher.bulk-admission.index');
        } catch (\Exception $e) {
            toastr('Error importing students: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }
    

    public function edit($id)
    {
        $student = StudentAdmission::findOrFail($id);
        return view('teacher.bulk-admission.edit', compact('student'));
    }

    public function show($id)
{
    $student = StudentAdmission::findOrFail($id);
    return view('teacher.bulk-admission.view', compact('student'));
}


    public function update(Request $request, $id)
    {
        $student = StudentAdmission::findOrFail($id);
        $student->update($request->all());
        toastr('Student updated successfully!', 'success');
        return redirect()->route('teacher.bulk-admission.index');
    }

    public function destroy($id)
    {
        $student = StudentAdmission::findOrFail($id);
        $student->delete();
        return response(['status' => 'success', 'message' => 'Student deleted successfully!']);
    }
}
