<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SchoolInfo;
use Illuminate\Support\Facades\Log;

class SchoolInfoController extends Controller
{
    public function index()
    {

        $primaryresults = SchoolInfo::all();
        return view('admin.school-info.index', compact('primaryresults'));
    }

    public function create()
    {
        return view('admin.school-info.create');
    }




    public function store(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);
    
        try {
            $data = Excel::toArray([], $request->file('excel_file'));
            $rows = $data[0];
            
            // Skip header row
            array_shift($rows);
            
            foreach($rows as $row) {
                SchoolInfo::create([
                    'sr_no' => $row[0],
                    'division' => $row[1],
                    'district' => $row[2],
                    'taluka' => $row[3],
                    'cluster' => $row[4],
                    'udise' => $row[6],
                    'school_name' => $row[7],
                    'village_town' => $row[8]
                ]);
            }
    
            toastr('School information imported successfully!', 'success');
            return redirect()->route('admin.school-info.index');
        } catch (\Exception $e) {
            toastr('Error importing data: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }
    


    public function show($id)
    {
        $primaryresult = SchoolInfo::findOrFail($id);
        return view('admin.school-info.show', compact('primaryresult'));
    }

    public function edit($id)
    {
        $primaryresult = SchoolInfo::findOrFail($id);
        return view('admin.school-info.edit', compact('primaryresult'));
    }

    public function update(Request $request, $id)
    {
        $primaryresult = SchoolInfo::findOrFail($id);
        $primaryresult->update($request->all());

        toastr('Result updated successfully!', 'success');
        return redirect()->route('admin.school-info.index');
    }

    public function deleteAll()
    {
        SchoolInfo::truncate();

        return response()->json([
            'status' => 'success',
            'message' => 'All results deleted successfully!'
        ]);
    }


    public function destroy($id)
    {
        $primaryresult = SchoolInfo::findOrFail($id);
        $primaryresult->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Result deleted successfully!'
        ]);
    }
}
