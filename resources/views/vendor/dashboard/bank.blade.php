@extends('vendor.layouts.master')

@section('title')
    {{ $settings->site_name }} || Bank Update
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.layouts.sidebar')

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-university"></i> Bank Details</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <h4 class="mb-3">Update Bank Information</h4>

                            @php
    $bank = json_decode(Auth::user()->bank_details, true);
@endphp

<form action="{{ route('vendor.bank') }}" method="POST">
    @csrf

    <div class="col-md-12">
        <div class="wsus__dash_pro_single">
            <i class="fas fa-user-tie"></i>
            <input type="text" placeholder="Account Holder Name" name="account_holder_name"
                   value="{{ old('account_holder_name', $bank['account_holder_name'] ?? '') }}">
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-university"></i>
            <input type="text" placeholder="Bank Name" name="bank_name"
                   value="{{ old('bank_name', $bank['bank_name'] ?? '') }}">
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-credit-card"></i>
            <input type="text" placeholder="Account Number" name="account_number"
                   value="{{ old('account_number', $bank['account_number'] ?? '') }}">
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-code"></i>
            <input type="text" placeholder="IFSC Code" name="ifsc_code"
                   value="{{ old('ifsc_code', $bank['ifsc_code'] ?? '') }}">
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" placeholder="Branch Name" name="branch_name"
                   value="{{ old('branch_name', $bank['branch_name'] ?? '') }}">
        </div>

        <div class="wsus__dash_pro_single">
            <i class="fas fa-mobile-alt"></i>
            <input type="text" placeholder="UPI ID (optional)" name="upi_id"
                   value="{{ old('upi_id', $bank['upi_id'] ?? '') }}">
        </div>
    </div>

    <div class="col-xl-12">
        <button class="common_btn mb-4 mt-2" type="submit">Update Bank Info</button>
    </div>
</form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
