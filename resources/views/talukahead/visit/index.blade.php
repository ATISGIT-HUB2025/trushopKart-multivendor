@extends('talukahead.layouts.master')
@section('title')
Bulk Admission
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('talukahead.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">School Visits</h5>
                    <a href="{{ route('taluka.visit.create') }}" class="btn btn-primary">Add New Visit</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>School Name</th>
                                <th>Book Orders</th>
                                <th>Book Payment</th>
                                <th>Admissions</th>
                                <th>Admission Payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visits as $visit)
                            <tr>
                                <td>{{ $visit->school_name }}</td>
                                <td>{{ $visit->total_book_order }}</td>
                                <td>₹{{ $visit->total_book_payment }}</td>
                                <td>{{ $visit->total_admission }}</td>
                                <td>₹{{ $visit->total_admission_payment }}</td>
                                <td>
                                    <a href="{{ route('taluka.visit.edit', $visit->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('taluka.visit.destroy', $visit->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $visits->links() }}
                </div>
               </div>
        </div>
    </div>
</section>
@endsection