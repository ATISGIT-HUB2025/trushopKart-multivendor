<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Models\Master;

class MasterInfoController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masterInfo = Master::first();
        return view('admin.master-info.index', compact('masterInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:3000'],
            'result_logo' => ['nullable', 'image', 'max:3000'],
            'administrator_signature' => ['nullable', 'image', 'max:3000'],
            'director_signature' => ['nullable', 'image', 'max:3000'],
        ]);
    
        $masterInfo = Master::first();
    
        $logoPath = $this->updateImage($request, 'logo', 'uploads', $masterInfo?->logo);
        $resultLogoPath = $this->updateImage($request, 'result_logo', 'uploads', $masterInfo?->result_logo);
        $administerSignature = $this->updateImage($request, 'administrator_signature', 'uploads', $masterInfo?->administrator_signature);
        $directorSignature = $this->updateImage($request, 'director_signature', 'uploads', $masterInfo?->director_signature);
    
        Master::updateOrCreate(
            ['id' => $masterInfo?->id ?? null], 
            [
                'logo' => $logoPath ?: $masterInfo?->logo,
                'heading' => $request->heading,
                'result_logo' => $resultLogoPath ?: $masterInfo?->result_logo,
                'result_heading' => $request->result_heading,
                'administrator_signature' => $administerSignature ?: $masterInfo?->administrator_signature,
                'administrator_name' => $request->administrator_name,
                'director_signature' => $directorSignature ?: $masterInfo?->director_signature,
                'director_name' => $request->director_name
            ]
        );
    
        toastr('Updated successfully!', 'success', 'success');
        return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
