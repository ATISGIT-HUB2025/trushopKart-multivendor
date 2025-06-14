<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\SchoolInfo;
use App\Models\Standard;

class AdmissionFormController extends Controller
{
    public function admissionForm()
    {
        
        $centers = Center::where('status', 1)->get();
        $divisions = SchoolInfo::distinct('division')->pluck('division');
        $standards = Standard::get();
        return view('frontend.pages.admission-form', compact('centers', 'divisions', 'standards'));
    }

    public function getDistricts($division)
    {
        $districts = SchoolInfo::where('division', $division)
            ->distinct('district')
            ->pluck('district');
        return response()->json($districts);
    }

    public function getTalukas($district)
    {
        $talukas = SchoolInfo::where('district', $district)
            ->distinct('taluka')
            ->pluck('taluka');
        return response()->json($talukas);
    }

    public function getClusters($taluka)
    {
        $clusters = SchoolInfo::where('taluka', $taluka)
            ->distinct('cluster')
            ->pluck('cluster');
        return response()->json($clusters);
    }

    public function getSchools($cluster)
    {
        $schools = SchoolInfo::where('cluster', $cluster)
            ->distinct('school_name')
            ->pluck('school_name');
        return response()->json($schools);
    }

    public function getUdise($cluster)
{
    $udiseNumbers = SchoolInfo::where('cluster', $cluster)
        ->distinct('udise')
        ->pluck('udise');
    return response()->json($udiseNumbers);
}

public function getVillageTowns($udise)
{
    $villageTowns = SchoolInfo::where('udise', $udise)
        ->distinct('village_town')
        ->pluck('village_town');
    return response()->json($villageTowns);
}


}
