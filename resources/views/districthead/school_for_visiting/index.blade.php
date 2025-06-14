@extends('districthead.layouts.master')
@section('title')
{{$settings->site_name}} || Product
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('districthead.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 fw-bold">School For Visiting</h2>
                        <a href="{{ route('district.school-for-visiting.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-2"></i>Add School For Visiting
                        </a>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                        
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadExcelModal">
    <i class="fas fa-file-upload me-2"></i>Upload Excel File
</a>

<!-- Modal -->
<div class="modal fade" id="uploadExcelModal" tabindex="-1" aria-labelledby="uploadExcelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadExcelModalLabel">Upload Excel File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="excelUploadForm" action="{{route('district.school-for-visiting.excel')}}" method="POST" enctype="multipart/form-data">
          
            @csrf

                    <div class="mb-3">
                        <label for="excelFile" class="form-label">Choose Excel File</label>
                        <input type="file" class="form-control" id="excelFile" name="excel_file" accept=".xls,.xlsx" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload</button>
                    
                    <a href="{{ asset('sample/sample_file.xlsx') }}" class="btn btn-info text-right">Download Sample Excel</a>
                    
                </form>
            </div>
        </div>
    </div>
</div>
                    </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="fw-bold">ID</th>
                                            <th class="fw-bold">Created By</th>
                                            <th class="fw-bold">Date</th>
                                            <th class="fw-bold">Visit SR.NO.</th>
                                            <th class="fw-bold">Start Time Traveling</th>
                                            <th class="fw-bold">End Time Traveling</th>
                                            <th class="fw-bold">District</th>
                                            <th class="fw-bold">Taluka</th>
                                            <th class="fw-bold">Village</th>
                                            <th class="fw-bold">School Name</th>
                                            <th class="fw-bold">Udise No.</th>
                                            <th class="fw-bold">HM Name</th>
                                            <th class="fw-bold">Mobile NO.</th>
                                            <th class="fw-bold">Total Students</th>
                                            <th class="fw-bold">Std Marathi</th>
                                            <th class="fw-bold">Std Semi</th>
                                            <th class="fw-bold">Std English</th>
                                            <th class="fw-bold">Final Marathi</th>
                                            <th class="fw-bold">Final Semi</th>
                                            <th class="fw-bold">Final English</th>
                                            <th class="fw-bold">Total Bill</th>
                                            <th class="fw-bold">Online Bill</th>
                                            <th class="fw-bold">Cash Bill</th>
                                            <!-- <th class="fw-bold">Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($schoolForVisitings as $key => $schoolForVisiting)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ ucwords(str_replace('_', ' ', $schoolForVisiting->user->role)) }}</td>
                                            <td>{{ $schoolForVisiting->date }}</td>
                                            <td>{{ $schoolForVisiting->visit_sr_no }}</td>
                                            <td>{{ $schoolForVisiting->traveling_start_time }}</td>
                                            <td>{{ $schoolForVisiting->traveling_end_time }}</td>
                                            <td>{{ $schoolForVisiting->district }}</td>
                                            <td>{{ $schoolForVisiting->taluka }}</td>
                                            <td>{{ $schoolForVisiting->village }}</td>
                                            <td>{{ $schoolForVisiting->school_name }}</td>
                                            <td>{{ $schoolForVisiting->udise_no }}</td>
                                            <td>{{ $schoolForVisiting->hm_name }}</td>
                                            <td>{{ $schoolForVisiting->mobile_no }}</td>
                                            <td>{{ $schoolForVisiting->total_students }}</td>
                                            <td>{{ $schoolForVisiting->std_marathi }}</td>
                                            <td>{{ $schoolForVisiting->std_semi }}</td>
                                            <td>{{ $schoolForVisiting->std_english }}</td>
                                            <td>{{ $schoolForVisiting->final_marathi }}</td>
                                            <td>{{ $schoolForVisiting->final_semi }}</td>
                                            <td>{{ $schoolForVisiting->final_english }}</td>
                                            <td>{{ $schoolForVisiting->total_bill }}</td>
                                            <td>{{ $schoolForVisiting->online_bill }}</td>
                                            <td>{{ $schoolForVisiting->cash_bill }}</td>
                                            
                                           
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('district.school-for-visiting.edit', $schoolForVisiting->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit me-1"></i>Edit
                                                    </a>
                                                    <form action="{{ route('district.school-for-visiting.destroy', $schoolForVisiting->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger ms-1"
                                                            onclick="return confirm('Are you sure you want to delete this employee?')">
                                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection