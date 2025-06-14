@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->

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


    <!--============================
        TRACKING ORDER START
    ==============================-->
    <section id="wsus__login_register">
    <div class="container">
        <div class="main_title mb-5">
          <h6><i class="fa-solid fa-graduation-cap"></i> Category</h6>
          <h3>Educational Resources</h3>
          <h4>Category</h4>
        </div>
        <div class="row gy-4">
          <div class="col-lg-3">
            <a href="course-card-details.html">
              <div class="course_card">
                <div class="icon">
                  <i class="fa-solid fa-arrows-spin"></i>
                </div>
                <div class="course_card_info">
                  <h5>Marketing</h5>
                  <p>10 Course</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="course-card-details.html">
              <div class="course_card">
                <div class="icon">
                  <i class="fa-solid fa-book-tanakh"></i>
                </div>
                <div class="course_card_info">
                  <h5>General Education</h5>
                  <p>10 Course</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="course-card-details.html">
              <div class="course_card">
                <div class="icon">
                  <i class="fa-solid fa-computer"></i>
                </div>
                <div class="course_card_info">
                  <h5>Computer Science</h5>
                  <p>14 Course</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="course-card-details.html">
              <div class="course_card">
                <div class="icon">
                  <i class="fa-solid fa-code"></i>
                </div>
                <div class="course_card_info">
                  <h5>Web Development</h5>
                  <p>15 Course</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="course-card-details.html">
              <div class="course_card">
                <div class="icon">
                  <i class="fa-solid fa-business-time"></i>
                </div>
                <div class="course_card_info">
                  <h5>Business Studies</h5>
                  <p>8 Course</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="course-card-details.html">
              <div class="course_card">
                <div class="icon">
                  <i class="fa-solid fa-person-digging"></i>
                </div>
                <div class="course_card_info">
                  <h5>Civil Engineering</h5>
                  <p>20 Course</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="course-card-details.html">
              <div class="course_card">
                <div class="icon">
                  <i class="fa-brands fa-uncharted"></i>
                </div>
                <div class="course_card_info">
                  <h5>IT/Technology</h5>
                  <p>10 Courses</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="course-card-details.html">
              <div class="course_card">
                <div class="icon">
                  <i class="fa-solid fa-brain"></i>
                </div>
                <div class="course_card_info">
                  <h5>Idea Generate</h5>
                  <p>16 Courses</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!--============================
        TRACKING ORDER END
    ==============================-->
@endsection
