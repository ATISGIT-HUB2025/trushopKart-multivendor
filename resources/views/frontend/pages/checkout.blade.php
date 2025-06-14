@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Checkout
@endsection

@section('content')


<style>
.form-switch .form-check-input {
    width: 2.5em;
    height: 1.5em;
        border-radius: 21px !important;
}
.form-switch .form-check-label {
    margin-left: 0.5rem;
    font-weight: 500;
        margin-top: 4px;
}

.form-check.form-switch.mt-2 {
    position: relative;
    left: 18px;
}

 #redeem_info, #referral_redeem_info {
        border-radius: 10px;
        padding: 15px;
        margin-top: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        font-size: 14px;
    }

    #redeem_info {
        background-color: #e9f7ef;
        border: 1px solid #198754;
        color: #155724;
    }

    #referral_redeem_info {
        background-color: #e7f1ff;
        border: 1px solid #0d6efd;
        color: #0b5ed7;
    }

    .redeem-title {
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 8px;
    }

    .redeem-close {
        position: absolute;
        top: 8px;
        right: 12px;
        cursor: pointer;
        font-weight: bold;
        font-size: 18px;
    }

    .redeem-box {
        position: relative;
    }

    </style>

    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="javascript:;">check out</a></li>
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
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <div class="d-flex">
                                <h5>Shipping Details </h5>
                            <a href="javascript:;" style="margin-left:auto;" class="common_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                new address</a>
                            </div>

                            <div class="row">
                                @foreach ($addresses as $address)
                                <div class="col-xl-6">
                                    <div class="wsus__checkout_single_address">
                                        <div class="form-check">
                                            <input class="form-check-input shipping_address" data-id="{{$address->id}}" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Select Address
                                            </label>
                                        </div>
                                        <ul>
                                            <li><span>Name :</span> {{$address->name}}</li>
                                            <li><span>Phone :</span> {{$address->phone}}</li>
                                            <li><span>Email :</span> {{$address->email}}</li>
                                            <li><span>Country :</span> {{$address->country}}</li>
                                            <li><span>City :</span> {{$address->city}}</li>
                                            <li><span>Zip Code :</span> {{$address->zip}}</li>
                                            <li><span>Address :</span> {{$address->address}}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                   

<div class="wsus__order_details" id="sticky_sidebar">
    <p class="wsus__product">Payment Methods</p>
@php
    $inrPrice = $product->offer_price ?? $product->price;
    $coinPrice = $product->coin_price;
