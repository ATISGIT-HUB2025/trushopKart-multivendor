@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Complaint Details</h1>
    </div>
    
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                            @if($complaint->user)
                                <tr>
                                    <th width="200">Student Name</th>
                                    <td>{{ $complaint->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Student Email</th>
                                    <td>{{ $complaint->user->email }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th width="200">Submitted By</th>
                                    <td>Guest User</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Subject</th>
                                    <td>{{ $complaint->subject }}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>{{ $complaint->message }}</td>
                                </tr>
                                <tr>
                                    <th>Barcode</th>
                                    <td>{{ $complaint->barcode ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>
                                        @if($complaint->image)
                                        <img src="{{ asset($complaint->image) }}" alt="Complaint Image" style="max-width: 200px">
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <form action="{{ route('admin.complaints.update-status', $complaint->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex flex-column gap-2">
                                                <select name="status" class="form-control" style="width: 200px">
                                                    <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                    <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary" style="width: 200px">Update Status</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection