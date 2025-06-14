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
              <img src="{{asset('onlineTest/images/bg-banner/1.jpg')}}" alt="Li's Static Banner" />
            </a>
          </div>
          <!-- Li's Banner Area End Here -->
        </div>

        <div class="col-12 mb-30">
          <div class="card">
            <div class="card-body">
              <div class="row">


                <div class="col-lg-4">
                  <h4>{{ $exam->name }}</h4>
                </div>
                <div class="col-lg-7">
                  <div style="display: flex; gap: 10px; align-items: center">
                    <h4>Count Down:</h4>
                    <div id="countdown" class="countdown-timer">{{ $exam->duration }}:00</div>
                  </div>
                </div>
                <div class="col-lg-1">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#infoModal">
                    <i class="fa fa-info"></i>
                  </button>



                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Question Display Section -->
        <div class="col-lg-8 mb-50">
          <form id="quizForm" action="{{ route('submit-quiz') }}" method="POST">
            @csrf
            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
            <input type="hidden" name="answers" value="{}">

            <div class="card">
              <div class="card-body">
                <div>
                <h4 style="border-bottom: 1px solid #f2f2f2; padding: 10px">
    Question Number {{ $questions->search($currentQuestion) + 1 }}
    @if($currentQuestion->section)
        <span class="badge badge-primary float-right">
            Section: {{ $currentQuestion->section->title }}
        </span>
    @endif
</h4>


                  <p style="color: #000; font-size: 18px; padding: 30px">
                    {{ $currentQuestion->question }}
                  </p>
                </div>

                <div class="selectgroup selectgroup-pills w-100" data-id="{{ $currentQuestion->id }}">
                  <label class="selectgroup-item btn-block">
                    <input type="radio" name="answer" value="option_a" class="selectgroup-input answer_input">
                    <div class="selectgroup-button">{{ $currentQuestion->option_a }}</div>
                  </label>

                  <label class="selectgroup-item btn-block">
                    <input type="radio" name="answer" value="option_b" class="selectgroup-input answer_input">
                    <div class="selectgroup-button">{{ $currentQuestion->option_b }}</div>
                  </label>

                  <label class="selectgroup-item btn-block">
                    <input type="radio" name="answer" value="option_c" class="selectgroup-input answer_input">
                    <div class="selectgroup-button">{{ $currentQuestion->option_c }}</div>
                  </label>

                  <label class="selectgroup-item btn-block">
                    <input type="radio" name="answer" value="option_d" class="selectgroup-input answer_input">
                    <div class="selectgroup-button">{{ $currentQuestion->option_d }}</div>
                  </label>
                </div>
              </div>

              <div class="card-footer d-flex justify-content-between">
                <div>
                  <button type="button" class="prev_btn btn btn-secondary"
                    data-question="{{ $currentQuestion->id - 1 }}" {{ $currentQuestion->id == $questions->first()->id ? 'disabled' : '' }}>
                    <i class="fa fa-arrow-left"></i> Previous
                  </button>

                  <button type="button" class="next_btn btn btn-primary" data-question="{{ $currentQuestion->id + 1 }}">
                    <i class="fa fa-arrow-right"></i> Next
                  </button>

                  <button type="submit" class="submit-btn btn btn-success" style="display: none;">
                    <i class="fa fa-check"></i> Submit Quiz
                  </button>
                </div>
              </div>
            </div>
          </form>

        </div>



        <div class="col-lg-4 col-12 mb-50">
          <div class="card" style="padding: 30px">
            <div class="mb-20">
              <h6>Question Palette</h6>
            </div>
            <div>
              @foreach($questions as $index => $question)
          <button class="btn btn-secondary btn-sm question-btn" data-question="{{ $question->id }}"
          style="margin-left: 20px; margin-bottom: 20px">
          {{ $index + 1 }}
          </button>
        @endforeach
            </div>
          </div>
        </div>



        <div class="col-lg-12 mb-40">
          <!-- Begin Li's Banner Area -->
          <div class="single-banner shop-page-banner" style="height: 150px">
            <a href="#">
              <img src="{{asset('onlineTest/images/bg-banner/1.jpg')}}" alt="Li's Static Banner" />
            </a>
          </div>
          <!-- Li's Banner Area End Here -->
        </div>
      </div>
    </div>
  </div>
  <!-- Body Wrapper End Here -->


  <!-- stop quiz modal -->

  <!-- info modal -->

  <div class="modal fade" id="stopQuizModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center" style="
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
            ">
          <div style="
                text-align: center;
                border: 1px solid #f8bb86;
                width: 100px;
                height: 100px;
                border-radius: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 20px;
              ">
            <i class="fa fa-exclamation-triangle fa-2x text-warning"></i>
          </div>
          <div>
            <h6>Are You Sure</h6>
          </div>
          <div>
            <p>you not attempt question is 7</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <a href="test-summary">
            <button type="button" class="btn btn-primary">
              Submit Question
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>




  @include('frontend.layouts.onlineTestFooter')

  <!-- Add this script section after including onlineTestFooter -->
  <script>
