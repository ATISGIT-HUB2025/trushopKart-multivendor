@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Online Store
@endsection

@section('content')
    <section class="tf-page-title">
        <div class="container">
          <div class="box-title text-center">
            <h4 class="title text-warning">Online Store</h4>
            <div class="breadcrumb-list">
              <a class="breadcrumb-item text-white" href="/">Home</a>
              <div class="breadcrumb-item dot"><span></span></div>
              <div class="breadcrumb-item current text-grey-2">
                Online Store
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="flat-spacing-24">
        <div class="container">
          <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item mx-3" role="presentation">
              <button
                class="nav-link active"
                id="Press-tab"
                data-bs-toggle="tab"
                data-bs-target="#Press"
                type="button"
                role="tab"
                aria-controls="Press"
                aria-selected="true"
              >
                Home Users
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="Gallery-tab"
                data-bs-toggle="tab"
                data-bs-target="#Gallery"
                type="button"
                role="tab"
                aria-controls="Gallery"
                aria-selected="false"
              >
                Business Solution
              </button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="Press"
              role="tabpanel"
              aria-labelledby="Press-tab"
            >
              <div class="s-content">
                <div
                  class="blog-item style-2 hover-img mb-4"
                  style="
                    border: 1px dotted #000;
                    border-radius: 20px;
                    padding: 20px;
                  "
                >
                  <div class="entry_image">
                    <a href="#" class="img-style">
                      <div style="width: 100%; height: 500px">
                        <img
                          src="{{ url('fronttheme') }}/images/products/2.png"
                          data-src="{{ url('fronttheme') }}/images/products/2.png"
                          alt=""
                          class="ls-is-cached lazyloaded"
                          style="width: 100%; height: 100%; object-fit: contain"
                        />
                      </div>
                    </a>
                  </div>
                  <div class="blog-content">
                    <a
                      href="#"
                      class="entry_title d-block text-xl fw-medium link"
                    >
                      TOTAL SECURITY (Multi-devices)
                    </a>
                    <ul class="entry-meta">
                      <li>
                        The latest version Bitdefender Total Security delivers
                        multiple layers of protection against ransomware.
                      </li>
                      <li>
                        It uses behavioural threat detection to prevent
                        infections, and protects your most important documents
                        from ransomware encryption.
                      </li>
                      <li>
                        With Bitdefender Total Security, you can stop worrying
                        about losing your data or money, and start enjoying
                        life.
                      </li>
                      <li>
                        <div class="bg-info p-2 text-white fs-12">
                          **Activation / License key and Product Download link
                          will be sent to your registered email ID within 2
                          Hours of payment completion.**
                        </div>
                      </li>
                    </ul>

                    <div class="row g-4 justify-content-center">
                      <!-- 1 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>1 YEAR</h5>
                          <span class="best-price-tag">best price</span>
                          <div class="text-start my-3">
                            <div class="form-check mb-2">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year1"
                                id="y1d1"
                              />
                              <label class="form-check-label" for="y1d1"
                                >1 Device</label
                              >
                            </div>
                            <div class="form-check mb-2">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year1"
                                id="y1d3"
                              />
                              <label class="form-check-label" for="y1d3"
                                >3 Devices</label
                              >
                            </div>
                            <div class="form-check mb-2">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year1"
                                id="y1d5"
                                checked
                              />
                              <label class="form-check-label me-auto" for="y1d5"
                                >up to 5 Devices</label
                              >
                            </div>
                            <div class="form-check mb-2">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year1"
                                id="y1d10"
                              />
                              <label class="form-check-label" for="y1d10"
                                >up to 10 Devices</label
                              >
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 3,560.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>

                      <!-- 2 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>2 YEARS</h5>
                          <div class="text-start my-3">
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year2"
                                id="y2d5"
                              />
                              <label class="form-check-label" for="y2d5"
                                >up to 5 Devices</label
                              >
                            </div>
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year2"
                                id="y2d10"
                                checked
                              />
                              <label
                                class="form-check-label me-auto"
                                for="y2d10"
                                >up to 10 Devices</label
                              >
                              <span class="best-price-tag">best price</span>
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 8,500.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>

                      <!-- 3 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>3 YEARS</h5>
                          <div class="text-start my-3">
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year3"
                                id="y3d1"
                              />
                              <label class="form-check-label" for="y3d1"
                                >1 Device</label
                              >
                            </div>
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year3"
                                id="y3d3"
                              />
                              <label class="form-check-label" for="y3d3"
                                >3 Devices</label
                              >
                            </div>
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year3"
                                id="y3d5"
                              />
                              <label class="form-check-label" for="y3d5"
                                >up to 5 Devices</label
                              >
                            </div>
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year3"
                                id="y3d10"
                                checked
                              />
                              <label
                                class="form-check-label me-auto"
                                for="y3d10"
                                >up to 10 Devices</label
                              >
                              <span class="best-price-tag">best price</span>
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 13,175.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="s-content">
                <div
                  class="blog-item style-2 hover-img mb-4"
                  style="
                    border: 1px dotted #000;
                    border-radius: 20px;
                    padding: 20px;
                  "
                >
                  <div class="entry_image">
                    <a href="#" class="img-style">
                      <div style="width: 100%; height: 500px">
                        <img
                          src="{{ url('fronttheme') }}/images/products/1.png"
                          data-src="{{ url('fronttheme') }}/images/products/1.png"
                          alt=""
                          class="ls-is-cached lazyloaded"
                          style="width: 100%; height: 100%; object-fit: contain"
                        />
                      </div>
                    </a>
                  </div>
                  <div class="blog-content">
                    <a
                      href="#"
                      class="entry_title d-block text-xl fw-medium link"
                    >
                      Mobile Security for Android & iOS
                    </a>
                    <ul class="entry-meta">
                      <li>
                        The latest version Bitdefender Total Security delivers
                        multiple layers of protection against ransomware.
                      </li>
                      <li>
                        It uses behavioural threat detection to prevent
                        infections, and protects your most important documents
                        from ransomware encryption.
                      </li>
                      <li>
                        With Bitdefender Total Security, you can stop worrying
                        about losing your data or money, and start enjoying
                        life.
                      </li>
                      <li>
                        <div class="bg-info p-2 text-white fs-12">
                          **Activation / License key and Product Download link
                          will be sent to your registered email ID within 2
                          Hours of payment completion.**
                        </div>
                      </li>
                    </ul>

                    <div class="row g-4 justify-content-center">
                      <!-- 1 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>1 YEAR</h5>
                          <span class="best-price-tag">best price</span>
                          <div class="text-start my-3">
                            <div class="form-check mb-2">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year1"
                                id="y1d1"
                              />
                              <label class="form-check-label" for="y1d1"
                                >1 Device</label
                              >
                            </div>
                            <div class="form-check mb-2">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year1"
                                id="y1d3"
                              />
                              <label class="form-check-label" for="y1d3"
                                >3 Devices</label
                              >
                            </div>
                            <div class="form-check mb-2">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year1"
                                id="y1d5"
                                checked
                              />
                              <label class="form-check-label me-auto" for="y1d5"
                                >up to 5 Devices</label
                              >
                            </div>
                            <div class="form-check mb-2">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year1"
                                id="y1d10"
                              />
                              <label class="form-check-label" for="y1d10"
                                >up to 10 Devices</label
                              >
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 3,560.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>

                      <!-- 2 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>2 YEARS</h5>
                          <div class="text-start my-3">
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3 mx-3"
                                type="radio"
                                name="year2"
                                id="y2d5"
                              />
                              <label class="form-check-label" for="y2d5"
                                >up to 5 Devices</label
                              >
                            </div>
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year2"
                                id="y2d10"
                                checked
                              />
                              <label
                                class="form-check-label me-auto"
                                for="y2d10"
                                >up to 10 Devices</label
                              >
                              <span class="best-price-tag">best price</span>
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 8,500.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>

                      <!-- 3 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>3 YEARS</h5>
                          <div class="text-start my-3">
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year3"
                                id="y3d1"
                              />
                              <label class="form-check-label" for="y3d1"
                                >1 Device</label
                              >
                            </div>
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year3"
                                id="y3d3"
                              />
                              <label class="form-check-label" for="y3d3"
                                >3 Devices</label
                              >
                            </div>
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year3"
                                id="y3d5"
                              />
                              <label class="form-check-label" for="y3d5"
                                >up to 5 Devices</label
                              >
                            </div>
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input mx-3"
                                type="radio"
                                name="year3"
                                id="y3d10"
                                checked
                              />
                              <label
                                class="form-check-label me-auto"
                                for="y3d10"
                                >up to 10 Devices</label
                              >
                              <span class="best-price-tag">best price</span>
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 13,175.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="Gallery"
              role="tabpanel"
              aria-labelledby="Gallery-tab"
            >
              <div class="s-content">
                <div
                  class="blog-item style-2 hover-img mb-4"
                  style="
                    border: 1px dotted #000;
                    border-radius: 20px;
                    padding: 20px;
                  "
                >
                  <div class="blog-content text-center">
                    <a
                      href="#"
                      class="entry_title d-block text-xl fw-medium link"
                    >
                      BUSINESS SECURITY
                    </a>
                    <ul class="entry-meta text-center">
                      <li>You receive a license for your email address</li>
                      <li>
                        Activation / License key and Product download link will
                        be sent to your registered E-Mail ID within 24 working
                        Hours of payment completion.
                      </li>
                    </ul>

                    <div class="row g-4 justify-content-center">
                      <!-- 1 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>1 YEAR</h5>
                          <span class="best-price-tag">best price</span>
                          <div class="text-start my-3">
                            <div class="form-check mb-2">
                              <label
                                class="form-check-label text-center fs-12 mb-2"
                                for="y1d1"
                                >Number of users for key</label
                              >
                              <select name="" id="" class="form-control">
                                <option value="">up to 5 PCS</option>
                                <option value="">up to 10 PCS</option>
                                <option value="">up to 15 PCS</option>
                                <option value="">up to 20 PCS</option>
                                <option value="">up to 25 PCS</option>
                                <option value="">up to 30 PCS</option>
                                <option value="">up to 35 PCS</option>
                                <option value="">up to 40 PCS</option>
                                <option value="">up to 45 PCS</option>
                                <option value="">up to 50 PCS</option>
                              </select>
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 3,560.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>

                      <!-- 2 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>2 YEARS</h5>
                          <div class="text-start my-3">
                            <div class="form-check mb-2">
                              <label
                                class="form-check-label text-center fs-12 mb-2"
                                for="y1d1"
                                >Number of users for key</label
                              >
                              <select name="" id="" class="form-control">
                                <option value="">up to 5 PCS</option>
                                <option value="">up to 10 PCS</option>
                                <option value="">up to 15 PCS</option>
                                <option value="">up to 20 PCS</option>
                                <option value="">up to 25 PCS</option>
                                <option value="">up to 30 PCS</option>
                                <option value="">up to 35 PCS</option>
                                <option value="">up to 40 PCS</option>
                                <option value="">up to 45 PCS</option>
                                <option value="">up to 50 PCS</option>
                              </select>
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 8,500.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>

                      <!-- 3 Year Plan -->
                      <div class="col-md-4">
                        <div class="card p-4 text-center">
                          <h5>3 YEARS</h5>
                          <div class="text-start my-3">
                            <div class="form-check mb-2">
                              <label
                                class="form-check-label text-center fs-12 mb-2"
                                for="y1d1"
                                >Number of users for key</label
                              >
                              <select name="" id="" class="form-control">
                                <option value="">up to 5 PCS</option>
                                <option value="">up to 10 PCS</option>
                                <option value="">up to 15 PCS</option>
                                <option value="">up to 20 PCS</option>
                                <option value="">up to 25 PCS</option>
                                <option value="">up to 30 PCS</option>
                                <option value="">up to 35 PCS</option>
                                <option value="">up to 40 PCS</option>
                                <option value="">up to 45 PCS</option>
                                <option value="">up to 50 PCS</option>
                              </select>
                            </div>
                          </div>
                          <div class="price my-3">
                            ₹ 13,175.00
                            <span>plus GST</span>
                          </div>
                          <button class="tf-btn animate-btn">BUY NOW</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
