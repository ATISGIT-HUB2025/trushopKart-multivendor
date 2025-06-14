@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Merit List</h1>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Student Merit List</h4>
                <div class="d-flex flex-wrap mt-4 gap-3 align-items-center">
                    <div class="input-group" style="width: 220px;">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-medal"></i>
                        </span>
                        <select style="width: 150px;" id="meritFilter" class="form-select border-primary shadow-sm">
                            <option value="any" {{ $meritType == 'any' ? 'selected' : '' }}>Any Merit</option>
                            <option value="state" {{ $meritType == 'state' ? 'selected' : '' }}>State Merit</option>
                            <option value="division" {{ $meritType == 'division' ? 'selected' : '' }}>Division Merit</option>
                            <option value="district" {{ $meritType == 'district' ? 'selected' : '' }}>District Merit</option>
                            <option value="taluka" {{ $meritType == 'taluka' ? 'selected' : '' }}>Taluka Merit</option>
                            <option value="center" {{ $meritType == 'center' ? 'selected' : '' }}>Center Merit</option>
                            <option value="all" {{ $meritType == 'all' ? 'selected' : '' }}>All Students</option>
                        </select>
                    </div>

                    <!-- Standard Filter -->
                    <div class="input-group" style="width: 250px;">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        <select style="width: 150px;"  id="stdFilter" class="form-select border-primary shadow-sm">
                            <option value="">All Standards</option>
                            @foreach($standards as $standard)
                            <option value="{{ $standard->std }}" {{ $selectedStd == $standard->std ? 'selected' : '' }}>
                                Standard {{ $standard->std }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- State Filter -->
                    <div class="input-group" style="width: 220px;">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-flag"></i>
                        </span>
                        <select id="stateFilter" class="form-select border-primary shadow-sm">
                            <option value="">Select State</option>
                            @foreach($states as $state)
                            <option value="{{ $state->state }}" {{ request('state') == $state->state ? 'selected' : '' }}>
                                {{ $state->state }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group" style="width: 220px;">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-map"></i>
                        </span>
                        <select style="width: 150px;" id="divisionFilter" class="form-select border-primary shadow-sm">
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division->division }}" {{ request('division') == $division->division ? 'selected' : '' }}>
                                {{ $division->division }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group" style="width: 220px;">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-city"></i>
                        </span>
                        <select style="width: 150px;" id="districtFilter" class="form-select border-primary shadow-sm">
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                            <option value="{{ $district->district }}" {{ request('district') == $district->district ? 'selected' : '' }}>
                                {{ $district->district }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Add this after the district filter and before the center filter -->
                    <div class="input-group" style="width: 220px;">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <select style="width: 150px;" id="talukaFilter" class="form-select border-primary shadow-sm">
                            <option value="">Select Taluka</option>
                            @foreach($talukas as $taluka)
                            <option value="{{ $taluka->taluka }}" {{ request('taluka') == $taluka->taluka ? 'selected' : '' }}>
                                {{ $taluka->taluka }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="input-group mt-4" style="width: 220px;">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-filter"></i>
                        </span>
                        <select style="width: 150px;" id="centerFilter" class="form-select border-primary shadow-sm">
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

            <div class="card-body">
                @if($selectedStd)
                <form action="{{ route('admin.generate-merit-list') }}" method="POST" class="mb-4">
                    @csrf <input type="hidden" name="std" value="{{ $selectedStd }}">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-medal mr-1"></i> Generate Merit List for Standard {{ $selectedStd }}
                    </button>
                    <small class="text-muted ml-2">
                        This will calculate state (top 7), division (top 3), district (top 5), taluka (top 3) and center (top 3) merits.
                    </small>
                </form>
                @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle mr-1"></i>
                    Select a standard to enable merit list generation.
                </div>
                @endif

                <table class="table table-bordered" id="meritTable">
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
                                @if($student->state_merit)
                                <span class="badge badge-danger">State</span>
                                @elseif($student->division_merit)
                                <span class="badge badge-success">Division</span>
                                @elseif($student->district_merit)
                                <span class="badge badge-info">District</span>
                                @elseif($student->taluka_merit)
                                <span class="badge badge-primary">Taluka</span>
                                @elseif($student->center_merit)
                                <span class="badge badge-warning">Center</span>
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

                <div class="mt-4">
                    {{ $meritStudents->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable without pagination (we're using Laravel's)
        $('#meritTable').DataTable({
            "paging": false,
            "searching": false,
            "info": false
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