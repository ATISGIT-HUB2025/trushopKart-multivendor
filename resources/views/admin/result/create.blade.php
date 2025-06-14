@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Offline Result Upload</h1>
    </div>
    <div class="section-body">
        <div class="cart">
            <form action="{{ route('admin.result.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3 ">
                    <label>Upload Excel File</label>
                    <input type="file" name="excel_file" class="form-control" accept=".xlsx,.xls" required>
                </div>

                <div class="form-group">
                    <a href="{{ asset('sampleresultexcelnew.xlsx') }}" download class="btn btn-info">Download Sample Excel</a>
                    <button type="submit" class="btn btn-primary">Upload Result</button>
                </div>
            </form>
        </div>
    </div>

</section>
@endsection