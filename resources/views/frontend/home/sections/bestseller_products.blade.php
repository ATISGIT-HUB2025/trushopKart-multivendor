
 @foreach ($products_Updated as $value)

            <!-- Our Best Seller -->
      <section class="flat-spacing-30">
        <div class="container">
          <div class="row section-image-zoom gy-4">
            <div class="col-lg-12">
              <div
                style="
                  border: 1px dotted #000;
                  padding: 20px;
                  border-radius: 20px;
                "
              >
                <a href="{{route('product-detail', $value->slug)}}">
                  <h5 class="product-name fw-medium mb-5">
                    {{ $value->name ?? "" }}
                  </h5>
                </a>
                <div
                  class="d-flex flex-wrap flex-lg-nowrap justify-content-center"
                >
                  <div>
                    <a href="{{route('product-detail', $value->slug)}}">
                      <div style="width: 300px; height: 300px">
                        <img
                          src="{{ asset('') }}{{ $value->thumb_image ?? "" }}"
                          alt="product"
                          class="img-product lazyload"
                          style="width: 100%; height: 100%; object-fit: contain"
                        />
                      </div>
                    </a>
                  
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="mt-3 mt-lg-0">
                        {{-- <p class="mb-4 fw-bold">
                          Best protection for Android devices
                        </p>
                        <ul>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Best protection for your Android smartphone and
                              tablet</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Protects you from falling victim to link-based
                              mobile scams IMPROVED</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Secure VPN for a fast, anonymous and safe
                              experience while surfing the web – 200 MB/ day
                              IMPROVED</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Remotely locate, lock and wipe your Android
                              device in case of loss or theft</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Account Privacy that verifies whether your email
                              account has been breached</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class="">Minimal impact on battery life</span>
                          </li>
                        </ul> --}}

                        {!! $value->android_desc !!}

                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="mt-3 mt-lg-0">
                        {{-- <p class="mb-4 fw-bold">
                          Enjoy your iOS. We keep it safe.
                        </p>
                        <ul>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Get the most powerful protection against threats
                              with the least impact on battery</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class="">
                              Protect your personal data: passwords, address,
                              social and financial information</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class="">
                              Easily check your phone security to detect and fix
                              misconfigurations that might expose it</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Avoid accidental data exposure and misuse for all
                              installed apps</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class="">
                              Scan your device to achieve optimal security and
                              privacy settings</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Gain usage insights into your online activity and
                              history of prevented incidents</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Check your online accounts against data
                              breaches</span
                            >
                          </li>
                          <li class="mb-3 fs-10">
                            <i class="bi bi-check-circle"></i>
                            <span class=""
                              >Encrypt all internet traffic with the included
                              VPN</span
                            >
                          </li>
                        </ul> --}}

                        {!! $value->ios_desc !!}

                      </div>
                    </div>
                  </div>
                  
                  
                  
                </div>
                
                
                  <div class="d-flex gap-2 mybuttib vvbox">
                      {{-- <form class="shopping-cart-form">
                        <input type="hidden" name="product_id" value="{{$value->id}}">
                         <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                      <button
                        type="submit"
                        class="tf-btn btn-out-line-dark btn-line-orange-3 add_cart"
                      >
                        <span
                          class="fw-medium"
                          style="font-size: 12px !important"
                        >
                          Add to Cart
                        </span>
                      </button>
                      </form> --}}
                      <a
                        href="{{route('product-detail', $value->slug)}}"
                        class="common_btn"
                      >
                        <span class="text-white">
                         View
                        </span>
                      </a>

                       <a
                        href="javascript:void(0)"
                        class="add_to_wishlist common_btn"
                        data-id="{{$value->id}}"

                      >
                        <span class="text-white">
                          Add to Wishlist
                        </span>
                      </a>
                    </div>
                    
                    
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Our Best Seller -->

      @endforeach