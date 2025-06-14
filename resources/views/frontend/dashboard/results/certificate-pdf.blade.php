<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certificate</title>
    <!-- bootstrap -->

    <!-- css -->
    <link rel="stylesheet" href="cettificate.css" />
    <style>
      .outer-border {
  border: 6px double #bb0707;
  padding: 55px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  background-image: url(3.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: 1335px;
}

    </style>

<style>
    @page {
        margin: 0;
        padding: 0;
        size: landscape;
    }
    
    body {
        margin: 0;
        padding: 20px;
        font-family: Arial, sans-serif;
    }
    
    .outer-border {
        width: 100%;
        height: 100%;
        border: 6px double #bb0707;
        padding: 55px;
        border-radius: 10px;
        background: #fff;
        position: relative;
    }
    
    .apperciation_title {
        font-size: 2rem;
        font-weight: bold;
        margin-top: 10px;
    }
    
    .apperciation_bottom_border {
        position: relative;
        margin-bottom: 30px;
    }
    
    .gradient-text {
        font-weight: bold;
        font-size: 5rem;
        background: -webkit-linear-gradient(#0e0b66, #bb0707);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;
    }
    
    .gradient-underline {
        position: absolute;
        bottom: 12px;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(to right, #0e0b66, #bb0707);
    }
    
    .logo-container {
        width: 120px;
        height: 120px;
    }
    
    .logo-container img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 50px;
    }
    
    .certificate-title {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    
    .table th, .table td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
    }
    
    .signature-section {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
    }
    
    .signature-box {
        text-align: center;
        width: 25%;
    }
    
    .signature-box h6 {
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    .signature-box p {
        color: #bb0707;
        font-size: 12px;
        margin: 0;
    }
</style>

  </head>
  <body>
    <!-- certificate start -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="outer-border">
              <div>
                <div
                  style="
                    display: flex;
                    justify-content: space-between;
                    text-align: center;
                  "
                  class="mb-5"
                >
                  <div style="width: 120px; height: 120px">
                    <img
                      src="{{ public_path('frontend/images/1.png') }}"
                      alt="logo"
                      style="width: 100%; height: 100%; object-fit: contain"
                    />
                  </div>
                  <div>
                    <h6 class="text-danger">
                      DHYEYA PRAKASHAN ACADEMY MAHARASHTRA STATE LEVEL
                      COMPETITIVE EXAM.2024
                    </h6>
                    <div
                      style="
                        display: flex;
                        justify-content: center;
                        flex-direction: column;
                        align-items: center;
                      "
                    >
                      <div
                        style="
                          font-weight: bold;
                          font-size: 5rem;
                          width: fit-content;
                          background: -webkit-linear-gradient(#0e0b66, #bb0707);
                          -webkit-background-clip: text;
                          -webkit-text-fill-color: transparent;
                          position: relative;
                        "
                      >
                        CERTIFICATE
                        <span
                          style="
                            content: '';
                            position: absolute;
                            bottom: 12px;
                            left: 0;
                            width: 100%;
                            height: 2px;
                            background: linear-gradient(
                              to right,
                              #0e0b66,
                              #bb0707
                            );
                          "
                        ></span>
                      </div>

                      <div class="apperciation_bottom_border">
                        <h3
                          class="apperciation_title"
                          style="position: relative"
                        >
                          OF APPRECIATION
                        </h3>
                        <img
                      
                          src="{{ public_path('frontend/images/border.png') }}"
                          alt=""
                          srcset=""
                          style="position: absolute; top: 65px; left: 575px"
                        />
                      </div>
                    </div>
                  </div>
                  <div style="width: 120px; height: 100px">
                    <img
                      src="{{ public_path('frontend/images/2.png') }}"
                      alt="logo"
                      style="width: 100%; height: 100%; object-fit: contain"
                    />
                  </div>
                </div>
                <div class="text-center mb-4">
                  <h1>I AM WINNER STATE LEVEL COMPETITIVE EXAM. 2024</h1>
                </div>
                <div class="row">
                  <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                      <div class="col-12 mb-3">
                        <h5 class="text-uppercase">Student Name:-</h5>
                      </div>
                      <div class="col-12 mb-3">
                        <h5 class="text-uppercase">School Name:-</h5>
                      </div>
                      <div class="col-4 mb-3">
                        <h5 class="text-uppercase">Std:-</h5>
                      </div>
                      <div class="col-4 mb-3">
                        <h5 class="text-uppercase">Medium:-</h5>
                      </div>
                      <div class="col-4 mb-3">
                        <h5 class="text-uppercase">Dist:-</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                  "
                >
                  <h4 class="bg-dark text-white p-2" style="width: max-content">
                    MARKSHEET
                  </h4>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Lang 1+Math</th>
                        <th scope="col">Lang 2+IQ</th>
                        <th scope="col">Total</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Rank</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="mb-5">
  <h6 class="text-center text-danger">
    To congratulate your performance and dedication to you for your best performance.
  </h6>
</div>
<div class="mb-4 mt-4">
  <div class="row">
    <div class="col-3 text-center">
      <h6 style="font-weight: bold">State Guide</h6>
      <p class="text-danger" style="font-size: 12px !important">
        I.M. Day State Level Competitive Exam
      </p>
    </div>
    <div class="col-3 text-center">
      <h6 style="font-weight: bold">State Secretary</h6>
      <p class="text-danger" style="font-size: 12px !important">
        I.M. Day State Level Competitive Exam
      </p>
    </div>
    <div class="col-3 text-center">
      <h6 style="font-weight: bold">State Head</h6>
      <p class="text-danger" style="font-size: 12px !important">
        I.M. Day State Level Competitive Exam
      </p>
    </div>
    <div class="col-3 text-center">
      <h6 style="font-weight: bold">Director</h6>
      <p class="text-danger" style="font-size: 12px !important">
        I.M. Day State Level Competitive Exam
      </p>
    </div>
  </div>
</div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- certificate end -->
    <!-- bootstrap -->

  </body>
</html>
