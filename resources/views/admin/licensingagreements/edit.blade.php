@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
  <div class="section-header">
    <h1>Edit Licensing Agreement</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Update Licensing Agreement</h4>
          </div>

          <div class="card-body">
            <form action="{{ route('admin.licensingagreements.update', $certificate->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $certificate->title) }}" required>
              </div>

              <button type="submit" class="btn btn-primary">Update Licensing Agreement</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
// You can add scripts here if needed later
</script>
@endpush
