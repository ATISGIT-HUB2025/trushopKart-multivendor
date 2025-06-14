<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\EventDataTable;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use ImageUploadTrait;

    public function index(EventDataTable $dataTable)
    {
        return $dataTable->render('admin.events.index');
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'start_datetime' => ['required', 'date'],
            'end_datetime' => ['required', 'date', 'after:start_datetime'],
            'location' => ['required'],
            'organizer' => ['required'],
            'image' => ['required', 'image', 'max:3000'],
            'video_url' => ['nullable', 'url'],
            'description' => ['required'],
            'status' => ['required']
        ]);

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        Event::create([
            'title' => $request->title,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'location' => $request->location,
            'organizer' => $request->organizer,
            'image' => $imagePath,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'status' => $request->status
        ]);

        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.events.index');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'start_datetime' => ['required', 'date'],
            'end_datetime' => ['required', 'date', 'after:start_datetime'],
            'location' => ['required'],
            'organizer' => ['required'],
            'image' => ['nullable', 'image', 'max:3000'],
            'video_url' => ['nullable', 'url'],
            'description' => ['required'],
            'status' => ['required']
        ]);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $event->image);

        $event->update([
            'title' => $request->title,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'location' => $request->location,
            'organizer' => $request->organizer,
            'image' => !empty($imagePath) ? $imagePath : $event->image,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'status' => $request->status
        ]);

        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.events.index');
    }

    public function destroy(Event $event)
    {
        $this->deleteImage($event->image);
        $event->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->status = $request->status == 'true' ? 1 : 0;
        $event->save();

        return response(['message' => 'Status has been updated!']);
    }
}
