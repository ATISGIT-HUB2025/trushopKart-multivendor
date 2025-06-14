@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Event Participation Details</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashbaord') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.event-participations.index') }}">Event Participations</a></div>
            <div class="breadcrumb-item">Details</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Participation Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">ID</th>
                                    <td>{{ $eventParticipation->id }}</td>
                                </tr>
                                <tr>
                                    <th>Participant Name</th>
                                    <td>{{ $eventParticipation->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $eventParticipation->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $eventParticipation->phone ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Event</th>
                                    <td>{{ $eventParticipation->event->title }}</td>
                                </tr>
                                <tr>
                                    <th>Event Date</th>
                                    <td>{{ $eventParticipation->event->start_datetime->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Event Location</th>
                                    <td>{{ $eventParticipation->event->location }}</td>
                                </tr>
                                <tr>
                                    <th>Registration Date</th>
                                    <td>{{ $eventParticipation->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Additional Information</th>
                                    <td>{{ $eventParticipation->additional_info ?: 'None provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($eventParticipation->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($eventParticipation->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($eventParticipation->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @elseif($eventParticipation->status == 'attended')
                                            <span class="badge bg-info">Attended</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Status</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.event-participations.update-status', $eventParticipation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="pending" {{ $eventParticipation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $eventParticipation->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $eventParticipation->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="attended" {{ $eventParticipation->status == 'attended' ? 'selected' : '' }}>Attended</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block">Update Status</button>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h4>Event Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>Event:</strong> {{ $eventParticipation->event->title }}
                        </div>
                        <div class="mb-2">
                            <strong>Start Date:</strong> {{ $eventParticipation->event->start_datetime->format('d M Y, h:i A') }}
                        </div>
                        <div class="mb-2">
                            <strong>End Date:</strong> {{ $eventParticipation->event->end_datetime->format('d M Y, h:i A') }}
                        </div>
                        <div class="mb-2">
                            <strong>Location:</strong> {{ $eventParticipation->event->location }}
                        </div>
                        <div>
                            <a href="{{ route('admin.events.edit', $eventParticipation->event_id) }}" class="btn btn-sm btn-info mt-3">
                                <i class="fas fa-edit"></i> Edit Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
