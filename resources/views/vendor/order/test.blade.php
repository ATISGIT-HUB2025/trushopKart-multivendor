@extends('layouts/front')
@section('title', GetSettingField('meta_title_flight','looks'))
@section('keyword', GetSettingField('meta_keyword_flight','looks'))
@section('description', GetSettingField('meta_desc_flight','looks'))


@section('content')

<style>
    .homeHeroSection{
        background: linear-gradient(-45deg, hsl(237.78947368421052, 68%, 20%), #1920d7);
        padding-top: 80px;
    padding-bottom: 35px;
}

.jsx-2221386506.root {
    background-color: #ffffff33;
    padding: 20px;
    height: 100%;
}
.jsx-2221386506 svg{
    width: 40px;
}
</style>
<!-- header--serction--area--- -->
<section class="ubrab homeHeroSection">
  <div class="container py-5 pt-3">
     <div class="d-lg-none">
        <div class="d-flex gap-3 home_page_flights_icons ">
            <a class="nav-btn active" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21.949 10.1118C22.1634 10.912 21.6886 11.7345 20.8884 11.9489L5.2218 16.1467C4.77856 16.2655 4.31138 16.0674 4.08866 15.6662L1.46582 10.9415L2.91471 10.5533L5.3825 12.9979L10.4778 11.6326L5.96728 4.55896L7.89913 4.04132L14.8505 10.4609L20.1119 9.05113C20.9121 8.83671 21.7346 9.31159 21.949 10.1118ZM4.00013 19H20.0001V21H4.00013V19Z"></path></svg>
                Flights
            </a>
            <a class="nav-btn" href="/hotels">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22 21H2V19H3V4C3 3.44772 3.44772 3 4 3H18C18.5523 3 19 3.44772 19 4V9H21V19H22V21ZM17 19H19V11H13V19H15V13H17V19ZM17 9V5H5V19H11V9H17ZM7 11H9V13H7V11ZM7 15H9V17H7V15ZM7 7H9V9H7V7Z"></path></svg>
               Hotels
            </a>
            <a class="nav-btn" target="_blanck" href="<?= env('Activity_Redirect_URL') ?>">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 20H5V21C5 21.5523 4.55228 22 4 22H3C2.44772 22 2 21.5523 2 21V11L4.4805 5.21216C4.79566 4.47679 5.51874 4 6.31879 4H17.6812C18.4813 4 19.2043 4.47679 19.5195 5.21216L22 11V21C22 21.5523 21.5523 22 21 22H20C19.4477 22 19 21.5523 19 21V20ZM20 13H4V18H20V13ZM4.17594 11H19.8241L17.6812 6H6.31879L4.17594 11ZM6.5 17C5.67157 17 5 16.3284 5 15.5C5 14.6716 5.67157 14 6.5 14C7.32843 14 8 14.6716 8 15.5C8 16.3284 7.32843 17 6.5 17ZM17.5 17C16.6716 17 16 16.3284 16 15.5C16 14.6716 16.6716 14 17.5 14C18.3284 14 19 14.6716 19 15.5C19 16.3284 18.3284 17 17.5 17Z"></path></svg>
              Activities
            </a>
        </div>
        </div>
        <h1 class="py-3 pt-4 text-white common_heading_for_banner mb-4">
            
            Compare cheap flight deals from 100s of sites.</h1>
       <?php 
        $cur = getCurrencyByCountry();
        if($cur){
       ?>
        <div class="form_customiz_elemt">
            <script async src="https://tp.media/content?currency=<?= $cur ?>&trs=29982&shmarker=201840&show_hotels=false&powered_by=false&locale=en&searchUrl=flights.farearena.com%2Fflights&primary_override=%2332a8dd&color_button=%23007BFF&color_icons=%2332a8dd&dark=%23262626&light=%23FFFFFF&secondary=%23FFFFFF00&special=%23FFFFFF00&color_focused=%2332a8dd&border_radius=0&plain=true&promo_id=7879&campaign_id=100" charset="utf-8"></script> 
           
           
           
        </div> 
        
        
         <div class="row mt-3">
   <div class="col-md mt-4">
      <div class="jsx-2221386506 root">
         <div class="no-gutters row text-white">
            <div class="col-auto">
               <div class="jsx-2221386506 fa-wrapper">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="route" class="svg-inline--fa fa-route fa-w-16 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <path fill="currentColor" d="M416 320h-96c-17.6 0-32-14.4-32-32s14.4-32 32-32h96s96-107 96-160-43-96-96-96-96 43-96 96c0 25.5 22.2 63.4 45.3 96H320c-52.9 0-96 43.1-96 96s43.1 96 96 96h96c17.6 0 32 14.4 32 32s-14.4 32-32 32H185.5c-16 24.8-33.8 47.7-47.3 64H416c52.9 0 96-43.1 96-96s-43.1-96-96-96zm0-256c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zM96 256c-53 0-96 43-96 96s96 160 96 160 96-107 96-160-43-96-96-96zm0 128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path>
                  </svg>
               </div>
            </div>
            <div class="col">
               <h5 class="jsx-2221386506">Explore the World</h5>
               <p class="jsx-2221386506 description">Start to discover. We will help you to visit any place you can imagine</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md mt-4">
      <div class="jsx-2221386506 root">
         <div class="no-gutters row text-white">
            <div class="col-auto">
               <div class="jsx-2221386506 fa-wrapper">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-cog" class="svg-inline--fa fa-user-cog fa-w-20 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                     <path fill="currentColor" d="M610.5 373.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 400.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm201.2 226.5c-2.3-1.2-4.6-2.6-6.8-3.9l-7.9 4.6c-6 3.4-12.8 5.3-19.6 5.3-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-5.5-17.7 1.9-36.4 17.9-45.7l7.9-4.6c-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-16-9.2-23.4-28-17.9-45.7.9-2.9 2.2-5.8 3.2-8.7-3.8-.3-7.5-1.2-11.4-1.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c10.1 0 19.5-3.2 27.2-8.5-1.2-3.8-2-7.7-2-11.8v-9.2z"></path>
                  </svg>
               </div>
            </div>
            <div class="col">
               <h5 class="jsx-2221386506">Personalized Offers</h5>
               <p class="jsx-2221386506 description">Save more with offers and coupons personalized for your travel needs</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md mt-4">
      <div class="jsx-2221386506 root">
         <div class="no-gutters row text-white">
            <div class="col-auto">
               <div class="jsx-2221386506 fa-wrapper">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-reader" class="svg-inline--fa fa-book-reader fa-w-16 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <path fill="currentColor" d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"></path>
                  </svg>
               </div>
            </div>
            <div class="col">
               <h5 class="jsx-2221386506">Book Smart</h5>
               <p class="jsx-2221386506 description">Find cheapest flight deals from several websites across the world with ease</p>
            </div>
         </div>
      </div>
   </div>
</div>


        <style>.form_customiz_elemt tp-cascoon {margin: -34px -19px;}
        </style>
       
       <?php } ?>
    </div>

</section>




<section class="container py-4">
    <div class="row">
        <div class="col-12 pt-3">
            <div class="heading_title">
                <h4>Compare Flights Deals across your favourite brands</h4>
            </div>
            <div class="hotels_logo">
                <img class="hotels_logo" alt="Booking.com logo" src="<?= asset('assets/img') ?>/h_bc.png">
                <img class="hotels_logo" alt="MakeMyTrip logo " src="<?= asset('assets/img') ?>/h_mq.png">
                <img class="hotels_logo" alt="Trip.com logo " src="<?= asset('assets/img') ?>/d_ct.png">
                <img class="hotels_logo" alt="Expedia logo " src="<?= asset('assets/img') ?>/h_xp.png">
                <img class="hotels_logo" alt="Hotels.com logo " src="<?= asset('assets/img') ?>/h_hc.png">
                <img class="hotels_logo" alt="Agoda logo " src="<?= asset('assets/img') ?>/h_ad.png">
            </div>
        </div>
    </div>
</section>



<section class="container py-4">
    <div class="row">
        <div class="col-12 pt-3">
            <div class="heading_title">
                   <h2 class="fw-bold">Search for cheap flights to the most popular destinations</h2>
                    <p class="text-justify mt-4">Planning your next trip? Make sure to check out FareArena.com for the cheap flight deals around! Our platform allows you to search for one-way or return flights from thousands of airlines, so you can find the cheapest ticket prices available.</p>
                 </div>
        </div>
        
         <div class="col-12">
                     <div class="swiper mySwiperFlight" >
                <div class="swiper-wrapper">
                     <?php 
                     
                      $currency = 'inr';
                       $CityCode = GetCityNameCodeNearBY() ?? '';
                foreach(GetLocationWiseFlights($CityCode,$currency) ?? [] as $key => $val){
                ?>
                <div class="swiper-slide"><div class="hotel_box">
                  <div class="card-img card-item trending-card">
                    <span class="d-flex" role="button" tabindex="0">
                      <img  class="img-fluid owl-lazy" src="https://photo.hotellook.com/static/cities/370x247/<?= $val->destination ?? '' ?>.webp">
                    </span>
                    
                  </div>
                  <div class="card-body pt-2 pb-2 pl-2 pr-2 bg-white">
                    <h5 class="">
                      <span class="d-flex">
                        <div class="countryFullname" data-code="<?= $val->origin ?>"><?= $val->origin ?></div> -- <div  data-code="<?= $val->destination ?>" class="countryFullname"><?= $val->destination ?></div>
                      </span>
                    </h5>
                    <p class="card-meta font-size-11"><div  data-code="<?= $val->destination ?>" class="countryFullname"><?= $val->destination ?></div></p>
                    <p class="m-0 small design_custom_date" ><?= Flights_date_custom($val->departure_at) ?> -- <?= Flights_date_custom($val->return_at) ?></p>
                    
                    
                    <div class="card-price">
                      <p>
                        <span class="font-size-111 price__from mr-2">From</span>
                        <span class="font-size-11 price__num"><?= getCurrencySymbol() ?><?= $val->price ?? '' ?></span>
                      </p>
                      <button class="btn btn-primary rounded small w-100 mt-2" onclick="location.href='<?= url('/') ?>/flights-search#/flights?depart_date=<?= Flights_date_customURL($val->departure_at) ?>&return_date=<?= Flights_date_customURL($val->return_at) ?>&origin_iata=<?= $val->origin ?>&destination_iata=<?= $val->destination ?>&currency=<?= $currency ?>&with_request=true&locale=en_us&lang=en_us&marker=201840'" role="button" tabindex="0">
                        See Details <i class="la la-angle-right"></i>
                      </button>
                    </div>
                  </div>
                  </div>
                </div>
                <?php } ?>
                </div>
            
                <!-- Optional controls -->
                <div class="swiper-pagination"></div>
                <div class="navigation_swiper">
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

                
              </div>
                </div>
                
        
        
    </div>
</section>





 

<!--new-section--araea-->
 <section class="explore-aw overflow-hidden">
	 <div class="container py-5 rounded-card bg-light">
    <div class="text-center mb-5">
      <h4 class="section-title">Looking for the best flight deals to anywhere in the world?</h4>
      <p class="">
        Its easy around here. 100 million travellers use us as their go-to tool, comparing flight deals and offers from more than 1,200 airlines and travel providers. 
        With so many options to choose from in one place, you can say hello to savings, and goodbye to stress  heres how.
      </p>
    </div>

    <div class="row text-center g-5">
      <div class="col-md-4">
        <img src="{{url('')}}/images/image1.svg" alt="globe" class="feature-icon mx-auto d-block">
        <div class="feature-text">
          <h5>Search Everywhere, explore anywhere</h5>
          <p>Enter your departure airport and travel dates, then hit Everywhere. Youll see flights to every destination in the world, cheapest first.</p>
        </div>
      </div>
      <div class="col-md-4">
        <img src="{{url('')}}/images/image2.svg" alt="passport" class="feature-icon mx-auto d-block">
        <div class="feature-text">
          <h5>Pay less, go further with transparent pricing</h5>
          <p>The cheapest flight deals. No hidden fees. No funny business. The price you see when you search is what youll pay.</p>
        </div>
      </div>
      <div class="col-md-4">
        <img src="{{url('')}}/images/image3.svg" alt="clock" class="feature-icon mx-auto d-block">
        <div class="feature-text">
          <h5>Book when it's best with Price Alerts</h5>
          <p>Found your flight, but not quite ready to book? Set up Price Alerts and well let you know when your flight price goes up or down.</p>
        </div>
      </div>
    </div>
  </div>
  </section>
  
  
  <section class="peace-aw">
    	<div class="container py-5">
      <div class="mb-4">
        <h4 class="peace-title">Plan your journey with peace of mind</h4>
        <p class="section-subtitle">We've made it our mission to help you travel with confidence and make your journey as smooth as possible.</p>
      </div>

      <div class="row gy-5 features-row">
        <!-- Flexible flight deals -->
        <div class="col-md-6">
          <div class="feature-box">
            <i class="ri-ticket-2-line feature-icon"></i>
            <div>
              <div class="feature-title fw-bold"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" width="1.5rem" height="1.5rem" class="BpkIcon_bpk-icon--rtl-support__OTJmO"><path d="M1 7a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v2.5a.615.615 0 0 1-.495.562 2 2 0 0 0 0 3.876.615.615 0 0 1 .495.562V17a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3v-2.5a.615.615 0 0 1 .495-.562 2 2 0 0 0 0-3.876A.615.615 0 0 1 1 9.5zm7 1a1 1 0 0 0-2 0v3a1 1 0 0 0 1 1h3a1 1 0 0 0 0-2h-.362a3 3 0 0 1 4.206-.263 1 1 0 0 0 1.313-1.508A5 5 0 0 0 8 8.839zm8 7a1 1 0 0 0 2 0v-3a1 1 0 0 0-1-1h-3a1 1 0 0 0 0 2h.703a3 3 0 0 1-4.813 1.25 1 1 0 0 0-1.324 1.5A5.002 5.002 0 0 0 16 14.825z"></path></svg></span> Find flexible flight deals</div>
              <p class="feature-description">Explore flexible flight ticket deals so you won't lose out if your flight is changed or cancelled</p>
            </div>
          </div>
        </div>

        <!-- Add hotels and car hire -->
        <div class="col-md-6">
          <div class="feature-box">
            <i class="ri-hotel-bed-line feature-icon"></i>
            <div>
              <div class="feature-title fw-bold"><sapn><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" width="1.5rem" height="1.5rem" class="BpkIcon_bpk-icon--rtl-support__OTJmO"><path d="M4.608 5.93A1.15 1.15 0 0 0 4 7.013V10a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1.2a.8.8 0 0 0 .8.8h.4a.8.8 0 0 0 .8-.8V9a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1a1 1 0 0 0 1 1h.999a1 1 0 0 0 1-1l-.002-1H20V7.013a1.15 1.15 0 0 0-.608-1.083l-1.77-.758a14.07 14.07 0 0 0-11.244 0zM3 12a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h.28a1 1 0 0 0 .948-.684L5 17h14l.772 2.316a1 1 0 0 0 .949.684H21a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1z"></path></svg></sapn> Add hotels and car hire</div>
              <p class="feature-description">Plan your journey with hotels and car hire, and keep your bookings all in one place</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>




<section class="container py-4">
    <div class="row">
        <div class="col-12 pt-3">
          <div class="heading_title">
                <h4>Search for Cheap Flights to stay by popular destination</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="row" id="hotels_in_city_wise_page">
                <?php $cities = GetMenuItems(5); ?>
                @foreach ($cities->chunk(ceil($cities->count() / 4)) as $chunk)
                    <div class="col-md-3">
                        <div class="hotels_in_city_wsepage">
                            @foreach ($chunk as $city)
                                <a href="{{ $city->slug }}" target="<?= $city->target ?>">
                                    {{ $city->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



    </div>
</section>









		
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
 <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


<script>
async function replaceCityAndCountryNames() {
  // Load both JSON files
  const [citiesRes, countriesRes] = await Promise.all([
    fetch('<?= asset('assets') ?>/data/cities.json'),
    fetch('<?= asset('assets') ?>/data/countries.json')
  ]);

  const [cities, countries] = await Promise.all([
    citiesRes.json(),
    countriesRes.json()
  ]);

  // Find all <label> elements with data-code
  const labels = document.querySelectorAll('[data-code]');

  labels.forEach(label => {
    const code = label.getAttribute('data-code');
    const city = cities.find(c => c.code === code);

    if (city) {
      const country = countries.find(c => c.code === city.country_code);
      const cityName = city.name;
      const countryName = country ? country.name : city.country_code;

      // Replace label text
      label.innerText = `${cityName}`;
    } else {
      // If not found in city list, just leave as is or show code
      label.innerText = code;
    }
  });
}

replaceCityAndCountryNames();


 new Swiper(".mySwiperFlight", {
      slidesPerView: 5,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      
 navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
      breakpoints: {
       0: {
          slidesPerView: 1,
        },
        500: {
          slidesPerView: 2,
        },
        800: {
          slidesPerView: 3,
        },
        1000: {
          slidesPerView: 4,
        },
        1500: {
          slidesPerView: 4,
        },
      },
    });
    
    
</script>





@endsection

