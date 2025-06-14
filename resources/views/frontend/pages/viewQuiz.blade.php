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
              <div class="card bg-light" style="padding: 10px">
                <div class="row">
                  <div class="col-lg-4 mb-10">
                    <i class="fa fa-book"></i> AIIMS Copy 1
                  </div>
                  <div class="col-lg-4 mb-10">
                    <div class="progress mt-10">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 25%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      >
                        25%
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-10">
                    <a href="study-content" class="btn btn-primary btn-sm"
                      >Study Material Detail</a
                    >
                    <a
                      href="category-membership"
                      class="btn btn-warning btn-sm"
                      >My Courses</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
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
            <div class="col-lg-8">
              <div class="card bg-light text-center" style="padding: 10px">
                <h4>New External Video</h4>
              </div>
              <div class="card mt-40">
                <iframe
                  src="https://www.youtube.com/embed/DR2c266yWEA"
                  allow="autoplay; encrypted-media"
                  allowfullscreen
                ></iframe>
                <div class="card-footer">
                  <a href="" class="btn btn-primary btn-block"
                    >Go to Next Chapter</a
                  >
                </div>
              </div>
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