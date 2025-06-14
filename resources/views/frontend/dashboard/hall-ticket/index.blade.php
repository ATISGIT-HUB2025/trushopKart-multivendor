@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Hall Ticket
@endsection

@section('content')
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
          <button onclick="window.location.href='{{ route('user.hall-ticket.download', Auth::user()->id) }}'" style="margin: 0 auto;" class="btn btn-primary my-3 d-flex align-items-center download-btn">
    <i class="fas fa-download me-2"></i>
    Download
</button>


          <section class="pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <div style="border: 3px solid #000; padding: 5px">
              <div style="border: 1px solid #000; padding: 10px">
                <div
                  style="
                    display: flex;
                    justify-content: space-between;
                    text-align: center;
                  "
                >
                  <div style="width: 120px; height: 120px">
                    <img
                      src="{{asset('frontend/images/1.png')}}"
                      alt="logo"
                      style="width: 100%; height: 100%; object-fit: contain"
                    />
                  </div>
                  <div>
                    <h3 class="text-danger" style="font-weight: bold">
                      Dhyeya Prakashan Academy Maharashtra <br />
                      I Am Winner State Level Competition Exam 2024
                    </h3>
                    <h3 style="    font-weight: bold;
    text-align: center;
    margin: 0 auto;
    display: block;
    margin-bottom: 20px;">Hall Ticket (Admit Card)</h3>
                  </div>
                  <div style="width: 120px; height: 100px">
                    <img
                    src="{{asset('frontend/images/2.png')}}"
                      alt="logo"
                      style="width: 100%; height: 100%; object-fit: contain"
                    />
                  </div>
                </div>
                <div class="row mb-4 gy-3">
                  <div class="col-lg-2 col-6">
                  <div style="border: 1px dotted #000; width: 100%; height: 200px;" class="mt-5">
                  @if(Auth::user()->image)
        <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg')}}" alt="Student Photo" style="width: 100%; height: 100%; object-fit: cover;">
    @else
        <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
            <h6 class="text-center">Student <br />Photograph</h6>
        </div>
    @endif
</div>

                  </div>
                  <div class="col-lg-9">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <th scope="row">Unique ID :-</th>
                            <td>{{ Auth::user()->student_id ?? 8040370049 }}</td>
                            <th scope="row">Seat No :-</th>
                            <td>804037024001</td>
                          </tr>

                          <tr>
                            <th scope="row">Student Name :-</th>
                            <td>{{ $admission->full_name ?? Auth::user()->name }}</td>
                            <th scope="row">Gender :-</th>
                            <td>{{ $admission->gender ?? 'N/A' }}</td>
                          </tr>

                          <tr>
                            <th scope="row">Medium :-</th>
                            <td>{{ $admission->medium ?? 'English' }}</td>
                            <th scope="row">Class :-</th>
                            <td>{{ $admission->standard ?? '1st' }}</td>
                          </tr>

                          <tr>
                            <th scope="row">District :-</th>
                            <td>{{ $admission->district ?? 'N/A' }}</td>
                            <th scope="row">Taluka :-</th>
                            <td>{{ $admission->taluka ?? 'N/A' }}</td>
                          </tr>

                          <tr>
                            <th scope="row">School Name :-</th>
                           
                            <td colspan="3">{{ $admission->school_name ?? 'N/A' }}</td>
                            </td>
                          </tr>

                          <tr>
                            <th scope="row">Exam Center :-</th>
                            <td colspan="3">{{ $center->name ?? 'N/A' }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th scope="col">Exam Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Paper</th>
                            <th scope="col">Subjects</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>11/02/2024</td>
                            <td>11:00 AM to 12:30 PM</td>
                            <td>1</td>
                            <td>English & Mathematics</td>
                          </tr>
                          <tr>
                            <td>11/02/2024</td>
                            <td>1:30 PM to 3:00 PM</td>
                            <td>2</td>
                            <td>General Knowledge & Intelligence</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr class="table-info text-center">
                            <th scope="col">INSTRUCTIONS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              1) Candidates should report to the examination hall 30 minutes before each paper starts with the hall ticket.
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2) Read all instructions printed on the answer sheet and question paper cover carefully before starting.
                            </td>
                          </tr>
                          <tr>
                            <td>
                              3) Use only blue or black ballpoint pens for marking answers.
                            </td>
                          </tr>
                          <tr>
                            <td>
                              4) Ensure the answer sheet does not get torn or damaged as it will be scanned for evaluation.
                            </td>
                          </tr>
                          <tr>
                            <td>
                              5) No marks will be given for answers on torn or incomplete sheets.
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <h6 style="font-weight: bold">
                                Note: Admissions for the academic year 2024-25 will begin on 12th February. A free basic guidance course for English and Math will be conducted in April and May 2024.
                              </h6>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div class="text-center">
                    <h6 style="font-weight: bold">Coordinator</h6>
                    <h6 style="font-weight: bold">
                      I Am Winner State Level Competition Exam
                    </h6>
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
  </section>
@endsection



<style>
.download-btn {
    background: linear-gradient(45deg, #2196F3, #0D47A1);
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 25px;
    font-weight: 600;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
}

.download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    background: linear-gradient(45deg, #0D47A1, #2196F3);
}

.download-btn:active {
    transform: translateY(1px);
}
</style>
