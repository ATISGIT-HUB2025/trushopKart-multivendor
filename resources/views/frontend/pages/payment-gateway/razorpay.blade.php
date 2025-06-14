<div class="tab-pane fade" id="v-pills-razorpay" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="row">
        <div class="col-xl-12 m-auto">
            <div class="wsus__payment_area">
            @php
    $razorpaySetting = \App\Models\RazorpaySetting::first();

    // Determine payment details based on type
    if (isset($payment_type) && $payment_type === 'admission') {
        // Admission payment
        $admissionFee = Session::get('admission_fee');
        $payableAmount = isset($admissionFee['total_fee']) ? $admissionFee['total_fee'] : 0;

        // Get admission user details
        $admissionData = Session::get('admission_data');
        $name = isset($admissionData['full_name']) ? $admissionData['full_name'] : '';
        $email = isset($admissionData['email']) ? $admissionData['email'] : '';
        $route = route('razorpay.payment');
    } elseif (isset($payment_type) && $payment_type === 'reexam') {
        // Reexam payment
        $reexamData = Session::get('reexam_data');
        $payableAmount = 200;
        $name = Auth::check() ? Auth::user()->name : '';
        $email = Auth::check() ? Auth::user()->email : '';
        $route = route('reexam.razorpay.payment');
    } else {
        // Default product purchase
        $payableAmount = getFinalPayableAmount();
        $name = Auth::check() ? Auth::user()->name : '';
        $email = Auth::check() ? Auth::user()->email : '';
        $route = route('user.razorpay.payment');
    }
@endphp
<script>
    console.log(<?php echo $payableAmount ?>)
</script>
<form action="{{ $route }}" method="POST">
    @csrf
    @csrf
    @if(isset($payment_type) && $payment_type === 'reexam')
        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
    @endif
    <script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{$razorpaySetting->razorpay_key}}"
        data-amount="{{$payableAmount * 100}}"
        data-buttontext="Pay With Razorpay"
        data-name="{{ isset($payment_type) && $payment_type === 'admission' ? 'Admission Payment' : (isset($payment_type) && $payment_type === 'reexam' ? 'Reexam Payment' : 'Product Purchase') }}"
        data-description="{{ isset($payment_type) && $payment_type === 'admission' ? 'Payment for Admission' : (isset($payment_type) && $payment_type === 'reexam' ? 'Payment for Reexam' : 'Payment for Products') }}"
        data-prefill.name="{{$name}}"
        data-prefill.email="{{$email}}"
        data-theme.color="#ff7529">
    </script>
</form>

            </div>
        </div>
    </div>
</div>
