<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExamSection;
use Illuminate\Http\Request;

class ExamQuestionSectionController extends Controller
{
    public function index()
    {
        $sections = ExamSection::orderBy('id', 'DESC')->paginate(10);
        return view('teacher.exam-section.index', compact('sections'));
    }

    public function create()
    {
        return view('teacher.exam-section.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['nullable'],
            'status' => ['required']
        ]);

        ExamSection::create($request->all());
        
        toastr('Section Created Successfully!', 'success');
        return redirect()->route('teacher.exam-section.index');
    }

    public function edit(string $id)
    {
        $section = ExamSection::findOrFail($id);
        return view('teacher.exam-section.edit', compact('section'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['nullable'],
            'status' => ['required']
        ]);

        $section = ExamSection::findOrFail($id);
        $section->update($request->all());

        toastr('Section Updated Successfully!', 'success');
        return redirect()->route('teacher.exam-section.index');
    }

    public function destroy(string $id)
    {
        $section = ExamSection::findOrFail($id);
        $section->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
