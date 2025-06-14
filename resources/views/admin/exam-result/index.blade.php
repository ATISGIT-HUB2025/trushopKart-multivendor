@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Exam Results</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Results</h4>
                    </div>
                    <div class="card-body">
                        <!-- Filter Form -->
                        <form action="{{ route('admin.exam-results.index') }}" method="GET" class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="student_name" class="form-control" placeholder="Student Name" value="{{ request('student_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="">All Status</option>
                                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Passed</option>
                                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Failed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="{{ request('start_date') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" name="end_date" class="form-control" placeholder="End Date" value="{{ request('end_date') }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>


                                <div class="text-right mb-3 ml-3">
                                    <select name="performance_filter" id="performanceFilter" class="form-control d-inline-block" style="width: auto; margin-right: 10px;">
                                        <option value="">All Results</option>
                                        <option value="top10">Top 10 Performers</option>
                                        <option value="bottom10">Bottom 10 Performers</option>
                                    </select>

                                    <a href="{{ route('admin.exam-results.export', request()->all()) }}?type=pdf" class="btn btn-primary">
                                        <i class="fas fa-download"></i> Download PDF
                                    </a>
                                </div>


                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Student Name</th>
                                        <th>Exam Name</th>
                                        <th>Total Questions</th>
                                        <th>Correct Answers</th>
                                        <th>Wrong Answers</th>
                                        <th>Obtained Marks</th>
                                        <th>Status</th>
                                        <th>Completion Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $result)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$result->user->name}}</td>
                                        <td>{{$result->exam->name}}</td>
                                        <td>{{$result->total_questions}}</td>
                                        <td>{{$result->correct_answers}}</td>
                                        <td>{{$result->wrong_answers}}</td>
                                        <td>{{$result->obtained_marks}}</td>
                                        <td>
                                            @if($result->passed)
                                            <span class="badge badge-success">Passed</span>
                                            @else
                                            <span class="badge badge-danger">Failed</span>
                                            @endif
                                        </td>
                                        <td>{{$result->completed_at->format('d M Y, h:i A')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$results->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


<script>
    document.getElementById('performanceFilter').addEventListener('change', function() {
        // Get current URL
        let url = new URL(window.location.href);
        let params = new URLSearchParams(url.search);

        // Update or add the performance_filter parameter
        params.set('performance_filter', this.value);

        // Reload page with new filter
        window.location.href = `${url.pathname}?${params.toString()}`;
    });
</script>