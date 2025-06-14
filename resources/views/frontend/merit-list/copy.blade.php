@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
@endsection

@section('content')


<section class="bg-light p-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center mb-3">
          <div>
            <img src="https://i.ibb.co.com/k2XgxCJf/1.jpg" alt="logo" width="100" />
          </div>
          <h4 class="text-danger mt-3">DPAM Merit List 2025</h4>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Reprehenderit, voluptate.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row m-4">
      <div class="col-lg-8">
        <h4 class="text-danger">List-2025</h4>
      </div>
      <div class="col-lg-4">
        <div class="input-group">
          <input
            type="text"
            aria-label="First name"
            class="form-control"
            placeholder="Search..." />

          <button class="btn btn-primary" type="button" id="button-addon2">
            Search
          </button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <section class="signa-table-section clearfix">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead class="table-info">
                      <tr>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          USER TYPE
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          DIVISION
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          SR. NO.
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          DISTRICT
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          TALUKA
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          CLUSTER
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          EXAM CENTRE
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          NAME
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          M/F
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          BIRTH-DATE
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          STD
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          MEDIUM
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          SCHOOL NAME
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          UDISE NO SCHOOL
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          STUDENT SARAL ID
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          PARENT MOBILE NUMBER
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          TEACHER MOBILE NUMBER
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          BARCODE
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          SEAT NO
                        </th>
                        <th
                          colspan="1"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          PAPER-1
                        </th>
                        <th
                          colspan="1"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          PAPER-2
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          TOTAL MARKS
                        </th>
                        <th
                          rowspan="2"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          PERCENTAGE
                        </th>
                        <th
                          colspan="5"
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          RANK
                        </th>
                      </tr>
                      <tr>
                        <th
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          MARATHI & MATHEMATICS
                        </th>
                        <th
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          ENGLISH & INTELLIGENCE
                        </th>
                        <th
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          STATE
                        </th>
                        <th
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          DIVISION
                        </th>
                        <th
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          DISTRICT
                        </th>
                        <th
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          TALUKA
                        </th>
                        <th
                          style="
                                text-wrap: nowrap;
                                font-size: 12px;
                                text-align: center;
                              ">
                          CENTER
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($meritStudents as $student)
                      <tr>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->user_type }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->division }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->sr_no }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->district }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->taluka }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->cluster }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->exam_centre }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->name }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->gender }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">
                          {{ $student->birth_date ? $student->birth_date->format('d-m-Y') : '-' }}
                        </td>

                        <!-- Add other fields similarly -->

                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->std }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->medium }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->school_name }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->udise_no }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->student_saral_id }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->parent_mobile }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->teacher_mobile }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center; color: red; font-weight: bold;">{{ $student->barcode }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->seat_no }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->first_paper }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->second_paper }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->total_marks }}</td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">{{ $student->percentage }}</td>


                        <!-- Merit ranks - show only if merit exists for that level -->
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">
                          {{ $student->state_merit ? 'Rank' : '-' }}
                        </td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">
                          {{ $student->division_merit ? 'Rank' : '-' }}
                        </td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">
                          {{ $student->district_merit ? 'Rank' : '-' }}
                        </td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">
                          {{ $student->taluka_merit ? 'Rank' : '-' }}
                        </td>
                        <td style="text-wrap: nowrap; font-size: 12px; text-align: center;">
                          {{ $student->center_merit ? 'Rank' : '-' }}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-12 mt-3">
        {{ $meritStudents->links() }}
      </div>
    </div>
  </div>
</section>


@endsection