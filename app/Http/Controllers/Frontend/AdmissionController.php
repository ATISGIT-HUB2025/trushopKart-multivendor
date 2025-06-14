<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdmissionController extends Controller
{
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'phone' => 'required|string|max:20',
    //         'address' => 'required|string',
    //         'city' => 'required|string|max:255',
    //         'state' => 'required|string|max:255',
    //         'date_of_birth' => 'required|date',
    //         'gender' => 'required|in:Male,Female,Other',
    //         'last_school' => 'required|string|max:255',
    //         'percentage' => 'required|numeric|min:0|max:100',
    //         'preferred_course' => 'required|string|max:255',

    //     ]);

    //     Session::put('admission_data', $validatedData);
    //     Session::put('admission_fee', 500);

    //     return response()->json([
    //         'status' => 'success',
    //         'redirect_url' => route('admission.payment')
    //     ]);
    // }

    public function store(Request $request)
    {

        Log::info('Admission form submitted with data:', $request->all());

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'division' => 'required|string',
            'sr_no' => 'required|string',
            'district' => 'required|string',
            'taluka' => 'required|string',
            'cluster' => 'required|string',
            'school_name' => 'required|string',
            'udise_no_school' => 'required|string',
            // 'paper_1' => 'required|string',
            // 'paper_2' => 'required|string',
            'medium' => 'required|string',
            'standard' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required|in:male,female',
            'parent_mobile' => 'required|string|max:20',
            'teacher_mobile' => 'required|string|max:20',
            // 'center_id' => 'required|exists:centers,id',
            'user_type' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/admission_photos'), $photoName);
            $validatedData['photo'] = 'uploads/admission_photos/' . $photoName;
        }

        $validatedData['selected_exam'] = $request->query('exam');
        // Log::info('Submitted form data', ['data' => $validatedData]);



        // Session::put('admission_data', $validatedData);

        // In AdmissionController@store
        Log::info('Setting admission_data in session', ['data' => $validatedData]);
        Session::put('admission_data', $validatedData);
        Log::info('Session after set:', ['has_admission_data' => Session::has('admission_data')]);


        // Return a redirect instead of JSON
        return redirect()->route('type-of-admission');
    }


    public function success()
    {
        return view('frontend.pages.AdmissionSuccess');
    }



    public function payment()
    {
        if (!Session::has('admission_data')) {
            return redirect()->route('admission-form');
        }
        return view('frontend.pages.payment', ['payment_type' => 'admission']);
    }



    public function pending(Request $request)
    {
        $query = Admission::where('status', 'pending');

        // Apply filters
        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }

        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }

        if ($request->filled('taluka')) {
            $query->where('taluka', $request->taluka);
        }

        if ($request->filled('cluster')) {
            $query->where('cluster', $request->cluster);
        }

        if ($request->filled('school_name')) {
            $query->where('school_name', $request->school_name);
        }

        // Get unique values for dropdowns
        $states = Admission::distinct()->pluck('state');
        $districts = Admission::distinct()->pluck('district');
        $talukas = Admission::distinct()->pluck('taluka');
        $clusters = Admission::distinct()->pluck('cluster');
        $schools = Admission::distinct()->pluck('school_name');

        $admissions = $query->get();

        return view('admin.admission.pendingAdmission', compact(
            'admissions',
            'states',
            'districts',
            'talukas',
            'clusters',
            'schools'
        ));
    }


    public function approved()
    {
        $admissions = Admission::where('status', 'approved')->get();
        return view('admin.admission.approveAdmission', compact('admissions'));
    }

    public function rejected()
    {
        $admissions = Admission::where('status', 'rejected')->get();
        return view('admin.admission.rejectAdmission', compact('admissions'));
    }

    public function show($id)
    {
        $admission = Admission::findOrFail($id);
        return view('admin.admission.view', compact('admission'));
    }

    // public function changeStatus(Request $request, $id)
    // {
    //     $admission = Admission::findOrFail($id);
    //     $admission->status = $request->status;
    //     $admission->save();

    //     return redirect()->back()->with('success', 'Admission status updated successfully.');
    // }

    public function changeStatus(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);
        $admission->status = $request->status;
        $admission->save();

        if ($request->status === 'approved') {
            // Check if the user already exists
            $existingUser = User::where('email', $admission->email)->first();
            if (!$existingUser) {
                // Create a new user
                User::create([
                    'name' => $admission->first_name . ' ' . $admission->last_name,
                    'email' => $admission->email,
                    'password' => Hash::make('12345678'), // Default password
                ]);
            }
        }

        return redirect()->back()->with('success', 'Admission status updated successfully.');
    }
}
