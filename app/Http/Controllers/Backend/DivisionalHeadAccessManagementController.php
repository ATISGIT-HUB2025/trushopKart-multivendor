<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DivisionalHeadAccessManagementController extends Controller
{
    // Index: Show all employees added by the vendor
    public function index()
    {
        $employees = User::where('created_by', auth()->id())
            ->where('role', 'district_head')
            ->get();
        return view('divisional_head.accessmanagement.index', compact('employees'));
    }

    // Create: Show the form to add a new employee
    public function create()
    {
        return view('divisional_head.accessmanagement.create');
    }

    // Store: Save the new employee
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'role' => 'required',
           'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'status' => 'required|in:active,inactive',
        ]);

        do {
            $unique_id = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (User::where('unique_id', $unique_id)->exists());
    

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'original_password' => $request->password,
            'status' => $request->status,
            'unique_id' => $unique_id,
            'created_by' => auth()->id(), // Track who created the employee
        ]);

        return redirect()->route('divisional_head.accessmanagement.index')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
{
    $employee = User::findOrFail($id);
    return view('divisional_head.accessmanagement.edit', compact('employee'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'role' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'status' => 'required|in:active,inactive',
    ]);

    $employee = User::findOrFail($id);
    $employee->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'role' => $request->role,
        'email' => $request->email,
        'status' => $request->status,
    ]);

    return redirect()->route('divisional_head.accessmanagement.index')->with('success', 'Employee updated successfully.');
}

public function destroy($id)
{
    $employee = User::findOrFail($id);
    $employee->delete();
    return redirect()->route('divisional_head.accessmanagement.index')->with('success', 'Employee deleted successfully.');
}

}