@endphp

  <!-- INR Option -->
    <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method"
               id="payment_inr"
               value="inr"
               data-price="{{ $inrPrice }}"
               data-coin="0"
               checked>
        <label class="form-check-label" for="payment_inr">
            Pay With INR <span>(GST 18% included)</span>
        </label>
    </div>

    <!-- MReward Points Option -->
    {{-- <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method"
               id="payment_points"
               value="points"
               data-price="0"
               data-coin="{{ $coinPrice }}">
        <label class="form-check-label" for="payment_points">
            Pay With MReward Points <span>(No GST)</span>
        </label>
    </div> --}}


                            {{-- @foreach ($shippingMethods as $method)
                                @if ($method->type === 'min_cost' && getCartTotal() >= $method->min_cost)
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="{{$method->id}}" data-id="{{$method->cost}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$method->name}}
                                            <span>cost: ({{$settings->currency_icon}}{{$method->cost}})</span>
                                        </label>
                                    </div>
                                @elseif ($method->type === 'flat_cost')
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="{{$method->id}}" data-id="{{$method->cost}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$method->name}}
                                            <span>cost: ({{$settings->currency_icon}}{{$method->cost}})</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach --}}

                            {{-- <div class="wsus__order_details_summery">
                                <p>subtotal: <span>{{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                                <p>shipping fee(+): <span id="shipping_fee">{{$settings->currency_icon}}0</span></p>
                                <p>coupon(-): <span>{{$settings->currency_icon}}{{getCartDiscount()}}</span></p>
                                <p><b>total:</b> <span><b id="total_amount" data-id="{{getMainCartTotal()}}">{{$settings->currency_icon}}{{getMainCartTotal()}}</b></span></p>
                            </div> --}}

                            <div class="wsus__order_details_summery">
        <p>Subtotal: <span>₹<span id="subtotal">{{ number_format($inrPrice, 2) }}</span></span></p>
        <p>GST (18%): <span>₹<span id="gst">0.00</span></span></p>
        <p><b>Total:</b> <span><b>₹<span id="total">0.00</span></b></span></p>
<div class="form-check form-switch mt-2">
    <input class="form-check-input" type="checkbox" id="redeemPointsCheckbox">
    <label class="form-check-label" for="redeemPointsCheckbox">Redeem MVoucher Points</label>
</div>
<div id="redeem_info" style="display: none;" class="mt-2"></div>

<div class="form-check form-switch mt-2">
    <input class="form-check-input" type="checkbox" id="redeemReferralCheckbox">
    <label class="form-check-label" for="redeemReferralCheckbox">Redeem with Referral Wallet</label>
</div>
<div id="referral_redeem_info" class="mt-2" style="display: none;"></div>
    </div>

                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agree to the website <a href="#">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>
                            <form action="" id="checkOutForm">
                                <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                                <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
<input type="hidden" name="payment_method" value="" id="payment_method">

                            </form>
                            <a href="" id="submitCheckoutForm" class="common_btn">Place Order</a>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{route('user.checkout.address.create')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Name *" name="name" value="{{Auth::user()->name ?? ""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Phone *" name="phone" value="{{Auth::user()->phone ?? ""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" placeholder="Email *" name="email" value="{{Auth::user()->email ?? ""}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="country">
                                                <option value="">Country / Region *</option>
                                                @foreach (config('settings.country_list') as $key => $county)
                                                    <option {{$county === old('country') ? 'selected' : ''}} value="{{$county}}">{{$county}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="State *" name="state" value="{{old('state')}}">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Town / City *" name="city" value="{{old('city')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Zip *" name="zip" value="{{old('zip')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Address *" name="address" value="{{old('address')}}">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('frontend.pages.checkoutmodels')

    <!--============================
        CHECK OUT PAGE END
    ==============================-->
@endsection

@push('scripts')
   {{-- <script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Do not uncheck all radios — this breaks default selections
        // $('input[type="radio"]').prop('checked', false);

        $('#shipping_method_id').val("");
        $('#shipping_address_id').val("");

        // ======= Payment Method Selection Logic =======
        function updateTotal() {
            let method = $("input[name='payment_method']:checked").val();
            let basePrice = parseFloat($("input[name='payment_method']:checked").data("price")) || 0;

            let gst = 0;
            if (method === 'inr') {
                gst = basePrice * 0.18;
            }

            let total = basePrice + gst;

            $('#subtotal').text(basePrice.toFixed(2));
            $('#gst').text(gst.toFixed(2));
            $('#total').text(total.toFixed(2));

            // Also update final total with shipping if already selected
            let shippingFee = parseFloat($('.shipping_method:checked').data('id')) || 0;
            let finalAmount = total + shippingFee;
            $('#total_amount').text("{{$settings->currency_icon}}" + finalAmount.toFixed(2)).data('id', finalAmount);
        }

        $("input[name='payment_method']").on('change', updateTotal);
        updateTotal(); // run on page load
        $("input[name='payment_method']:checked").trigger('change'); // manually trigger change to ensure it calculates

        // ======= Shipping Method Selection =======
        $('.shipping_method').on('click', function () {
            let shippingFee = parseFloat($(this).data('id')) || 0;
            let currentTotal = parseFloat($('#total').text()) || 0;
            let finalAmount = currentTotal + shippingFee;

            $('#shipping_method_id').val($(this).val());
            $('#shipping_fee').text("{{$settings->currency_icon}}" + shippingFee.toFixed(2));
            $('#total_amount').text("{{$settings->currency_icon}}" + finalAmount.toFixed(2)).data('id', finalAmount);
        });

        // ======= Shipping Address Selection =======
        $('.shipping_address').on('click', function () {
            $('#shipping_address_id').val($(this).data('id'));
        });

        // ======= Checkout Form Submit =======
        $('#submitCheckoutForm').on('click', function (e) {
            e.preventDefault();

            if ($('#shipping_method_id').val() == "") {
                toastr.error('Shipping method is required');
            } else if ($('#shipping_address_id').val() == "") {
                toastr.error('Shipping address is required');
            } else if (!$('.agree_term').prop('checked')) {
                toastr.error('You have to agree to the website terms and conditions');
            } else {
                $.ajax({
                    url: "{{ route('user.checkout.form-submit') }}",
                    method: 'POST',
                    data: $('#checkOutForm').serialize(),
                    beforeSend: function () {
                        $('#submitCheckoutForm').html('<i class="fas fa-spinner fa-spin fa-1x"></i>');
                    },
                    success: function (data) {
                        if (data.status === 'success') {
                            $('#submitCheckoutForm').text('Place Order');
                            window.location.href = data.redirect_url;
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        });
    });
</script> --}}



<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#shipping_address_id').val("");

    function updateTotal() {
        let selected = $("input[name='payment_method']:checked");
        let method = selected.val();
        let base = 0, gst = 0, total = 0;

        if (method === 'inr') {
            base = parseFloat(selected.data("price")) || 0;
            gst = base * 0.18;
            total = base + gst;
        } else if (method === 'points') {
            base = parseFloat(selected.data("coin")) || 0;
            gst = 0;
            total = base;
        }

        $('#payment_method').val(method);
        $('#subtotal').text(base.toFixed(2));
        $('#gst').text(gst.toFixed(2));
        $('#total').text(total.toFixed(2));
        $('#total_amount').text((method === 'inr' ? "₹" : "") + total.toFixed(2)).data('id', total);
    }

    $("input[name='payment_method']").on('change', updateTotal);
    updateTotal();

    $('.shipping_address').on('click', function () {
        $('#shipping_address_id').val($(this).data('id'));
    });

    $('#submitCheckoutForm').on('click', function (e) {
        e.preventDefault();

        if ($('#shipping_address_id').val() === "") {
            toastr.error('Shipping address is required');
        } else if (!$('.agree_term').prop('checked')) {
            toastr.error('You have to agree to the website terms and conditions');
        } else {
            $.ajax({
                url: "{{ route('user.checkout.form-submit') }}",
                method: 'POST',
                data: $('#checkOutForm').serialize(),
                beforeSend: function () {
                    $('#submitCheckoutForm').html('<i class="fas fa-spinner fa-spin fa-1x"></i>');
                },
                success: function (data) {
                    $('#submitCheckoutForm').text('Place Order');

                    if (data.status === 'success') {
                        const price = data.price;
                        const gst = data.gst;
                        const base = data.base;

                        if (data.payment_method === 'inr') {
                            $('#inr_points').text(`Rs.${price}`);
                             $('#points_set').val(data.redeempoints); 
                            $('#inrModal').modal('show');
                        } else if (data.payment_method === 'points') {
                            $('#mpoints').text(`${base}`);
                            $('#cryptoModal').modal('show');
                        } else {
                            window.location.href = data.redirect_url;
                        }
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

// $('#redeemPointsBtn').on('click', function () {
//     const isRedeeming = $(this).hasClass('btn-outline-success');

//     $.ajax({
//         url: "{{ route('user.checkout.redeem-preview') }}",
//         method: 'POST',
//         data: {
//             _token: $('meta[name="csrf-token"]').attr('content'),
//             redeem: isRedeeming ? 1 : 0
//         },
//         success: function (data) {
//             if (data.status === 'success') {
//                 $('#redeem_info').html(data.redeem_info);
//                 $('#redeemPointsBtn')
//                     .toggleClass('btn-outline-success btn-outline-danger')
//                     .text(isRedeeming ? 'Remove MPoint Redemption' : 'Redeem MPoints');

//                 refreshTotal(); // 🔁 Call after apply/remove
//             }
//         }
//     });
// });


// $('#redeemReferralBtn').on('click', function () {
//     let isRedeemed = $(this).attr('data-redeemed') === 'true';

//     $.ajax({
//         type: 'POST',
//         url: "{{ route('user.checkout.redeem.referral') }}",
//         data: {
//             _token: "{{ csrf_token() }}",
//             redeem: isRedeemed ? 0 : 1
//         },
//         success: function (response) {
//             if (response.status === 'success') {
//                 $('#referral_redeem_info').html(response.redeem_info);

//                 $('#redeemReferralBtn')
//                     .attr('data-redeemed', isRedeemed ? 'false' : 'true')
//                     .toggleClass('btn-outline-primary btn-danger')
//                     .text(isRedeemed ? 'Redeem with Referral Wallet' : 'Remove Referral Redemption');

//                 refreshTotal(); // 🔁 Call after apply/remove
//             }
//         }
//     });
// });


$(document).ready(function () {
    // 🔁 MPoints Redeem Switch
    $('#redeemPointsCheckbox').on('change', function () {
        const isRedeeming = $(this).is(':checked');

        $.ajax({
            url: "{{ route('user.checkout.redeem-preview') }}",
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                redeem: isRedeeming ? 1 : 0
            },
            success: function (data) {
                if (data.status === 'success') {
                    if (isRedeeming && data.redeem_info.trim()) {
                        $('#redeem_info').html(data.redeem_info).slideDown();
                    } else {
                        $('#redeem_info').slideUp().empty();
                    }

                    // Update label text
                    $('label[for="redeemPointsCheckbox"]').text(
                        isRedeeming ? 'Remove MVoucher Points Redemption' : 'Redeem MVoucher Points'
                    );

                    refreshTotal();
                }
            }
        });
    });

    // 🔁 Referral Wallet Redeem Switch
    $('#redeemReferralCheckbox').on('change', function () {
        const isRedeeming = $(this).is(':checked');

        $.ajax({
            url: "{{ route('user.checkout.redeem.referral') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                redeem: isRedeeming ? 1 : 0
            },
            success: function (response) {
                if (response.status === 'success') {
                    if (isRedeeming && response.redeem_info.trim()) {
                        $('#referral_redeem_info').html(response.redeem_info).slideDown();
                    } else {
                        $('#referral_redeem_info').slideUp().empty();
                    }

                    $('label[for="redeemReferralCheckbox"]').text(
                        isRedeeming ? 'Remove Referral Redemption' : 'Redeem with Referral Wallet'
                    );

                    refreshTotal();
                }
            }
        });
    });
});




function refreshTotal() {
    $.ajax({
        type: 'POST',
        url: "{{ route('user.checkout.price.preview') }}",
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function (response) {
            if (response.status === 'success') {
                $('#subtotal').text(response.base);
                $('#gst').text(response.gst);
                $('#total').text(response.total);
                $('#total_amount').text("₹" + response.total).data('id', response.total);
            }
        }
    });
}



</script>


@endpush
