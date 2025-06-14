@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Merit List
@endsection

@section('content')
<section class="bg-light p-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center mb-3">
          <div>
            <img src="https://i.ibb.co.com/k2XgxCJf/1.jpg" alt="logo" width="100" />
          </div>
          <h4 class="text-danger mt-3">DPAM Merit List 2025</h4>
          <p>
            Students who achieved excellence in the DPAM examinations are listed here.
            Merit ranks are awarded at State, Division, District, Taluka and Center levels.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-filter me-2"></i> Filter Merit List</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('merit-list') }}" method="get">
              <div class="row g-3">
                <!-- Merit Type Filter -->
                <div class="col-md-4 col-lg-3">
                  <div class="form-group">
                    <label for="meritFilter"><i class="fas fa-medal text-primary"></i> Merit Level</label>
                    <select id="meritFilter" name="merit_type" class="form-select border-primary">
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
                <div class="col-md-4 col-lg-3">
                  <div class="form-group">
                    <label for="stdFilter"><i class="fas fa-graduation-cap text-primary"></i> Standard</label>
                    <select id="stdFilter" name="std" class="form-select border-primary">
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
                <div class="col-md-4 col-lg-3">
                  <div class="form-group">
                    <label for="stateFilter"><i class="fas fa-flag text-primary"></i> State</label>
                    <select id="stateFilter" name="state" class="form-select border-primary">
                      <option value="">All States</option>
                      @foreach($states as $state)
                      <option value="{{ $state->state }}" {{ $selectedState == $state->state ? 'selected' : '' }}>
                        {{ $state->state }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!-- Division Filter -->
                <div class="col-md-4 col-lg-3">
                  <div class="form-group">
                    <label for="divisionFilter"><i class="fas fa-map text-primary"></i> Division</label>
                    <select id="divisionFilter" name="division" class="form-select border-primary">
                      <option value="">All Divisions</option>
                      @foreach($divisions as $division)
                      <option value="{{ $division->division }}" {{ $selectedDivision == $division->division ? 'selected' : '' }}>
                        {{ $division->division }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!-- District Filter -->
                <div class="col-md-4 col-lg-3">
                  <div class="form-group">
                    <label for="districtFilter"><i class="fas fa-city text-primary"></i> District</label>
                    <select id="districtFilter" name="district" class="form-select border-primary">
                      <option value="">All Districts</option>
                      @foreach($districts as $district)
                      <option value="{{ $district->district }}" {{ $selectedDistrict == $district->district ? 'selected' : '' }}>
                        {{ $district->district }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!-- Taluka Filter -->
                <div class="col-md-4 col-lg-3">
                  <div class="form-group">
                    <label for="talukaFilter"><i class="fas fa-map-marker-alt text-primary"></i> Taluka</label>
                    <select id="talukaFilter" name="taluka" class="form-select border-primary">
                      <option value="">All Talukas</option>
                      @foreach($talukas as $taluka)
                      <option value="{{ $taluka->taluka }}" {{ $selectedTaluka == $taluka->taluka ? 'selected' : '' }}>
                        {{ $taluka->taluka }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!-- Center Filter -->
                <div class="col-md-4 col-lg-3">
                  <div class="form-group">
                    <label for="centerFilter"><i class="fas fa-school text-primary"></i> Exam Center</label>
                    <select id="centerFilter" name="center" class="form-select border-primary">
                      <option value="">All Exam Centers</option>
                      @foreach($centers as $center)
                      <option value="{{ $center->exam_centre }}" {{ $selectedCenter == $center->exam_centre ? 'selected' : '' }}>
                        {{ $center->exam_centre }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!-- Search Button -->
                <div class="col-md-4 col-lg-3 d-flex align-items-end">
                  <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search me-2"></i> Search Merit List
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fas fa-trophy me-2"></i> Student Merit List ({{ $meritStudents->total() }} results)</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead class="table-primary">
                  <tr>
                    <th>Rank</th>
                    <th>Student Name</th>
                    <th>Std</th>
                    <th>Student ID</th>
                    <th>State</th>
                    <th>Division</th>
                    <th>District</th>
                    <th>Taluka</th>
                    <th>Center</th>
                    <th>Percentage</th>
                    <th>Merit Achievement</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($meritStudents as $index => $student)
                  <tr>
                    <td>{{ ($meritStudents->currentPage() - 1) * $meritStudents->perPage() + $index + 1 }}</td>
                    <td>{{ $student->name ?? '-' }}</td>
                    <td>{{ $student->std ?? '-' }}</td>
                    <td>{{ $student->barcode ?? '-' }}</td>
                    <td>{{ $student->state_status ? $student->state : '-' }}</td>
                    <td>{{ $student->division_status ? $student->division : '-' }}</td>
                    <td>{{ $student->district_status ? $student->district : '-' }}</td>
                    <td>{{ $student->taluka_status ? $student->taluka : '-' }}</td>
                    <td>{{ $student->exam_center_status ? $student->exam_centre : '-' }}</td>
                    <td><strong>{{ $student->percentage ?? '0' }}%</strong></td>
                    <td>
                      @if($student->state_merit)
                        <span class="badge bg-danger p-2 mb-1 d-block">
                          <i class="fas fa-medal me-1"></i> State Merit - Rank {{ $student->state_rank }}
                        </span>
                      @endif
                      
                      @if($student->division_merit)
                        <span class="badge bg-success p-2 mb-1 d-block">
                          <i class="fas fa-award me-1"></i> Division Merit - Rank {{ $student->division_rank }}
                        </span>
                      @endif
                      
                      @if($student->district_merit)
                        <span class="badge bg-info p-2 mb-1 d-block">
                          <i class="fas fa-certificate me-1"></i> District Merit - Rank {{ $student->district_rank }}
                        </span>
                      @endif
                      
                      @if($student->taluka_merit)
                        <span class="badge bg-primary p-2 mb-1 d-block">
                          <i class="fas fa-star me-1"></i> Taluka Merit - Rank {{ $student->taluka_rank }}
                        </span>
                      @endif
                      
                      @if($student->center_merit)
                      
                          <span class="badge bg-warning text-dark p-2 d-block">
                          <i class="fas fa-trophy me-1"></i> Center Merit - Rank {{ $student->center_rank }}
                        </span>
                      @endif
                      
                      @if(!$student->state_merit && !$student->division_merit && !$student->district_merit && !$student->taluka_merit && !$student->center_merit)
                        <span class="badge bg-secondary p-2">
                          <i class="fas fa-times me-1"></i> No Merit
                        </span>
                      @endif
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="8" class="text-center py-4">
                      <div class="alert alert-info mb-0">
                        <i class="fas fa-info-circle me-2"></i> No merit students found matching your filter criteria.
                      </div>
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            
            <div class="mt-4 d-flex justify-content-center">
              {{ $meritStudents->appends(request()->except('page'))->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Custom styling for the merit list page */
  .form-select, .form-control {
    padding: 0.5rem;
    border-radius: 0.25rem;
  }
  
  .badge {
    font-size: 0.85rem;
    font-weight: 500;
  }
  
  .table th {
    font-weight: 600;
    font-size: 0.95rem;
  }
  
  .card {
    border: none;
    border-radius: 0.5rem;
    overflow: hidden;
  }
  
  .card-header {
    font-weight: 600;
  }
  
  /* Responsive adjustments */
  @media (max-width: 767px) {
    .table-responsive {
      border: 1px solid #dee2e6;
      border-radius: 0.25rem;
    }
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Auto-submit form when filters change (optional)
  /*
  const filterControls = document.querySelectorAll('select[id$="Filter"]');
  filterControls.forEach(control => {
    control.addEventListener('change', function() {
      this.closest('form').submit();
    });
  });
  */
  
  // Helper to highlight row on hover
  const tableRows = document.querySelectorAll('tbody tr');
  tableRows.forEach(row => {
    row.addEventListener('mouseenter', function() {
      this.classList.add('bg-light');
    });
    row.addEventListener('mouseleave', function() {
      this.classList.remove('bg-light');
    });
  });
});
</script>
@endsection
