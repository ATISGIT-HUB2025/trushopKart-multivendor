<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 1)
                      ->orderBy('start_datetime', 'asc')
                      ->get();
        return view('frontend.event.index', compact('events'));
    }

    public function details($id)
    {
        $event = Event::findOrFail($id);
        $isAlreadyRegistered = false;
        
        if (auth()->check()) {
            $isAlreadyRegistered = EventParticipant::where('event_id', $id)
                ->where('user_id', auth()->id())
                ->exists();
        }
        
        return view('frontend.event.details', compact('event', 'isAlreadyRegistered'));
    }
    
    
    public function joinEvent(Request $request)
    {
        // Validate the request
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'phone' => 'required|string|max:15',
            'additional_info' => 'nullable|string',
            'agree_terms' => 'required'
        ]);
        
        // Check if user already registered
        $existingRegistration = EventParticipant::where('event_id', $request->event_id)
            ->where('user_id', Auth::id())
            ->first();
            
        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You have already registered for this event.');
        }
        
        // Create new registration
        EventParticipant::create([
            'event_id' => $request->event_id,
            'user_id' => Auth::id(),
            'phone' => $request->phone,
            'additional_info' => $request->additional_info,
            'status' => 'pending'
        ]);
        
        return redirect()->back()->with('success', 'You have successfully registered for this event. We will contact you shortly.');
    }
    

}
