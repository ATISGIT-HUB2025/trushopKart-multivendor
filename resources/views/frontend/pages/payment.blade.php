@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Payment
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
                    <h4>payment</h4>
                    <ul>
                        <li><a href="{{route('home')}}">home</a></li>
                        <li><a href="javascript:;">payment</a></li>
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
        PAYMENT PAGE START
    ==============================-->
<section id="wsus__cart_view">
    <div class="container">
        <div class="wsus__pay_info_area">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="wsus__payment_menu" id="sticky_sidebar">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            {{-- <button class="nav-link common_btn active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">card payment</button> --}}

                            <button class="nav-link common_btn active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-paypal" type="button" role="tab" aria-controls="v-pills-paypal"
                                aria-selected="true">Paypal</button>

                            <button class="nav-link common_btn" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-stripe" type="button" role="tab"
                                aria-controls="v-pills-stripe" aria-selected="false">Stripe</button>

                            <button class="nav-link common_btn" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-razorpay" type="button" role="tab"
                                aria-controls="v-pills-stripe" aria-selected="false">RazorPay</button>

                            <button class="nav-link common_btn" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-cod" type="button" role="tab"
                                aria-controls="v-pills-stripe" aria-selected="false">COD</button>


                        </div>

                        <style>


                            .discount-option {
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            padding: 5px 0;
                            }

                            .discount-option label {
                            font-weight: bold;
                            }


                            </style>
                            <?php if(!empty($admissionFee)){ ?>
                            <div class="mt-5" id="sticky_sidebar" style="
                                                                border-top: 1px solid black;
                                                                padding-top: 37px;
                                                            ">
                            <h5>Get Discount</h5>
                            <div class="mt-2">
                            @php
                            $admissionFee = Session::get('admission_fee');
                            @endphp
                            <div class="discount-option">
                                <label for="year_1">1 Year</label>
                                <input type="radio" id="year_1" name="fav_language" value="1" checked="checked">
                                <b class="discount-option">No Discount</b>
                            </div>
                            <div class="discount-option">
                                <label for="year_2">2 Year</label>
                                <input type="radio" id="year_2" name="fav_language" value="2" @if(!empty($admissionFee) && $admissionFee['discount'] == 5) checked @endif>
                                <b class="discount-option">5%</b>
                            </div>
                            <div class="discount-option">
                                <label for="year_4">4 Year</label>
                                <input type="radio" id="year_4" name="fav_language" value="4" @if(!empty($admissionFee) && $admissionFee['discount'] == 10) checked @endif>
                                <b class="discount-option">10%</b>
                            </div>
                            <div class="discount-option">
                                <label for="year_6">6 Year</label>
                                <input type="radio" id="year_6" name="fav_language" value="6" @if(!empty($admissionFee) && $admissionFee['discount'] == 15) checked @endif>
                                <b class="discount-option">15%</b>
                            </div>
                            <div class="discount-option">
                                <label for="year_8">8 Year</label>
                                <input type="radio" id="year_8" name="fav_language" value="8" @if(!empty($admissionFee) && $admissionFee['discount'] == 20) checked @endif>
                                <b class="discount-option">20%</b>
                            </div>
                            <div class="discount-option">
                                <label for="year_10">10 Year</label>
                                <input type="radio" id="year_10" name="fav_language" value="10" @if(!empty($admissionFee) && $admissionFee['discount'] == 25) checked @endif>
                                <b class="discount-option">25%</b>
                            </div>
                            </div>
                            </div>

                            <?php } ?>
                    </div>
                   

                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="tab-content" id="v-pills-tabContent" id="sticky_sidebar">


                        <div class="tab-pane fade show active" id="v-pills-paypal" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-xl-12 m-auto">
                                    <div class="wsus__payment_area">
                                        <a class="nav-link common_btn text-center" href="{{route('user.paypal.payment')}}">Pay with Paypal</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('frontend.pages.payment-gateway.stripe')

                        @include('frontend.pages.payment-gateway.razorpay')

                        @include('frontend.pages.payment-gateway.cod')



                    </div>
                </div>


                @php
                $admissionFee = Session::get('admission_fee');
                $totalFee = isset($admissionFee['total_fee']) ? $admissionFee['total_fee'] : 0;
                @endphp

                <div class="col-xl-4 col-lg-4">
                    <div class="wsus__pay_booking_summary" id="sticky_sidebar2">
                        <h5>Order Summary</h5>
                        @if(isset($payment_type) && $payment_type === 'admission')
                        <div class="wsus__pay_booking_summary">
                            <h5>Admission Fee Details</h5>
                            <p>Base Fee : <span id="base_fee">{{$settings->currency_icon}}{{$admissionFee['base_fee']}}</span></p>
                            <p>Additional Fee : <span id="additional_fee">{{$settings->currency_icon}}{{$admissionFee['additional_fee']}}</span></p>
                            <p>Discount : <span id="discount">{{$admissionFee['discount']}}%</span></p>
                            <h6>Total <span id="total_fee">{{$settings->currency_icon}}{{$totalFee}}</span></h6>
                        </div>
                        @elseif(isset($payment_type) && $payment_type === 'reexam')
            <div class="wsus__pay_booking_summary">
                <h5>Re-Exam Fee Details</h5>
                <p>Re-Exam Fee : <span>{{$settings->currency_icon}}200</span></p>
                <h6>Total <span>{{$settings->currency_icon}}200</span></h6>
            </div>
                        @else
                        <p>subtotal : <span>{{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                        <p>shipping fee(+) : <span>{{$settings->currency_icon}}{{getShppingFee()}}</span></p>
                        <p>coupon(-) : <span>{{$settings->currency_icon}}{{getCartDiscount()}}</span></p>
                        <h6>total <span>{{$settings->currency_icon}}{{getFinalPayableAmount()}}</span></h6>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!--============================
        PAYMENT PAGE END
    ==============================-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php if(!empty($admissionFee)){ ?>
    <script>
    $(document).ready(function() {
        const discounts = {
            2: 5,
            4: 10,
            6: 15,
            8: 20,
            10: 25
        };

        $('input[name="fav_language"]').change(function() { 
            const years = $(this).val();
            const discount = discounts[years] || 0;

            const baseFee = parseFloat({{$admissionFee['base_fee']}});
            const additionalFee = parseFloat({{$admissionFee['additional_fee']}});
            const totalFee = baseFee + additionalFee;

            const discountAmount = totalFee * (discount / 100);
            const discountedTotal = totalFee - discountAmount;
            const examType = '{{ $admissionFee['exam_type'] }}';


            $('#discount').text(discount + '%');
            $('#total_fee').text('{{$settings->currency_icon}}' + discountedTotal.toFixed(2));

             // AJAX call to set discountedTotal in session
             $.ajax({
                url: '{{ route("set_discounted_total") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    discounted_total: discountedTotal,
                    exam_type:examType,
                    discount:discount
                },
                success: function(response) {
                    console.log('Session updated successfully');
                    location.reload();
                }
            });


        });
    });
</script>

<?php } ?>

@endsection