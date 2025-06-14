@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
  <div class="section-header">
    <h1>Licensing Agreements</h1>
  </div>
  <div class="section-body">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>All Licensing Agreements</h4>
            <div class="card-header-action">
              <a href="{{ route('admin.licensingagreements.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Licensing Agreement
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
    var itemId = $(this).data('id');
    var status = $(this).is(':checked') ? 1 : 0;

    $.ajax({
      url: '{{ route("admin.licensingagreements.change-status") }}',
      method: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        id: itemId,
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
