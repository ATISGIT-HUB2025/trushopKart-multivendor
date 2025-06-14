@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Result</h1>
    </div>
    
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.result.update', $primaryresult->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $primaryresult->name }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>First Paper Marks</label>
                                <input type="number" name="first_paper" class="form-control" value="{{ $primaryresult->first_paper }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Second Paper Marks</label>
                                <input type="number" name="second_paper" class="form-control" value="{{ $primaryresult->second_paper }}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Marks</label>
                                <input type="number" name="total_marks" class="form-control" value="{{ $primaryresult->total_marks }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Percentage</label>
                                <input type="number" step="0.01" name="percentage" class="form-control" value="{{ $primaryresult->percentage }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.result.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Result</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
