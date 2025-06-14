@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Exam Result Upload</h1>
    </div>
    <div class="section-body">
        <div class="cart">
            <form action="{{ route('admin.admin-result.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3 ">
                    <label>Exam Name</label>
                    <input type="text" name="exam_name" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="standard">Standard</label>
                    <select name="standard[]" class="form-control select2" multiple="multiple" required>
                        @foreach($standards as $standard)
                            <option value="{{ $standard->standard }}" {{ collect(old('standard'))->contains($standard->standard) ? 'selected' : '' }}>
                                {{ $standard->standard }}
                            </option>
                        @endforeach
                    </select>
                </div>

                
                <div class="form-group mb-3 ">
                    <label>Logo 1</label>
                    <input type="file" name="logo" class="form-control" required>
                </div>
            
                <div class="form-group mb-3 ">
                    <label>Logo 2</label>
                    <input type="file" name="logo_b" class="form-control" required>
                </div>

                <div class="form-group mb-3 ">
                    <label>Heading</label>
                    <input type="text" name="heading" class="form-control" required>
                </div>

                <!-- <div class="form-group mb-3 ">
                    <label>Sign</label>
                    <input type="file" name="sign" class="form-control" required>
                </div> -->
                
                <div class="form-group mb-3 ">
                    <label>Paper 1 Marks</label>
                    <input type="number" name="paper1_marks" class="form-control" required>
                </div>
                
                <div class="form-group mb-3 ">
                    <label>Paper 2 Marks</label>
                    <input type="number" name="paper2_marks" class="form-control" required>
                </div>

                <div class="form-group mb-3 ">
                    <label>Director</label>
                    <input type="text" name="director1_name" class="form-control" required>
                </div>
                
                <div class="form-group mb-3 ">
                    <label>Director Sign</label>
                    <input type="file" name="director1_sign" class="form-control" required>
                </div>

                <div class="form-group mb-3 ">
                    <label>Administrator</label>
                    <input type="text" name="director2_name" class="form-control" required>
                </div>

                <div class="form-group mb-3 ">
                    <label>Administrator Sign</label>
                    <input type="file" name="director2_sign" class="form-control" required>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <!-- <div class="form-group mb-3 ">
                    <label>Upload Excel File</label>
                    <input type="file" name="excel_file" class="form-control" accept=".xlsx,.xls" required>
                </div>

                <div class="form-group">
                    <a href="{{ asset('sampleresultexcelnew.xlsx') }}" download class="btn btn-info">Download Sample Excel</a>
                    <button type="submit" class="btn btn-primary">Upload Result</button>
                </div> -->
            </form>
        </div>
    </div>

</section>

<!-- CSS for Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Standard",
            allowClear: true
        });
    });
</script>



@endsection