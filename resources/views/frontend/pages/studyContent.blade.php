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
            <div class="col-lg-12 mb-40">
              <!-- Begin Li's Banner Area -->
              <div class="single-banner shop-page-banner" style="height: 150px">
                <a href="#">
                  <img src="onlineTest/images/bg-banner/1.jpg" alt="Li's Static Banner" />
                </a>
              </div>
              <!-- Li's Banner Area End Here -->
            </div>
            <div class="col-12">
              <div class="study_content_card">
                <div class="study_content">
                  <div class="study_content_img">
                    <img src="onlineTest/images/team/1.png" alt="user" class="user_img" />
                  </div>
                  <div class="study_content_text">
                    <h6>Suraj Jamdade</h6>
                    <p>suraj@gmail.com</p>
                  </div>
                </div>
                <div class="study_content_body">
                  <div>
                    <h4 class="text-white">AIIMS-Copy-1</h4>
                  </div>
                  <div
                    style="
                      display: flex;
                      flex-wrap: wrap;
                      gap: 20px;
                      justify-content: center;
                    "
                    class="mt-10"
                  >
                    <button type="button" class="btn btn-light btn-sm">
                      Video <span class="badge badge-danger">9</span>
                    </button>
                    <button type="button" class="btn btn-light btn-sm">
                      Audio <span class="badge badge-danger">9</span>
                    </button>
                    <button type="button" class="btn btn-light btn-sm">
                      Images <span class="badge badge-danger">9</span>
                    </button>
                    <button type="button" class="btn btn-light btn-sm">
                      Pdf <span class="badge badge-danger">9</span>
                    </button>
                    <button type="button" class="btn btn-light btn-sm">
                      Doc <span class="badge badge-danger">9</span>
                    </button>
                    <button type="button" class="btn btn-light btn-sm">
                      Other <span class="badge badge-danger">9</span>
                    </button>
                  </div>
                  <div class="mt-20">
                    <a href="view-quiz" class="btn btn-dark">
                      <span><i class="fa fa-eye"></i></span> View Content
                    </a>
                  </div>
                </div>

                <div
                  class=""
                  style="
                    display: flex;
                    justify-content: end;
                    align-items: center;
                    text-align: center;
                    margin-right: 30px;
                  "
                >
                  <a
                    href=""
                    style="
                      background-color: rgb(4 4 4 / 47%);
                      color: #fff;
                      padding: 10px;
                      width: 80px;
                      height: 80px;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      margin: 10px;
                    "
                  >
                    <div class="">
                      <i class="fa fa-heart fa-2x"></i>
                      <p style="color: #fff; font-size: 12px">1 Like</p>
                    </div>
                  </a>
                  <a
                    href=""
                    style="
                      background-color: rgb(4 4 4 / 47%);
                      color: #fff;
                      padding: 10px;
                      width: 80px;
                      height: 80px;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      margin: 10px;
                    "
                  >
                    <div class="">
                      <i class="fa fa-rupee fa-2x"></i>
                      <p style="color: #fff; font-size: 12px">INR 10</p>
                    </div>
                  </a>
                  <a
                    href=""
                    style="
                      background-color: rgb(4 4 4 / 47%);
                      color: #fff;
                      padding: 10px;
                      width: 80px;
                      height: 80px;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      margin: 10px;
                    "
                  >
                    <div class="">
                      <i class="fa fa-star fa-2x"></i>
                      <p style="color: #fff; font-size: 12px">0.0</p>
                    </div>
                  </a>
                  <a
                    href=""
                    style="
                      background-color: rgb(4 4 4 / 47%);
                      color: #fff;
                      padding: 10px;
                      width: 80px;
                      height: 80px;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      margin: 10px;
                    "
                  >
                    <div class="">
                      <i class="fa fa-eye fa-2x"></i>
                      <p style="color: #fff; font-size: 12px">170 Views</p>
                    </div>
                  </a>
                </div>

                <div style="display: flex; gap: 20px; margin: 20px">
                  <a href="" class="text-white">
                    <i class="fa fa-facebook fa-2x"></i>
                  </a>
                  <a href="" class="text-white">
                    <i class="fa fa-instagram fa-2x"></i>
                  </a>
                  <a href="" class="text-white">
                    <i class="fa fa-twitter fa-2x"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content Wraper Area End Here -->

      <!-- collapse start -->
      <div class="container mb-50">
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button
                  class="btn btn-link btn-block text-left"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  Session 1: Test
                  <p class="text-primary">
                    <i class="fa fa-clock-o"></i> 77 min
                  </p>
                </button>
              </h2>
            </div>

            <div
              id="collapseOne"
              class="collapse show"
              aria-labelledby="headingOne"
              data-parent="#accordionExample"
            >
              <div class="card-body">
                <div class="mb-10">
                  <p
                    class="py-2 text-info no_underline w-100 p-0"
                    style="margin: 0; color: blue !important"
                  >
                    1. Learn To Draw #01 - Sketching Basics + Materials
                  </p>
                  <p style="color: #000; font-size: 12px">
                    <span
                      ><i
                        class="fa fa-clock-o"
                        style="color: #000; font-size: 12px"
                      ></i
                    ></span>
                    15 min
                  </p>
                </div>

                <div class="mb-10">
                  <p
                    class="py-2 text-info no_underline w-100 p-0"
                    style="margin: 0; color: blue !important"
                  >
                    2. References
                  </p>
                  <p style="color: #000; font-size: 12px">
                    <span
                      ><i
                        class="fa fa-clock-o"
                        style="color: #000; font-size: 12px"
                      ></i
                    ></span>
                    11 min
                  </p>
                </div>

                <div class="mb-10">
                  <p
                    class="py-2 text-info no_underline w-100 p-0"
                    style="margin: 0; color: blue !important"
                  >
                    3. New external video
                  </p>
                  <p style="color: #000; font-size: 12px">
                    <span
                      ><i
                        class="fa fa-clock-o"
                        style="color: #000; font-size: 12px"
                      ></i
                    ></span>
                    10 min
                  </p>
                </div>

                <div class="mb-10">
                  <p
                    class="py-2 text-info no_underline w-100 p-0"
                    style="margin: 0; color: blue !important"
                  >
                    4. test2
                  </p>
                  <p style="color: #000; font-size: 12px">
                    <span
                      ><i
                        class="fa fa-clock-o"
                        style="color: #000; font-size: 12px"
                      ></i
                    ></span>
                    12 min
                  </p>
                </div>

                <div class="mb-10">
                  <p
                    class="py-2 text-info no_underline w-100 p-0"
                    style="margin: 0; color: blue !important"
                  >
                    5. anatomy
                  </p>
                  <p style="color: #000; font-size: 12px">
                    <span
                      ><i
                        class="fa fa-clock-o"
                        style="color: #000; font-size: 12px"
                      ></i
                    ></span>
                    0 min
                  </p>
                </div>

                <div class="mb-10">
                  <p
                    class="py-2 text-info no_underline w-100 p-0"
                    style="margin: 0; color: blue !important"
                  >
                    6. qqqq
                  </p>
                  <p style="color: #000; font-size: 12px">
                    <span
                      ><i
                        class="fa fa-clock-o"
                        style="color: #000; font-size: 12px"
                      ></i
                    ></span>
                    10 min
                  </p>
                </div>

                <div class="mb-10">
                  <p
                    class="py-2 text-info no_underline w-100 p-0"
                    style="margin: 0; color: blue !important"
                  >
                    7. doccc
                  </p>
                  <p style="color: #000; font-size: 12px">
                    <span
                      ><i
                        class="fa fa-clock-o"
                        style="color: #000; font-size: 12px"
                      ></i
                    ></span>
                    19 min
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- collapse end -->

      <div class="product-area pt-35">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="li-product-tab">
                <ul class="nav li-product-menu">
                  <li>
                    <a class="active show" data-toggle="tab" href="#description"
                      ><span>Description</span></a
                    >
                  </li>
                  <li>
                    <a data-toggle="tab" href="#reviews" class=""
                      ><span>Reviews</span></a
                    >
                  </li>
                  <li>
                    <a data-toggle="tab" href="#product-details" class=""
                      ><span>Associate Quiz</span></a
                    >
                  </li>
                </ul>
              </div>
              <!-- Begin Li's Tab Menu Content Area -->
            </div>
          </div>
          <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
              <div class="product-description">
                <span
                  >The best is yet to come! Give your walls a voice with a
                  framed poster. This aesthethic, optimistic poster will look
                  great in your desk or in an open-space office. Painted wooden
                  frame with passe-partout for more depth.</span
                >
              </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
              <div class="product-details-manufacturer">
                <a href="#">
                  <img
                    src="onlineTest/images/product-details/1.jpg"
                    alt="Product Manufacturer Image"
                  />
                </a>
                <p><span>Reference</span> demo_7</p>
                <p><span>Reference</span> demo_7</p>
              </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
              <div class="product-reviews">
                <div class="product-details-comment-block">
                  <div class="comment-review">
                    <span>Grade</span>
                    <ul class="rating">
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li class="no-star"><i class="fa fa-star-o"></i></li>
                      <li class="no-star"><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                  <div class="comment-author-infos pt-25">
                    <span>HTML 5</span>
                    <em>01-12-18</em>
                  </div>
                  <div class="comment-details">
                    <h4 class="title-block">Demo</h4>
                    <p>Plaza</p>
                  </div>
                  <div class="review-btn">
                    <a
                      class="review-links"
                      href="#"
                      data-toggle="modal"
                      data-target="#mymodal"
                      >Write Your Review!</a
                    >
                  </div>
                  <!-- Begin Quick View | Modal Area -->
                  <div
                    class="modal fade modal-wrapper"
                    id="mymodal"
                    aria-hidden="true"
                    style="display: none"
                  >
                    <div
                      class="modal-dialog modal-dialog-centered"
                      role="document"
                    >
                      <div class="modal-content">
                        <div class="modal-body">
                          <h3 class="review-page-title">Write Your Review</h3>
                          <div class="modal-inner-area row">
                            <div class="col-lg-12">
                              <div class="li-review-content">
                                <!-- Begin Feedback Area -->
                                <div class="feedback-area">
                                  <div class="feedback">
                                    <h3 class="feedback-title">Our Feedback</h3>
                                    <form action="#">
                                      <p class="your-opinion">
                                        <label>Your Rating</label>
                                        <span>
                                          <div
                                            class="br-wrapper br-theme-fontawesome-stars"
                                          >
                                            <select
                                              class="star-rating"
                                              style="display: none"
                                            >
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                            </select>
                                            <div class="br-widget">
                                              <a
                                                href="#"
                                                data-rating-value="1"
                                                data-rating-text="1"
                                                class="br-selected br-current"
                                              ></a
                                              ><a
                                                href="#"
                                                data-rating-value="2"
                                                data-rating-text="2"
                                              ></a
                                              ><a
                                                href="#"
                                                data-rating-value="3"
                                                data-rating-text="3"
                                              ></a
                                              ><a
                                                href="#"
                                                data-rating-value="4"
                                                data-rating-text="4"
                                              ></a
                                              ><a
                                                href="#"
                                                data-rating-value="5"
                                                data-rating-text="5"
                                              ></a>
                                              <div class="br-current-rating">
                                                1
                                              </div>
                                            </div>
                                          </div>
                                        </span>
                                      </p>
                                      <p class="feedback-form">
                                        <label for="feedback"
                                          >Your Review</label
                                        >
                                        <textarea
                                          id="feedback"
                                          name="comment"
                                          cols="45"
                                          rows="8"
                                          aria-required="true"
                                        ></textarea>
                                      </p>
                                      <div class="feedback-input">
                                        <p class="feedback-form-author">
                                          <label for="author"
                                            >Name<span class="required">*</span>
                                          </label>
                                          <input
                                            id="author"
                                            name="author"
                                            value=""
                                            size="30"
                                            aria-required="true"
                                            type="text"
                                          />
                                        </p>
                                        <p
                                          class="feedback-form-author feedback-form-email"
                                        >
                                          <label for="email"
                                            >Email<span class="required"
                                              >*</span
                                            >
                                          </label>
                                          <input
                                            id="email"
                                            name="email"
                                            value=""
                                            size="30"
                                            aria-required="true"
                                            type="text"
                                          />
                                          <span class="required"
                                            ><sub>*</sub> Required fields</span
                                          >
                                        </p>
                                        <div class="feedback-btn">
                                          <a
                                            href="#"
                                            class="close"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                            >Close</a
                                          >
                                          <a href="#">Submit</a>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- Feedback Area End Here -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Quick View | Modal Area End Here -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-50">
        <div class="row">
          <div class="col-lg-12 mb-40">
            <!-- Begin Li's Banner Area -->
            <div class="single-banner shop-page-banner" style="height: 150px">
              <a href="#">
                <img src="onlineTest/images/bg-banner/1.jpg" alt="Li's Static Banner" />
              </a>
            </div>
            <!-- Li's Banner Area End Here -->
          </div>
        </div>
      </div>
    </div>
    @include('frontend.layouts.onlineTestFooter')
  </body>

  <!-- shop-list-left-sidebar31:48-->
</html>
@endsection