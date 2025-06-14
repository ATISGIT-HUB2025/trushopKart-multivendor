<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function index()
    {
        $content = TermsAndCondition::first();
        return view('admin.terms.index', compact('content'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);

        TermsAndCondition::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr('updated successfully!', 'success', 'success');

        return redirect()->back();

    }


     public function privacypolicy()
    {
        $content = PrivacyPolicy::first();
        return view('admin.privacypolicy.index', compact('content'));
    }


      public function privacypolicyupdate(Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);

        PrivacyPolicy::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr('updated successfully!', 'success', 'success');
        return redirect()->back();

    }
}
