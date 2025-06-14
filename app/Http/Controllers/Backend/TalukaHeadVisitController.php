<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TalukaVisit;
use Illuminate\Http\Request;

class TalukaHeadVisitController extends Controller
{
    public function index()
    {
        $visits = TalukaVisit::latest()->paginate(10);
        return view('talukahead.visit.index', compact('visits'));
    }

    public function create()
    {
        return view('talukahead.visit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'total_book_order' => 'required|integer',
            'total_book_payment' => 'required|numeric',
            'total_admission' => 'required|integer',
            'total_admission_payment' => 'required|numeric'
        ]);

        TalukaVisit::create($validated);

        return redirect()->route('taluka.visit')
            ->with('success', 'Visit record created successfully');
    }

    public function edit(TalukaVisit $visit)
    {
        return view('talukahead.visit.edit', compact('visit'));
    }

    public function update(Request $request, TalukaVisit $visit)
    {
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'total_book_order' => 'required|integer',
            'total_book_payment' => 'required|numeric',
            'total_admission' => 'required|integer',
            'total_admission_payment' => 'required|numeric'
        ]);

        $visit->update($validated);

        return redirect()->route('taluka.visit')
            ->with('success', 'Visit record updated successfully');
    }

    public function destroy(TalukaVisit $visit)
    {
        $visit->delete();

        return redirect()->route('taluka.visit')
            ->with('success', 'Visit record deleted successfully');
    }
}
