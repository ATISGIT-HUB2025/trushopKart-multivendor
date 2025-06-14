@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Photo Gallery</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Photo</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.photo-gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Upload</button>
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
</script>
@endpush
