@extends('frontend.layouts.master')


@section('content')


<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <!-- index28:48-->
  @include('frontend.layouts.onlineTestHeader')

  <body>
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">


      <!-- Begin Li's Content Wraper Area -->
      <div class="content-wraper pt-60 pb-60">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- Begin Li's Banner Area -->
              <div class="single-banner shop-page-banner" style="height: 150px">
                <a href="#">
                  <img src="onlineTest/images/bg-banner/1.jpg" alt="Li's Static Banner" />
                </a>
              </div>
              <!-- Li's Banner Area End Here -->

              <!-- shop-top-bar start -->
              <div class="shop-top-bar mt-30">
                <div class="shop-bar-inner">
                  <div class="product-view-mode">
                    <!-- Second Tab Filter (Grid and List View) -->
                    <ul class="nav shop-item-filter-list" role="tablist">
                      <li class="active" role="presentation">
                        <a
                          aria-selected="true"
                          class="active show"
                          data-toggle="tab"
                          role="tab"
                          aria-controls="grid-view"
                          href="#grid-view"
                          ><h6>Quize</h6></a
                        >
                      </li>
                      &nbsp; &nbsp; | &nbsp; &nbsp;
                      <li role="presentation">
                        <a
                          data-toggle="tab"
                          role="tab"
                          aria-controls="list-view"
                          href="#list-view"
                          ><h6>Study Material</h6></a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- shop-top-bar end -->

              <!-- shop-products-wrapper start -->
              <div class="shop-products-wrapper">
                <div class="tab-content">
                  <!-- Grid View -->
                  <div
                    id="grid-view"
                    class="tab-pane fade active show"
                    role="tabpanel"
                  >
                    <div class="product-area shop-product-area">
                      <!-- Add product grid items here if needed -->
                      <section class="product-area li-laptop-product pt-60">
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="li-section-title">
                                <h2>
                                  <span>Category Membership </span>
                                </h2>
                              </div>

                              <div class="row mt-20">
                                <div class="col-lg-3 col-12 mb-50">
                                  <div class="quiz_card_upper_third">
                                    <a href="start-quiz">
                                      <div class="quiz_card_upper_left">
                                        <div class="quiz_price bg-success">
                                          Free
                                        </div>
                                        <div class="quiz_lock">
                                          <h5><i class="fa fa-lock"></i></h5>
                                        </div>
                                      </div>
                                      <div
                                        class="quiz_card_middle_content_third"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info"
                                        >
                                          <div
                                            class="quiz_card_middle_content_info_icon"
                                          >
                                            <i
                                              class="fa fa-question-circle"
                                            ></i>
                                            <p>21</p>
                                            <p>Questions</p>
                                          </div>
                                        </div>

                                        <div
                                          class="quiz_card_middle_content_info"
                                        >
                                          <div
                                            class="quiz_card_middle_content_info_icon"
                                          >
                                            <i class="fa fa-clock-o"></i>
                                            <p>30</p>
                                            <p>Minute</p>
                                          </div>
                                        </div>
                                      </div>
                                    </a>
                                    <div class="quiz_uppder_lower_content">
                                      <div
                                        class="quiz_uppder_lower_content_info"
                                      >
                                        <a href="#">
                                          <h5><i class="fa fa-eye"></i> 201</h5>
                                        </a>
                                      </div>
                                      <div
                                        class="quiz_uppder_lower_content_info"
                                      >
                                        <a href="#">
                                          <h5>
                                            <i class="fa fa-heart"></i> 201
                                          </h5>
                                        </a>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="quiz_down_card">
                                    <h4>Sbi So</h4>
                                    <p>Bank Exam</p>
                                    <p>PaulMolive</p>
                                    <div class="quiz_down_rating">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                    </div>
                                    <div class="quiz_down_btn">
                                      <a
                                        href="start-quiz"
                                        class="w-100 btn-dark"
                                      >
                                        <i class="fa fa-play"></i> Start Quiz
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-12 mb-50">
                                  <div class="quiz_card_upper_third">
                                    <a href="start-quiz">
                                      <div class="quiz_card_upper_left">
                                        <div class="quiz_price bg-success">
                                          Free
                                        </div>
                                        <div class="quiz_lock">
                                          <h5><i class="fa fa-lock"></i></h5>
                                        </div>
                                      </div>
                                      <div
                                        class="quiz_card_middle_content_third"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info"
                                        >
                                          <div
                                            class="quiz_card_middle_content_info_icon"
                                          >
                                            <i
                                              class="fa fa-question-circle"
                                            ></i>
                                            <p>21</p>
                                            <p>Questions</p>
                                          </div>
                                        </div>

                                        <div
                                          class="quiz_card_middle_content_info"
                                        >
                                          <div
                                            class="quiz_card_middle_content_info_icon"
                                          >
                                            <i class="fa fa-clock-o"></i>
                                            <p>30</p>
                                            <p>Minute</p>
                                          </div>
                                        </div>
                                      </div>
                                    </a>
                                    <div class="quiz_uppder_lower_content">
                                      <div
                                        class="quiz_uppder_lower_content_info"
                                      >
                                        <a href="#">
                                          <h5><i class="fa fa-eye"></i> 201</h5>
                                        </a>
                                      </div>
                                      <div
                                        class="quiz_uppder_lower_content_info"
                                      >
                                        <a href="#">
                                          <h5>
                                            <i class="fa fa-heart"></i> 201
                                          </h5>
                                        </a>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="quiz_down_card">
                                    <h4>Sbi So</h4>
                                    <p>Bank Exam</p>
                                    <p>PaulMolive</p>
                                    <div class="quiz_down_rating">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                    </div>
                                    <div class="quiz_down_btn">
                                      <a
                                        href="start-quiz"
                                        class="w-100 btn-dark"
                                      >
                                        <i class="fa fa-play"></i> Start Quiz
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-12 mb-50">
                                  <div class="quiz_card_upper_third">
                                    <a href="start-quiz">
                                      <div class="quiz_card_upper_left">
                                        <div class="quiz_price bg-success">
                                          Free
                                        </div>
                                        <div class="quiz_lock">
                                          <h5><i class="fa fa-lock"></i></h5>
                                        </div>
                                      </div>
                                      <div
                                        class="quiz_card_middle_content_third"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info"
                                        >
                                          <div
                                            class="quiz_card_middle_content_info_icon"
                                          >
                                            <i
                                              class="fa fa-question-circle"
                                            ></i>
                                            <p>21</p>
                                            <p>Questions</p>
                                          </div>
                                        </div>

                                        <div
                                          class="quiz_card_middle_content_info"
                                        >
                                          <div
                                            class="quiz_card_middle_content_info_icon"
                                          >
                                            <i class="fa fa-clock-o"></i>
                                            <p>30</p>
                                            <p>Minute</p>
                                          </div>
                                        </div>
                                      </div>
                                    </a>
                                    <div class="quiz_uppder_lower_content">
                                      <div
                                        class="quiz_uppder_lower_content_info"
                                      >
                                        <a href="#">
                                          <h5><i class="fa fa-eye"></i> 201</h5>
                                        </a>
                                      </div>
                                      <div
                                        class="quiz_uppder_lower_content_info"
                                      >
                                        <a href="#">
                                          <h5>
                                            <i class="fa fa-heart"></i> 201
                                          </h5>
                                        </a>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="quiz_down_card">
                                    <h4>Sbi So</h4>
                                    <p>Bank Exam</p>
                                    <p>PaulMolive</p>
                                    <div class="quiz_down_rating">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                    </div>
                                    <div class="quiz_down_btn">
                                      <a
                                        href="start-quiz"
                                        class="w-100 btn-dark"
                                      >
                                        <i class="fa fa-play"></i> Start Quiz
                                      </a>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-12 mb-50">
                                  <div class="quiz_card_upper_third">
                                    <a href="start-quiz">
                                      <div class="quiz_card_upper_left">
                                        <div class="quiz_price bg-success">
                                          Free
                                        </div>
                                        <div class="quiz_lock">
                                          <h5><i class="fa fa-lock"></i></h5>
                                        </div>
                                      </div>
                                      <div
                                        class="quiz_card_middle_content_third"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info"
                                        >
                                          <div
                                            class="quiz_card_middle_content_info_icon"
                                          >
                                            <i
                                              class="fa fa-question-circle"
                                            ></i>
                                            <p>21</p>
                                            <p>Questions</p>
                                          </div>
                                        </div>

                                        <div
                                          class="quiz_card_middle_content_info"
                                        >
                                          <div
                                            class="quiz_card_middle_content_info_icon"
                                          >
                                            <i class="fa fa-clock-o"></i>
                                            <p>30</p>
                                            <p>Minute</p>
                                          </div>
                                        </div>
                                      </div>
                                    </a>
                                    <div class="quiz_uppder_lower_content">
                                      <div
                                        class="quiz_uppder_lower_content_info"
                                      >
                                        <a href="#">
                                          <h5><i class="fa fa-eye"></i> 201</h5>
                                        </a>
                                      </div>
                                      <div
                                        class="quiz_uppder_lower_content_info"
                                      >
                                        <a href="#">
                                          <h5>
                                            <i class="fa fa-heart"></i> 201
                                          </h5>
                                        </a>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="quiz_down_card">
                                    <h4>Sbi So</h4>
                                    <p>Bank Exam</p>
                                    <p>PaulMolive</p>
                                    <div class="quiz_down_rating">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                    </div>
                                    <div class="quiz_down_btn">
                                      <a
                                        href="start-quiz"
                                        class="w-100 btn-dark"
                                      >
                                        <i class="fa fa-play"></i> Start Quiz
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>
                  </div>

                  <!-- List View (Active by Default) -->
                  <div
                    id="list-view"
                    class="tab-pane fade product-list-view"
                    role="tabpanel"
                  >
                    <section class="product-area li-laptop-product pt-60">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="li-section-title">
                              <h2>
                                <span>Study Material </span>
                              </h2>
                            </div>

                            <div class="row mt-50">
                              <div class="col-lg-3 col-12 mb-50">
                                <div class="quiz_card_upper">
                                  <a href="study-content.html">
                                    <div class="quiz_card_upper_left">
                                      <div class="quiz_price">INR 1200</div>
                                      <div class="quiz_lock">
                                        <h5><i class="fa fa-lock"></i></h5>
                                      </div>
                                    </div>
                                    <div class="quiz_card_middle_content">
                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
                                          <i class="fa fa-image"></i>
                                          <p>1</p>
                                          <p>Images</p>
                                        </div>
                                      </div>

                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
                                          <i class="fa fa-video-camera"></i>
                                          <p>4</p>
                                          <p>Videos</p>
                                        </div>
                                      </div>

                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
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
                                    <a
                                      href="study-content.html"
                                      class="w-100 btn-info"
                                    >
                                      <i class="fa fa-eye"></i> View Content
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-12 mb-50">
                                <div class="quiz_card_upper">
                                  <a href="study-content.html">
                                    <div class="quiz_card_upper_left">
                                      <div class="quiz_price">INR 1200</div>
                                      <div class="quiz_lock">
                                        <h5><i class="fa fa-lock"></i></h5>
                                      </div>
                                    </div>
                                    <div class="quiz_card_middle_content">
                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
                                          <i class="fa fa-image"></i>
                                          <p>1</p>
                                          <p>Images</p>
                                        </div>
                                      </div>

                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
                                          <i class="fa fa-video-camera"></i>
                                          <p>4</p>
                                          <p>Videos</p>
                                        </div>
                                      </div>

                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
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
                                    <a
                                      href="study-content.html"
                                      class="w-100 btn-info"
                                    >
                                      <i class="fa fa-eye"></i> View Content
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-12 mb-50">
                                <div class="quiz_card_upper">
                                  <a href="study-content.html">
                                    <div class="quiz_card_upper_left">
                                      <div class="quiz_price">INR 1200</div>
                                      <div class="quiz_lock">
                                        <h5><i class="fa fa-lock"></i></h5>
                                      </div>
                                    </div>
                                    <div class="quiz_card_middle_content">
                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
                                          <i class="fa fa-image"></i>
                                          <p>1</p>
                                          <p>Images</p>
                                        </div>
                                      </div>

                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
                                          <i class="fa fa-video-camera"></i>
                                          <p>4</p>
                                          <p>Videos</p>
                                        </div>
                                      </div>

                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
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
                                    <a
                                      href="study-content.html"
                                      class="w-100 btn-info"
                                    >
                                      <i class="fa fa-eye"></i> View Content
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-12 mb-50">
                                <div class="quiz_card_upper">
                                  <a href="study-content.html">
                                    <div class="quiz_card_upper_left">
                                      <div class="quiz_price">INR 1200</div>
                                      <div class="quiz_lock">
                                        <h5><i class="fa fa-lock"></i></h5>
                                      </div>
                                    </div>
                                    <div class="quiz_card_middle_content">
                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
                                          <i class="fa fa-image"></i>
                                          <p>1</p>
                                          <p>Images</p>
                                        </div>
                                      </div>

                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
                                          <i class="fa fa-video-camera"></i>
                                          <p>4</p>
                                          <p>Videos</p>
                                        </div>
                                      </div>

                                      <div
                                        class="quiz_card_middle_content_info"
                                      >
                                        <div
                                          class="quiz_card_middle_content_info_icon"
                                        >
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
                                    <a
                                      href="study-content.html"
                                      class="w-100 btn-info"
                                    >
                                      <i class="fa fa-eye"></i> View Content
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
              <!-- shop-products-wrapper end -->
            </div>
          </div>
        </div>
      </div>
      <!-- Content Wraper Area End Here -->
    </div>
    @include('frontend.layouts.onlineTestFooter')
  </body>

  <!-- shop-list-left-sidebar31:48-->
</html>

@endsection