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
                  <div class="card-header">
                    <h4>Product Keys Edit</h4>
                    <div class="card-header-action">
                    </div>
                  </div>
                  <div class="card-body">
                     @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

   <form method="POST" enctype="multipart/form-data" class="p-3  shadow-sm d-flex  align-items-center">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
        <label for="csv_file">Sr No</label>
        <input type="text" class="form-control" id="sr_no" value="{{ $productKey->sr_no }}" name="sr_no" required>
    </div>

    <div class="form-group col-md-6">
        <label for="csv_file">Product Key</label>
        <input type="text" class="form-control" id="product_key" value="{{ $productKey->product_key }}" name="product_key" required>
    </div>
  <div class="col-md-6">
      <button type="submit" class="btn btn-primary">
         Update
    </button>
  </div>
    </div>
</form>

                  </div>



                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
