<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryResult;

class MeritListController extends Controller
{
    public function index(Request $request)
    {
        $query = PrimaryResult::query();
        
        // Get filter values
        $meritType = $request->merit_type ?? 'any';
        $selectedStd = $request->std;
        $selectedState = $request->state;
        $selectedDivision = $request->division;
        $selectedDistrict = $request->district;
        $selectedTaluka = $request->taluka;
        $selectedCenter = $request->center;
        
        // Apply merit type filter
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
        
        // Apply other filters
        if ($selectedStd) {
            $query->where('std', $selectedStd);
        }
        
        if ($selectedState) {
            $query->where('state', $selectedState);
        }
        
        if ($selectedDivision) {
            $query->where('division', $selectedDivision);
        }
        
        if ($selectedDistrict) {
            $query->where('district', $selectedDistrict);
        }
        
        if ($selectedTaluka) {
            $query->where('taluka', $selectedTaluka);
        }
        
        if ($selectedCenter) {
            $query->where('exam_centre', $selectedCenter);
        }
        
        // Get unique values for filter dropdowns
        $standards = PrimaryResult::select('std')->whereNotNull('std')->distinct()->orderBy('std', 'asc')->get();
        $states = PrimaryResult::select('state')->whereNotNull('state')->where('state_status',1)->distinct()->orderBy('state', 'asc')->get();
        $divisions = PrimaryResult::select('division')->whereNotNull('division')->where('division_status',1)->distinct()->orderBy('division', 'asc')->get();
        $districts = PrimaryResult::select('district')->whereNotNull('district')->where('district_status',1)->distinct()->orderBy('district', 'asc')->get();
        $talukas = PrimaryResult::select('taluka')->whereNotNull('taluka')->where('taluka_status',1)->distinct()->orderBy('taluka', 'asc')->get();
        $centers = PrimaryResult::select('exam_centre')->whereNotNull('exam_centre')->where('exam_center_status',1)->distinct()->orderBy('exam_centre', 'asc')->get();

        // $query->where('state_status', 1);
        // $query->where('division_status', 1);
        // $query->where('district_status', 1);
        // $query->where('taluka_status', 1);
        // $query->where('exam_center_status', 1);
        
        // Order results by percent
        $query->orderBy('percentage', 'desc');
        
        // Get paginated results
        $meritStudents = $query->paginate(10);
        // $meritStudents = $query->get();
        // echo "<pre>"; print_r($meritStudents->toArray());die;
        
        return view('frontend.merit-list.index', compact(
            'meritStudents',
            'meritType',
            'selectedStd',
            'selectedState',
            'selectedDivision',
            'selectedDistrict',
            'selectedTaluka',
            'selectedCenter',
            'standards',
            'states',
            'divisions',
            'districts',
            'talukas',
            'centers'
        ));
    }
}
