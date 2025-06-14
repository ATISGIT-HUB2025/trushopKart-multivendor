<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StudentAdmission;
use Barryvdh\DomPDF\Facade\Pdf;

class TeacherHallTicketController extends Controller
{
    public function generateTickets()
    {
        $students = StudentAdmission::where('teacher_id', auth()->id())
                                //   ->where('isGenerated', false)
                                  ->get();

        $pdf = PDF::loadView('teacher.bulk-admission.hall-ticket-pdf', compact('students'))
            ->setPaper('a4')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif',
                'chroot' => public_path(),
                'enable_remote' => true,
                'enable_css_float' => true,
                'enable_javascript' => true,
                'images' => true
            ]);

        // Update isGenerated status
        $students->each(function($student) {
            $student->update(['isGenerated' => true]);
        });
        
        return $pdf->download('hall-tickets.pdf');
    }
}
