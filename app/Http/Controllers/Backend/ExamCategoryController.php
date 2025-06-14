<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ExamCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\ExamCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;


class ExamCategoryController extends Controller
{
    use ImageUploadTrait;

    public function index(ExamCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.exam-category.index');
    }

    public function create()
    {
        return view('admin.exam-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'logo' => ['required', 'image', 'max:2000'],
            'description' => ['required'],
            'exam_date' => ['required'],
            'duration' => ['required'],
            'medium' => ['required'],
            'total_marks' => ['required'],
            'eligibility' => ['required'],
            'mode' => ['required'],
            'serial' => ['required', 'integer'],
            'status' => ['required']
        ]);

        $imagePath = $this->uploadImage($request, 'logo', 'uploads');

        ExamCategory::create([
            'name' => $request->name,
            'logo' => $imagePath,
            'description' => $request->description,
            'exam_date' => $request->exam_date,
            'duration' => $request->duration,
            'medium' => $request->medium,
            'total_marks' => $request->total_marks,
            'eligibility' => $request->eligibility,
            'mode' => $request->mode,
            'serial' => $request->serial,
            'status' => $request->status
        ]);

        toastr('Created Successfully!', 'success');
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $examCategory = ExamCategory::findOrFail($id);
        return view('admin.exam-category.edit', compact('examCategory'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'logo' => ['nullable', 'image', 'max:2000'],
            'description' => ['required'],
            'exam_date' => ['required'],
            'duration' => ['required'],
            'medium' => ['required'],
            'total_marks' => ['required'],
            'eligibility' => ['required'],
            'mode' => ['required'],
            'serial' => ['required', 'integer'],
            'status' => ['required']
        ]);

        $examCategory = ExamCategory::findOrFail($id);
        
        $imagePath = $this->updateImage($request, 'logo', 'uploads', $examCategory->logo);

        $examCategory->update([
            'name' => $request->name,
            'logo' => !empty($imagePath) ? $imagePath : $examCategory->logo,
            'description' => $request->description,
            'exam_date' => $request->exam_date,
            'duration' => $request->duration,
            'medium' => $request->medium,
            'total_marks' => $request->total_marks,
            'eligibility' => $request->eligibility,
            'mode' => $request->mode,
            'serial' => $request->serial,
            'status' => $request->status
        ]);

        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.exam-category.index');
    }

    public function destroy(string $id)
    {
        $examCategory = ExamCategory::findOrFail($id);
        $this->deleteImage($examCategory->logo);
        $examCategory->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
