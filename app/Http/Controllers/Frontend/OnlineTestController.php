<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExamQuestion;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ExamCategory;

class OnlineTestController extends Controller
{

    public function __construct()
{
    $this->middleware('auth')->only(['quizInstraction', 'startQuiz']);
}


public function index()
{
    $examCategories = ExamCategory::where('status', 1)
    ->orderBy('serial', 'asc')
    ->get();
    
    $upcomingExams = Exam::with('category')
        ->where('status', 1)
        ->where('is_upcoming', true)
        ->where('start_date', '>=', now())
        ->orderBy('start_date', 'asc')
        ->take(4)
        ->get();
        
    $latestExams = Exam::with('category')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
        
    $popularExams = Exam::with(['category', 'results'])
        ->where('status', 1)
        ->withCount('results')
        ->orderBy('results_count', 'desc')
        ->take(4)
        ->get();
        
    return view('frontend.pages.online-test', compact('upcomingExams', 'latestExams', 'popularExams', 'examCategories'));
}


public function otCategory(Request $request)
{
    $query = Exam::with(['category', 'questions'])->where('status', 1);
    
        // Add category filter
        if ($request->category) {
            $query->where('exam_category_id', $request->category);
        }
        
    // Get unique values for filter options
    $subjects = Exam::distinct()->whereNotNull('subject')->pluck('subject');
    $standards = Exam::distinct()->whereNotNull('standard')->pluck('standard');
    $mediums = Exam::distinct()->whereNotNull('medium')->pluck('medium');
    
    // Apply filters
    if ($request->has('subjects')) {
        $query->whereIn('subject', $request->subjects);
    }
    
    if ($request->has('standards')) {
        $query->whereIn('standard', $request->standards);
    }
    
    if ($request->has('mediums')) {
        $query->whereIn('medium', $request->mediums);
    }
    
    $exams = $query->orderBy('id', 'DESC')->paginate(12);
    
    return view('frontend.pages.otCategory', compact('exams', 'subjects', 'standards', 'mediums'));
}



    public function studyContent()
    {
        return view('frontend.pages.studyContent',);
    }
    
    public function quizInstraction($exam_id)
    {
        $exam = Exam::with('category')->findOrFail($exam_id);
        
        // Check if user has already taken this exam
        $previousAttempts = Result::where('user_id', auth()->id())
                                 ->where('exam_id', $exam_id)
                                 ->count();
        
        if ($previousAttempts > 0) {
            // If no valid transaction session exists, redirect to payment
            if (!session()->has('reexam_transaction_id')) {
                return redirect()->route('reexam.payment', ['exam_id' => $exam_id]);
            }
            
            // If transaction session exists, clear it and allow access
            session()->forget('reexam_transaction_id');
        }
        
        // First attempt is free
        return view('frontend.pages.quizInstraction', compact('exam'));
    }
    

public function getQuestion($question_id)
{
    $question = ExamQuestion::with('section')
        ->where('id', $question_id)
        ->where('exam_id', session('current_exam_id'))
        ->firstOrFail();
    return response()->json($question);
}
public function submitQuiz(Request $request)
{
    $exam = Exam::findOrFail($request->exam_id);
    $answers = json_decode($request->answers, true);
    
    $correctAnswers = 0;
    $wrongAnswers = 0;
    $notAttempted = $exam->questions->count() - count($answers);
    
    foreach($answers as $questionId => $answer) {
        $question = ExamQuestion::find($questionId);
        if($question && $question->correct_answer === substr($answer, -1)) {
            $correctAnswers++;
        } else {
            $wrongAnswers++;
        }
    }
    
    $result = Result::create([
        'user_id' => auth()->id(),
        'exam_id' => $exam->id,
        'total_questions' => $exam->questions->count(),
        'correct_answers' => $correctAnswers,
        'wrong_answers' => $wrongAnswers,
        'obtained_marks' => $correctAnswers * ($exam->total_marks / $exam->questions->count()),
        'passed' => ($correctAnswers * ($exam->total_marks / $exam->questions->count())) >= $exam->pass_marks,
        'answers' => $answers,
        'completed_at' => now()
    ]);

    return redirect()->route('test-summary')->with('result', $result);
}



public function showResult(Result $result)
{
    return view('frontend.pages.quiz-result', compact('result'));
}

public function startQuiz($exam_id)
{
    $exam = Exam::with(['questions.section', 'category'])->findOrFail($exam_id);
    $questions = $exam->questions;
    $currentQuestion = $questions->first();
    
    session(['current_exam_id' => $exam_id]);
    
    return view('frontend.pages.startQuiz', compact('exam', 'questions', 'currentQuestion'));
}


public function testSummary()
{
    $result = session('result');
    if (!$result) {
        return redirect()->route('online-test-category');
    }
    
    $exam = $result->exam;
    $questions = $exam->questions;
    
    return view('frontend.pages.test-summary', compact('result', 'exam', 'questions'));
}

    public function viewQuiz()
    {
        return view('frontend.pages.viewQuiz',);
    }
    public function categoryMembership()
    {
        return view('frontend.pages.categoryMembership',);
    }
    public function membership()
    {
        return view('frontend.pages.membership',);
    }
}
