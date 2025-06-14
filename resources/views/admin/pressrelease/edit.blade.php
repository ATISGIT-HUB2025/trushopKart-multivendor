@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
  <div class="section-header">
    <h1>Edit Certificate</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Update Certificate</h4>
          </div>

          <div class="card-body">
            <form action="{{ route('admin.pressrelease.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $certificate->title) }}">
              </div>

              <div class="form-group">
                <label>Current Image</label><br>
                <img src="{{ asset($certificate->image) }}" width="200px" alt="Certificate Image" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); border-radius: 8px;">
              </div>

              <div class="form-group">
                <label>Upload New Image (optional)</label>
                <input type="file" class="form-control" name="image">
              </div>

              <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_desc" class="form-control summernote" rows="4">{{ old('short_desc', $certificate->short_desc) }}</textarea>
              </div>

              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="1" {{ old('status', $certificate->status) == 1 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ old('status', $certificate->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Update Certificate</button>
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
