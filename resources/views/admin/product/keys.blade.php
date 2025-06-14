@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Keys</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">

                  
          @php
    if ($pendingKeysCount <= 5) {
        $alertClass = 'alert-danger'; // Red
        $icon = '🔴';
    } elseif ($pendingKeysCount <= 20) {
        $alertClass = 'alert-warning'; // Orange
        $icon = '🟠';
    } else {
        $alertClass = 'alert-primary'; // Blue
        $icon = '🔵';
    }
@endphp

<div class="col-12 mb-4">
    <div class="alert {{ $alertClass }} d-flex align-items-center justify-content-between shadow-sm" role="alert" style="font-size: 1.1rem;">
        <div class="d-flex align-items-center">
            <span style="font-size: 1.5rem; margin-right: 10px;">{{ $icon }}</span>
            <div>
                <strong>{{ $pendingKeysCount }}</strong> product license key{{ $pendingKeysCount == 1 ? '' : 's' }} pending (Unassigned).
            </div>
        </div>
        {{-- <a href="" class="btn btn-light btn-sm border">
            View Details
        </a> --}}
    </div>
</div>


                  <div class="card-header">
                    <h4>All Products Keys</h4>
                    <div class="card-header-action">
                        <a download="" href="{{ url('/sample/licence_keys_sample.csv') }}" class="btn btn-primary"><i class="fas fa-download mr-2"></i>Download Sample File</a>
                    </div>
                  </div>
                  <div class="card-body">
                     @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

   <form method="POST" enctype="multipart/form-data" class="p-3  shadow-sm d-flex  align-items-center">
    @csrf
    <div class="form-group">
        <label for="csv_file">Upload CSV File</label>
        <input type="file" class="form-control-file" id="csv_file" name="csv_file" required>
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-upload"></i> Upload
    </button>
</form>

                  </div>

                  <div class="card-body">
                    {{ $dataTable->table() }}
                  </div>


                </div>
              </div>
            </div>

          </div>
        </section>

@endsection



@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    @endpush
