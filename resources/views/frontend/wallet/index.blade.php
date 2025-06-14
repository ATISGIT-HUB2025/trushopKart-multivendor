@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || My Wallet
@endsection
@section('content')
@section('header')
<style>
#mrewardpoint-table_wrapper{
  overflow-x: auto
}
 .card-box {
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      
}

.wsus__dash_pro_area h4 , .wallet_overview h6 , .wallet_overview h2 {
        color: #fff;
}
.wallet_overview div{
            padding: 10px;
    background-color: #ffffff3d;
    min-width: 165px;
    border-radius: 10px;
    text-align: center;
    display: grid;
    gap: 8px;
        max-width: 165px;
}

.card-box.bg-primary{
    background-color: #0b2c3d !important;
} 

.form-control, .form-label {
      font-size: 15px;
}
.upload-box {
      border: 2px dashed #6c757d;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      color: #6c757d;
      transition: all 0.3s;
}
.upload-box:hover {
      background-color: #f8f9fa;
      cursor: pointer;
}
.qrcode{
        width: 100%;
    max-width: 119px;
    margin-bottom: 15px;
}

.text_bbb{
        font-size: 12px;
    text-align: center;
    background-color: #eee;
    padding: 10px;
    border-radius: 5px;
}

</style>
@endsection


@php
    $rate = \App\Models\GeneralSetting::first()->mpoint_value ?? 1;
@endphp

<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> My Wallet</h3>
            <div class="wsus__dashboard_profile">
              <div class="">
               <div class="row g-4 align-items-start">
      
      <!-- Box 1: MPoints and INR -->
      <div class="col-md-6">
        <div class="card card-box p-4 bg-primary text-white h-100">
          <div class="card-body">
            <h4 class="card-title mb-3 text-white">Wallet Overview</h4>
            <div class="d-flex justify-content-between align-items-center wallet_overview flex-wrap" style="gap: 15px;">
              <!--<div>-->
              <!--  <h6>M Voucher Points</h6>-->
              <!--  <h2>{{ auth()->user()->wallet_points }}</h2>-->
              <!--</div>-->
               <div>
                <h6>Referral Points</h6>
                <h2>{{ auth()->user()->refer_wallet_points  }}</h2>
              </div>
              <div>
                <h6>MVoucher Points</h6>
                <h2>{{ auth()->user()->wallet_value_inr ?? 0 }}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <!-- Box 2: Form with Upload -->
      <div class="col-md-6">
        <div class="card card-box p-4 h-100">
          <div class="card-body">
            <h4 class="card-title mb-3">Add Transaction</h4>
           <form method="post" action="/user/wallet-submit" enctype="multipart/form-data">
    @csrf

    <div class="qrcode_theme d-flex justify-content-center mb-3">
        <img src="{{ url('qrcode/mpoints.jpg') }}" alt="" class="qrcode">
    </div>
<div class="mb-3 d-flex justify-content-center align-items-center gap-2">
    <p class="text_bbb mb-0">0xaEeC384Df7d6abd5d31208845486211Cee8e89f3</p>
<button id="copyAddressBtn" type="button" class="btn btn-sm btn-outline-primary">Copy</button>

</div>


    <div class="row">
        <div class="col-md-12 mb-3">
            <label class="form-label">Enter MVoucher Points</label>
            <input type="number" class="form-control" name="rupees" id="inrAmount" placeholder="Enter MVoucher Points to convert">
        </div>

        <div class="col-md-12 mb-3 ">
            <div class="alert alert-info shadow-sm rounded border-0 p-3 h-100 " id="calculationBox" style="display: none;">
                <div class="row "><div class="mb-2 col-md-6">
                    <label class="form-label text-dark mb-1">MVoucher Points</label>
                    <input type="text" readonly class="form-control form-control-sm fw-semibold bg-light" id="inrDisplay" readonly>
                </div>
                <div class="mb-2 col-md-6">
                    <label class="form-label text-dark mb-1">Mpoint Value</label>
                    <input type="text" readonly class="form-control form-control-sm fw-semibold bg-light" id="inr_Value_Input" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-dark mb-1">Mpoints to Redeem</label>
                    <input type="text" readonly class="form-control form-control-sm fw-bold text-success bg-light" id="pointsDisplay" readonly>
                </div>
                </div>
            </div>
        </div>

         <div class="mb-3 col-md-6">
        <label class="form-label">Transaction ID</label>
        <input type="text" class="form-control" name="transaction_id" placeholder="Enter Transaction ID">
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Upload Screenshot</label>
        <div class="">
          {{-- upload-box --}}
            <input type="file" class="form-control" name="screenshot" onchange="this.parentElement.querySelector('span').innerText = this.files[0]?.name || 'No file chosen';">
            <span>No file chosen</span>
        </div>
    </div>

    </div>

    <input type="hidden" name="points" id="pointsInput">

   

    <button type="submit" class="btn btn-primary w-100 mt-3">Submit Transaction</button>
</form>


          </div>
        </div>
      </div>

    </div>

     <div class="wsus__dash_pro_area mt-4">
                {{ $dataTable->table() }}
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

  document.getElementById('copyAddressBtn').addEventListener('click', function () {
    const address = "0xaEeC384Df7d6abd5d31208845486211Cee8e89f3";

    navigator.clipboard.writeText(address).then(() => {
        const btn = this;
        btn.innerText = "Copied";
        btn.disabled = true;
        setTimeout(() => {
            btn.innerText = "Copy";
            btn.disabled = false;
        }, 2000);
    }).catch(() => {
        alert('Failed to copy address.');
    });
});


document.getElementById('inrAmount').addEventListener('input', function () {
    const inr = parseFloat(this.value);
    const rate = {{ $rate }}; // Laravel blade variable
    // const rate = 2;

    if (!isNaN(inr) && rate > 0) {
        const points = Math.floor(inr / rate);

        document.getElementById('inrDisplay').value = inr.toFixed(0);
        document.getElementById('inr_Value_Input').value = '' + rate;
        document.getElementById('pointsDisplay').value = points + ' MPoints';
        document.getElementById('pointsInput').value = points;

        document.getElementById('calculationBox').style.display = 'block';
    } else {
        document.getElementById('pointsInput').value = '';
        document.getElementById('calculationBox').style.display = 'none';
    }
});
</script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
