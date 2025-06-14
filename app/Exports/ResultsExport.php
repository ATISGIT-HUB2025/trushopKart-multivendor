<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection, WithHeadings
{
    protected $results;

    public function __construct($results)
    {
        $this->results = $results;
    }

    public function collection()
    {
        return $this->results->map(function($result) {
            return [
                'Student Name' => $result->user->name,
                'Exam Name' => $result->exam->name,
                'Total Questions' => $result->total_questions,
                'Correct Answers' => $result->correct_answers,
                'Wrong Answers' => $result->wrong_answers,
                'Obtained Marks' => $result->obtained_marks,
                'Status' => $result->passed ? 'Passed' : 'Failed',
                'Completion Date' => $result->completed_at->format('d M Y, h:i A')
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Student Name',
            'Exam Name',
            'Total Questions',
            'Correct Answers',
            'Wrong Answers',
            'Obtained Marks',
            'Status',
            'Completion Date'
        ];
    }
}
