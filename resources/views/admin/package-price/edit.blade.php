@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>{{ isset($packagePrice) ? 'Update Package Price' : 'Create Package Price' }}</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ isset($packagePrice) ? 'Update Package Price' : 'Create Package Price' }}</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ isset($packagePrice) ? route('admin.package-price.update', $packagePrice->id) : route('admin.package-price.store') }}" method="POST">
                        @csrf
                        @if(isset($packagePrice))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="inputState">Package Name</label>
                            <input type="text" class="form-control" name="package_name" value="{{ $packagePrice->package_name ?? '' }}">
                            <!-- <select id="inputState" class="form-control" name="package_name">
                              <option value="complete" {{ (isset($packagePrice) && $packagePrice->package_name == 'complete') ? 'selected' : '' }}>Complete</option>
                              <option value="guide" {{ (isset($packagePrice) && $packagePrice->package_name == 'guide') ? 'selected' : '' }}>Guidance</option>
                              <option value="practice" {{ (isset($packagePrice) && $packagePrice->package_name == 'practice') ? 'selected' : '' }}>Practice</option>
                              <option value="basic" {{ (isset($packagePrice) && $packagePrice->package_name == 'basic') ? 'selected' : '' }}>Basic</option>
                            </select> -->
                        </div>
                        <div class="form-group">
                            <label>Package Title</label>
                            <input type="text" class="form-control" name="package_title" value="{{ $packagePrice->package_title ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Button Name</label>
                            <input type="text" class="form-control" name="button_name" value="{{ $packagePrice->button_name ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $packagePrice->price ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Facility</label>
                            <div class="row">
                            <div class="col-4">
                            <input type="text" class="form-control" name="facility_1" value="{{ $packagePrice->facility_1 ?? '' }}">
                          </div>
                          <div class="col-4">
                          <input type="text" class="form-control" name="facility_2" value="{{ $packagePrice->facility_2 ?? '' }}">
                          </div>
                          <div class="col-4">
                          <input type="text" class="form-control" name="facility_3" value="{{ $packagePrice->facility_3 ?? '' }}">
                          </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-4">
                            <input type="text" class="form-control" name="facility_4" value="{{ $packagePrice->facility_4 ?? '' }}">
                          </div>
                          <div class="col-4">
                          <input type="text" class="form-control" name="facility_5" value="{{ $packagePrice->facility_5 ?? '' }}">
                          </div>
                          </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">{{ isset($packagePrice) ? 'Update' : 'Create' }}</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
