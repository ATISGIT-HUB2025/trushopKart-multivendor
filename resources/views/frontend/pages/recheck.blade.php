@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Recheck Request
@endsection

@section('content')
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Recheck Request</h4>
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="#">Recheck Request</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-clipboard-check me-2"></i>Submit Recheck Request</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <h5 class="text-center mb-3">Payment Instructions</h5>
                                <p>1. Scan the QR code to make a payment of ₹100</p>
                                <p>2. Enter the transaction ID in the form</p>
                                <p>3. Upload a screenshot of your payment (optional)</p>
                                <p>4. Complete the recheck request form</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <h5 class="mb-3">Scan to Pay ₹100</h5>
                                <img src="https://i.ibb.co.com/SXDMtj6K/Whats-App-Image-2025-02-28-at-3-42-10-PM.jpg" alt="Payment QR Code" class="img-fluid rounded" style="max-height: 250px;">
                            </div>
                        </div>
                        
                        <form action="{{ route('recheck.submit') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <!-- Payment Information -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="tnxid" name="tnxid" placeholder="Enter transaction ID">
                                        <label for="tnxid">Transaction ID (optional)</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Payment Proof (optional)</label>
                                        <input type="file" class="form-control" name="payment_proof" accept="image/*">
                                        <div class="form-text">Upload screenshot of payment</div>
                                    </div>
                                </div>

                                <hr class="my-3">
                                
                                <!-- Complaint Information -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" required>
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" name="message" style="height: 150px" placeholder="Enter your message" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter barcode">
                                        <label for="barcode">Barcode (if any)</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Supporting Document</label>
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                        <div class="form-text">Accepted formats: JPG, PNG (max 2MB)</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Form validation
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        // File input validation
        $('input[type="file"]').change(function() {
            const file = this.files[0];
            if (!file) return;
            
            const fileType = file.type;
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (!fileType.match('image.*')) {
                toastr.error('Please select an image file');
                this.value = '';
                return;
            }

            if (file.size > maxSize) {
                toastr.error('File size should not exceed 2MB');
                this.value = '';
                return;
            }
        });
    });
</script>
@endpush
