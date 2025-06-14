<?php

namespace App\Http\Controllers\Backend;

use App\Exports\MeritListExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PrimaryResult;
use App\Models\AdminResult;
use App\Models\MeritLIstRank;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageUploadTrait;

class MeritLIstRankController extends Controller
{
    use ImageUploadTrait;

    public function index(Request $request)
    {
        

        $ranks = MeritLIstRank::get();

        return view('admin.meritListRank.index', compact('ranks'));
    }


   




    public function create()
    {
        
        return view('admin.meritListRank.create');
    }




    public function store(Request $request)
{
    $request->validate([
        'role' => 'required|string|max:255',
        'rank' => 'required',
        
    ]);

    
    
    MeritLIstRank::create([
        'role' => $request->role,
        'rank' => $request->rank,
      
    ]);

    toastr('Merit List Rank added successfully!', 'success');
    return redirect()->route('admin.merit-list-rank.index');
}









  

    public function edit($id)
    {
        $rank = MeritLIstRank::findOrFail($id);
       
        return view('admin.meritListRank.edit', compact('rank'));
    }

    public function update(Request $request, $id)
    {
        $adminResult = MeritLIstRank::findOrFail($id);

        $request->validate([
            'role' => 'required|string|max:255',
            'rank' => 'required',
        ]);

        $adminResult->role = $request->role;
        $adminResult->rank = $request->rank;;
    
        $adminResult->save();

        toastr('Merit List Rank updated successfully!', 'success');
        return redirect()->route('admin.merit-list-rank.index');
    }

   


    public function destroy($id)
    {
        $adminResult = MeritLIstRank::findOrFail($id);
        $adminResult->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Merit List Rank deleted successfully!'
        ]);
    }
}
