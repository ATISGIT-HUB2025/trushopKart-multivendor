<?php

namespace App\Exports;

use App\Models\PrimaryResult;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MeritListExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = PrimaryResult::query();
    
        // Filter by standard if selected
        if ($this->request->std) {
            $query->where('std', $this->request->std);
        }
        
        // Filter by center if selected
        if ($this->request->center) {
            $query->where('exam_centre', $this->request->center);
        }
        
        // Filter by state if selected
        if ($this->request->state) {
            $query->where('state', $this->request->state);
        }
        
        // Filter by division if selected
        if ($this->request->division) {
            $query->where('division', $this->request->division);
        }
        
        // Filter by district if selected
        if ($this->request->district) {
            $query->where('district', $this->request->district);
        }
        
        // Filter by taluka if selected
        if ($this->request->taluka) {
            $query->where('taluka', $this->request->taluka);
        }
        
        // Filter by merit type if selected
        $meritType = $this->request->merit_type ?? 'any';
        
        switch ($meritType) {
            case 'state':
                $query->where('state_merit', 1);
                break;
            case 'division':
                $query->where('division_merit', 1);
                break;
            case 'district':
                $query->where('district_merit', 1);
                break;
            case 'taluka':
                $query->where('taluka_merit', 1);
                break;
            case 'center':
                $query->where('center_merit', 1);
                break;
            case 'any':
                $query->where(function($q) {
                    $q->where('state_merit', 1)
                      ->orWhere('division_merit', 1)
                      ->orWhere('district_merit', 1)
                      ->orWhere('taluka_merit', 1)
                      ->orWhere('center_merit', 1);
                });
                break;
            // 'all' shows all results regardless of merit
        }
        
        // Order by percentage (highest first)
        return $query->orderBy('percentage', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Student ID',
            'Standard',
            'State',
            'Division',
            'District',
            'Taluka',
            'Exam Centre',
            'School Name',
            'Total Marks',
            'Percentage',
            'State Merit',
            'Division Merit',
            'District Merit',
            'Taluka Merit',
            'Center Merit',
            'State Rank',
            'Division Rank',
            'District Rank',
            'Taluka Rank',
            'Center Rank',
        ];
    }

    public function map($student): array
    {
        return [
            $student->name ?? '-',
            $student->barcode ?? '-',
            $student->std ?? '-',
            $student->state ?? '-',
            $student->division ?? '-',
            $student->district ?? '-',
            $student->taluka ?? '-',
            $student->exam_centre ?? '-',
            $student->school_name ?? '-',
            $student->total_marks ?? '0',
            $student->percentage ?? '0',
            $student->state_merit ? 'Yes' : 'No',
            $student->division_merit ? 'Yes' : 'No',
            $student->district_merit ? 'Yes' : 'No',
            $student->taluka_merit ? 'Yes' : 'No',
            $student->center_merit ? 'Yes' : 'No',
            $student->state_rank ?? '-',
            $student->division_rank ?? '-',
            $student->district_rank ?? '-',
            $student->taluka_rank ?? '-',
            $student->center_rank ?? '-',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row (headers)
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }
}
