@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Awards</h1>

          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create award</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.awards.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        </div>

                      <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="short_desc" class="form-control summernote"></textarea>
                        </div>




                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Create</button>
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
