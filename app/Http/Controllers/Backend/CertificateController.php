<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller; 
use App\Models\Certificates;
use App\DataTables\CertificatesDataTable;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
class CertificateController extends Controller

{
        use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(CertificatesDataTable $dataTable)
    {
        return $dataTable->render('admin.certificates.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        
         return view('admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'title' => ['required', 'max:200', 'unique:blogs,title'],
            'short_desc' => ['required'],
        ]);


        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $award = new Certificates();
        $award->image = $imagePath;
        $award->title = $request->title;
        $award->short_desc = $request->short_desc;
        $award->status = $request->status;
        $award->save();
        toastr('Created successfully', 'success', 'success');
        return redirect()->route('admin.certificates.index');

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
        $certificate  = Certificates::findOrFail($id);
        return view('admin.certificates.edit', compact('certificate'));
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

        $blog = Certificates::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $blog->image);

        $blog->image = !empty($imagePath) ? $imagePath : $blog->image;
        $blog->title = $request->title;
        $blog->short_desc = $request->short_desc;
        $blog->status = $request->status;
        $blog->save();

        toastr('Update successfully', 'success', 'success');

        return redirect()->route('admin.certificates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(string $id)
{
    $award = Certificates::findOrFail($id);
    $this->deleteImage($award->image);
    $award->delete();

    return redirect()->route('admin.certificates.index')->with('success', 'Deleted Successfully!');
}


 public function changeStatus(Request $request)
{
    $award = Certificates::findOrFail($request->id);
    $award->status = $request->status == 'true' || $request->status == 1 ? 1 : 0;
    $award->save();

    return response()->json(['message' => 'Status updated successfully.']);
}


}
