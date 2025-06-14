<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PackagePrice;
use App\Models\User;;
use App\Models\ExamCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PackagePriceController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $exams = PackagePrice::orderBy('id', 'DESC')->paginate(10);
        return view('admin.package-price.index', compact('exams'));
    }

    public function create()
    {
        
        return view('admin.package-price.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'package_name' => ['required', 'string', 'max:255'],
            'package_title' => ['required', 'string', 'max:255'],
            'button_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'facility_1' => ['required', 'string', 'max:255'],
            'facility_2' => ['required', 'string', 'max:255'],
            'facility_3' => ['required', 'string', 'max:255'],
            'facility_4' => ['required', 'string', 'max:255'],
            'facility_5' => ['required', 'string', 'max:255'],
        ]);

        PackagePrice::create($validatedData);

        toastr()->success('Package price created successfully!');
        return redirect()->route('admin.package-price.index');
    }

   



    public function edit(string $id)
    {
        $packagePrice = PackagePrice::findOrFail($id);
        return view('admin.package-price.edit', compact('packagePrice'));
    }


    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'package_name' => ['required', 'string', 'max:255'],
            'package_title' => ['required', 'string', 'max:255'],
            'button_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'facility_1' => ['required', 'string', 'max:255'],
            'facility_2' => ['required', 'string', 'max:255'],
            'facility_3' => ['required', 'string', 'max:255'],
            'facility_4' => ['required', 'string', 'max:255'],
            'facility_5' => ['required', 'string', 'max:255'],
        ]);

        $exam = PackagePrice::findOrFail($id);
        $exam->update($data);

        toastr()->success('Updated Successfully!');
        return redirect()->route('admin.package-price.index');
    }
    public function destroy(string $id)
    {
        $exam = PackagePrice::findOrFail($id);
        $exam->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
