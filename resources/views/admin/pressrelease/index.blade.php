@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
  <div class="section-header">
    <h1>Certificates</h1>
  </div>
  <div class="section-body">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>All Certificates</h4>
            <div class="card-header-action">
              <a href="/admin/pressrelease/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create New
              </a>
            </div>
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
{!! $dataTable->scripts() !!}

<script>
  $(document).on('change', '.change-status', function () {
    var certificateId = $(this).data('id');
    var status = $(this).is(':checked') ? 1 : 0;

    $.ajax({
      url: '{{ route("admin.pressrelease.change-status") }}',
      method: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        id: certificateId,
        status: status
      },
      success: function (response) {
        toastr.success(response.message);
      },
      error: function () {
        toastr.error('Something went wrong.');
      }
    });
  });
</script>
@endpush
