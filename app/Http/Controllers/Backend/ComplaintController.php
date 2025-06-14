<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ComplaintDataTable;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;


class ComplaintController extends Controller
{
    public function index(ComplaintDataTable $dataTable)
    {
        return $dataTable->render('admin.complaints.index');
    }
    

    public function show(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,resolved'
        ]);

        $complaint->update(['status' => $request->status]);
        
        toastr()->success('Complaint status updated successfully!');
        return redirect()->back();
    }
}
