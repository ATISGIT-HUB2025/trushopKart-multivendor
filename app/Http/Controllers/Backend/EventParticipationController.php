<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\EventParticipationDataTable;
use App\Http\Controllers\Controller;
use App\Models\EventParticipant;
use Illuminate\Http\Request;

class EventParticipationController extends Controller
{
    public function index(EventParticipationDataTable $dataTable)
    {
        return $dataTable->render('admin.event-participations.index');
    }

    public function show(EventParticipant $eventParticipation)
    {
        return view('admin.event-participations.show', compact('eventParticipation'));
    }

    public function updateStatus(Request $request, EventParticipant $eventParticipation)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected,attended'
        ]);

        $eventParticipation->update([
            'status' => $request->status,
            'is_approved' => $request->status == 'approved' || $request->status == 'attended'
        ]);
        
        toastr()->success('Participation status updated successfully!');
        return redirect()->back();
    }
}
