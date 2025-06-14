@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Help Inquiry Details</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Category</th>
                                    <td>{{ $helpInquiry->category }}</td>
                                </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $helpInquiry->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $helpInquiry->email }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{ $helpInquiry->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Subject</th>
                                    <td>{{ $helpInquiry->subject }}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>{{ $helpInquiry->message }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $helpInquiry->is_read ? 'Read' : 'Unread' }}</td>
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
