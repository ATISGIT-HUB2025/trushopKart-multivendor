<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller; 
use App\Models\PhotoShop;
use App\DataTables\PhotoGalleryDataTable;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
class PhotoGalleryController extends Controller

{
        use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(PhotoGalleryDataTable $dataTable)
    {
        return $dataTable->render('admin.photogallery.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        
         return view('admin.photogallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:6000'],
        ]);

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $award = new PhotoShop();
        $award->image = $imagePath;
        $award->status = 1; 
        $award->save();
        toastr('Created successfully', 'success', 'success');
        return redirect()->route('admin.photo-gallery.index');

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

       public function edit(string $id){
        $certificate  = PhotoShop::findOrFail($id);
        return view('admin.photogallery.edit', compact('certificate'));
       }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
          $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
        ]);
        $blog = PhotoShop::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads', $blog->image);

        $blog->image = !empty($imagePath) ? $imagePath : $blog->image;
        $blog->status = 1;
        $blog->save();

        toastr('Update successfully', 'success', 'success');

        return redirect()->route('admin.photo-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(string $id)
{
    $award = PhotoShop::findOrFail($id);
    $this->deleteImage($award->image);
    $award->delete();

    return redirect()->route('admin.photo-gallery.index')->with('success', 'Deleted Successfully!');
}


 public function changeStatus(Request $request)
{
    $award = PhotoShop::findOrFail($request->id);
    $award->status = $request->status == 'true' || $request->status == 1 ? 1 : 0;
    $award->save();

    return response()->json(['message' => 'Status updated successfully.']);
}


}
