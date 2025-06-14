@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
@endsection

@section('content')





<style>
    @import url("https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Chicle&family=Cookie&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=SUSE:wght@100..800&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "SUSE", serif;
    }

    section {
        padding: 60px 0;
    }

    a {
        text-decoration: none;
    }

    .main_title {
        text-align: center;
    }

    .main_title h6 {
        color: blueviolet;
    }

    .main_title h3 {
        color: #000;
        font-size: 50px;
        font-weight: bold;
    }

    .main_title h4 {
        color: blueviolet;
        font-size: 50px;
    }

    .main_title h4:after {
        display: block;
        content: "";
        background: url(assets/line.png) no-repeat center;
        background-size: contain;
        width: 100%;
        height: 30px;
    }

    .course_card {
        width: 100%;
        height: 120px;
        background-color: #eeedff;
        border-radius: 10px;
        padding: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        color: #000;
        transition: all 0.3s ease;
    }

    .col-lg-3:nth-child(2) .course_card {
        background-color: #e9f3f1;
    }

    .col-lg-3:nth-child(3) .course_card {
        background-color: #fff2ee;
    }

    .col-lg-3:nth-child(4) .course_card {
        background-color: #eafaff;
    }

    .col-lg-3:nth-child(5) .course_card {
        background-color: #fffeec;
    }

    .col-lg-3:nth-child(6) .course_card {
        background-color: #fff0ff;
    }

    .col-lg-3:nth-child(7) .course_card {
        background-color: #ebffdf;
    }

    .col-lg-3:nth-child(8) .course_card {
        background-color: #eef3ff;
    }

    .course_card:hover {
        background-color: #dcd6ff;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .course_card:hover {
        background-color: #dcd6ff;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .course_card .icon {
        width: 70px;
        height: 70px;
        border-radius: 50px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        color: blueviolet;
        font-size: 22px;
    }

    .course_card_info h5 {
        font-weight: 600;
        font-size: 18px;
    }

    .course_card_info p {
        color: #737477;
        font-family: 16px;
    }

    /* ==============================course details================================== */

    .course_details_left_area_title {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .course_details_left_area_title a {
        width: 30px;
        height: 30px;
        background: blueviolet;
        color: #fff;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .course_details_left_area_title h3 {
        font-size: 20px;
        font-weight: bold;
    }

    .video_area_footer {
        border-bottom: 1px dotted #000;
        padding: 20px 0;
    }

    .progress {
        width: 50%;
        height: 10px;
        background-color: #e9ecef;
        border-radius: 5px;
        overflow: hidden;
        margin: 0 10px;
    }

    .progress-bar {
        height: 100%;
        background-color: blueviolet;
        transition: width 0.4s ease;
    }

    .course_details_right_area_title h6 {
        font-size: 12px;
        font-weight: bold;
    }

    .video_lessions {
        background: #eafaff;
        padding: 20px;
        height: 100vh;
        overflow-y: scroll;
    }

    .video_lessions::-webkit-scrollbar {
        width: 0;
    }

    .video_lessions_info {
        display: flex;
        gap: 10px;
    }

    .video_lessions_info h6 {
        font-size: 12px;
        color: #000;
    }

    .video_lessions_info p {
        font-size: 12px;
        color: #000;
    }

    .course_details_left_area_video {
        background: #000;
    }

    /* ==================audio_cards============================== */
    .audio_cards {
        background: #eafaff;
        padding: 20px;
    }
</style>

<section>
    <div class="container">
        <div class="main_title mb-5">
            <h6><i class="fa-solid fa-graduation-cap"></i> Category</h6>
            <h3>Course Details</h3>
            <h4>IT Technology</h4>
        </div>
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="course_details_left_area">
                    <div class="course_details_left_area_title">
                        <a href="index.html"><i class="fa-solid fa-angle-left"></i></a>
                        <h3>It Technology</h3>
                    </div>
                    <hr />

                    <div class="course_details_left_area_video mb-4">
                        <video
                            autoplay=""
                            loop=""
                            controls=""
                            width="100%"
                            height="300">
                            <source
                                type="video/mp4"
                                src="https://endtest-videos.s3-us-west-2.amazonaws.com/documentation/endtest_data_driven_testing_csv.mp4" />
                        </video>
                    </div>
                    <div class="text-end mb-5">
                        <button class="btn btn-outline-primary btn-sm">Previous</button>
                        <button class="btn btn-primary btn-sm">Next</button>
                    </div>

                    <div class="d-flex justify-content-between video_area_footer">
                        <div>
                            <a href=""><span><i class="fa-regular fa-file-pdf"></i></span><span> &nbsp;Notes</span></a>
                        </div>

                        <div class="d-flex" style="gap: 10px">
                            <a href=""><i class="fa-regular fa-bookmark"></i></a> ||
                            <a href=""><i class="fa-regular fa-thumbs-up"></i></a>
                            <a href=""><i class="fa-regular fa-thumbs-down"></i></a>
                        </div>
                    </div>

                    <div class="couses_details_footer_cards mt-5">
                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 1</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 2</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 3</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 4</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 5</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 6</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 7</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 8</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 9</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>

                        <div class="course_card mb-4">
                            <div class="course_card_info">
                                <h5>Chapter 10</h5>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Nostrum ullam dolor dolorum veniam blanditiis amet qui et
                                    nobis molestias quisquam...
                                </p>
                            </div>

                            <a href="">
                                <div class="icon">
                                    <i class="fa-regular fa-file-pdf fa-2x text-danger"></i>
                                </div>
                            </a>
                        </div>
                    </div>

               
                </div>
            </div>
            <div class="col-lg-4">
                <div class="course_details_right_area_title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Running Module: <span>51</span></h6>
                        <div class="progress">
                            <div
                                class="progress-bar"
                                role="progressbar"
                                aria-valuenow="75"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                style="width: 75%"></div>
                        </div>
                        <h6>5 / 11</h6>
                    </div>
                </div>
                <hr />
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search Leasson"
                        aria-label=""
                        aria-describedby="button-addon2" />
                    <button class="btn btn-primary" type="button" id="button-addon2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <div class="video_lessions mb-5">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a
                                href="course-card-details.html"
                                class="video_lessions_info">
                                <div>
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                </div>
                                <div>
                                    <h6>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing
                                        elit. Dicta, suscipit.
                                    </h6>
                                    <p>
                                        <span><i class="fa-solid fa-video"></i></span> 11 min
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="audio_cards">
                    <h6 class="mb-4">Audio Lessions</h6>
                    <div class="row gy-4">
                        <div class="col-12">
                            <audio controls>
                                <source src="horse.ogg" type="audio/ogg" />
                                <source src="horse.mp3" type="audio/mpeg" />
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="col-12">
                            <audio controls>
                                <source src="horse.ogg" type="audio/ogg" />
                                <source src="horse.mp3" type="audio/mpeg" />
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="col-12">
                            <audio controls>
                                <source src="horse.ogg" type="audio/ogg" />
                                <source src="horse.mp3" type="audio/mpeg" />
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="col-12">
                            <audio controls>
                                <source src="horse.ogg" type="audio/ogg" />
                                <source src="horse.mp3" type="audio/mpeg" />
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="col-12">
                            <audio controls>
                                <source src="horse.ogg" type="audio/ogg" />
                                <source src="horse.mp3" type="audio/mpeg" />
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection