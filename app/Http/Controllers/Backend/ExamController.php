<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\User;
use App\Models\ExamCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $exams = Exam::with('category')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.exam.index', compact('exams'));
    }

    public function create()
    {
        $categories = ExamCategory::where('status', 1)->get();
        $user = User::where('role','center_had')->get();
  
        return view('admin.exam.create', compact('categories','user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_category_id' => ['required'],
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'duration' => ['required', 'integer'],
            'total_marks' => ['required', 'integer'],
            'pass_marks' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'is_paid' => ['required'],
            'is_certificate' => ['required', 'boolean'],
            'status' => ['required'],
            'conditions' => ['nullable'],
            'audio' => ['nullable', 'mimes:mp3,wav,ogg', 'max:10240'],
            'video' => ['nullable', 'mimes:mp4,mov,avi', 'max:51200'],
            'is_upcoming' => ['required', 'boolean'],
            'start_date' => ['required_if:is_upcoming,1', 'nullable', 'date'],
            'end_date' => ['required_if:is_upcoming,1', 'nullable', 'date', 'after:start_date'],
            'subject' => ['required', 'string', 'max:255'],
            'standard' => ['required', 'string', 'max:255'],
            'medium' => ['required', 'string', 'max:255'],
        
        ]);

        $data = $request->except(['audio', 'video']);

        $data['center_hed'] = json_encode($request->input('center_hed')); // Save as JSON

        // echo "<pre>"; print_r($data['center_hed']);die;

        if ($request->hasFile('audio')) {
            $audioPath = $this->uploadImage($request, 'audio', 'uploads/exam/audio');
            $data['audio'] = $audioPath;
        }

        if ($request->hasFile('video')) {
            $videoPath = $this->uploadImage($request, 'video', 'uploads/exam/video');
            $data['video'] = $videoPath;
        }

        Exam::create($data);

        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.exam.index');
    }

    public function preview($id)
    {
        $exam = Exam::with(['questions' => function ($q) {
            $q->where('status', 1);
        }])->findOrFail($id);
        return view('admin.exam.preview', compact('exam'));
    }




    public function edit(string $id)
    {
        $exam = Exam::findOrFail($id);
        $categories = ExamCategory::where('status', 1)->get();
        $user = User::where('role','center_had')->get();
        return view('admin.exam.edit', compact('exam', 'categories', 'user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'exam_category_id' => ['required'],
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'duration' => ['required', 'integer'],
            'total_marks' => ['required', 'integer'],
            'pass_marks' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'is_paid' => ['required'],
            'is_certificate' => ['required', 'boolean'],
            'status' => ['required'],
            'conditions' => ['nullable'],
            'audio' => ['nullable', 'mimes:mp3,wav,ogg', 'max:50240'],
            'video' => ['nullable', 'mimes:mp4,mov,avi', 'max:71200'],
            'is_upcoming' => ['required', 'boolean'],
            'start_date' => ['required_if:is_upcoming,1', 'nullable', 'date'],
            'end_date' => ['required_if:is_upcoming,1', 'nullable', 'date', 'after:start_date'],
            'subject' => ['required', 'string', 'max:255'],
            'standard' => ['required', 'string', 'max:255'],
            'medium' => ['required', 'string', 'max:255'],
        
        ]);

        $exam = Exam::findOrFail($id);
        $data = $request->except(['audio', 'video']);
        $data['center_hed'] = json_encode($request->input('center_hed')); // Save as JSON

        if ($request->hasFile('audio')) {
            // Delete old audio if exists
            if ($exam->audio) {
                $this->deleteImage($exam->audio);
            }
            $audioPath = $this->uploadImage($request, 'audio', 'uploads/exam/audio');
            $data['audio'] = $audioPath;
        }

        if ($request->hasFile('video')) {
            // Delete old video if exists
            if ($exam->video) {
                $this->deleteImage($exam->video);
            }
            $videoPath = $this->uploadImage($request, 'video', 'uploads/exam/video');
            $data['video'] = $videoPath;
        }

        $exam->update($data);

        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.exam.index');
    }
    public function destroy(string $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
