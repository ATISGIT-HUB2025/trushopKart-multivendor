<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HelpInquiryDataTable;
use App\Http\Controllers\Controller;
use App\Models\HelpInquiry;
use Illuminate\Http\Request;


class HelpInquiryController extends Controller
{
    
    public function index(HelpInquiryDataTable $dataTable)
    {
        return $dataTable->render('admin.help-inquiries.index');
    }

    public function show(HelpInquiry $helpInquiry)
    {
        $helpInquiry->update(['is_read' => true]);
        return view('admin.help-inquiries.show', compact('helpInquiry'));
    }
}
