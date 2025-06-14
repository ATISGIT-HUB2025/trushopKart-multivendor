@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Rejected Admissions</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>All Rejected Admissions</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Parent Mobile</th>
                            <th>School Name</th>
                            <th>Standard</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admissions as $admission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $admission->full_name }}</td>
                            <td>{{ $admission->email }}</td>
                            <td>{{ $admission->parent_mobile }}</td>
                            <td>{{ $admission->school_name }}</td>
                            <td>{{ $admission->standard }}</td>
                            <td>
                                <a href="{{ route('admin.admission.show', $admission->id) }}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
