@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
@endsection


@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Request Form</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">Partner Request Form</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CONTACT PAGE START
    ==============================-->
    <section id="wsus__contact">
        <div class="container">
            <div class="wsus__contact_area">
                <div class="row">
                    <div class="col-xl-2">
                        <div class="row">
                           
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="wsus__contact_question">
                            <h5>Send Us Request For Partner Access</h5>
                            <form id="contact-form">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter first name">
                                </div>

                                <div class="mb-3">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter last name">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                </div>

                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile number">
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" id="address" rows="2" placeholder="Enter address"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject">
                                </div>

                                <div class="mb-3">
                                    <label for="details" class="form-label">Details</label>
                                    <textarea name="details" class="form-control" id="details" rows="4" placeholder="Enter details of your request"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment <small>(optional note)</small></label>
                                    <textarea name="comment" class="form-control" id="comment" rows="3" placeholder="Leave a comment (optional)"></textarea>
                                </div>

                                <button type="submit" id="form-submit" class="btn btn-primary">Send Now</button>
                            </form>

                        </div>
                    </div>
                    <!-- <div class="col-xl-12">
                        <div class="wsus__con_map">
                            <iframe
                                src="{{$settings->map}}"
                                width="1600" height="450" style="border:0;" allowfullscreen="100"
                                loading="lazy"></iframe>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CONTACT PAGE END
    ==============================-->
@endsection

@push('scripts')
<script>
      $('#form-submit').text('Send Now');
                  $(document).ready(function(){
        $('#contact-form').on('submit', function(e){
            e.preventDefault();
            let data = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: "{{ route('request_submit') }}",
                data: data,
                beforeSend: function(){
                    $('#form-submit').text('Sending...');
                    $('#form-submit').attr('disabled', true);
                },
                success: function(data){
                    if(data.status === 'success'){
                        toastr.success(data.message);
                        $('#contact-form')[0].reset();
                    }
                    $('#form-submit').text('Send Now');
                    $('#form-submit').attr('disabled', false);
                },
                error: function(data){
                    if (data.responseJSON?.errors) {
                        $.each(data.responseJSON.errors, function(key, value){
                            toastr.error(value);
                        });
                    } else if (data.responseJSON?.message) {
                        toastr.error(data.responseJSON.message);
                    } else {
                        toastr.error('Something went wrong. Please try again.');
                    }

                    $('#form-submit').text('Send Now');
                    $('#form-submit').attr('disabled', false);
                }

            });
        });
    });
</script>

@endpush
