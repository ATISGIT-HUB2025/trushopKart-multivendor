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
            <div class="card">
                <div class="card-header">Add New School Visit</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('taluka.visit.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="school_name" class="form-label">School Name</label>
                            <input type="text" class="form-control @error('school_name') is-invalid @enderror" 
                                id="school_name" name="school_name" value="{{ old('school_name') }}" required>
                            @error('school_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_book_order" class="form-label">Total Book Orders</label>
                            <input type="number" class="form-control @error('total_book_order') is-invalid @enderror" 
                                id="total_book_order" name="total_book_order" value="{{ old('total_book_order') }}" required>
                            @error('total_book_order')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_book_payment" class="form-label">Total Book Payment</label>
                            <input type="number" step="0.01" class="form-control @error('total_book_payment') is-invalid @enderror" 
                                id="total_book_payment" name="total_book_payment" value="{{ old('total_book_payment') }}" required>
                            @error('total_book_payment')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_admission" class="form-label">Total Admissions</label>
                            <input type="number" class="form-control @error('total_admission') is-invalid @enderror" 
                                id="total_admission" name="total_admission" value="{{ old('total_admission') }}" required>
                            @error('total_admission')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_admission_payment" class="form-label">Total Admission Payment</label>
                            <input type="number" step="0.01" class="form-control @error('total_admission_payment') is-invalid @enderror" 
                                id="total_admission_payment" name="total_admission_payment" value="{{ old('total_admission_payment') }}" required>
                            @error('total_admission_payment')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save Visit</button>
                        <a href="{{ route('taluka.visit') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
