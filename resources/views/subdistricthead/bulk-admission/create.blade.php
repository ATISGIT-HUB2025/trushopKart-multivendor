@extends('subdistricthead.layouts.master')

@section('title')
Upload Students
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('subdistricthead.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-file-upload"></i> Upload Students</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <form action="{{ route('subdistrict.bulk-admission.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Upload Excel File</label>
                                    <input type="file" name="excel_file" class="form-control" accept=".xlsx,.xls" required>
                                </div>

                                <div class="form-group">
                                    <a href="{{ asset('sample/sample_format.xlsx') }}" class="btn btn-info">Download Sample Excel</a>
                                    <button type="submit" class="btn btn-primary">Upload Students</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
