@extends('frontend.layouts.master')


@section('content')

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<!-- index28:48-->
@include('frontend.layouts.onlineTestHeader')

<body>
  <!-- Begin Body Wrapper -->
  <div class="body-wrapper">


    <div class="container mt-50">
      <div class="row">
        <div class="col-lg-12 mb-40">
          <!-- Begin Li's Banner Area -->
          <div class="single-banner shop-page-banner" style="height: 150px">
            <a href="#">
              <img src="https://i.ibb.co.com/xg3Np2t/imge-one-one.jpg" alt="Li's Static Banner" />
            </a>
          </div>
          <!-- Li's Banner Area End Here -->
        </div>

        <div class="col-12">
          <div class="text-center mb-5">
            <h2 class="display-4 font-weight-bold text-primary">
              Please read the instructions carefully
            </h2>
          </div>

          <div class="card border-0 shadow-lg rounded-lg mx-auto">
            <div class="card-header bg-primary text-white py-4">
              <h3 class="mb-0 text-center">General Instructions</h3>
            </div>

            <div class="card-body p-5">
              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="info-box bg-light p-4 rounded mb-3">
                    <i class="fa fa-question-circle fa-2x text-primary mb-2"></i>
                    <h5>Total Questions</h5>
                    <h4 class="text-primary">{{ $exam->questions->count() }}</h4>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-light p-4 rounded mb-3">
                    <i class="fa fa-clock-o fa-2x text-primary mb-2"></i>
                    <h5>Duration</h5>
                    <h4 class="text-primary">{{ $exam->duration }} minutes</h4>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-light p-4 rounded mb-3">
                    <i class="fa fa-star fa-2x text-primary mb-2"></i>
                    <h5>Total Marks</h5>
                    <h4 class="text-primary">{{ $exam->total_marks }}</h4>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-light p-4 rounded mb-3">
                    <i class="fa fa-check-circle fa-2x text-primary mb-2"></i>
                    <h5>Pass Marks</h5>
                    <h4 class="text-primary">{{ $exam->pass_marks }}</h4>
                  </div>
                </div>
              </div>
              <div class="card-body p-5">
                <!-- Existing info boxes code remains same -->

                <!-- Add this new section for Audio/Video -->
                <div class="media-section mb-4">
                  @if($exam->audio || $exam->video)
                  <!-- <h4 class="mb-3">Multimedia Instructions</h4> -->

                  @if($exam->audio)
                  <div class="audio-box bg-light p-4 rounded mb-3">
                    <h5 class="text-primary mb-3">
                      <i class="fa fa-headphones mr-2"></i>Audio Instructions
                    </h5>
                    <audio controls class="w-100">
                      <source src="{{ asset($exam->audio) }}" type="audio/mpeg">
                      Your browser does not support the audio element.
                    </audio>
                  </div>
                  @endif

                  @if($exam->video)
                  <div class="video-box bg-light p-4 rounded mb-3">
                    <h5 class="text-primary mb-3">
                      <i class="fa fa-video-camera mr-2"></i>Video Instructions
                    </h5>
                    <div class="video-container">
                      <video controls class="w-100">
                        <source src="{{ asset($exam->video) }}" type="video/mp4">
                        Your browser does not support the video element.
                      </video>
                    </div>
                  </div>
                  @endif
                </div>
                @endif

                <div class="conditions-section p-4 bg-light rounded">
                  <h4 class="mb-3">Important Guidelines</h4>
                  {!! $exam->conditions !!}
                </div>
              </div>

              <div class="card-footer border-0 p-4 bg-white">
                <a href="{{ route('start-quiz', ['exam_id' => $exam->id]) }}"
                  class="btn btn-primary btn-lg btn-block py-3 font-weight-bold rounded-pill shadow-sm">
                  <i class="fa fa-play-circle mr-2"></i>
                  Start Quiz
                </a>
              </div>
            </div>
          </div>


          <div class="col-lg-12 mb-40 mt-40">
            <!-- Begin Li's Banner Area -->
            <div class="single-banner shop-page-banner" style="height: 150px">
              <a href="#">
                <img src="{{asset('onlineTest/images/bg-banner/1.jpg')}}" alt="Li's Static Banner" />
              </a>
            </div> <!-- Li's Banner Area End Here -->
          </div>
        </div>
      </div>
    </div>
    @include('frontend.layouts.onlineTestFooter')
</body>

<!-- shop-list-left-sidebar31:48-->

</html>
@endsection



<style>
  .info-box {
    transition: transform 0.2s;
    text-align: center;
  }

  .info-box:hover {
    transform: translateY(-5px);
  }

  .conditions-section {
    border-left: 4px solid #007bff;
  }

  .btn-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
    border: none;
    transition: all 0.3s ease;
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4) !important;
  }


  .audio-box,
  .video-box {
    transition: all 0.3s ease;
    border-left: 4px solid #007bff;
  }

  .audio-box:hover,
  .video-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  .video-container {
    position: relative;
    padding-bottom: 56.25%;
    /* 16:9 Aspect Ratio */
    height: 0;
    overflow: hidden;
  }

  .video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 8px;
  }

  audio {
    border-radius: 30px;
    background: #f8f9fa;
  }
</style>