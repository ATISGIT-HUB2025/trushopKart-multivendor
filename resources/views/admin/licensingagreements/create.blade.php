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
                        <h4>Add Licensing Agreement</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.licensingagreements.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
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
