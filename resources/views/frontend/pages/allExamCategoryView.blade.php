@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Exam Category
@endsection

@section('content')
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Select Your Exam Category</h4>
                    <ul>
                        <li><a href="{{route('home')}}">home</a></li>
                        <li><a href="javascript:;">exam categories</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row g-4">
        @foreach($examCategories as $exam)
            <div class="col-12">
                <div class="card shadow-sm exam-card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center p-3"
                        data-bs-toggle="collapse" data-bs-target="#exam{{$exam->id}}Details" role="button">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($exam->logo) }}" alt="{{$exam->name}}" class="me-3" style=" width:100px; height: 60px;">
                            <h5 class="mb-0">{{$exam->name}}</h5>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="collapse" id="exam{{$exam->id}}Details">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="text-primary mb-3">Exam Overview</h6>
                                    <p>{{$exam->description}}</p>

                                    <div class="mt-4">
                                        <h6 class="text-primary mb-3">Key Details</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-unstyled">
                                                    <li class="mb-2"><i class="fas fa-calendar-alt text-primary me-2"></i>
                                                        Exam Date: {{$exam->exam_date}}</li>
                                                    <li class="mb-2"><i class="fas fa-clock text-primary me-2"></i>
                                                        Duration: {{$exam->duration}}</li>
                                                    <li class="mb-2"><i class="fas fa-language text-primary me-2"></i>
                                                        Medium: {{$exam->medium}}</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled">
                                                    <li class="mb-2"><i class="fas fa-book text-primary me-2"></i>
                                                        Total Marks: {{$exam->total_marks}}</li>
                                                    <li class="mb-2"><i class="fas fa-users text-primary me-2"></i>
                                                        Eligibility: {{$exam->eligibility}}</li>
                                                    <li class="mb-2"><i class="fas fa-globe text-primary me-2"></i>
                                                        Mode: {{$exam->mode}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-start">
                                    <div class="text-center p-4">
                                        <h6 class="text-primary mb-3">Ready to Start?</h6>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="agree{{$exam->id}}" required>
                                            <label class="form-check-label" for="agree{{$exam->id}}">
                                                I agree to the exam terms and conditions
                                            </label>
                                        </div>
                                        <button class="btn btn-primary w-100 select-exam-btn" data-exam="{{$exam->name}}" disabled>
                                            Select This Exam
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<style>
    .exam-card {
        border-radius: 15px;
        overflow: hidden;
        border: none;
    }

    .card-header {
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .card-header:hover {
        background-color: #f8f9fa !important;
    }

    .select-exam-btn {
        border-radius: 25px;
        padding: 10px 25px;
    }

    .fa-chevron-down {
        transition: transform 0.3s ease;
    }

    .collapsed .fa-chevron-down {
        transform: rotate(-90deg);
    }
</style>

@push('scripts')
    <script>
        document.querySelectorAll('.form-check-input').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const btn = this.closest('.card-body').querySelector('.select-exam-btn');
                btn.disabled = !this.checked;
            });
        });

        document.querySelectorAll('.select-exam-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const exam = this.dataset.exam;
                window.location.href = "{{ route('admission-form') }}?exam=" + exam;
            });
        });
    </script>
@endpush
@endsection