@extends('admin.layouts.master')


@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Package</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Package</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.package-price.store')}}" method="POST">
                        @csrf
                      
                        <div class="form-group">
                            <label for="inputState">Package Name</label>
                            <input type="text" class="form-control" name="package_name" value="">
                            <!-- <select id="inputState" class="form-control" name="package_name">
                              <option value="complete">Complete</option>
                              <option value="guide">Guidance</option>
                              <option value="practice">Practice</option>
                              <option value="basic">Basic</option>
                            </select> -->
                        </div>
                        <div class="form-group">
                            <label>Package Title</label>
                            <input type="text" class="form-control" name="package_title" value="">
                        </div>
                        <div class="form-group">
                            <label>Button Name</label>
                            <input type="text" class="form-control" name="button_name" value="">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="">
                        </div>

                        <div class="form-group">
                            <label>Facility</label>
                            <div class="row">
                            <div class="col-4">
                              <input type="text" class="form-control" name="facility_1" value="">
                          </div>
                          <div class="col-4">
                              <input type="text" class="form-control" name="facility_2" value="">
                          </div>
                          <div class="col-4">
                              <input type="text" class="form-control" name="facility_3" value="">
                          </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-4">
                              <input type="text" class="form-control" name="facility_4" value="">
                          </div>
                          <div class="col-4">
                              <input type="text" class="form-control" name="facility_5" value="">
                          </div>
                          </div>
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
        $(document).ready(function(){
            $('body').on('change', '.main-category', function(e){
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.get-subcategories')}}",
                    data: {
                        id:id
                    },
                    success: function(data){
                        $('.sub-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })

        })
    </script>
@endpush
