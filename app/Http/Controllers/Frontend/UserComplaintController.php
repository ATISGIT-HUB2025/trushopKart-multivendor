<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserComplaintsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class UserComplaintController extends Controller
{
    public function index(UserComplaintsDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.complaints.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'barcode' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/complaints'), $imageName);
            $data['image'] = 'uploads/complaints/' . $imageName;
        }

        Complaint::create($data);

        toastr()->success('Complaint submitted successfully!');
        return redirect()->route('user.complaints.index');
    }
}
