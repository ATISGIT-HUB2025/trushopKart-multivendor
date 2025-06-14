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
          <div class="col-lg-9 order-1 order-lg-2">
            <!-- Begin Li's Banner Area -->
            <div class="single-banner shop-page-banner" style="height: 150px">
              <a href="#">
                <img src="{{ asset('onlineTest/images/bg-banner/1.jpg') }}" alt="Li's Static Banner" />
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
                      <a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view"
                        href="#grid-view"><i class="fa fa-th"></i></a>
                    </li>
                    <li role="presentation">
                      <a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i
                          class="fa fa-th-list"></i></a>
                    </li>
                  </ul>
                </div>

                <div class="toolbar-amount">
                  <a href="category.html"><span style="color: red; font-weight: bold">Quiz</span></a>
                  &nbsp; | &nbsp;<a href="category-study-material.html">
                    <span>Study Material</span></a>
                </div>
              </div>

              <!-- product-select-box start -->
              <div class="product-select-box">
                <div class="product-short">
                  <p>Sort By:</p>
                  <select class="nice-select">
                    <option value="trending">Relevance</option>
                    <option value="sales">Most Recent</option>
                    <option value="sales">Most Liked</option>
                    <option value="rating">Most Attended</option>
                    <option value="date">Alphabetic</option>
                  </select>
                </div>
              </div>
              <!-- product-select-box end -->
            </div>
            <!-- shop-top-bar end -->





            <!-- shop-products-wrapper start -->
            <div class="shop-products-wrapper">
              <div class="tab-content">
                <!-- Grid View -->
                <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                  <div class="product-area shop-product-area">
                    <!-- Add product grid items here if needed -->


                    <div class="row">
                      @foreach($exams as $exam)
                      <div class="col-lg-4 col-12 mb-50">
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

      <!-- List View -->
<div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
    <div class="row">
        <div class="col">
            @foreach($exams as $exam)
            <div class="row product-layout-list">
                <div class="col-lg-8 col-md-7">
                    <div class="product_desc">
                        <div class="product_desc_info">
                            <div class="product-review">
                                <h5 class="manufacturer">
                                    <a href="#">{{ $exam->name }}</a>
                                </h5>
                                <!-- Rating section -->
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="price-box">
                                    <span class="new-price">
                                        <i class="fa fa-calendar"></i> 
                                        {{ $exam->start_date ? $exam->start_date->format('d M Y') : 'N/A' }}
                                    </span>
                                </div>
                                <div class="price-box">
                                    <span class="new-price">
                                        <i class="fa fa-question-circle"></i> 
                                        {{ $exam->questions->count() }} Questions
                                    </span>
                                </div>
                                <div class="price-box">
                                    <span class="new-price">
                                        <i class="fa fa-clock-o"></i> 
                                        {{ $exam->duration }} Minutes
                                    </span>
                                </div>
                                <div class="price-box">
                                    <span class="new-price">
                                        <i class="fa fa-lock"></i> 
                                        {{ $exam->is_paid ? 'Paid' : 'Free' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="shop-add-action">
                        <div class="quiz_down_btn">
                            @auth
                                <a href="{{ route('quiz-instraction', ['exam_id' => $exam->id]) }}" 
                                   class="w-100 btn-dark">
                                    <i class="fa fa-play"></i> Start Quiz
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="w-100 btn-dark">
                                    <i class="fa fa-lock"></i> Login to Start
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


                <!-- Pagination Area -->
                <div class="paginatoin-area">
                  <div class="row">
                    <div class="col-lg-6 col-md-6">
                      <p>Showing {{ $exams->firstItem() }}-{{ $exams->lastItem() }} of {{ $exams->total() }} item(s)</p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      {{ $exams->links() }}
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <!-- shop-products-wrapper end -->
          </div>

          <div class="col-lg-3 order-2 order-lg-1">
            <!--sidebar-categores-box start  -->

<!-- Subject Filter -->
<div class="sidebar-categores-box">
    <div class="sidebar-title">
        <h2>Subject</h2>
    </div>
    <button class="btn-clear-all mb-sm-30 mb-xs-30 mb-10 clear-filter" data-type="subjects">
        Clear all
    </button>
    <div class="filter-sub-area">
        <div class="categori-checkbox">
            <form id="subject-filter">
                <ul>
                    @foreach($subjects as $subject)
                    <li>
                        <input type="checkbox" name="subjects[]" value="{{ $subject }}"
                            class="filter-checkbox"
                            {{ in_array($subject, (array)request()->get('subjects', [])) ? 'checked' : '' }} />
                        <a href="#">{{ $subject }}</a>
                    </li>
                    @endforeach
                </ul>
            </form>
        </div>
    </div>
</div>


            <!-- Standard Filter -->
            <div class="sidebar-categores-box">
              <div class="sidebar-title">
                <h2>Standard</h2>
              </div>
              <button class="btn-clear-all mb-sm-30 mb-xs-30 mb-10 clear-filter" data-type="standards">
                Clear all
              </button>
              <div class="filter-sub-area">
                <div class="categori-checkbox">
                  <form id="standard-filter">
                    <ul>
                      @foreach($standards as $standard)
                      <li>
                        <input type="checkbox" name="standards[]" value="{{ $standard }}"
                          class="filter-checkbox"
                          {{ in_array($standard, request()->get('standards', [])) ? 'checked' : '' }} />
                        <a href="#">{{ $standard }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </form>
                </div>
              </div>
            </div>

            <!-- Medium Filter -->
            <div class="sidebar-categores-box">
              <div class="sidebar-title">
                <h2>Medium</h2>
              </div>
              <button class="btn-clear-all mb-sm-30 mb-xs-30 mb-10 clear-filter" data-type="mediums">
                Clear all
              </button>
              <div class="filter-sub-area">
                <div class="categori-checkbox">
                  <form id="medium-filter">
                    <ul>
                      @foreach($mediums as $medium)
                      <li>
                        <input type="checkbox" name="mediums[]" value="{{ $medium }}"
                          class="filter-checkbox"
                          {{ in_array($medium, request()->get('mediums', [])) ? 'checked' : '' }} />
                        <a href="#">{{ $medium }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </form>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
    <!-- Content Wraper Area End Here -->
  </div>



  @include('frontend.layouts.onlineTestFooter')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
$(document).ready(function() {
    $('.filter-checkbox').change(function() {
        applyFilters();
    });
    
    $('.clear-filter').click(function(e) {
        e.preventDefault();
        var filterType = $(this).data('type');
        $(`input[name="${filterType}[]"]`).prop('checked', false);
        applyFilters();
    });
    
    function applyFilters() {
        var subjects = $('input[name="subjects[]"]:checked').map(function() {
            return this.value;
        }).get();
        
        var standards = $('input[name="standards[]"]:checked').map(function() {
            return this.value;
        }).get();
        
        var mediums = $('input[name="mediums[]"]:checked').map(function() {
            return this.value;
        }).get();
        
        var url = new URL(window.location.href);
        url.searchParams.delete('subjects[]');
        url.searchParams.delete('standards[]');
        url.searchParams.delete('mediums[]');
        
        subjects.forEach(subject => url.searchParams.append('subjects[]', subject));
        standards.forEach(standard => url.searchParams.append('standards[]', standard));
        mediums.forEach(medium => url.searchParams.append('mediums[]', medium));
        
        window.location.href = url.toString();
    }
});
</script>


</body>

<!-- shop-list-left-sidebar31:48-->

</html>
@endsection
