<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AnnouncementDataTable;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(AnnouncementDataTable $dataTable)
    {
        return $dataTable->render('admin.announcements.index');
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'type' => ['required', 'in:exam,result,event'],
            'announcement_date' => ['required', 'date'],
            'is_active' => ['required', 'boolean']
        ]);

        Announcement::create($request->all());
        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.announcements.index');
    }

    public function edit(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'type' => ['required', 'in:exam,result,event'],
            'announcement_date' => ['required', 'date'],
            'is_active' => ['required', 'boolean']
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->update($request->all());
        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.announcements.index');
    }

    public function destroy(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $announcement = Announcement::findOrFail($request->id);
        $announcement->is_active = $request->status == 'true' ? 1 : 0;
        $announcement->save();
        return response(['message' => 'Status has been updated!']);
    }
}
