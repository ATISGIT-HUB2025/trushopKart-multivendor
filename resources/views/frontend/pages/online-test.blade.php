@extends('frontend.layouts.master')


@section('content')

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<!-- index28:48-->
@include('frontend.layouts.onlineTestHeader')

<body>
  <!-- Begin Body Wrapper -->
  <div class="body-wrapper">
    <!-- Begin Header Area -->

    <!-- Header Area End Here -->

    <!-- Begin Slider With Banner Area -->
    <div class="slider-with-banner mt-4">
      <div class="container">
        <div class="row">
          <!-- Begin Slider Area -->
          <div class="col-lg-12 col-md-12">
            <div class="slider-area">
              <div class="slider-active owl-carousel">
                <!-- Begin Single Slide Area -->
                <div
                  class="single-slide align-center-left animation-style-01 bg-1">
                  <div class="slider-progress"></div>
                </div>
                <!-- Single Slide Area End Here -->
                <!-- Begin Single Slide Area -->
                <div
                  class="single-slide align-center-left animation-style-02 bg-2">
                  <div class="slider-progress"></div>
                </div>
                <!-- Single Slide Area End Here -->
                <!-- Begin Single Slide Area -->
                <div
                  class="single-slide align-center-left animation-style-01 bg-3">
                  <div class="slider-progress"></div>
                </div>
                <!-- Single Slide Area End Here -->
              </div>
            </div>
          </div>
          <!-- Slider Area End Here -->
        </div>
      </div>
    </div>
 
    <!-- entrance card start -->
    <div class="li-static-banner pt-60 pb-45">
    <div class="container">
        <div class="row">
            @foreach($examCategories as $category)
            <div class="col-lg-4 col-md-4 text-center mb-30"> <!-- Changed mb-10 to mb-30 for more space -->
                <div class="single-banner mb-15"> <!-- Added mb-15 for spacing -->
                    <a style="height: auto !important;" href="{{ route('online-test-category', ['category' => $category->id]) }}">
                        <img 
                            src="{{ asset($category->logo) }}" 
                            alt="{{ $category->name }}"
                            style="width: 100%; height: 200px; object-fit: cover; margin-bottom: 10px;" 
                        />
                    </a>
                </div>
                <div class="category-name"> <!-- Added specific class -->
                    <h6 style="margin: 0; padding: 10px 0;">
                        <a href="{{ route('online-test-category', ['category' => $category->id]) }}">
                            {{ $category->name }}
                        </a>
                    </h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


    <!--entrance card end -->

    <!-- Banner start-->
    <div class="li-static-home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- Begin Li's Static Home Image Area -->
            <div class="li-static-home-image"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner end -->

    <!-- Show documents start -->
    <section class="product-area li-laptop-product pt-60">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="li-section-title">
              <h2>
                <span>Show Documents</span>
              </h2>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="" style="text-align: center">
                  <p>
                    show study materialshow study materialshow study
                    materialshow study materialshow study materialshow study
                    materialshow study materialshow study materialshow study
                    materialshow study materialshow study materialshow study
                    materialshow study materialshow study materialshow study
                    materialshow study materialshow study material
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper">
                  <a href="login">
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price">INR 1200</div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-image"></i>
                          <p>1</p>
                          <p>Images</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-video-camera"></i>
                          <p>4</p>
                          <p>Videos</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-volume-up"></i>
                          <p>1</p>
                          <p>Audio</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>AIIMS</h4>
                  <p>Engineering Entrance</p>
                  <p>PaulMolive</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <a class="w-100 btn-danger text-white">
                      <i class="fa fa-user"></i> Login Please
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper">
                  <a >
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price bg-success">Free</div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-image"></i>
                          <p>1</p>
                          <p>Images</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-video-camera"></i>
                          <p>4</p>
                          <p>Videos</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-volume-up"></i>
                          <p>1</p>
                          <p>Audio</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>AIIMS</h4>
                  <p>Engineering Entrance</p>
                  <p>PaulMolive</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <a  class="w-100 btn-primary text-white">
                      <i class="fa fa-eye"></i> View Content
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper">
                  <a >
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price">INR 1200</div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-image"></i>
                          <p>1</p>
                          <p>Images</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-video-camera"></i>
                          <p>4</p>
                          <p>Videos</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-volume-up"></i>
                          <p>1</p>
                          <p>Audio</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>AIIMS</h4>
                  <p>Engineering Entrance</p>
                  <p>PaulMolive</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <a  class="w-100 btn-info text-white">
                      <i class="fa fa-money"></i> Pay Now
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper">
                  <a >
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price bg-info">premium</div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-image"></i>
                          <p>1</p>
                          <p>Images</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-video-camera"></i>
                          <p>4</p>
                          <p>Videos</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-volume-up"></i>
                          <p>1</p>
                          <p>Audio</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>AIIMS</h4>
                  <p>Engineering Entrance</p>
                  <p>PaulMolive</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <a  class="w-100 btn-warning text-white">
                      <i class="fa fa-shield"></i> Get Membership
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper">
                  <a href="login">
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price">INR 1200</div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-image"></i>
                          <p>1</p>
                          <p>Images</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-video-camera"></i>
                          <p>4</p>
                          <p>Videos</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-volume-up"></i>
                          <p>1</p>
                          <p>Audio</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>AIIMS</h4>
                  <p>Engineering Entrance</p>
                  <p>PaulMolive</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <a href="login" class="w-100 btn-danger">
                      <i class="fa fa-user"></i> Login Please
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper">
                  <a >
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price bg-success">Free</div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-image"></i>
                          <p>1</p>
                          <p>Images</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-video-camera"></i>
                          <p>4</p>
                          <p>Videos</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-volume-up"></i>
                          <p>1</p>
                          <p>Audio</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>AIIMS</h4>
                  <p>Engineering Entrance</p>
                  <p>PaulMolive</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <a  class="w-100 btn-primary text-white">
                      <i class="fa fa-eye"></i> View Content
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper">
                  <a >
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price">INR 1200</div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-image"></i>
                          <p>1</p>
                          <p>Images</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-video-camera"></i>
                          <p>4</p>
                          <p>Videos</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-volume-up"></i>
                          <p>1</p>
                          <p>Audio</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>AIIMS</h4>
                  <p>Engineering Entrance</p>
                  <p>PaulMolive</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <a  class="w-100 btn-info text-white">
                      <i class="fa fa-money"></i> Pay Now
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper">
                  <a >
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price bg-info">premium</div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-image"></i>
                          <p>1</p>
                          <p>Images</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-video-camera"></i>
                          <p>4</p>
                          <p>Videos</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-volume-up"></i>
                          <p>1</p>
                          <p>Audio</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>AIIMS</h4>
                  <p>Engineering Entrance</p>
                  <p>PaulMolive</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <a  class="w-100 btn-warning text-white">
                      <i class="fa fa-shield"></i> Get Membership
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Show documents end -->

    <!-- quiz show start -->
    <section class="product-area li-laptop-product pt-60">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="li-section-title mb-4">
              <h2>
                <span>Popular Quiz</span>
              </h2>
            </div>
       
            <div class="row">
                      @foreach($popularExams as $exam)
                      <div class="col-lg-3 col-12 mb-50">
                        <div class="quiz_card_upper_third">
                          <a href="">
                            <div class="quiz_card_upper_left">
                              <div class="quiz_price {{ $exam->is_paid ? 'bg-danger' : 'bg-success' }}">
                                {{ $exam->is_paid ? 'Paid' : 'Free' }}
                              </div>
                              <div class="quiz_lock">
                                <h5><i class="fa fa-lock"></i></h5>
                              </div>
                            </div>
                            <div class="quiz_card_middle_content_third">
                              <div class="quiz_card_middle_content_info">
                                <div class="quiz_card_middle_content_info_icon">
                                  <i class="fa fa-question-circle"></i>
                                  <p>{{ $exam->questions->count() }}</p>
                                  <p>Questions</p>
                                </div>
                              </div>

                              <div class="quiz_card_middle_content_info">
                                <div class="quiz_card_middle_content_info_icon">
                                  <i class="fa fa-clock-o"></i>
                                  <p>{{ $exam->duration }}</p>
                                  <p>Minute</p>
                                </div>
                              </div>
                            </div>
                          </a>
                          <div class="quiz_uppder_lower_content">
                            <div class="quiz_uppder_lower_content_info">
                              <a href="#">
                                <h5><i class="fa fa-eye"></i> 201</h5>
                              </a>
                            </div>
                            <div class="quiz_uppder_lower_content_info">
                              <a href="#">
                                <h5><i class="fa fa-heart"></i> 201</h5>
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="quiz_down_card">
                          <h4>{{ $exam->name }}</h4>
                          <p>{{ $exam->category->name }}</p>
                          <p>Total Marks: {{ $exam->total_marks }}</p>
                          <div class="quiz_down_rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <div class="quiz_down_btn">
                            <a href="{{ route('quiz-instraction', ['exam_id' => $exam->id]) }}" class="w-100 btn-dark">
                              <i class="fa fa-play"></i> Start Quiz
                            </a>
                          </div>

                        </div>
                      </div>
                      @endforeach
                    </div>


          </div>
        </div>
      </div>
    </section>
    <!-- quiz show end -->

    <!-- latest quiz start -->
    <section class="product-area li-laptop-product pt-60">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="li-section-title">
              <h2>
                <span>Latest Quizes </span>
              </h2>
            </div>

            <div class="row mt-20">
                      @foreach($latestExams as $exam)
                      <div class="col-lg-3 col-12 mb-50">
                        <div class="quiz_card_upper_third">
                          <a href="">
                            <div class="quiz_card_upper_left">
                              <div class="quiz_price {{ $exam->is_paid ? 'bg-danger' : 'bg-success' }}">
                                {{ $exam->is_paid ? 'Paid' : 'Free' }}
                              </div>
                              <div class="quiz_lock">
                                <h5><i class="fa fa-lock"></i></h5>
                              </div>
                            </div>
                            <div class="quiz_card_middle_content_third">
                              <div class="quiz_card_middle_content_info">
                                <div class="quiz_card_middle_content_info_icon">
                                  <i class="fa fa-question-circle"></i>
                                  <p>{{ $exam->questions->count() }}</p>
                                  <p>Questions</p>
                                </div>
                              </div>

                              <div class="quiz_card_middle_content_info">
                                <div class="quiz_card_middle_content_info_icon">
                                  <i class="fa fa-clock-o"></i>
                                  <p>{{ $exam->duration }}</p>
                                  <p>Minute</p>
                                </div>
                              </div>
                            </div>
                          </a>
                          <div class="quiz_uppder_lower_content">
                            <div class="quiz_uppder_lower_content_info">
                              <a href="#">
                                <h5><i class="fa fa-eye"></i> 201</h5>
                              </a>
                            </div>
                            <div class="quiz_uppder_lower_content_info">
                              <a href="#">
                                <h5><i class="fa fa-heart"></i> 201</h5>
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class="quiz_down_card">
                          <h4>{{ $exam->name }}</h4>
                          <p>{{ $exam->category->name }}</p>
                          <p>Total Marks: {{ $exam->total_marks }}</p>
                          <div class="quiz_down_rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <div class="quiz_down_btn">
                            <a href="{{ route('quiz-instraction', ['exam_id' => $exam->id]) }}" class="w-100 btn-dark">
                              <i class="fa fa-play"></i> Start Quiz
                            </a>
                          </div>

                        </div>
                      </div>
                      @endforeach
                    </div>


          </div>

          </div>
        </div>
      </div>
    </section>
    <!-- latest quiz end -->

    <!-- Popular quiz start -->
    <section class="product-area li-laptop-product pt-60">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="li-section-title">
              <h2>
                <span>Upcoming Quizes</span>
              </h2>
            </div>

            <div class="row mt-20">
              @foreach($upcomingExams as $exam)
              <div class="col-lg-3 col-12 mb-50">
                <div class="quiz_card_upper_fourth">
                  <a href="{{ route('quiz-instraction', ['exam_id' => $exam->id]) }}">
                    <div class="quiz_card_upper_left">
                      <div class="quiz_price {{ $exam->is_paid ? 'bg-danger' : 'bg-success' }}">
                        {{ $exam->is_paid ? 'Paid' : 'Free' }}
                      </div>
                      <div class="quiz_lock">
                        <h5><i class="fa fa-lock"></i></h5>
                      </div>
                    </div>
                    <div class="quiz_card_middle_content_fourth">
                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-question-circle"></i>
                          <p>{{ $exam->questions->count() }}</p>
                          <p>Questions</p>
                        </div>
                      </div>

                      <div class="quiz_card_middle_content_info">
                        <div class="quiz_card_middle_content_info_icon">
                          <i class="fa fa-clock-o"></i>
                          <p>{{ $exam->duration }}</p>
                          <p>Minute</p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="quiz_uppder_lower_content">
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-eye"></i> 201</h5>
                      </a>
                    </div>
                    <div class="quiz_uppder_lower_content_info">
                      <a href="#">
                        <h5><i class="fa fa-heart"></i> 201</h5>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="quiz_down_card">
                  <h4>{{ $exam->name }}</h4>
                  <p>{{ $exam->category->name }}</p>
                  <p>Total Marks: {{ $exam->total_marks }}</p>
                  <div class="quiz_down_rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="quiz_down_btn">
                    <div class="countdown-timer w-100 text-center"
                      data-start="{{ $exam->start_date->format('Y-m-d H:i:s') }}">
                      <span class="days"></span>d
                      <span class="hours"></span>h
                      <span class="minutes"></span>m
                      <span class="seconds"></span>s
                    </div>
                  </div>

                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Popular quiz end -->

    <!--  Latest Study material show start -->
    <section class="product-area li-laptop-product pt-60">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="li-section-title">
              <h2>
                <span> Latest Study material</span>
              </h2>
            </div>
          </div>
        </div>
        <div class="row mt-20">
          <div class="col-lg-3 col-12 mb-50">
            <div class="quiz_card_upper_fifth">
              <a >
                <div class="quiz_card_upper_left">
                  <div class="quiz_price">INR 1200</div>
                  <div class="quiz_lock">
                    <h5><i class="fa fa-lock"></i></h5>
                  </div>
                </div>
                <div class="quiz_card_middle_content_fifth">
                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-image"></i>
                      <p>1</p>
                      <p>Images</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-video-camera"></i>
                      <p>4</p>
                      <p>Videos</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-volume-up"></i>
                      <p>1</p>
                      <p>Audio</p>
                    </div>
                  </div>
                </div>
              </a>
              <div class="quiz_uppder_lower_content">
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-eye"></i> 201</h5>
                  </a>
                </div>
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-heart"></i> 201</h5>
                  </a>
                </div>
              </div>
            </div>

            <div class="quiz_down_card">
              <h4>AIIMS</h4>
              <p>Engineering Entrance</p>
              <p>PaulMolive</p>
              <div class="quiz_down_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="quiz_down_btn">
                <a  class="w-100 btn-primary text-white">
                  <i class="fa fa-eye"></i> View Content
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12 mb-50">
            <div class="quiz_card_upper_fifth">
              <a >
                <div class="quiz_card_upper_left">
                  <div class="quiz_price">INR 1200</div>
                  <div class="quiz_lock">
                    <h5><i class="fa fa-lock"></i></h5>
                  </div>
                </div>
                <div class="quiz_card_middle_content_fifth">
                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-image"></i>
                      <p>1</p>
                      <p>Images</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-video-camera"></i>
                      <p>4</p>
                      <p>Videos</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-volume-up"></i>
                      <p>1</p>
                      <p>Audio</p>
                    </div>
                  </div>
                </div>
              </a>
              <div class="quiz_uppder_lower_content">
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-eye"></i> 201</h5>
                  </a>
                </div>
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-heart"></i> 201</h5>
                  </a>
                </div>
              </div>
            </div>

            <div class="quiz_down_card">
              <h4>AIIMS</h4>
              <p>Engineering Entrance</p>
              <p>PaulMolive</p>
              <div class="quiz_down_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="quiz_down_btn">
                <a  class="w-100 btn-primary text-white">
                  <i class="fa fa-eye"></i> View Content
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12 mb-50">
            <div class="quiz_card_upper_fifth">
              <a >
                <div class="quiz_card_upper_left">
                  <div class="quiz_price bg-success">Free</div>
                  <div class="quiz_lock">
                    <h5><i class="fa fa-lock"></i></h5>
                  </div>
                </div>
                <div class="quiz_card_middle_content_fifth">
                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-image"></i>
                      <p>1</p>
                      <p>Images</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-video-camera"></i>
                      <p>4</p>
                      <p>Videos</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-volume-up"></i>
                      <p>1</p>
                      <p>Audio</p>
                    </div>
                  </div>
                </div>
              </a>
              <div class="quiz_uppder_lower_content">
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-eye"></i> 201</h5>
                  </a>
                </div>
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-heart"></i> 201</h5>
                  </a>
                </div>
              </div>
            </div>

            <div class="quiz_down_card">
              <h4>AIIMS</h4>
              <p>Engineering Entrance</p>
              <p>PaulMolive</p>
              <div class="quiz_down_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="quiz_down_btn">
                <a  class="w-100 btn-primary text-white">
                  <i class="fa fa-eye"></i> View Content
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12 mb-50">
            <div class="quiz_card_upper_fifth">
              <a >
                <div class="quiz_card_upper_left">
                  <div class="quiz_price bg-info">Premium</div>
                  <div class="quiz_lock">
                    <h5><i class="fa fa-lock"></i></h5>
                  </div>
                </div>
                <div class="quiz_card_middle_content_fifth">
                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-image"></i>
                      <p>1</p>
                      <p>Images</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-video-camera"></i>
                      <p>4</p>
                      <p>Videos</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-volume-up"></i>
                      <p>1</p>
                      <p>Audio</p>
                    </div>
                  </div>
                </div>
              </a>
              <div class="quiz_uppder_lower_content">
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-eye"></i> 201</h5>
                  </a>
                </div>
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-heart"></i> 201</h5>
                  </a>
                </div>
              </div>
            </div>

            <div class="quiz_down_card">
              <h4>AIIMS</h4>
              <p>Engineering Entrance</p>
              <p>PaulMolive</p>
              <div class="quiz_down_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="quiz_down_btn">
                <a  class="w-100 btn-warning text-white">
                  <i class="fa fa-shield"></i> Get membership
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Study material show end -->

    <!--  popular study material start -->
    <section class="product-area li-laptop-product pt-60">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="li-section-title">
              <h2>
                <span>popular study material</span>
              </h2>
            </div>
          </div>
        </div>
        <div class="row mt-20">
          <div class="col-lg-3 col-12 mb-50">
            <div class="quiz_card_upper_sixth">
              <a >
                <div class="quiz_card_upper_left">
                  <div class="quiz_price">INR 1200</div>
                  <div class="quiz_lock">
                    <h5><i class="fa fa-lock"></i></h5>
                  </div>
                </div>
                <div class="quiz_card_middle_content_sixth">
                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-image"></i>
                      <p>1</p>
                      <p>Images</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-video-camera"></i>
                      <p>4</p>
                      <p>Videos</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-volume-up"></i>
                      <p>1</p>
                      <p>Audio</p>
                    </div>
                  </div>
                </div>
              </a>
              <div class="quiz_uppder_lower_content">
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-eye"></i> 201</h5>
                  </a>
                </div>
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-heart"></i> 201</h5>
                  </a>
                </div>
              </div>
            </div>

            <div class="quiz_down_card">
              <h4>AIIMS</h4>
              <p>Engineering Entrance</p>
              <p>PaulMolive</p>
              <div class="quiz_down_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="quiz_down_btn">
                <a  class="w-100 btn-primary text-white">
                  <i class="fa fa-eye"></i> View Content
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12 mb-50">
            <div class="quiz_card_upper_sixth">
              <a >
                <div class="quiz_card_upper_left">
                  <div class="quiz_price">INR 1200</div>
                  <div class="quiz_lock">
                    <h5><i class="fa fa-lock"></i></h5>
                  </div>
                </div>
                <div class="quiz_card_middle_content_sixth">
                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-image"></i>
                      <p>1</p>
                      <p>Images</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-video-camera"></i>
                      <p>4</p>
                      <p>Videos</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-volume-up"></i>
                      <p>1</p>
                      <p>Audio</p>
                    </div>
                  </div>
                </div>
              </a>
              <div class="quiz_uppder_lower_content">
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-eye"></i> 201</h5>
                  </a>
                </div>
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-heart"></i> 201</h5>
                  </a>
                </div>
              </div>
            </div>

            <div class="quiz_down_card">
              <h4>AIIMS</h4>
              <p>Engineering Entrance</p>
              <p>PaulMolive</p>
              <div class="quiz_down_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="quiz_down_btn">
                <a  class="w-100 btn-primary text-white">
                  <i class="fa fa-eye"></i> View Content
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12 mb-50">
            <div class="quiz_card_upper_sixth">
              <a >
                <div class="quiz_card_upper_left">
                  <div class="quiz_price">INR 1200</div>
                  <div class="quiz_lock">
                    <h5><i class="fa fa-lock"></i></h5>
                  </div>
                </div>
                <div class="quiz_card_middle_content_sixth">
                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-image"></i>
                      <p>1</p>
                      <p>Images</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-video-camera"></i>
                      <p>4</p>
                      <p>Videos</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-volume-up"></i>
                      <p>1</p>
                      <p>Audio</p>
                    </div>
                  </div>
                </div>
              </a>
              <div class="quiz_uppder_lower_content">
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-eye"></i> 201</h5>
                  </a>
                </div>
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-heart"></i> 201</h5>
                  </a>
                </div>
              </div>
            </div>

            <div class="quiz_down_card">
              <h4>AIIMS</h4>
              <p>Engineering Entrance</p>
              <p>PaulMolive</p>
              <div class="quiz_down_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="quiz_down_btn">
                <a  class="w-100 btn-info text-white">
                  <i class="fa fa-money"></i> Pay Now
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12 mb-50">
            <div class="quiz_card_upper_sixth">
              <a >
                <div class="quiz_card_upper_left">
                  <div class="quiz_price">INR 1200</div>
                  <div class="quiz_lock">
                    <h5><i class="fa fa-lock"></i></h5>
                  </div>
                </div>
                <div class="quiz_card_middle_content_sixth">
                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-image"></i>
                      <p>1</p>
                      <p>Images</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-video-camera"></i>
                      <p>4</p>
                      <p>Videos</p>
                    </div>
                  </div>

                  <div class="quiz_card_middle_content_info">
                    <div class="quiz_card_middle_content_info_icon">
                      <i class="fa fa-volume-up"></i>
                      <p>1</p>
                      <p>Audio</p>
                    </div>
                  </div>
                </div>
              </a>
              <div class="quiz_uppder_lower_content">
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-eye"></i> 201</h5>
                  </a>
                </div>
                <div class="quiz_uppder_lower_content_info">
                  <a href="#">
                    <h5><i class="fa fa-heart"></i> 201</h5>
                  </a>
                </div>
              </div>
            </div>

            <div class="quiz_down_card">
              <h4>AIIMS</h4>
              <p>Engineering Entrance</p>
              <p>PaulMolive</p>
              <div class="quiz_down_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <div class="quiz_down_btn">
                <a  class="w-100 btn-primary text-white">
                  <i class="fa fa-eye"></i> View Content
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- popular study material end -->

    <!-- clients start -->
    <section
      class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
      <div class="container">
        <div class="row">
          <!-- Begin Li's Section Area -->
          <div class="col-lg-12">
            <div class="li-section-title">
              <h2>
                <span>Our Partners</span>
              </h2>
            </div>
            <div class="row">
              <div class="product-active owl-carousel">
                <div class="col-lg-12">
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="#">
                        <img
                          src="onlineTest/images/clients/clients-1.png"
                          alt="Li's Product Image"
                          style="
                              width: 100%;
                              height: 100px;
                              border: 1px dotted #000;
                              padding: 10px;
                            " />
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="#">
                        <img
                          src="onlineTest/images/clients/clients-1.png"
                          alt="Li's Product Image"
                          style="
                              width: 100%;
                              height: 100px;
                              border: 1px dotted #000;
                              padding: 10px;
                            " />
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="#">
                        <img
                          src="onlineTest/images/clients/clients-1.png"
                          alt="Li's Product Image"
                          style="
                              width: 100%;
                              height: 100px;
                              border: 1px dotted #000;
                              padding: 10px;
                            " />
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="#">
                        <img
                          src="onlineTest/images/clients/clients-1.png"
                          alt="Li's Product Image"
                          style="
                              width: 100%;
                              height: 100px;
                              border: 1px dotted #000;
                              padding: 10px;
                            " />
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="#">
                        <img
                          src="onlineTest/images/clients/clients-1.png"
                          alt="Li's Product Image"
                          style="
                              width: 100%;
                              height: 100px;
                              border: 1px dotted #000;
                              padding: 10px;
                            " />
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="#">
                        <img
                          src="onlineTest/images/clients/clients-1.png"
                          alt="Li's Product Image"
                          style="
                              width: 100%;
                              height: 100px;
                              border: 1px dotted #000;
                              padding: 10px;
                            " />
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="#">
                        <img
                          src="onlineTest/images/clients/clients-1.png"
                          alt="Li's Product Image"
                          style="
                              width: 100%;
                              height: 100px;
                              border: 1px dotted #000;
                              padding: 10px;
                            " />
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="#">
                        <img
                          src="onlineTest/images/clients/clients-1.png"
                          alt="Li's Product Image"
                          style="
                              width: 100%;
                              height: 100px;
                              border: 1px dotted #000;
                              padding: 10px;
                            " />
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Li's Section Area End Here -->
        </div>
      </div>
    </section>
    <!-- clients end-->

    <!-- Membership start -->
    <section
      class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
      <div class="container">
        <div class="row">
          <!-- Begin Li's Section Area -->
          <div class="col-lg-12">
            <div class="li-section-title">
              <h2>
                <span>Membership</span>
              </h2>
            </div>
            <div class="row mt-50">
              <div class="col-lg-4 col-12">
                <div class="member-card">
                  <div class="member_top_bg"></div>
                  <div class="member_content">
                    <div class="member_top_line"></div>
                    <h2>Medical</h2>
                    <p>(medical Entrance)</p>
                  </div>
                  <div class="member_price">
                    <h5>INR 1200</h5>
                  </div>
                  <div class="member_list">
                    <ul>
                      <li>
                        <span><i class="fa fa-check"></i></span> 12 days
                      </li>
                      <li>
                        <span><i class="fa fa-check"></i></span> Engineering
                        Membership
                      </li>
                    </ul>
                  </div>
                  <div class="member_btn">
                    <a  class="text-white" >Buy Now</a>
                    <a class="text-white" >View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Membership end-->

    <!-- Banner start-->
    <div class="li-static-home mb-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- Begin Li's Static Home Image Area -->
            <div class="li-static-home-image"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner end -->
  </div>
  @include('frontend.layouts.onlineTestFooter')

</body>

<!-- index30:23-->

</html>
@endsection



@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const countdowns = document.querySelectorAll('.countdown-timer');

    countdowns.forEach(timer => {
      const startDate = new Date(timer.dataset.start).getTime();

      const countdown = setInterval(function() {
        const now = new Date().getTime();
        const distance = startDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        timer.querySelector('.days').textContent = days;
        timer.querySelector('.hours').textContent = hours;
        timer.querySelector('.minutes').textContent = minutes;
        timer.querySelector('.seconds').textContent = seconds;

        if (distance < 0) {
          clearInterval(countdown);
          timer.innerHTML = "Exam Started";
        }
      }, 1000);
    });
  });
</script>
@endpush


<style>
  .countdown-timer {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    color: #333;
  }

  .countdown-timer span {
    display: inline-block;
    min-width: 30px;
  }
</style>