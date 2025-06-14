@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Divisions</h1>
    </div>
    <div class="card-body">
      

            <style>
                #meritFilter {
                    padding: 0.6rem;
                    font-size: 0.95rem;
                    transition: all 0.3s ease;
                }

                #meritFilter:focus {
                    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
                }

                .input-group-text {
                    border: 1px solid #0d6efd;
                }

                .btn-group .btn {
                    padding: 0.6rem 1.2rem;
                    font-weight: 500;
                }

                .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 25px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 25px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 4px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #28a745;
}

input:checked + .slider:before {
    transform: translateX(24px);
}

            </style>




            <div class="card-body">

            <button type="button" id="activateAll" class="btn btn-success mb-3">All Active</button>
            <button type="button" id="deactivateAll" class="btn btn-danger mb-3">All Inactive</button>

                <table class="table table-bordered" id="resultsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Division Name</th>
                            <th>Status</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($divisions as $key => $result)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $result->division }}</td>
                            <td>
            <label class="switch">
                <input type="checkbox" class="toggle-status" data-id="{{ $result->division }}"
                    {{ $result->division_status ? 'checked' : '' }}>
                <span class="slider round"></span>
            </label>
        </td>



                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {
        $('#resultsTable').DataTable({
            lengthChange: true, 
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        pageLength: 10,
        dom: 'lfrtip' // 'l' ensures the length (entries) dropdown is shown
        });


    });

    $(document).on('change', '.toggle-status', function() { 
    var switchButton = $(this);
    var examCenter = switchButton.data('id');
    var newStatus = switchButton.prop('checked') ? 1 : 0;

    $.ajax({
        url: "{{ route('admin.division.status-change') }}", // Update this with your route
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            examCenter: examCenter,
            status: newStatus
        },
        success: function(data){
                        toastr.success(data.message)
                        
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
    });
});



$(document).ready(function () {
        // Activate all checkboxes
        $('#activateAll').click(function () {
            $('.toggle-status').prop('checked', true);
            updateStatusForAll(1);
        });

        // Deactivate all checkboxes
        $('#deactivateAll').click(function () {
            $('.toggle-status').prop('checked', false);
            updateStatusForAll(0);
        });

        // Function to update status via AJAX
        function updateStatusForAll(status) {
            let ids = [];
            $('.toggle-status').each(function () {
                ids.push($(this).data('id'));
            });

            $.ajax({
                url: "{{ route('admin.division.status-change') }}", // Change this to your actual endpoint
                method: 'POST',
                data: {
                    ids: ids,
                    status: status,
                    _token: '{{ csrf_token() }}' // CSRF Token for Laravel
                },
                success: function(data){
                        toastr.success(data.message)
                        setTimeout(function() {
    location.reload();
}, 2000); // 2000 milliseconds = 2 seconds

                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
            });
        }
    });



</script>


@endsection