$(document).ready(function () {
    // Handle answer selection
    $(document).on('change', '.answer_input', function () {
        // Get current question ID from the parent container
        let currentQuestionId = $(this).closest('.selectgroup-pills').attr('data-id');
        let answer = $(this).val();
        
        console.log('Current question ID:', currentQuestionId);
        console.log('Selected answer:', answer);

        // Get existing answers from localStorage
        let answers = JSON.parse(localStorage.getItem('quiz_answers') || '{}');

        // Add this answer while keeping previous answers
        answers[currentQuestionId] = answer;

        // Store all answers back to localStorage
        localStorage.setItem('quiz_answers', JSON.stringify(answers));

        // Update question palette
        $('.question-btn[data-question="' + currentQuestionId + '"]')
            .removeClass('btn-secondary')
            .addClass('btn-success');
    });
});


// Add this to your existing JavaScript
$('#quizForm').on('submit', function(e) {
    e.preventDefault();
    
    // Get answers from localStorage
    const answers = localStorage.getItem('quiz_answers');
    
    // Set the answers to the hidden input
    $('input[name="answers"]').val(answers);
    
    // Submit the form
    this.submit();
    
    // Clear localStorage after submission
    localStorage.removeItem('quiz_answers');
});




    // Timer functionality
    let timeLeft = {{ $exam->duration * 60 }}; // convert minutes to seconds
    const countdownElement = document.getElementById('countdown');

    function startCountdown() {
      const countdownInterval = setInterval(() => {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;

        countdownElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        if (timeLeft > 0) {
          timeLeft -= 1;
        } else {
          clearInterval(countdownInterval);
          // Auto submit when time's up
          window.location.href = "{{ route('test-summary') }}";
        }
      }, 1000);
    }

    startCountdown();

    // Question navigation
    // $('.next_btn, .prev_btn, .question-btn').click(function () {
    //   let questionId = $(this).data('question');
    //   loadQuestion(questionId);
    // });

    $('.next_btn, .prev_btn').off('click').on('click', function () {
    if (!$(this).prop('disabled')) {
        let questionId = $(this).data('question');
        console.log('Question ID:', questionId);
        loadQuestion(questionId);
    }
});


    function loadQuestion(questionId) {
      $.ajax({
        url: "{{ url('get-question') }}/" + questionId,
        method: 'GET',
        success: function (response) {
          // Update question content
          updateQuestionContent(response);

          // Update selectgroup data-id
          $('.selectgroup-pills').attr('data-id', response.id);

          // Clear previous radio selection
          $('.answer_input').prop('checked', false);

          // Restore saved answer if exists
          if (answers[response.id]) {
            $(`input[name="answer"][value="${answers[response.id]}"]`).prop('checked', true);
          }
        },
        error: function () {
          alert('This question is not part of the current exam');
        }
      });
    }


    // Question navigation
    $('.next_btn, .prev_btn, .question-btn').click(function () {
      if (!$(this).prop('disabled')) {
        let questionId = $(this).data('question');
        loadQuestion(questionId);
      }
    });

    function updateQuestionContent(question) {
          // Update the data-id attribute for the question container
    $('.selectgroup-pills').attr('data-id', question.id);
    
      console.log('Updating question content for question ID:', question.id);
      console.log('Updating question content for question ID:', question.question);

      // Get current question index
      let currentIndex = $('.question-btn[data-question="' + question.id + '"]').index() + 1;
    let sectionHtml = question.section ? 
        `<span class="badge badge-primary float-right">Section: ${question.section.title}</span>` : '';
    
    $('h4:contains("Question Number")').html(
        `Question Number ${currentIndex} ${sectionHtml}`
    );
      // Update question content
      $('p:contains("' + $('.question-text').text() + '")').text(question.question);

      // Update options
      $('input[value="option_a"]').next('.selectgroup-button').text(question.option_a);
      $('input[value="option_b"]').next('.selectgroup-button').text(question.option_b);
      $('input[value="option_c"]').next('.selectgroup-button').text(question.option_c);
      $('input[value="option_d"]').next('.selectgroup-button').text(question.option_d);

      // Update navigation buttons
      $('.prev_btn').data('question', question.id - 1);
      $('.next_btn').data('question', question.id + 1);

      // Handle button states
      let isFirstQuestion = question.id == {{ $questions->first()->id }};
      let isLastQuestion = question.id == {{ $questions->last()->id }};

      $('.prev_btn').prop('disabled', isFirstQuestion);

      // Show/hide next and submit buttons
      if (isLastQuestion) {
        $('.next_btn').hide();
        $('.submit-btn').show();
      } else {
        $('.next_btn').show();
        $('.submit-btn').hide();
      }

      let savedAnswer = answers[question.id] || localStorage.getItem('question_' + question.id);
      if (savedAnswer) {
        $('input[name="answer"][value="' + savedAnswer + '"]').prop('checked', true);
      }

 
// For debugging:
console.log('Updated data-id to:', $('.selectgroup-pills').attr('data-id'));

    }

  </script>

</body>

<!-- shop-list-left-sidebar31:48-->

</html>

@endsection