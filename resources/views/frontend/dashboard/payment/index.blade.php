@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Applycation
@endsection

@section('content')
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Payment History</h3>
            
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Transaction ID</th>
                    <th>Exam Type</th>
                    <th>Admission Fee</th>
                    <th>Additional Fee</th>
                    <th>Total Fee</th>
                    <th>Payment Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($admissions as $admission)
                    <tr>
                      <td>{{ $admission->transaction_id }}</td>
                      <td>{{ $admission->exam_type }}</td>
                      <td>₹{{ $admission->admission_fee }}</td>
                      <td>₹{{ $admission->additional_fee }}</td>
                      <td>₹{{ $admission->total_fee }}</td>
                      <td>
                        <span class="badge bg-{{ $admission->payment_status == 'paid' ? 'success' : 'warning' }}">
                          {{ ucfirst($admission->payment_status) }}
                        </span>
                      </td>
                      <td>{{ $admission->created_at->format('d M, Y') }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center">No transaction records found</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection