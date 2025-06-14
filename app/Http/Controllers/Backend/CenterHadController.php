<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CenterHad;
use App\Models\User;;
use App\Models\ExamCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CenterHadController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $exams = User::where('role','center_had')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.center_had.index', compact('exams'));
    }

    public function create()
    {
        
        return view('admin.center_had.create');
    }

    public function store(Request $request)
    {
        

        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required'],
            'password' => ['required'],
        ]);
        
        $validatedData['role'] = 'center_had';
        $validatedData['original_password'] = $validatedData['password'];
        $validatedData['password'] = Hash::make($validatedData['password']); // Hashing the password
        
        User::create($validatedData);
        
        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.center-had.index');
        
        
    }

   



    public function edit(string $id)
    {
        $exam = User::findOrFail($id);
     
        return view('admin.center_had.edit', compact('exam'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $id], // Ignore current user's email
            'phone' => ['required'],
            'password' => ['required'],
        ]);
        
        $exam = User::findOrFail($id);
        
        $data['role'] = 'center_had';
        $data['original_password'] = $data['password'];
        $data['password'] = Hash::make($data['password']); // Hashing the password
        
        $exam->update($data);
        
        
        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.center-had.index');
    }
    public function destroy(string $id)
    { 
        $exam = User::findOrFail($id);
        $exam->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
