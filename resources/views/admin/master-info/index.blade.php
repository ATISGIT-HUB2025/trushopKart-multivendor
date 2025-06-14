@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Master Info</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Master</h4>

                  </div>
                  <div class="card-body">
                  <form action="{{ route('admin.master-info.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                 <!-- Main Information Card -->
                <div class="card shadow-sm p-3 mb-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">Master Information</h5>

                        <!-- Logo Section -->
                        <div class="text-center mb-4">
                            <label class="fw-bold">Certificate  Logo</label>
                            <div class="mb-3">
                                <img id="logoPreview" src="{{ asset(@$masterInfo->logo) }}" width="150px" class="rounded shadow-sm" alt="Logo">
                            </div>
                            <input type="file" class="form-control" name="logo" onchange="previewImage(event, 'logoPreview')">
                        </div>

                        <!-- Other Fields -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Certificate Heading</label>
                                    <input type="text" class="form-control" name="heading" value="{{ @$masterInfo->heading }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Administrator Name</label>
                                    <input type="text" class="form-control" name="administrator_name" value="{{ @$masterInfo->administrator_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Director Name</label>
                                    <input type="text" class="form-control" name="director_name" value="{{ @$masterInfo->director_name }}">
                                </div>
                            </div>
                        </div>

                        <!-- Signatures -->
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <label class="fw-bold">Administrator Signature</label>
                                <div class="mb-3">
                                    <img id="adminSigPreview" src="{{ asset(@$masterInfo->administrator_signature) }}" width="150px" class="rounded shadow-sm" alt="Administer Signature">
                                </div>
                                <input type="file" class="form-control" name="administrator_signature" onchange="previewImage(event, 'adminSigPreview')">
                            </div>
                            <div class="col-md-6 text-center">
                                <label class="fw-bold">Director Signature</label>
                                <div class="mb-3">
                                    <img id="directorSigPreview" src="{{ asset(@$masterInfo->director_signature) }}" width="150px" class="rounded shadow-sm" alt="Director Signature">
                                </div>
                                <input type="file" class="form-control" name="director_signature" onchange="previewImage(event, 'directorSigPreview')">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Result Section Card -->
                <div class="card shadow-sm p-3 mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Result Information</h5>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <label class="fw-bold">Result Logo</label>
                                <div class="mb-3">
                                    <img id="resultLogoPreview" src="{{ asset(@$masterInfo->result_logo) }}" width="150px" class="rounded shadow-sm" alt="Result Logo">
                                </div>
                                <input type="file" class="form-control" name="result_logo" onchange="previewImage(event, 'resultLogoPreview')">
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold">Result Heading</label>
                                <input type="text" class="form-control mt-2" name="result_heading" value="{{ @$masterInfo->result_heading }}">
                            </div>
                        </div>
                    </div>
                </div>

               

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Update Information</button>
                </div>

            </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection
