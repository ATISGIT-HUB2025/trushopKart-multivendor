<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function index()
    {
        $bankAccount = BankAccount::where('user_id', auth()->id())->first();
        return view('frontend.dashboard.account.index', compact('bankAccount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_holder_name' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'ifsc_code' => 'required|string|max:20',
            'branch_name' => 'required|string|max:255',
            'pan_number' => 'nullable|string|max:10'
        ]);

        BankAccount::updateOrCreate(
            ['user_id' => auth()->id()],
            $request->all()
        );

        toastr()->success('Bank account information saved successfully!');
        return redirect()->back();
    }
}
