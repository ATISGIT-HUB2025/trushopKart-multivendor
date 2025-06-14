<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Shopstory;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $content = About::first();
        return view('admin.about.index', compact('content'));
    }

    public function shop_story()
    {
        $content = Shopstory::first();
        return view('admin.shopstory.index',compact('content'));
    }


     public function shop_story_update(Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);
        Shopstory::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );
        toastr('updated successfully!', 'success', 'success');
        return redirect()->back();
    }


    public function update(Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);

        About::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr('updated successfully!', 'success', 'success');

        return redirect()->back();

    }
}
