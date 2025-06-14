<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserEventParticipationsDataTable;
use App\Http\Controllers\Controller;
use App\Models\EventParticipant;
use Illuminate\Http\Request;

class UserEventParticipationController extends Controller
{
    public function index(UserEventParticipationsDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.events.index');
    }

    public function cancel(Request $request, $id)
    {
        $participation = EventParticipant::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
            
        // Only allow cancellation if status is pending
        if ($participation->status == 'pending') {
            $participation->delete();
            toastr()->success('Event registration cancelled successfully!');
        } else {
            toastr()->error('You cannot cancel this registration as it has already been processed.');
        }
        
        return redirect()->route('user.events.index');
    }
}
