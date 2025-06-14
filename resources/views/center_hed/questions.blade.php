@extends('center_hed.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('center_hed.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard">
            <div class="row g-4">
    <!-- Statistics Cards -->
    <div class="col-12 mb-4">
        <div class="row g-3">
        <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Exams Question</h4>
                        <div class="card-header-action" style="
    text-align: right;
">
                        <a href="{{ route('center_hed.exam.questions.pdf') }}" class="btn btn-primary">
    <i class="fas fa-download"></i> Download PDF
</a>

                        </div>
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Exam</th>
                                        <th>Question</th>
                                        <th>marks</th>
                                       
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($questions as $question)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$question->exam->name}}</td>
                                        <td>{{$question->question}}</td>
                                        <td>{{$question->marks}}</td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    border-radius: 15px;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important;
}

.stat-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bg-primary-subtle { background-color: rgba(13, 110, 253, 0.1); }
.bg-warning-subtle { background-color: rgba(255, 193, 7, 0.1); }
.bg-success-subtle { background-color: rgba(25, 135, 84, 0.1); }
.bg-info-subtle { background-color: rgba(13, 202, 240, 0.1); }

.progress {
    border-radius: 10px;
    background-color: #f0f2f5;
}

.card-body {
    position: relative;
    z-index: 1;
}

.card-body::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1));
    z-index: -1;
}
</style>


              

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
