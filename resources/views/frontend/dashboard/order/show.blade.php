@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);
@endphp

@extends('frontend.dashboard.layouts.master')

@section('title')
    {{ $settings->site_name }} || Product
@endsection

@section('content')

 <style>
    .store-section {
      border: 1px solid #dee2e6;
      border-radius: 12px;
      padding: 20px;
      background-color: #f8f9fa;
      height: 100%;
    }
    .store-card {
      text-align: center;
      margin-bottom: 20px;
    }
    .store-badge {
      max-width: 180px;
    height: auto;
    margin-top: 10px;
    width: 180px;
    height: 36px;
    }
    h4 {
      margin-bottom: 30px;
    }
  </style>

    <section id="wsus__dashboard">
        <div class="container-fluid">
            {{-- @include('vendor.layouts.sidebar') --}}
            @include('frontend.dashboard.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Order Details</h3>
                        <div class="wsus__dashboard_profile">

                            <!--============================
                            INVOICE PAGE START
                        ==============================-->
                            <section id="" class="invoice-print">
                                <div class="">
                                    <div class="wsus__invoice_area">
                                        <div class="wsus__invoice_header">
                                            <div class="wsus__invoice_content">
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                        <div class="wsus__invoice_single" style="background: #f9f9f9; border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
    <h5 style="font-weight: 600; margin-bottom: 15px;">Billing Information</h5>

    <p><strong>Paid:</strong> ₹{{ number_format($order->amount, 2) }}</p>
    <!--<p><strong>Points Used:</strong> {{ $order->paidpoints }} MPoints</p>-->
    <p><strong>GST (18%):</strong> ₹{{ number_format($order->amount - ($order->amount / 1.18), 2) }}</p>
    <p><strong>Amount Without GST:</strong> ₹{{ number_format($order->amount / 1.18, 2) }}</p>
</div>

                                                    </div>
                                                    <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                        <div class="wsus__invoice_single text-md-center">
                                                            <h5>shipping information</h5>
                                                            <h6>{{ $address->name }}</h6>
                                                            <p>{{ $address->email }}</p>
                                                            <p>{{ $address->phone }}</p>
                                                            <p>{{ $address->address }}, {{ $address->city }},
                                                                {{ $address->state }}, {{ $address->zip }}</p>
                                                            <p>{{ $address->country }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-4">
                                                        <div class="wsus__invoice_single text-md-end">
                                                            <h5>Order id: #{{ $order->invocie_id }}</h5>
                                                            <h6>Order status:
                                                                {{ config('order_status.order_status_admin')[$order->order_status]['status'] }}
                                                            </h6>
                                                            <p>Payment Method: {{ $order->payment_method == "inr" ? "INR" : $order->payment_method  }}</p>
                                                            <p>Payment Status: {{ $order->payment_status == 1 ?  "Completed" : "Pending" }}</p>
                                                            <p>Transaction id: {{ $order->transaction->transaction_id }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wsus__invoice_description">
                                                <div class="table-responsive">
                                                    {{-- <table class="table">
                                                        <tr>
                                                            <th class="name">
                                                                product
                                                            </th>
                                                            <th class="amount">
                                                                Vendor
                                                            </th>

                                                            <th class="amount">
                                                                amount
                                                            </th>

                                                            <th class="quentity">
                                                                quentity
                                                            </th>
                                                            <th class="total">
                                                                total
                                                            </th>
                                                        </tr>
                                                        @foreach ($order->orderProducts as $product)
                                                                @php
                                                                    $variants = json_decode($product->variants);
                                                                @endphp
                                                                <tr>
                                                                    <td class="name">
                                                                        <p>{{ $product->product_name }}</p>
                                                                        @foreach ($variants as $key => $item)
                                                                            <span>{{ $key }} :
                                                                                {{ $item->name }}(
                                                                                {{ $settings->currency_icon }}{{ $item->price }}
                                                                                )</span>
                                                                        @endforeach
                                                                    </td>
                                                                    <td class="amount">
                                                                        {{ $product->vendor->shop_name }}
                                                                    </td>
                                                                    <td class="amount">
                                                                        {{ $settings->currency_icon }}
                                                                        {{ $product->unit_price }}
                                                                    </td>

                                                                    <td class="quentity">
                                                                        {{ $product->qty }}
                                                                    </td>
                                                                    <td class="total">
                                                                        {{ $settings->currency_icon }}
                                                                        {{ $product->unit_price * $product->qty }}
                                                                    </td>
                                                                </tr>

                                                        @endforeach

                                                    </table> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wsus__invoice_footer">

                                            <p><span>Sub Total:</span> {{ @$settings->currency_icon }} {{@$order->sub_total}}</p>
                                            {{-- <p><span>Shipping Fee(+):</span>{{ @$settings->currency_icon }} {{@$shipping->cost}} </p> --}}
                                            {{-- <p><span>Coupon(-):</span>{{ @$settings->currency_icon }} {{@$coupon->discount ? $coupon->discount : 0}}</p> --}}
                                            <p><span>Total Amount :</span>{{ @$settings->currency_icon }} {{@$order->amount}}</p>


                                        </div>
                                          @if($order->payment_status == 1)
    <div class="alert alert-success d-flex align-items-center mt-4" role="alert" style="font-size: 16px;">
        <i class="bi bi-check-circle-fill me-2" style="font-size: 20px;"></i>
       <div>
    <strong>Congratulations!</strong> Your product key is: 
    <code id="licenseKey">{{ $order->license_key ?? 'N/A' }}</code>
    <button onclick="copyLicenseKey()" class="btn btn-sm btn-outline" title="Copy">
       <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>
    </button>
</div>
    </div>

     <div class="ppbox">
       <h2 class="text-center mb-3 h4">Download Our Apps</h2>
  <div class="row g-4">

    <!-- Play Store Column -->
    <div class="col-md-6">
      <div class="store-section">
        <h4 class="text-center">Android (Play Store)</h4>

        <!-- App 1 -->
        <div class="store-card">
          <h6>Bitdefender Mobile Security</h6>
          <a href="https://play.google.com/store/apps/details?id=com.bitdefender.security" target="_blank">
            <img src="{{ url('qrcode') }}/Google_Play_Store_badge_EN.svg"
                 alt="Get it on Google Play" class="store-badge">
          </a>
        </div>

        <!-- App 2 -->
        <div class="store-card">
          <h6>Bitdefender Central</h6>
          <a href="https://play.google.com/store/apps/details?id=com.bitdefender.centralmgmt" target="_blank">
            <img src="{{ url('qrcode') }}/Google_Play_Store_badge_EN.svg"
                 alt="Get it on Google Play" class="store-badge">
          </a>
        </div>
      </div>
    </div>

    <!-- App Store Column -->
    <div class="col-md-6">
      <div class="store-section">
        <h4 class="text-center">iOS (App Store)</h4>

        <!-- App 1 -->
        <div class="store-card">
          <h6>Bitdefender Mobile Security</h6>
          <a href="https://apps.apple.com/in/app/bitdefender-mobile-security/id1255893012" target="_blank">
            <img src="{{ url('qrcode') }}/App_Store_%28iOS%29.svg"
                 alt="Download on the App Store" class="store-badge">
          </a>
        </div>

        <!-- App 2 -->
        <div class="store-card">
          <h6>Bitdefender Central</h6>
          <a href="https://apps.apple.com/in/app/bitdefender-central/id969933082" target="_blank">
            <img src="{{ url('qrcode') }}/App_Store_%28iOS%29.svg"
                 alt="Download on the App Store" class="store-badge">
          </a>
        </div>
      </div>
    </div>

  </div>
     </div>

@endif

                                    </div>
                                </div>
                            </section>
                            <!--============================
                            INVOICE PAGE END
                        ==============================-->
                        <div class="col">
                            <div class="mt-2 float-end">
                                <button class="btn btn-warning print_invoice">print</button>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        DASHBOARD START
      ==============================-->
@endsection

@push('scripts')
    <script>
        $('.print_invoice').on('click', function() {
            let printBody = $('.invoice-print');
            let originalContents = $('body').html();

            $('body').html(printBody.html());

            window.print();

            $('body').html(originalContents);

        })
    </script>

<script>
function copyLicenseKey() {
    const licenseText = document.getElementById("licenseKey").innerText;
    navigator.clipboard.writeText(licenseText).then(() => {
        toastr.success("License key copied to clipboard!");
    }).catch(err => {
        toastr.error("Failed to copy license key.");
        console.error("Failed to copy text: ", err);
    });
}
</script>


@endpush
