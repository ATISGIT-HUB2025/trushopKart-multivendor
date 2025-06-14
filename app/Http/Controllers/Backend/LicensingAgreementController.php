<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller; 
use App\Models\Licensingagreements;
use App\DataTables\LicensingAgreementDataTable;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
class LicensingAgreementController extends Controller

{
        use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(LicensingAgreementDataTable $dataTable)
    {
        return $dataTable->render('admin.licensingagreements.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        
         return view('admin.licensingagreements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],

        ]);


        $award = new Licensingagreements();
        $award->title = $request->title;
        $award->status = 1; 
        $award->save();
        toastr('Created successfully', 'success', 'success');
        return redirect()->route('admin.licensingagreements.index');

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
        $certificate  = Licensingagreements::findOrFail($id);
        return view('admin.licensingagreements.edit', compact('certificate'));
       }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
          $request->validate([
            'title' => ['required', 'string'],

        ]);
        $blog = Licensingagreements::findOrFail($id);
        $blog->title = $request->title;
        $blog->status = 1;
        $blog->save();

        toastr('Update successfully', 'success', 'success');

        return redirect()->route('admin.licensingagreements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(string $id)
{
    $award = Licensingagreements::findOrFail($id);
    $award->delete();

    return redirect()->route('admin.licensingagreements.index')->with('success', 'Deleted Successfully!');
}


 public function changeStatus(Request $request)
{
    $award = Licensingagreements::findOrFail($request->id);
    $award->status = $request->status == 'true' || $request->status == 1 ? 1 : 0;
    $award->save();

    return response()->json(['message' => 'Status updated successfully.']);
}


}
