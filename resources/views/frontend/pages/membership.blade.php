@extends('frontend.layouts.master')


@section('content')


<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <!-- index28:48-->
  @include('frontend.layouts.onlineTestHeader')

  <body>
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper mt-5">
      <!-- Begin Header Area -->


      <!-- Membership start -->
      <section
        class="product-area li-laptop-product li-trendding-products best-sellers pb-45"
      >
        <div class="container">
          <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
       
              <div class="row mt-50">
                <div class="col-lg-4 col-12">
                  <div class="member-card">
                    <div class="member_top_bg"></div>
                    <div class="member_content">
                      <!-- <div class="member_top_line"></div> -->
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
                      <a href="view-payment-screen.html">Buy Now</a>
                      <a href="category-membership">View</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-12">
                  <div class="member-card">
                    <div class="member_top_bg"></div>

                    <div class="member_content text-center">
                      <!-- <div class="member_top_line"></div> -->
                      <h2>Category Membership</h2>
                      <p>( engineering Entrance)</p>
                    </div>
                    <div class="member_price">
                      <h5>INR 90</h5>
                    </div>
                    <div class="member_list">
                      <ul>
                        <li>
                          <span><i class="fa fa-check"></i></span> 100 days
                        </li>
                        <li>
                          <span><i class="fa fa-check"></i></span> medical
                          entrance membership
                        </li>
                      </ul>
                    </div>
                    <div class="member_btn">
                      <a href="view-payment-screen.html">Buy Now</a>
                      <a href="category-membership">View</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-12">
                  <div class="member-card">
                    <div class="member_top_bg"></div>
                    <div class="member_content text-center">
                      <!-- <div class="member_top_line text-center"></div> -->
                      <h2>Individual Membership</h2>
                      <!-- <p>(medical Entrance)</p> -->
                    </div>
                    <div class="member_price">
                      <h5>INR 20</h5>
                    </div>
                    <div class="member_list">
                      <ul>
                        <li>
                          <span><i class="fa fa-check"></i></span> 10 days
                        </li>
                        <li>
                          <span><i class="fa fa-check"></i></span> individual
                          membership for user on particular quizes or study
                          material
                        </li>
                      </ul>
                    </div>
                    <div class="member_btn">
                      <a href="view-payment-screen.html">Buy Now</a>
                      <a href="category-membership">View</a>
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