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
<!--============================
        BREADCRUMB START
    ==============================-->
<section id="wsus__breadcrumb">
  <div class="wsus_breadcrumb_overlay">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h4>Result</h4>
          <ul>
            <li><a href="{{route('home')}}">home</a></li>
            <li><a href="javascript:;">Result</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--============================
        BREADCRUMB END
    ==============================-->


<!--============================
        PAYMENT PAGE START
    ==============================-->
    <section class="bg-gradient py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-12">
        <div class="card shadow-lg border-0 rounded-lg">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <div class="mb-3">
                <i class="fas fa-search-location fa-3x text-primary"></i>
              </div>
              <h4 class="text-dark fw-bold mb-2">Result Finder</h4>
              <p class="text-muted">
                Enter your unique barcode to access your exam results
              </p>
            </div>

            <form style="width: 90%; margin: 0 auto" action="{{ route('result') }}" method="GET">
    <div class="search-wrapper">
        <div class="input-group input-group-lg shadow-sm flex-column gap-3">

            <!-- Select Exam -->
            <div class="w-100">
                <label for="exam_id" class="form-label fw-bold">Select Exam</label>
                <select name="exam_id" id="exam_id" class="form-select form-select-lg rounded-3 shadow-sm border-0" required>
                    <option value="">Select Exam</option>
                    @foreach($exams as $exam)
                        <option value="{{ $exam->id }}" {{ request('exam_id') == $exam->id ? 'selected' : '' }}>
                            {{ $exam->exam_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Barcode Input -->
            <div class="input-group input-group-lg shadow-sm">
                <input
                    type="text"
                    name="barcode"
                    class="form-control border-0 ps-4 rounded-start"
                    placeholder="Enter your barcode number..."
                    aria-label="barcode"
                    value="{{ request('barcode') }}"
                    autocomplete="off"
                    required
                />
                <button class="btn btn-primary px-4 rounded-end" type="submit">
                    <i class="fas fa-search me-2"></i>Search
                </button>
            </div>

        </div>
    </div>
</form>


            <div class="text-center mt-4">
              <small class="text-muted">
                <i class="fas fa-info-circle me-1"></i>
                Make sure to enter the complete barcode number
              </small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Add this CSS in your style section -->
<style>
.search-wrapper {
  position: relative;
}

.search-wrapper .form-control:focus {
  box-shadow: none;
  border-color: #dee2e6;
}

.search-wrapper .btn-primary {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  padding-left: 1.5rem;
  padding-right: 1.5rem;
  transition: all 0.3s ease;
}

.search-wrapper .btn-primary:hover {
  transform: translateX(3px);
}

.card {
  backdrop-filter: blur(10px);
  background: rgba(255, 255, 255, 0.9);
  transition: all 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
}

@media (max-width: 768px) {
  .card-body {
    padding: 2rem !important;
  }
}
</style>

<!-- Add this JavaScript before closing body tag -->
<script>
$(document).ready(function() {
  // Add animation to search button
  $('.search-wrapper .btn-primary').hover(
    function() {
      $(this).find('i').addClass('fa-beat');
    },
    function() {
      $(this).find('i').removeClass('fa-beat');
    }
  );

  // Add smooth focus effect
  $('.search-wrapper .form-control').focus(function() {
    $(this).closest('.card').addClass('shadow-lg');
  }).blur(function() {
    $(this).closest('.card').removeClass('shadow-lg');
  });
});
</script>



<section>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .result_top_box {
      text-align: center;
      margin-bottom: 20px;
    }

    .result_top_box img {
      max-width: 100px;
      margin: 0 15px;
    }

    .student_info th {
      width: 150px;
    }

    .student_result th,
    .student_result td {
      text-align: center;
    }

    .barcode_result img {
      display: block;
      margin: auto;
    }

    .icon-list {
      display: flex;
      justify-content: space-around;
      align-items: center;
    }

    .icons {
      display: flex;
      gap: 10px;
    }

    .in_icon {
      font-size: 24px;
    }
  </style>

  <style>
    .student_result {
      border: 1px solid red;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .student_result table {
      width: 100%;
      border-collapse: collapse;
    }

    .student_result th,
    .student_result td {
      padding: 10px;
      text-align: center;
      border: 1px solid #ddd;
    }

    .student_result th {
      background-color: #f8f8f8;
      font-weight: bold;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .student_result table {
        display: block;
        overflow-x: auto;
      }
    }
  </style>



  <!-- Only show this section if a barcode was searched for -->
  @if(request('barcode'))
  @if($primaryResult)


  <!-- Only show this section if a barcode was searched for and buttons are enabled -->
@if(request('barcode') && $primaryResult)
<div class="container p-5 d-flex justify-content-center">
    @if($settings->show_certificate_button)
    <!-- Add a Download Certificate button -->
    <div class="text-center me-3">
        <a
            href="{{ route('result.download', ['barcode' => request('barcode')]) }}"
            class="btn btn-success"
            style="margin-top: 20px;"
        >
            Download Certificate
        </a>
    </div>
    @endif
    
    @if($settings->show_marksheet_button)
    <!-- Add a Download Marksheet button -->
    <div class="text-center">
        <a
            href="{{ route('result.markshit', ['barcode' => request('barcode')]) }}"
            class="btn btn-success"
            style="margin-top: 20px;"
        >
            Download Marksheet
        </a>
    </div>
    @endif
</div>
@endif


    
  <div class="container py-5">
    <!-- Example certificate layout using $primaryResult data -->
    <div
      class="result_top_box"
      style="
            border: 1px solid red;
            padding: 10px;
            display: flex;
            justify-content: space-between;
          ">
      <div>
      @if(isset($logos) && $logos->logo)
          <img  src="{{asset(@$logos->logo)}}" alt="logo" class="img-fluid" />
      @else
          <img src="{{ asset('frontend/images/iw2.jpeg') }}" alt="logo" class="img-fluid" />
      @endif

      </div>
      <div>
        <h4
          class="text-danger text-uppercase"
          style="
                color: red;
                text-transform: uppercase;
                font-size: 24px;
                margin-bottom: 0;
              ">
          Managed By
        </h4>
        <h3 class="text-uppercase">
          DHYEYA PRAKASHAN ACADEMY,<br />
          MAHARASHTRA I AM WINNER STATE LEVEL COMPETITIVE EXAM
        </h3>
      </div>
      <div>
      @if(isset($logos) && $logos->logo_2)
          <img  src="{{asset(@$logos->logo_2)}}" alt="logo" class="img-fluid" />
      @else
      <img src="{{ asset('frontend/images/l1.jpeg') }}" alt="logo" class="img-fluid" />

      @endif
      </div>
    </div>

    <div
      class="student_info"
      style="border: 1px solid red; padding: 10px; margin-bottom: 20px">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th>Name</th>
            <td>:</td>
            <td>{{ $primaryResult->name }}</td>
          </tr>
          <tr>
            <th>Gender</th>
            <td>:</td>
            <td>{{ $primaryResult->gender }}</td>
            <th>Medium</th>
            <td>:</td>
            <td>{{ $primaryResult->medium }}</td>
            <th>Standard</th>
            <td>:</td>
            <td>{{ $primaryResult->std }}</td>
          </tr>
          <tr>
            <th>Seat No.</th>
            <td>:</td>
            <td>{{ $primaryResult->seat_no }}</td>
            <th>Taluka</th>
            <td>:</td>
            <td>{{ $primaryResult->taluka }}</td>
            <th>District</th>
            <td>:</td>
            <td>{{ $primaryResult->district }}</td>
          </tr>
          <tr>
            <th>School Name</th>
            <td>:</td>
            <td>{{ $primaryResult->school_name }}</td>
          </tr>
          <tr>
            <th>Exam Centre</th>
            <td>:</td>
            <td>{{ $primaryResult->exam_centre }}</td>
          </tr>
          <tr>
            <th>Barcode</th>
            <td>:</td>
            <td>{{ $primaryResult->barcode }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="student_result" style="border: 1px solid red; padding: 15px;">
      <table class="table">
        <thead>
          <tr>
            <th>Paper-1</th>
            <th>Paper-2</th>
            <th>Total</th>
            <th>Percentage</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          @php
          // Fetch percentage
          $percentage = $primaryResult->percentage;

          // Calculate grade based on percentage
          $grade = '';
          if ($percentage >= 90) {
          $grade = 'A+';
          } elseif ($percentage >= 80) {
          $grade = 'A';
          } elseif ($percentage >= 70) {
          $grade = 'B+';
          } elseif ($percentage >= 60) {
          $grade = 'B';
          } elseif ($percentage >= 50) {
          $grade = 'C+';
          } elseif ($percentage >= 40) {
          $grade = 'C';
          } else {
          $grade = 'F';
          }
          @endphp
          <tr>
            <td>{{ $primaryResult->first_paper }}</td>
            <td>{{ $primaryResult->second_paper }}</td>
            <td>{{ $primaryResult->total_marks }}</td>
            <td>{{ $primaryResult->percentage }}%</td>
            <td>{{ $grade }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @else
  <!-- If no data found for this barcode -->
  <div class="container py-5">
    <h4 class="text-danger">Result not found!</h4>
  </div>
  @endif
  @endif
</section>




<!--============================
        PAYMENT PAGE END
    ==============================-->
@endsection