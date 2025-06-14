<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StudentAdmission;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use Barryvdh\DomPDF\Facade\Pdf;

class StateHeadBulkImportController extends Controller
{
    public function index()
    {
        // return 'ok';
        $students = StudentAdmission::where('teacher_id', auth()->id())->get();
        return view('state_head.bulk-admission.index', compact('students'));
    }

    public function create()
    {
        return view('state_head.bulk-admission.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);
    
        try {
            Excel::import(new StudentsImport(auth()->id()), $request->file('excel_file'));
            toastr('Students imported successfully!', 'success');
            return redirect()->route('state_head.bulk-admission.index');
        } catch (\Exception $e) {
            toastr('Error importing students: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }
    

    public function edit($id)
    {
        $student = StudentAdmission::findOrFail($id);
        return view('state_head.bulk-admission.edit', compact('student'));
    }

    public function show($id)
{
    $student = StudentAdmission::findOrFail($id);
    return view('state_head.bulk-admission.view', compact('student'));
}


    public function update(Request $request, $id)
    {
        $student = StudentAdmission::findOrFail($id);
        $student->update($request->all());
        toastr('Student updated successfully!', 'success');
        return redirect()->route('state_head.bulk-admission.index');
    }

    public function destroy($id)
    {
        $student = StudentAdmission::findOrFail($id);
        $student->delete();
        return response(['status' => 'success', 'message' => 'Student deleted successfully!']);
    }


    public function generateTickets()
    {
        $students = StudentAdmission::where('teacher_id', auth()->id())
                                //   ->where('isGenerated', false)
                                  ->get();
        
        $pdf = PDF::loadView('state_head.bulk-admission.hall-ticket-pdf', compact('students'))
            ->setPaper('a4')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif',
                'chroot' => public_path(),
                'enable_remote' => true,
                'enable_css_float' => true,
                'enable_javascript' => true,
                'images' => true
            ]);

        // Update isGenerated status
        $students->each(function($student) {
            $student->update(['isGenerated' => true]);
        });
        
        return $pdf->download('hall-tickets.pdf');
    }
}
