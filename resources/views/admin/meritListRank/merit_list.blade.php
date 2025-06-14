@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Merit List</h1>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-column gap-3">
                    <h4>Student Merit List</h4>
                    <div class="d-flex flex-wrap gap-2 justify-content-start">
                        <!-- Merit Filter -->
                        <div class="filter-group">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-medal"></i>
                                </span>
                                <select style="width: 200px !important;" id="meritFilter" class="form-select border-primary shadow-sm">
                                    <option value="any" {{ $meritType == 'any' ? 'selected' : '' }}>Any Merit</option>
                                    <option value="state" {{ $meritType == 'state' ? 'selected' : '' }}>State Merit</option>
                                    <option value="division" {{ $meritType == 'division' ? 'selected' : '' }}>Division Merit</option>
                                    <option value="district" {{ $meritType == 'district' ? 'selected' : '' }}>District Merit</option>
                                    <option value="taluka" {{ $meritType == 'taluka' ? 'selected' : '' }}>Taluka Merit</option>
                                    <option value="center" {{ $meritType == 'center' ? 'selected' : '' }}>Center Merit</option>
                                    <option value="all" {{ $meritType == 'all' ? 'selected' : '' }}>All Students</option>
                                </select>
                            </div>
                        </div>

                        <!-- Standard Filter -->
                        <div class="filter-group">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-graduation-cap"></i>
                                </span>
                                <select style="width: 200px !important;" id="stdFilter" class="form-select border-primary shadow-sm">
                                    <option value="">All Standards</option>
                                    @foreach($standards as $standard)
                                    <option value="{{ $standard->std }}" {{ $selectedStd == $standard->std ? 'selected' : '' }}>
                                        Standard {{ $standard->std }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- State Filter -->
                        <div class="filter-group">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <select style="width: 200px !important;" id="stateFilter" class="form-select border-primary shadow-sm">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->state }}" {{ request('state') == $state->state ? 'selected' : '' }}>
                                        {{ $state->state }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Division Filter -->
                        <div class="filter-group">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-map"></i>
                                </span>
                                <select style="width: 200px !important;" id="divisionFilter" class="form-select border-primary shadow-sm">
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                    <option value="{{ $division->division }}" {{ request('division') == $division->division ? 'selected' : '' }}>
                                        {{ $division->division }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- District Filter -->
                        <div class="filter-group">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-city"></i>
                                </span>
                                <select style="width: 200px !important;" id="districtFilter" class="form-select border-primary shadow-sm">
                                    <option value="">Select District</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->district }}" {{ request('district') == $district->district ? 'selected' : '' }}>
                                        {{ $district->district }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Taluka Filter -->
                        <div class="filter-group">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <select style="width: 200px !important;" id="talukaFilter" class="form-select border-primary shadow-sm">
                                    <option value="">Select Taluka</option>
                                    @foreach($talukas as $taluka)
                                    <option value="{{ $taluka->taluka }}" {{ request('taluka') == $taluka->taluka ? 'selected' : '' }}>
                                        {{ $taluka->taluka }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Center Filter -->
                        <div class="filter-group">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fas fa-filter"></i>
                                </span>
                                <select style="width: 200px !important;" id="centerFilter" class="form-select border-primary shadow-sm">
                                    <option value="">Select Exam Center</option>
                                    @foreach($centers as $center)
                                    <option value="{{ $center->exam_centre }}" {{ request('center') == $center->exam_centre ? 'selected' : '' }}>
                                        {{ $center->exam_centre }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add this after the filters section but before the table section -->
<div class="card-body">
    @if($selectedStd)
    <form action="{{ route('admin.generate-merit-list') }}" method="POST" class="mb-4">
        @csrf <input type="hidden" name="std" value="{{ $selectedStd }}">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-medal mr-1"></i> Generate Merit List for Standard {{ $selectedStd }}
        </button>
        <small class="text-muted ml-2">
            This will generate state (top 7 ranks), division (top 3 ranks), district (top 5 ranks), taluka (top 3 ranks) and center (top 3 ranks) merits</small>
    </form>
    @else
    <div class="alert alert-info">
        <i class="fas fa-info-circle mr-1"></i>
        Select a standard to enable merit list generation.
    </div>
    @endif
    
    <!-- Download buttons -->
    <div class="mb-4">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-download mr-1"></i> Download Merit List
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.merit-list.download.pdf', request()->query()) }}">
                    <i class="                <a class="dropdown-item" href="{{ route('admin.merit-list.download.pdf', request()->query()) }}">
                    <i class="fas fa-file-pdf mr-2 text-danger"></i> Download as PDF
                </a>
                <a class="dropdown-item" href="{{ route('admin.merit-list.download.excel', request()->query()) }}">
                    <i class="fas fa-file-excel mr-2 text-success"></i> Download as Excel
                </a>
                <a class="dropdown-item" href="{{ route('admin.merit-list.download.csv', request()->query()) }}">
                    <i class="fas fa-file-csv mr-2 text-primary"></i> Download as CSV
                </a>
            </div>
        </div>
        <small class="text-muted ml-2">
            Download includes current filter selections
        </small>
    </div>
    





 

                <div class="table-responsive">
                    <table class="table table-bordered w-100" id="meritTable">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Student Name</th>
                                <th>Standard</th>
                                <th>State</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Taluka</th>
                                <th>Exam Centre</th>
                                <th>Total Marks</th>
                                <th>Percentage</th>
                                <th>Merit Level</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($meritStudents as $index => $student)
                            <tr>
                                <td>{{ ($meritStudents->currentPage() - 1) * $meritStudents->perPage() + $index + 1 }}</td>
                                <td>{{ $student->name ?? '-' }}</td>
                                <td>{{ $student->std ?? '-' }}</td>
                                <td>{{ $student->state ?? '-' }}</td>
                                <td>{{ $student->division ?? '-' }}</td>
                                <td>{{ $student->district ?? '-' }}</td>
                                <td>{{ $student->taluka ?? '-' }}</td>
                                <td>{{ $student->exam_centre ?? '-' }}</td>
                                <td>{{ $student->total_marks ?? '0' }}</td>
                                <td>{{ $student->percentage ?? '0' }}%</td>
                                <td>
                                <?php
                                
                                    $students = App\Models\PrimaryResult::where('state', $student->state)
                                    ->where('std', $student->std)
                                    ->where('medium', $student->medium)
                                    ->orderByDesc('percentage')
                                    ->pluck('percentage')
                                    ->unique()
                                    ->values();

                                    $stateRank = $students->search($student->percentage) + 1;

                                    // Division Rank
                                    $divisionPercentages = App\Models\PrimaryResult::where('state', $student->state)
                                    ->where('division', $student->division)
                                    ->where('std', $student->std)
                                    ->where('medium', $student->medium)
                                    ->orderByDesc('percentage')
                                    ->pluck('percentage')
                                    ->unique()
                                    ->values();
                                    $divisionRank = $divisionPercentages->search($student->percentage) + 1;

                                    // District Rank
                                    $districtPercentages = App\Models\PrimaryResult::where('state', $student->state)
                                    ->where('division', $student->division)
                                    ->where('district', $student->district)
                                    ->where('std', $student->std)
                                    ->where('medium', $student->medium)
                                    ->orderByDesc('percentage')
                                    ->pluck('percentage')
                                    ->unique()
                                    ->values();

                                    $districtRank = $districtPercentages->search($student->percentage) + 1;

                                    // Taluka Rank
                                        $talukaPercentages = App\Models\PrimaryResult::where('state', $student->state)
                                        ->where('division', $student->division)
                                        ->where('district', $student->district)
                                        ->where('taluka', $student->taluka)
                                        ->where('std', $student->std)
                                        ->where('medium', $student->medium)
                                        ->orderByDesc('percentage')
                                        ->pluck('percentage')
                                        ->unique()
                                        ->values();

                                        $talukaRank = $talukaPercentages->search($student->percentage) + 1;

                                        // Center Rank
                                        $centerPercentages = App\Models\PrimaryResult::where('state', $student->state)
                                        ->where('division', $student->division)
                                        ->where('district', $student->district)
                                        ->where('taluka', $student->taluka)
                                        ->where('exam_centre', $student->exam_centre)
                                        ->where('std', $student->std)
                                        ->where('medium', $student->medium)
                                        ->orderByDesc('percentage')
                                        ->pluck('percentage')
                                        ->unique()
                                        ->values();

                                        $centerRank = $centerPercentages->search($student->percentage) + 1;
                                ?>

                                    @if($student->state_merit)
                                    <span class="badge badge-danger">State - Rank 
                                        <!-- {{ $student->state_rank }} -->
                                          {{ $stateRank }}
                                    </span>
                                    @elseif($student->division_merit)
                                    <span class="badge badge-success">Division - Rank 
                                              <!-- {{ $student->division_rank }} -->
                                              {{ $divisionRank }}
                                    </span>
                                    @elseif($student->district_merit)
                                      <span class="badge badge-info">District - Rank
                                         <!-- {{ $student->district_rank }} -->
                                             {{ $districtRank }}
                                        </span>
                                    @elseif($student->taluka_merit)
                                    <span class="badge badge-primary">Taluka - Rank 
                                        <!-- {{ $student->taluka_rank }} -->
                                        {{ $talukaRank }}
                                    </span>
                                    @elseif($student->center_merit)
                                    <span class="badge badge-warning">Center - Rank 
                                        <!-- {{ $student->center_rank }} -->
                                        {{ $centerRank }}
                                    </span>
                                    @else
                                    <span class="badge badge-secondary">None</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.result.show', $student->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('admin.result.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $meritStudents->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add this CSS section -->
<style>
    .filter-group {
        min-width: 200px;
        flex: 1 1 auto;
        margin-bottom: 0.5rem;
    }

    .filter-group .input-group {
        width: 100%;
    }

    .filter-group select {
        width: 100% !important;
    }

    .table-responsive {
        min-height: 400px;
    }

    @media (max-width: 768px) {
        .filter-group {
            width: 100%;
        }
    }

    #meritTable {
        min-width: 800px;
    }
</style>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#meritTable').DataTable({
            paging: false,
            searching: false,
            info: false,
            responsive: true,
            scrollX: true,
            autoWidth: false,
            columnDefs: [{
                    width: '5%',
                    targets: 0
                },
                {
                    width: '15%',
                    targets: 1
                },
                {
                    width: '8%',
                    targets: 2
                },
                {
                    width: '10%',
                    targets: [3, 4, 5, 6, 7]
                },
                {
                    width: '7%',
                    targets: [8, 9]
                },
                {
                    width: '8%',
                    targets: 10
                },
                {
                    width: '10%',
                    targets: 11
                }
            ]
        });

        // Add filter functionality
        $('#meritFilter, #stdFilter, #stateFilter, #centerFilter, #divisionFilter, #districtFilter, #talukaFilter').on('change', function() {
            let url = new URL(window.location.href);

            // Get all filter values
            let meritType = $('#meritFilter').val();
            let std = $('#stdFilter').val();
            let state = $('#stateFilter').val();
            let center = $('#centerFilter').val();
            let division = $('#divisionFilter').val();
            let district = $('#districtFilter').val();
            let taluka = $('#talukaFilter').val();

            // Update URL params
            if (meritType) {
                url.searchParams.set('merit_type', meritType);
            } else {
                url.searchParams.delete('merit_type');
            }

            if (std) {
                url.searchParams.set('std', std);
            } else {
                url.searchParams.delete('std');
            }

            if (state) {
                url.searchParams.set('state', state);
            } else {
                url.searchParams.delete('state');
            }

            if (center) {
                url.searchParams.set('center', center);
            } else {
                url.searchParams.delete('center');
            }

            if (division) {
                url.searchParams.set('division', division);
            } else {
                url.searchParams.delete('division');
            }

            if (district) {
                url.searchParams.set('district', district);
            } else {
                url.searchParams.delete('district');
            }

            if (taluka) {
                url.searchParams.set('taluka', taluka);
            } else {
                url.searchParams.delete('taluka');
            }

            // Navigate to filtered URL
            window.location.href = url.toString();
        });
    });
</script>
@endpush
@endsection