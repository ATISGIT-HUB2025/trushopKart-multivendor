<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


class TeacherHTGController extends Controller
{
    public function index()
    {
        return view('teacher.hall-ticket-generate.index');
    }


}
