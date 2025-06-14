<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CenterHad;
use App\Models\Standard;;
use App\Models\ExamCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StandardController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $standards = Standard::orderBy('id', 'DESC')->paginate(10);
        return view('admin.standard.index', compact('standards'));
    }

    public function create()
    {
        
        return view('admin.standard.create');
    }

    public function store(Request $request)
    {
        

        $validatedData = $request->validate([
            'standard' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'fees' => ['required'],
        ]);
        
       
        
        Standard::create($validatedData);
        
        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.standard.index');
        
        
    }

   



    public function edit(string $id)
    {
        $standard = Standard::findOrFail($id);
     
        return view('admin.standard.edit', compact('standard'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'standard' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'fees' => ['required'],
        ]);
        
        $standard = Standard::findOrFail($id);
        
        
        
        $standard->update($data);
        
        
        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.standard.index');
    }
    public function destroy(string $id)
    { 
        $exam = Standard::findOrFail($id);
        $exam->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
