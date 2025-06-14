<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ExamSection;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function index()
    {
        $questions = ExamQuestion::with('exam')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.exam-question.index', compact('questions'));
    }

    public function create()
    {
        $exams = Exam::where('status', 1)->get();
        $sections = ExamSection::where('status', 1)->get();
        return view('admin.exam-question.create', compact('exams', 'sections'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => ['required'],
            'question' => ['required'],
            'option_a' => ['required'],
            'option_b' => ['required'],
            'option_c' => ['required'],
            'option_d' => ['required'],
            'correct_answer' => ['required', 'in:a,b,c,d'],
            'marks' => ['required', 'integer'],
            'status' => ['required']
        ]);

        ExamQuestion::create($request->all());
        
        toastr('Question Created Successfully!', 'success');
        return redirect()->route('admin.exam-question.index');
    }

    public function edit(string $id)
    {
        $question = ExamQuestion::findOrFail($id);
        $exams = Exam::where('status', 1)->get();
        $sections = ExamSection::where('status', 1)->get();
        return view('admin.exam-question.edit', compact('question', 'exams', 'sections'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'exam_id' => ['required'],
            'question' => ['required'],
            'option_a' => ['required'],
            'option_b' => ['required'],
            'option_c' => ['required'],
            'option_d' => ['required'],
            'correct_answer' => ['required', 'in:a,b,c,d'],
            'marks' => ['required', 'integer'],
            'status' => ['required']
        ]);

        $question = ExamQuestion::findOrFail($id);
        $question->update($request->all());

        toastr('Question Updated Successfully!', 'success');
        return redirect()->route('admin.exam-question.index');
    }

    public function destroy(string $id)
    {
        $question = ExamQuestion::findOrFail($id);
        $question->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
