@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit School Information</h1>
    </div>
    
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.school-info.update', $primaryresult->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sr. No</label>
                                <input type="text" name="sr_no" class="form-control" value="{{ $primaryresult->sr_no }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Division</label>
                                <input type="text" name="division" class="form-control" value="{{ $primaryresult->division }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>District</label>
                                <input type="text" name="district" class="form-control" value="{{ $primaryresult->district }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Taluka</label>
                                <input type="text" name="taluka" class="form-control" value="{{ $primaryresult->taluka }}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cluster</label>
                                <input type="text" name="cluster" class="form-control" value="{{ $primaryresult->cluster }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>UDISE</label>
                                <input type="text" name="udise" class="form-control" value="{{ $primaryresult->udise }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>School Name</label>
                                <input type="text" name="school_name" class="form-control" value="{{ $primaryresult->school_name }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Village/Town</label>
                                <input type="text" name="village_town" class="form-control" value="{{ $primaryresult->village_town }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.school-info.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update School</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
