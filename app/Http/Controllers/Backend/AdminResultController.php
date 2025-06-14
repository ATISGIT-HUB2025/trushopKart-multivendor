<?php

namespace App\Http\Controllers\Backend;

use App\Exports\MeritListExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PrimaryResult;
use App\Models\AdminResult;
use App\Models\Standard;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageUploadTrait;

class AdminResultController extends Controller
{
    use ImageUploadTrait;

    public function index(Request $request)
    {
        // $query = PrimaryResult::query();

        // // Get unique centers for dropdown
        // $centers = PrimaryResult::select('exam_centre')->distinct()->get();

        // if ($request->center) {
        //     $query->where('exam_centre', $request->center);
        // }

        // $primaryresults = $query->get();

        $query = AdminResult::query();

        // Get unique centers for dropdown
        $centers = PrimaryResult::select('exam_centre')->distinct()->get();

        if ($request->exam) {
            $query->where('exam_name', $request->exam);
        }

        $adminResults = $query->get();

        // $exams = AdminResult::get();
        $exams = AdminResult::select('exam_name')->distinct()->orderBy('exam_name', 'asc')->get();

        return view('admin.admin_result.index', compact('adminResults', 'centers','exams'));
    }


    public function uploadExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
            'admin_result_id'=> 'required',

        ]);

        try {
            // Instead of using Excel::CALCULATE, use the default import which should calculate formulas
            $data = Excel::toArray([], $request->file('excel_file'));
            $rows = $data[0];
            array_shift($rows);

            // Log the first row to understand structure
            \Log::info('Excel data sample row:', !empty($rows[0]) ? $rows[0] : ['No data']);

            foreach ($rows as $row) {
                // Clean up the row data - convert dashes to null
                for ($i = 0; $i < count($row); $i++) {
                    if ($row[$i] === '-' || $row[$i] === '') {
                        $row[$i] = null;
                    } else if (is_string($row[$i]) && strpos($row[$i], '=') === 0) {
                        // If it's a formula string, log it and replace with 0
                        \Log::warning('Found formula in cell instead of value: ' . $row[$i]);
                        $row[$i] = 0;
                    }
                }

                // Since we added state after user_type, all indices need to be shifted by 1
                $percentage = is_numeric($row[23]) ? $row[23] : 0; // was 22
                $barcode = $row[18];    // was 17

                // Ensure numeric values for marks
                $first_paper = is_numeric($row[20]) ? $row[20] : 0;
                $second_paper = is_numeric($row[21]) ? $row[21] : 0;
                $total_marks = is_numeric($row[22]) ? $row[22] : ($first_paper + $second_paper); // Calculate if not numeric

                // No automatic merit calculation - set all to false
                $state_merit = false;
                $division_merit = false;
                $district_merit = false;
                $taluka_merit = false;
                $center_merit = false;

                // Handle birth_date depending on its format
                $birth_date = null;
                if (!empty($row[10])) { // was 9
                    if (is_numeric($row[10])) {
                        // If it's a numeric value (Excel date format)
                        $birth_date = \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]));
                    } else {
                        // If it's a string, try to parse it
                        try {
                            $birth_date = \Carbon\Carbon::parse($row[10]);
                        } catch (\Exception $e) {
                            \Log::warning('Could not parse birth date: ' . $row[10]);
                            // Leave as null if unparseable
                        }
                    }
                }

                // Create primary result with clean data
                PrimaryResult::create([
                    'admin_result_id'=> $request->admin_result_id,
                    'user_type' => $row[0],
                    'state' => $row[1],      // New state field
                    'division' => $row[2],   // was row[1]
                    'sr_no' => $row[3],      // was row[2]
                    'district' => $row[4],   // was row[3]
                    'taluka' => $row[5],     // was row[4]
                    'cluster' => $row[6],    // was row[5]
                    'exam_centre' => $row[7], // was row[6]
                    'name' => $row[8],       // was row[7]
                    'gender' => $row[9],     // was row[8]
                    'birth_date' => $birth_date,
                    'std' => $row[11],       // was row[10]
                    'medium' => $row[12],    // was row[11]
                    'school_name' => $row[13], // was row[12]
                    'udise_no' => $row[14],  // was row[13]
                    'student_saral_id' => $row[15], // was row[14]
                    'parent_mobile' => $row[16], // was row[15]
                    'teacher_mobile' => $row[17], // was row[16]
                    'barcode' => $barcode,
                    'seat_no' => $row[19],   // was row[18]
                    'first_paper' => $first_paper,
                    'second_paper' => $second_paper,
                    'total_marks' => $total_marks,
                    'percentage' => $percentage ?? 0,
                    'state_merit' => $state_merit,  // New field
                    'division_merit' => $division_merit,
                    'district_merit' => $district_merit,
                    'taluka_merit' => $taluka_merit,
                    'center_merit' => $center_merit
                ]);
            }

            toastr('Results imported successfully!', 'success');
            return redirect()->route('admin.admin-result.index');
        } catch (\Exception $e) {
            \Log::error('Excel import error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            toastr('Error importing data: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }


    /**
 * Toggle certificate button visibility
 */
public function toggleCertificateButton(Request $request)
{
    $setting = \App\Models\GeneralSetting::first();
    $setting->show_certificate_button = !$setting->show_certificate_button;
    $setting->save();
    
    return response()->json([
        'status' => 'success',
        'message' => 'Certificate button ' . ($setting->show_certificate_button ? 'enabled' : 'disabled') . ' successfully!',
        'is_enabled' => $setting->show_certificate_button
    ]);
}

/**
 * Toggle marksheet button visibility
 */
public function toggleMarksheetButton(Request $request)
{
    $setting = \App\Models\GeneralSetting::first();
    $setting->show_marksheet_button = !$setting->show_marksheet_button;
    $setting->save();
    
    return response()->json([
        'status' => 'success',
        'message' => 'Marksheet button ' . ($setting->show_marksheet_button ? 'enabled' : 'disabled') . ' successfully!',
        'is_enabled' => $setting->show_marksheet_button
    ]);
}

    

    public function meritList(Request $request)
    {
        $query = PrimaryResult::query();

        // Get unique centers for dropdown
        $centers = PrimaryResult::select('exam_centre')->distinct()->get();

        // Get unique states for dropdown
        $states = PrimaryResult::select('state')->whereNotNull('state')->distinct()->get();

        // Get unique divisions for dropdown
        $divisions = PrimaryResult::select('division')->whereNotNull('division')->distinct()->get();

        // Get unique districts for dropdown
        $districts = PrimaryResult::select('district')->whereNotNull('district')->distinct()->get();

        // Get unique talukas for dropdown
        $talukas = PrimaryResult::select('taluka')->whereNotNull('taluka')->distinct()->get();

        // Get unique standards for dropdown
        $standards = PrimaryResult::select('std')->whereNotNull('std')->distinct()->get();


        // Filter by standard if selected
        if ($request->std) {
            $query->where('std', $request->std);
        }

        // Filter by center if selected
        if ($request->center) {
            $query->where('exam_centre', $request->center);
        }

        // Filter by state if selected
        if ($request->state) {
            $query->where('state', $request->state);
        }

        // Filter by division if selected
        if ($request->division) {
            $query->where('division', $request->division);
        }

        // Filter by district if selected
        if ($request->district) {
            $query->where('district', $request->district);
        }

        // Filter by taluka if selected
        if ($request->taluka) {
            $query->where('taluka', $request->taluka);
        }

        // Filter by merit type if selected
        $meritType = $request->merit_type ?? 'any';

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
                $query->where(function ($q) {
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
        $query->orderBy('percentage', 'desc');

        $meritStudents = $query->paginate(50);
        $selectedStd = $request->std;

        return view('admin.admin_result.merit_list', compact(
            'meritStudents',
            'centers',
            'states',
            'divisions',
            'districts',
            'talukas',
            'standards',
            'meritType',
            'selectedStd'
        ));
    }



    public function downloadCenterCertificates($id)
    {
        $results = PrimaryResult::where('admin_result_id', $id)->get();

        $pdf = Pdf::loadView('admin.admin_result.bulk_certificates', compact('results'));
        $pdf->setPaper([0, 0, 715, 980]);
        $pdf->setOption('page-range', '1-' . $results->count());

        return $pdf->download('center_certificates.pdf');
        // return $pdf->stream('center_certificates.pdf');
    }



    public function create()
    {
        $standards = Standard::orderBy('id', 'ASC')->get();
        return view('admin.admin_result.create', compact('standards'));
    }




    public function store(Request $request)
{
    $request->validate([
        'exam_name' => 'required|string|max:255',
        'standard' => 'required|array',
        'standard.*' => 'string|max:50',
        'logo' => 'required|image',
        // 'sign' => 'required|image',
        'heading' => 'required|string',
        'paper1_marks' => 'required|integer',
        'paper2_marks' => 'required|integer',
        'director1_name' => 'required|string',
        'director1_sign' => 'required|image',
        'director2_name' => 'required|string',
        'director2_sign' => 'required|image',
    ]);

    $logo_b = $this->updateImage($request, 'logo_b', 'uploads');
    $logo = $this->updateImage($request, 'logo', 'uploads');
    // $sign = $this->updateImage($request, 'sign', 'uploads');
    $director1_sign = $this->updateImage($request, 'director1_sign', 'uploads');
    $director2_sign = $this->updateImage($request, 'director2_sign', 'uploads');
    
    AdminResult::create([
        'exam_name' => $request->exam_name,
        'standard' => implode(',', $request->standard),
        'logo' => $logo,
        'logo_2' => $logo_b,
        'heading' => $request->heading,
        // 'sign' => $sign,
        'paper1_marks' => $request->paper1_marks,
        'paper2_marks' => $request->paper2_marks,
        'director1_name' => $request->director1_name,
        'director1_sign' => $director1_sign,
        'director2_name' => $request->director2_name,
        'director2_sign' => $director2_sign,
    ]);

    toastr('Exam Result added successfully!', 'success');
    return redirect()->route('admin.admin-result.index');
}




    public function generateMeritList(Request $request)
    {
        $std = $request->std;

        if (!$std) {
            toastr('Please select a standard/grade', 'error');
            return redirect()->back();
        }

        try {
            // Reset all merit flags and ranks for this standard
            PrimaryResult::where('std', $std)
                ->update([
                    'state_merit' => false,
                    'division_merit' => false,
                    'district_merit' => false,
                    'taluka_merit' => false,
                    'center_merit' => false,
                    'state_rank' => null,
                    'division_rank' => null,
                    'district_rank' => null,
                    'taluka_rank' => null,
                    'center_rank' => null
                ]);

            // Define minimum percentage threshold for merit
            $minPercentage = 25;

            // Get all states for this standard
            $states = PrimaryResult::where('std', $std)
                ->whereNotNull('state')
                ->select('state')
                ->distinct()
                ->pluck('state');

            // Process each state - top 7 ranks
            foreach ($states as $state) {
                // Get all students with percentage >= 25% for ranking
                $stateStudents = PrimaryResult::where('std', $std)
                    ->where('state', $state)
                    ->where('percentage', '>=', $minPercentage)
                    ->orderBy('percentage', 'desc')
                    ->get();

                $currentRank = 1;
                $lastPercentage = null;
                $processedCount = 0;

                foreach ($stateStudents as $student) {
                    // If this student has different percentage than previous, increment rank
                    if ($lastPercentage !== null && $student->percentage < $lastPercentage) {
                        $currentRank++;
                    }

                    // Only assign merit if within top 7 ranks
                    if ($currentRank <= 7) {
                        $student->state_rank = $currentRank;
                        $student->state_merit = true;
                        $student->save();
                        $processedCount++;

                        // Create user account if it doesn't exist
                        $this->createUserAccount($student);
                    }

                    $lastPercentage = $student->percentage;
                }
            }

            // Process divisions (excluding students who already have state merit)
            $divisions = PrimaryResult::where('std', $std)
                ->where('state_merit', false)
                ->whereNotNull('division')
                ->select('division')
                ->distinct()
                ->pluck('division');

            // Process each division - top 3 ranks
            foreach ($divisions as $division) {
                $divisionStudents = PrimaryResult::where('std', $std)
                    ->where('division', $division)
                    ->where('state_merit', false)
                    ->where('percentage', '>=', $minPercentage)
                    ->orderBy('percentage', 'desc')
                    ->get();

                $currentRank = 1;
                $lastPercentage = null;

                foreach ($divisionStudents as $student) {
                    // If this student has different percentage than previous, increment rank
                    if ($lastPercentage !== null && $student->percentage < $lastPercentage) {
                        $currentRank++;
                    }

                    // Only assign merit if within top 3 ranks
                    if ($currentRank <= 3) {
                        $student->division_rank = $currentRank;
                        $student->division_merit = true;
                        $student->save();

                        // Create user account if it doesn't exist
                        $this->createUserAccount($student);
                    }

                    $lastPercentage = $student->percentage;
                }
            }

            // Process districts (excluding students with state or division merit)
            $districts = PrimaryResult::where('std', $std)
                ->where('state_merit', false)
                ->where('division_merit', false)
                ->whereNotNull('district')
                ->select('district')
                ->distinct()
                ->pluck('district');

            // Process each district - top 5 ranks
            foreach ($districts as $district) {
                $districtStudents = PrimaryResult::where('std', $std)
                    ->where('district', $district)
                    ->where('state_merit', false)
                    ->where('division_merit', false)
                    ->where('percentage', '>=', $minPercentage)
                    ->orderBy('percentage', 'desc')
                    ->get();

                $currentRank = 1;
                $lastPercentage = null;

                foreach ($districtStudents as $student) {
                    // If this student has different percentage than previous, increment rank
                    if ($lastPercentage !== null && $student->percentage < $lastPercentage) {
                        $currentRank++;
                    }

                    // Only assign merit if within top 5 ranks
                    if ($currentRank <= 5) {
                        $student->district_rank = $currentRank;
                        $student->district_merit = true;
                        $student->save();

                        // Create user account if it doesn't exist
                        $this->createUserAccount($student);
                    }

                    $lastPercentage = $student->percentage;
                }
            }

            // Process talukas (excluding students with other merits)
            $talukas = PrimaryResult::where('std', $std)
                ->where('state_merit', false)
                ->where('division_merit', false)
                ->where('district_merit', false)
                ->whereNotNull('taluka')
                ->select('taluka')
                ->distinct()
                ->pluck('taluka');

            // Process each taluka - top 3 ranks
            foreach ($talukas as $taluka) {
                $talukaStudents = PrimaryResult::where('std', $std)
                    ->where('taluka', $taluka)
                    ->where('state_merit', false)
                    ->where('division_merit', false)
                    ->where('district_merit', false)
                    ->where('percentage', '>=', $minPercentage)
                    ->orderBy('percentage', 'desc')
                    ->get();

                $currentRank = 1;
                $lastPercentage = null;

                foreach ($talukaStudents as $student) {
                    // If this student has different percentage than previous, increment rank
                    if ($lastPercentage !== null && $student->percentage < $lastPercentage) {
                        $currentRank++;
                    }

                    // Only assign merit if within top 3 ranks
                    if ($currentRank <= 3) {
                        $student->taluka_rank = $currentRank;
                        $student->taluka_merit = true;
                        $student->save();

                        // Create user account if it doesn't exist
                        $this->createUserAccount($student);
                    }

                    $lastPercentage = $student->percentage;
                }
            }

            // Process centers (excluding students with other merits)
            $centers = PrimaryResult::where('std', $std)
                ->where('state_merit', false)
                ->where('division_merit', false)
                ->where('district_merit', false)
                ->where('taluka_merit', false)
                ->whereNotNull('exam_centre')
                ->select('exam_centre')
                ->distinct()
                ->pluck('exam_centre');

            // Process each center - top 3 ranks
            foreach ($centers as $center) {
                $centerStudents = PrimaryResult::where('std', $std)
                    ->where('exam_centre', $center)
                    ->where('state_merit', false)
                    ->where('division_merit', false)
                    ->where('district_merit', false)
                    ->where('taluka_merit', false)
                    ->where('percentage', '>=', $minPercentage)
                    ->orderBy('percentage', 'desc')
                    ->get();

                $currentRank = 1;
                $lastPercentage = null;

                foreach ($centerStudents as $student) {
                    // If this student has different percentage than previous, increment rank
                    if ($lastPercentage !== null && $student->percentage < $lastPercentage) {
                        $currentRank++;
                    }

                    // Only assign merit if within top 3 ranks
                    if ($currentRank <= 3) {
                        $student->center_rank = $currentRank;
                        $student->center_merit = true;
                        $student->save();

                        // Create user account if it doesn't exist
                        $this->createUserAccount($student);
                    }

                    $lastPercentage = $student->percentage;
                }
            }

            toastr('Merit list generated successfully for Standard ' . $std, 'success');
            return redirect()->route('admin.merit-list', ['std' => $std]);
        } catch (\Exception $e) {
            \Log::error('Merit list generation error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            toastr('Error generating merit list: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }


    /**
     * Download merit list as PDF
     */
    public function downloadMeritListPdf(Request $request)
    {
        $query = $this->buildMeritListQuery($request);
        $meritStudents = $query->get();

        $pdf = PDF::loadView('admin.admin_result.merit_list_pdf', compact('meritStudents'));
        $filename = 'merit_list_' . date('Y-m-d') . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Download merit list as Excel
     */
    public function downloadMeritListExcel(Request $request)
    {
        return Excel::download(new MeritListExport($request), 'merit_list_' . date('Y-m-d') . '.xlsx');
    }

    /**
     * Download merit list as CSV
     */
    public function downloadMeritListCsv(Request $request)
    {
        return Excel::download(new MeritListExport($request), 'merit_list_' . date('Y-m-d') . '.csv');
    }

    /**
     * Helper method to build merit list query with filters
     */
    private function buildMeritListQuery(Request $request)
    {
        $query = PrimaryResult::query();

        // Filter by standard if selected
        if ($request->std) {
            $query->where('std', $request->std);
        }

        // Filter by center if selected
        if ($request->center) {
            $query->where('exam_centre', $request->center);
        }

        // Filter by state if selected
        if ($request->state) {
            $query->where('state', $request->state);
        }

        // Filter by division if selected
        if ($request->division) {
            $query->where('division', $request->division);
        }

        // Filter by district if selected
        if ($request->district) {
            $query->where('district', $request->district);
        }

        // Filter by taluka if selected
        if ($request->taluka) {
            $query->where('taluka', $request->taluka);
        }

        // Filter by merit type if selected
        $meritType = $request->merit_type ?? 'any';

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
                $query->where(function ($q) {
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
        $query->orderBy('percentage', 'desc');

        return $query;
    }





    // Helper method to create user accounts for merit students
    private function createUserAccount($student)
    {
        if (!empty($student->barcode) && !User::where('unique_id', $student->barcode)->exists()) {
            User::create([
                'name' => $student->name,
                'phone' => $student->parent_mobile ?? '0000000000',
                'role' => 'user',
                'password' => Hash::make('12345678'),
                'original_password' => '12345678',
                'unique_id' => $student->barcode,
                'status' => 'active'
            ]);
        }
    }






    public function show($id)
    {
        $primaryresult = PrimaryResult::findOrFail($id);
        return view('admin.admin_result.show', compact('primaryresult'));
    }

    public function edit($id)
    {
        $adminResult = AdminResult::findOrFail($id);
        $standards = Standard::orderBy('id', 'ASC')->get();
        return view('admin.admin_result.edit', compact('adminResult','standards'));
    }

    public function update(Request $request, $id)
    {
        $adminResult = AdminResult::findOrFail($id);

        $request->validate([
            'exam_name' => 'required|string|max:255',
            'standard' => 'required|array',
            // 'logo' => 'required|image',
            // 'sign' => 'required|image',
            // 'heading' => 'required|string',
            // 'director1_name' => 'required|string',
            // 'director1_sign' => 'required|image',
            // 'director2_name' => 'required|string',
            // 'director2_sign' => 'required|image',
        ]);
        $standardString = implode(',', $request->standard);
    
        $logo = $this->updateImage($request, 'logo', 'uploads' , $adminResult->logo);
        $logo_b = $this->updateImage($request, 'logo_b', 'uploads' , $adminResult->logo_2);
        // $sign = $this->updateImage($request, 'sign', 'uploads', $adminResult->sign);
        $director1_sign = $this->updateImage($request, 'director1_sign', 'uploads', $adminResult->director1_sign);
        $director2_sign = $this->updateImage($request, 'director2_sign', 'uploads', $adminResult->director2_sign);

        // echo !empty($sign) ? $sign : $adminResult->sign;
        // die;
        
        $adminResult->exam_name = $request->exam_name;
        // $adminResult->standard = $request->standard;
        $adminResult->standard = $standardString;
        $adminResult->heading = $request->heading;
        $adminResult->paper1_marks = $request->paper1_marks;
        $adminResult->paper2_marks = $request->paper2_marks;
        $adminResult->director1_name = $request->director1_name;
        $adminResult->director2_name = $request->director2_name;
        $adminResult->logo = $logo ?: $adminResult?->logo;
        $adminResult->logo_2 = $logo_b ?: $adminResult?->logo_2;
        // $adminResult->sign = !empty($sign) ? $sign : $adminResult->sign;
        $adminResult->director1_sign = !empty($director1_sign) ? $director1_sign : $adminResult->director1_sign;
        $adminResult->director2_sign = !empty($director2_sign) ? $director2_sign : $adminResult->director2_sign;
        //$adminResult->update($request->all());
        $adminResult->save();

        toastr('Result updated successfully!', 'success');
        return redirect()->route('admin.admin-result.index');
    }

    public function deleteAll()
    {
        PrimaryResult::truncate();

        return response()->json([
            'status' => 'success',
            'message' => 'All results deleted successfully!'
        ]);
    }


    public function destroy($id)
    {
        $adminResult = AdminResult::findOrFail($id);
        $adminResult->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Result deleted successfully!'
        ]);
    }
}
