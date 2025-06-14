@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
@endsection

@section('content')

<style>
    a.card-link {
        text-decoration: none;
    }

    .thumbnail-date-day,
    .thumbnail-date-month {
        color: #fff;
    }

    .thumbnail {
        border-radius: 3px;
        height: 52px;
        width: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .thumbnail-date-day {
        font-size: 24px;
        font-weight: 700;
    }

    .thumbnail-date-month {
        font-size: 10px;
        text-transform: uppercase;
    }

    .tags-list-town {
        background-color: #053f71;
        padding: 4px 6px;
        border-radius: 2px;
        color: #fff;
        font-size: 12px;
    }

    .text-over {
        font-size: 1.3em;
        font-weight: 900;
        color: #fff;
        padding: 20px;
    }

    .card {
        border: 1px solid #eee;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border-radius: 0;
    }

    .card-img-top {
        border-radius: 0;
    }

    .image-container {
        position: relative;
        overflow: hidden;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.57);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bottom-left,
    .bottom-right,
    .top-right {
        position: absolute;
        z-index: 2;
    }

    .bottom-left {
        bottom: 14px;
        left: 16px;
    }

    .bottom-right {
        bottom: 8px;
        right: 16px;
        color: #fff;
        font-size: 10px;
    }

    .top-right {
        top: 16px;
        right: 16px;
    }

    /* =============result_top_box==================== */

    .result_top_box {
        border: 1px solid red;
        padding: 10px;
        margin-bottom: 10px;
    }

    .student_info {
        border: 1px solid red;
        padding: 10px;
        margin-bottom: 10px;
    }

    .student_result {
        border: 1px solid red;
        padding: 10px;
        margin-bottom: 10px;
    }

    .barcode_result {
        border: 1px solid red;
        padding: 10px;
        margin-bottom: 10px;
    }

    .in_icon {
        background: #f2f2f2;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 20px;
        height: 20px;
        border-radius: 50px;
    }

    .icon-list {
        display: flex;
        justify-content: space-between;
    }

    .icons {
        display: flex;
        gap: 10px;
    }

    .in_icon i {
        font-size: 8px;
    }
</style>

<section class="bg-light mb-4">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-12 text-center p-4">
                <h2>Help Center</h2>
                <p>
                    We are glad having you here looking for the answer. As our team
                    hardly working on the product, feel free to ask any questions. We
                    Believe only your feedback might move us forward.
                </p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-8">
                <div>
                    <h4 class="mb-4">Help Center</h4>
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div
                                class="bg-white p-3 shadow-sm rounded-2xl p-6 flex flex-col items-center text-center transition-transform hover:scale-105"
                                style="height: 200px">
                                <!-- Icon Section -->
                                <div class="w-16 h-16 mb-4">
                                    <img
                                        src="frontend/images/start.png"
                                        alt="Getting Started Icon"
                                        class="w-full h-full object-contain"
                                        width="50" />
                                </div>

                                <!-- Text Section -->
                                <div>
                                    <h5 class="text-xl font-semibold text-gray-800 mb-2">
                                        Getting Started
                                    </h5>
                                    <p class="text-gray-400 text-sm">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptates, non!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div
                                class="bg-white p-3 shadow-sm rounded-2xl p-6 flex flex-col items-center text-center transition-transform hover:scale-105"
                                style="height: 200px">
                                <!-- Icon Section -->
                                <div class="w-16 h-16 mb-4">
                                    <img
                                        src="frontend/images/contact.png"
                                        alt="Getting Started Icon"
                                        class="w-full h-full object-contain"
                                        width="50" />
                                </div>

                                <!-- Text Section -->
                                <div>
                                    <h5 class="text-xl font-semibold text-gray-800 mb-2">
                                        Support Contact
                                    </h5>
                                    <p class="text-gray-400 text-sm">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptates, non!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div
                                class="bg-white p-3 shadow-sm rounded-2xl p-6 flex flex-col items-center text-center transition-transform hover:scale-105"
                                style="height: 200px">
                                <!-- Icon Section -->
                                <div class="w-16 h-16 mb-4">
                                    <img
                                        src="frontend/images/help.png"
                                        alt="Getting Started Icon"
                                        class="w-full h-full object-contain"
                                        width="50" />
                                </div>

                                <!-- Text Section -->
                                <div>
                                    <h5 class="text-xl font-semibold text-gray-800 mb-2">
                                        Online Class Help
                                    </h5>
                                    <p class="text-gray-400 text-sm">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptates, non!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div
                                class="bg-white p-3 shadow-sm rounded-2xl p-6 flex flex-col items-center text-center transition-transform hover:scale-105"
                                style="height: 200px">
                                <!-- Icon Section -->
                                <div class="w-16 h-16 mb-4">
                                    <img
                                        src="frontend/images/help.png"
                                        alt="Getting Started Icon"
                                        class="w-full h-full object-contain"
                                        width="50" />
                                </div>

                                <!-- Text Section -->
                                <div>
                                    <h5 class="text-xl font-semibold text-gray-800 mb-2">
                                        Online Test Help
                                    </h5>
                                    <p class="text-gray-400 text-sm">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Voluptates, non!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm p-3">
                    <h2 class="mb-3">Make A Inquiry</h2>
                    <form action="{{ route('help.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="category" class="form-label">Help Category</label>
        <select class="form-control" id="category" name="category">
            <option value="">Select Category</option>
            <option value="online_class">Online Class</option>
            <option value="online_exam">Online Exam</option>
            <option value="result">Result</option>
            <option value="ecommerce">E-commerce</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name" />
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" />
    </div>
    <div class="mb-3">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" id="mobile" name="mobile" />
    </div>
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" />
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea name="message" id="message" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

                </div>
            </div>
        </div>
    </div>
</section>

<!--============================
        PAYMENT PAGE END
    ==============================-->
@endsection