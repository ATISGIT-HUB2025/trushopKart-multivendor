<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\CentersImport;
use App\Models\Center;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::all();
        return view('admin.center.index', compact('centers'));
    }

    public function create()
    {
        return view('admin.center.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_seats' => 'required|integer',
            'excel_file' => 'nullable|mimes:xlsx,xls'
        ]);

        if($request->hasFile('excel_file')) {
            Excel::import(new CentersImport, $request->file('excel_file'));
            toastr('Centers imported successfully!', 'success');
        } else {
            Center::create([
                'name' => $request->name,
                'total_seats' => $request->total_seats,
                'status' => $request->status ?? 1
            ]);
            toastr('Center created successfully!', 'success');
        }

        return redirect()->route('admin.center.index');
    }

    public function edit($id)
    {
        $center = Center::findOrFail($id);
        return view('admin.center.edit', compact('center'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_seats' => 'required|integer'
        ]);

        $center = Center::findOrFail($id);
        $center->update([
            'name' => $request->name,
            'total_seats' => $request->total_seats,
            'status' => $request->status
        ]);

        toastr('Center updated successfully!', 'success');
        return redirect()->route('admin.center.index');
    }

    public function destroy($id)
    {
        $center = Center::findOrFail($id);
        $center->delete();
        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }
    
}
