@extends('frontend.dashboard.layouts.master')

@section('title')
    {{$settings->site_name}} || Bank Account
@endsection


@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fas fa-university"></i> Bank Account Details</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <form action="{{ route('user.account.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Account Holder Name</label>
                                            <input type="text" class="form-control" name="account_holder_name" value="{{ $bankAccount->account_holder_name ?? old('account_holder_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name" value="{{ $bankAccount->bank_name ?? old('bank_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Account Number</label>
                                            <input type="text" class="form-control" name="account_number" value="{{ $bankAccount->account_number ?? old('account_number') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>IFSC Code</label>
                                            <input type="text" class="form-control" name="ifsc_code" value="{{ $bankAccount->ifsc_code ?? old('ifsc_code') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Branch Name</label>
                                            <input type="text" class="form-control" name="branch_name" value="{{ $bankAccount->branch_name ?? old('branch_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>PAN Number</label>
                                            <input type="text" class="form-control" name="pan_number" value="{{ $bankAccount->pan_number ?? old('pan_number') }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Information</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
