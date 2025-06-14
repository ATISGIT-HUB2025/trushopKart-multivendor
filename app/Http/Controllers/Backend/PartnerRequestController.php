<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestAccess;

class PartnerRequestController extends Controller
{
    public function index()
    {

        $data = RequestAccess::latest()->get();
        return view('admin.partner-request.index', compact('data'));
    }

            public function updateStatus(Request $request, $id)
        {
            $requestAccess = RequestAccess::findOrFail($id);
            $requestAccess->status = $request->status;
            $requestAccess->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Status updated successfully.'
            ]);
        }


}
