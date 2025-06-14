@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>School For Visiting</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>School For Visiting</h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <tr>
                                            <th class="fw-bold">ID</th>
                                            <th class="fw-bold">Date</th>
                                            <th class="fw-bold">Visit SR.NO.</th>
                                            <th class="fw-bold">Start Time Traveling</th>
                                            <th class="fw-bold">End Time Traveling</th>
                                            <th class="fw-bold">District</th>
                                            <th class="fw-bold">Taluka</th>
                                            <th class="fw-bold">Village</th>
                                            <th class="fw-bold">School Name</th>
                                            <th class="fw-bold">HM Name</th>
                                            <th class="fw-bold">Mobile NO.</th>
                                            <th class="fw-bold">Total Students</th>
                                            <th class="fw-bold">Std Marathi</th>
                                            <th class="fw-bold">Std Semi</th>
                                            <th class="fw-bold">Std English</th>
                                            <th class="fw-bold">Final Marathi</th>
                                            <th class="fw-bold">Final Semi</th>
                                            <th class="fw-bold">Final English</th>
                                            <th class="fw-bold">Total Bill</th>
                                            <th class="fw-bold">Online Bill</th>
                                            <th class="fw-bold">Cash Bill</th>
                                            <!-- <th class="fw-bold">Actions</th> -->
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($schoolForVisitings as $key => $schoolForVisiting)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $schoolForVisiting->date }}</td>
                                            <td>{{ $schoolForVisiting->visit_sr_no }}</td>
                                            <td>{{ $schoolForVisiting->traveling_start_time }}</td>
                                            <td>{{ $schoolForVisiting->traveling_end_time }}</td>
                                            <td>{{ $schoolForVisiting->district }}</td>
                                            <td>{{ $schoolForVisiting->taluka }}</td>
                                            <td>{{ $schoolForVisiting->village }}</td>
                                            <td>{{ $schoolForVisiting->school_name }}</td>
                                            <td>{{ $schoolForVisiting->hm_name }}</td>
                                            <td>{{ $schoolForVisiting->mobile_no }}</td>
                                            <td>{{ $schoolForVisiting->total_students }}</td>
                                            <td>{{ $schoolForVisiting->std_marathi }}</td>
                                            <td>{{ $schoolForVisiting->std_semi }}</td>
                                            <td>{{ $schoolForVisiting->std_english }}</td>
                                            <td>{{ $schoolForVisiting->final_marathi }}</td>
                                            <td>{{ $schoolForVisiting->final_semi }}</td>
                                            <td>{{ $schoolForVisiting->final_english }}</td>
                                            <td>{{ $schoolForVisiting->total_bill }}</td>
                                            <td>{{ $schoolForVisiting->online_bill }}</td>
                                            <td>{{ $schoolForVisiting->cash_bill }}</td>
                                            
                                           
                                            <!-- <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('state_head.accessmanagement.edit', $schoolForVisiting->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit me-1"></i>Edit
                                                    </a>
                                                    <form action="{{ route('state_head.accessmanagement.destroy', $schoolForVisiting->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger ms-1"
                                                            onclick="return confirm('Are you sure you want to delete this employee?')">
                                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td> -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).on('click', '.delete-hed', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let url = `center-had/${id}`;

        if (confirm('Are you sure you want to delete this item?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Something went wrong!');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        }
    });
</script>

</script>
@endpush