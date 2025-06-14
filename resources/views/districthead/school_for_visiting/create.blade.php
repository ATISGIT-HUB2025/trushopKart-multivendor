@extends('districthead.layouts.master')

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
    @include('districthead.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fal fa-gift-card"></i>Create School For Visiting</h3>
            <div class="wsus__dashboard_add wsus__add_address">
              <form action="{{route('district.school-for-visiting.store')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Date<b>*</b></label>
                      <input type="date" placeholder="Date" name="date">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Visit SR.NO.<b>*</b></label>
                      <input type="text" placeholder="Visit SR.NO." name="visit_sr_no">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Start Time Traveling<b>*</b></label>
                      <input type="time" placeholder="Traveling Start Time" name="traveling_start_time">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>End Time Traveling</label>
                      <input type="time" placeholder="Traveling End Time" name="traveling_end_time">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>District <b>*</b></label>
                      <input type="text" placeholder="District" name="district">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Taluka <b>*</b></label>
                      <input type="text" placeholder="Taluka" name="taluka">
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Village<b>*</b></label>
                      <input type="text" placeholder="Village" name="village">
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>School Name<b>*</b></label>
                      <input type="text" placeholder="School Name" name="school_name">
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Udise No.<b>*</b></label>
                      <input type="text" placeholder="Udise No." name="udise_no">
                    </div>
                  </div>


                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>HM Name<b>*</b></label>
                      <input type="text" placeholder="HM Name" name="hm_name">
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Mobile NO.<b>*</b></label>
                      <input type="text" placeholder="Mobile NO." name="mobile_no">
                    </div>
                  </div>
                  
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Total Students<b>*</b></label>
                      <input type="text" placeholder="Total Students" name="total_students">
                    </div>
                  </div>

              
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Std Marathi <b>*</b></label>
                      <div class="wsus__topbar_select">
                        <select class="select_2" name="std_marathi">
                          <option>Std Marathi</option>
                            @foreach ($standards as $standard)
                                <option value="{{$standard->id}}">{{$standard->standard}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Std Semi <b>*</b></label>
                      <div class="wsus__topbar_select">
                        <select class="select_2" name="std_semi">
                          <option>Std Semi</option>
                            @foreach ($standards as $standard)
                                <option value="{{$standard->id}}">{{$standard->standard}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Std English<b>*</b></label>
                      <div class="wsus__topbar_select">
                        <select class="select_2" name="std_english">
                          <option>Std English</option>
                            @foreach ($standards as $standard)
                                <option value="{{$standard->id}}">{{$standard->standard}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Final Marathi <b>*</b></label>
                      <div class="wsus__topbar_select">
                        <select class="select_2" name="final_marathi">
                          <option>Final Marathi</option>
                            @foreach ($standards as $standard)
                                <option value="{{$standard->id}}">{{$standard->standard}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Final Semi <b>*</b></label>
                      <div class="wsus__topbar_select">
                        <select class="select_2" name="final_semi">
                          <option>Final Semi</option>
                            @foreach ($standards as $standard)
                                <option value="{{$standard->id}}">{{$standard->standard}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Final English<b>*</b></label>
                      <div class="wsus__topbar_select">
                        <select class="select_2" name="final_english">
                          <option>Final English</option>
                            @foreach ($standards as $standard)
                                <option value="{{$standard->id}}">{{$standard->standard}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Total Bill<b>*</b></label>
                      <input type="text" placeholder="Total Bill" name="total_bill">
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Online Bill<b>*</b></label>
                      <input type="text" placeholder="Online Bill" name="online_bill">
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>Cash Bill<b>*</b></label>
                      <input type="text" placeholder="Cash Bill" name="cash_bill">
                    </div>
                  </div>

                  

                  <div class="col-xl-12">
                    <button type="submit" class="common_btn">Create</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
