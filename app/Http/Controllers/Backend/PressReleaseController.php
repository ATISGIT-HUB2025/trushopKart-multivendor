<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller; 
use App\Models\PressRelease;
use App\DataTables\PressreleaseDataTable;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
class PressReleaseController extends Controller

{
        use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(PressreleaseDataTable $dataTable)
    {
        return $dataTable->render('admin.pressrelease.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        
         return view('admin.pressrelease.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:6000'],
            'title' => ['required', 'max:200', 'unique:blogs,title'],
            'short_desc' => ['required'],
        ]);


        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $award = new PressRelease();
        $award->image = $imagePath;
        $award->title = $request->title;
        $award->short_desc = $request->short_desc;
        $award->status = $request->status;
        $award->save();
        toastr('Created successfully', 'success', 'success');
        return redirect()->route('admin.pressrelease.index');

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
        $certificate  = PressRelease::findOrFail($id);
        return view('admin.pressrelease.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'max:200', 'unique:blogs,title,'.$id],
            'short_desc' => ['required'],
        ]);

        $blog = PressRelease::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $blog->image);

        $blog->image = !empty($imagePath) ? $imagePath : $blog->image;
        $blog->title = $request->title;
        $blog->short_desc = $request->short_desc;
        $blog->status = $request->status;
        $blog->save();

        toastr('Update successfully', 'success', 'success');

        return redirect()->route('admin.pressrelease.index');
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(string $id)
{
    $award = PressRelease::findOrFail($id);
    $this->deleteImage($award->image);
    $award->delete();

    return redirect()->route('admin.pressrelease.index')->with('success', 'Deleted Successfully!');
}


 public function changeStatus(Request $request)
{
    $award = PressRelease::findOrFail($request->id);
    $award->status = $request->status == 'true' || $request->status == 1 ? 1 : 0;
    $award->save();

    return response()->json(['message' => 'Status updated successfully.']);
}


}
