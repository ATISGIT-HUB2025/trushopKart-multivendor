@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Admission conditions
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
                        <h4>Admission conditions</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="javascript:;">admission conditions</a></li>
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
    <div style="     
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);" class="container p-4 my-5">
        <h2 class="text-center mb-4">Terms and Conditions for College Admission</h2>
        
        <div class="mb-4">
            <h5>1. Acceptance of Terms</h5>
            <p>By applying for admission to Excellent College, you agree to be bound by these Terms and Conditions. If you do not agree to these terms, please do not proceed with the application process.</p>
        </div>
        
        <div class="mb-4">
            <h5>2. Eligibility</h5>
            <p>Applicants must meet the following eligibility criteria:</p>
            <ul>
                <li>Completed 10+2 or equivalent examination from a recognized board</li>
                <li>Obtained a minimum of 60% aggregate marks in 10+2 or equivalent examination</li>
                <li>Met any additional course-specific eligibility criteria as mentioned on our website</li>
            </ul>
        </div>
        
        <div class="mb-4">
            <h5>3. Application Process</h5>
            <p>The application process involves the following steps:</p>
            <ol>
                <li>Submission of the online application form</li>
                <li>Payment of the application fee</li>
                <li>Uploading of required documents</li>
                <li>Attendance at the entrance examination and/or interview (if applicable)</li>
            </ol>
        </div>
        
        <div class="mb-4">
            <h5>4. Accuracy of Information</h5>
            <p>You are responsible for providing accurate and complete information in your application. Any false or misleading information may result in the rejection of your application or termination of your enrollment if discovered later.</p>
        </div>
        
        <div class="mb-4">
            <h5>5. Selection Process</h5>
            <p>The selection of candidates is based on merit and is at the sole discretion of the college admission committee. The decision of the committee is final and binding.</p>
        </div>
        
        <div class="mb-4">
            <h5>6. Fee Payment</h5>
            <p>If selected, you are required to pay the admission fee within the stipulated time frame. Failure to do so may result in the cancellation of your admission offer.</p>
        </div>
        
        <div class="mb-4">
            <h5>7. Cancellation and Refund Policy</h5>
            <p>Please refer to our website for the detailed cancellation and refund policy. Refunds, if applicable, will be processed as per the policy in place at the time of admission.</p>
        </div>
        
        <div class="mb-4">
            <h5>8. Rules and Regulations</h5>
            <p>Upon admission, you agree to abide by all rules, regulations, and policies of Excellent College, which may be updated from time to time.</p>
        </div>
        
        <div class="mb-4">
            <h5>9. Privacy Policy</h5>
            <p>Your personal information will be handled in accordance with our Privacy Policy, which is available on our website.</p>
        </div>
        
        <div class="mb-4">
            <h5>10. Amendments</h5>
            <p>Excellent College reserves the right to amend these Terms and Conditions at any time. Any changes will be effective immediately upon posting on our website.</p>
        </div>
        
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" value="" id="agreeTerms" required>
            <label class="form-check-label" for="agreeTerms">
                I have read and agree to the Terms and Conditions
            </label>
        </div>
        
        <div class="text-center">
            <button id="proceedButton" class="btn btn-primary btn-lg" disabled>Proceed to Application Form</button>
        </div>
    </div>

    <!--============================
        PAYMENT PAGE END
    ==============================-->
@endsection
