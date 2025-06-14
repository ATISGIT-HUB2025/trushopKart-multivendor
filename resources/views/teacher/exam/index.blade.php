@extends('teacher.layouts.master')
@section('title')
    Exams Management
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('teacher.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-file-alt"></i> Exams</h3>
                    <div class="create_button">
                        <a href="{{route('teacher.exam.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create Exam</a>
                    </div>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function(){
            $('body').on('click', '.delete-item', function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            success: function(data){
                                if(data.status === 'success'){
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                }
                            }
                        });
                    }
                })
            })
        });
    </script>
@endpush
