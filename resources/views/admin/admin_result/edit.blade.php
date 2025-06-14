@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Result</h1>
    </div>
    
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.admin-result.update', $adminResult->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Exam Name</label>
                                <input type="text" name="exam_name" class="form-control" value="{{ $adminResult->exam_name }}" required>
                            </div>
                        </div>    
                        @php
                        $selectedStandards = old('standard', isset($adminResult) ? explode(',', $adminResult->standard) : []);
                    @endphp

                    <div class="form-group mb-3">
                        <label for="standard">Standard</label>
                        <select name="standard[]" class="form-control select2" multiple="multiple" required>
                            @foreach($standards as $standard)
                                <option value="{{ $standard->standard }}"
                                    {{ in_array($standard->standard, $selectedStandards) ? 'selected' : '' }}>
                                    {{ $standard->standard }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                <div class="col-md-12">
                    <div class="form-group mb-3 ">
                        <label>Logo 1</label>
                        <img src="{{asset(@$adminResult->logo)}}" width="150px" alt="">
                        <input type="file" class="form-control" name="logo" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3 ">
                        <label>Logo 2</label>
                        <img src="{{asset(@$adminResult->logo_2)}}" width="150px" alt="">
                        <input type="file" class="form-control" name="logo_b" >
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3 ">
                        <label>Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ $adminResult->heading }}" required >
                    </div>
                </div>

                <!-- <div class="col-md-12">

                    <div class="form-group mb-3 ">
                        <label>Sign</label>
                        <img src="{{asset(@$adminResult->sign)}}" width="150px" alt="">
                        <input type="file" class="form-control" name="sign" >
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="form-group mb-3 ">
                        <label>Paper 1 Marks</label>
                        <input type="number" name="paper1_marks" class="form-control" value="{{ $adminResult->paper1_marks }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3 ">
                        <label>Paper 2 Marks</label>
                        <input type="number" name="paper2_marks" class="form-control" value="{{ $adminResult->paper2_marks }}" required>
                    </div>
                </div>
  
                <div class="col-md-12">
                    <div class="form-group mb-3 ">
                        <label>Director 1</label>
                        <input type="text" name="director1_name" class="form-control" value="{{ $adminResult->director1_name }}" required>
                    </div>
                </div>

<div class="col-md-12">
                <div class="form-group mb-3 ">
                    <label>Director1 Sign</label>
                    <img src="{{asset(@$adminResult->director1_sign)}}" width="150px" alt="">
                    <input type="file" class="form-control" name="director1_sign" >
                </div>

                </div>

<div class="col-md-12">

                <div class="form-group mb-3 ">
                    <label>Director 2</label>
                    <input type="text" name="director2_name" class="form-control" value="{{ $adminResult->director2_name }}" required>
                </div>
                </div>

<div class="col-md-12">
                <div class="form-group mb-3 ">
                    <label>Director2 Sign</label>
                    <img src="{{asset(@$adminResult->director1_sign)}}" width="150px" alt="">
                    <input type="file" class="form-control" name="director2_sign" >
                </div>
</div>

                            
                          
                    </div>

                    <div class="text-end">
                      
                        <button type="submit" class="btn btn-primary">Update Result</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Select Standard",
            allowClear: true
        });
    });
</script>



@endsection
