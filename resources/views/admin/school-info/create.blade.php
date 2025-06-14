@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Upload School Info</h1>
    </div>

    <div class="section-body">
        <div class="cart">
            <form action="{{ route('admin.school-info.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Upload Excel File</label>
                    <input type="file" name="excel_file" class="form-control" accept=".xlsx,.xls" required>
                </div>

                <div class="form-group">
                    <a href="" class="btn btn-info">Download Sample Excel</a>
                    <button type="submit" class="btn btn-primary">Upload Info</button>
                </div>
            </form>
        </div>
    </div>

</section>
@endsection