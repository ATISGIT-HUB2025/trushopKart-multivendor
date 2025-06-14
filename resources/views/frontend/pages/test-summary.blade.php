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
                            <img src="onlineTest/images/bg-banner/1.jpg" alt="Li's Static Banner" />
                        </a>
                    </div>
                    <!-- Li's Banner Area End Here -->
                </div>

                <div class="col-12 mb-40">
                    <div class="li-section-title" style="display: flex; justify-content: space-between">
                        <h2>
                            <span> IBPS RRB Quiz Summary </span>
                        </h2>
                        <a href="test-summary-print.html" class="btn btn-light btn-sm">Print</a>
                    </div>
                </div>

                <div class="col-lg-12 mb-40">
    <div class="row">
        <div class="col-lg-4">
            <h6>Total Attempted Questions :- {{ $result->total_questions - ($result->total_questions - count($result->answers)) }}/{{ $result->total_questions }}</h6>
        </div>
        <div class="col-lg-4">
            <h6>Your Score :- {{ round(($result->obtained_marks / $exam->total_marks) * 100) }}% {{ $result->passed ? 'Pass' : 'Fail' }}</h6>
        </div>
        <div class="col-lg-4">
            <h6>Time Spend :- {{ $result->completed_at->diffForHumans(false, true) }}</h6>
        </div>
    </div>
</div>


                <div class="col-lg-12 mb-40">
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-6">
    <div class="table-content table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td class="li-product-remove">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <p style="width: 20px; height: 20px; background: red"></p>
                            <h6 style="font-size: 14px">Total Questions</h6>
                        </div>
                    </td>
                    <td class="li-product-thumbnail">{{ $result->total_questions }}</td>
                </tr>

                <tr>
                    <td class="li-product-remove">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <p style="width: 20px; height: 20px; background: green;"></p>
                            <h6 style="font-size: 14px">Total Attempted Questions</h6>
                        </div>
                    </td>
                    <td class="li-product-thumbnail">{{ count($result->answers) }}</td>
                </tr>

                <tr>
                    <td class="li-product-remove">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <p style="width: 20px; height: 20px; background: teal;"></p>
                            <h6 style="font-size: 14px">Correct Answer</h6>
                        </div>
                    </td>
                    <td class="li-product-thumbnail">{{ $result->correct_answers }}</td>
                </tr>

                <tr>
                    <td class="li-product-remove">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <p style="width: 20px; height: 20px; background: red"></p>
                            <h6 style="font-size: 14px">InCorrect Answer</h6>
                        </div>
                    </td>
                    <td class="li-product-thumbnail">{{ $result->wrong_answers }}</td>
                </tr>

                <tr>
                    <td class="li-product-remove">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <p style="width: 20px; height: 20px; background: orangered;"></p>
                            <h6 style="font-size: 14px">Not Attempted</h6>
                        </div>
                    </td>
                    <td class="li-product-thumbnail">{{ $result->total_questions - count($result->answers) }}</td>
                </tr>

                <tr>
                    <td class="li-product-remove">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <p style="width: 20px; height: 20px; background: blue;"></p>
                            <h6 style="font-size: 14px">Quiz Language</h6>
                        </div>
                    </td>
                    <td class="li-product-thumbnail">English</td>
                </tr>

                <tr>
                    <td class="li-product-remove">
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <p style="width: 20px; height: 20px; background: greenyellow;"></p>
                            <h6 style="font-size: 14px">Marks For Correct Answer</h6>
                        </div>
                    </td>
                    <td class="li-product-thumbnail">{{ $exam->total_marks / $result->total_questions }}</td>
                </tr>

                <tr>
                    <td class="li-product-thumbnail bg-danger text-white" colspan="2">
                        Got {{ $result->obtained_marks }} Out of {{ $exam->total_marks }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>




                    </div>
                </div>

                <div class="col-lg-12 mb-40">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Questions</th>
                                    <th class="li-product-thumbnail">Given Answer</th>
                                    <th class="cart-product-name">Correct Answer</th>
                                    <th class="li-product-price">Status</th>
                                    <th class="li-product-stock-status">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $index => $question)
<tr>
    <td class="li-product-remove">
        <a href="#" style="color: #000; font-size: 14px">
            {{ $index + 1 }}. {{ $question->question }}
        </a>
    </td>
    <td class="li-product-thumbnail">
        <a href="#">{{ isset($result->answers[$question->id]) ? $result->answers[$question->id] : '-' }}</a>
    </td>
    <td class="li-product-name">
        <a href="#" style="color: #000; font-size: 14px">{{ $question->correct_answer }}</a>
    </td>
    <td class="li-product-price">
    @if(!isset($result->answers[$question->id]))
        <span class="badge badge-warning">not attempted</span>
    @elseif(substr($result->answers[$question->id], -1) === $question->correct_answer)
        <span class="badge badge-success">correct</span>
    @else
        <span class="badge badge-danger">incorrect</span>
    @endif
</td>

    <td class="li-product-add-cart">
        <a href="#" data-toggle="modal" data-target="#viewAnsModal-{{ $question->id }}">View Answer</a>
    </td>
</tr>
@endforeach


                 
                            </tbody>
                        </table>
                    </div>
                </div>

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
    <!-- Body Wrapper End Here -->

    <!-- view ans modal -->

    <div class="modal fade" id="viewAnsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Questions Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <h6>Question</h6>
                    </div>

                    <div class="mb-10" style="background: #d9f3a4; padding: 10px">
                        <p style="color: #000">
                            01. The amount of light entering the eye is regulated by
                        </p>
                    </div>

                    <div>
                        <div class="form-check mb-10" style="display: flex; gap: 20px; align-items: center">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                style="height: 18px; width: 20px" />
                            <label class="form-check-label" style="margin-left: 10px" for="defaultCheck1">
                                Ciliary Body
                            </label>
                        </div>

                        <div class="form-check mb-10" style="display: flex; gap: 20px; align-items: center">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                style="height: 18px; width: 20px" />
                            <label class="form-check-label" style="margin-left: 10px" for="defaultCheck1">
                                Pupil
                            </label>
                        </div>

                        <div class="form-check mb-10" style="display: flex; gap: 20px; align-items: center">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                style="height: 18px; width: 20px" />
                            <label class="form-check-label" style="margin-left: 10px" for="defaultCheck1">
                                Pupil
                            </label>
                        </div>

                        <div class="form-check mb-10" style="display: flex; gap: 20px; align-items: center">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                style="height: 18px; width: 20px" />
                            <label class="form-check-label" style="margin-left: 10px" for="defaultCheck1">
                                Schlera
                            </label>
                        </div>
                    </div>
                    <div style="text-align: end">
                        <p class="badge badge-warning">Not Attempted</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById("myChart").getContext("2d");

    const data = {
        labels: ["Not Attempted", "Right Answer", "Wrong Answer"],
        datasets: [
            {
                label: "Quiz Results",
                data: [
                    {{ $result->total_questions - count($result->answers) }}, // Not Attempted
                    {{ $result->correct_answers }}, // Right Answer
                    {{ $result->wrong_answers }} // Wrong Answer
                ],
                backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
                hoverOffset: 8,
            },
        ],
    };

    const config = {
        type: "pie",
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                    labels: {
                        font: {
                            size: 14,
                        },
                        color: "#333",
                    },
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: "#333",
                    titleColor: "#fff", 
                    bodyColor: "#fff",
                    displayColors: false,
                },
            },
        },
    };

    const myChart = new Chart(ctx, config);
</script>


    @include('frontend.layouts.onlineTestFooter')

  </body>

<!-- shop-list-left-sidebar31:48-->

</html>

@endsection