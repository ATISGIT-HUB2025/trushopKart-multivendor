@php
$categories = \App\Models\Category::where('status', 1)
->with([
'subCategories' => function ($query) {
$query->where('status', 1)
->with([
'childCategories' => function ($query) {
$query->where('status', 1);
}
]);
}
])
->get();
@endphp

<nav class="wsus__main_menu d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="relative_contect d-flex minerowvv">

                    {{-- <div class="wsus_menu_category_bar_button">
                        <button class="books-button" id="booksToggle">
                            <span>Books</span>
                        </button>
                    </div> --}}

                    {{-- <ul class="wsus_menu_cat_item " id="booksMenu"> --}}


                        {{-- @foreach ($categories as $category)
                        <li>
                            <a class="{{count($category->subCategories) > 0 ? 'wsus__droap_arrow' : ''}}"
                                href="{{route('products.index', ['category' => $category->slug])}}">
                                <i class="{{$category->icon}}"></i> {{$category->name}}
                            </a>
                            @if(count($category->subCategories) > 0)
                            <ul class="wsus_menu_cat_droapdown">
                                @foreach ($category->subCategories as $subCategory)
                                
                                <li>
                                    <a href="{{route('products.index', ['subcategory' => $subCategory->slug])}}">
                                        {{$subCategory->name}}
                                        @if(count($subCategory->childCategories) > 0)
                                        <i class="fas fa-angle-right"></i>
                                        @endif
                                    </a>
                                    @if(count($subCategory->childCategories) > 0)
                                    <ul class="wsus__sub_category">
                                        @foreach ($subCategory->childCategories as $childCategory)
                                        <li>
                                            <a
                                                href="{{route('products.index', ['childcategory' => $childCategory->slug])}}">
                                                {{$childCategory->name}}
                                                @if(count($childCategory->grandChildCategories) > 0)
                                                <i class="fas fa-angle-right"></i>
                                                @endif
                                            </a>
                                            @if(count($childCategory->grandChildCategories) > 0)
                                            <ul class="wsus__grand_child_category">
                                                @foreach ($childCategory->grandChildCategories as $grandChildCategory)
                                                <li>
                                                    <a
                                                        href="{{route('products.index', ['grandchildcategory' => $grandChildCategory->slug])}}">
                                                        {{$grandChildCategory->name}}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach --}}



                        {{-- <li><a href="#"><i class="fal fa-gem"></i> View All Categories</a></li> --}}
                    {{-- </ul> --}}


                    @php

                      $categories = \App\Models\Category::with('subcategories')->where('status', 1)->get();

                    @endphp

                    <ul class="wsus__menu_item box-nav-menu">
    @foreach($categories as $category)
        <li class="menu-item position-relative">
            <a class="{{ setActive_2([$category->slug]) }}" href="{{ $category->slug }}">
                {{ $category->name }}
            </a>

            @if($category->subcategories->count())
                <div class="sub-menu sub-menu-style-2">
                    <ul class="menu-list">
                        @foreach($category->subcategories->chunk(ceil($category->subcategories->count() / 2)) as $subcategoryChunk)
                                @foreach($subcategoryChunk as $subcategory)
                                    <li>
                                        <a href="{{ $subcategory->slug }}"
                                           class="menu-link-text link">
                                            {{ $subcategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                        @endforeach
                    </ul>
                </div>
            @endif
        </li>
    @endforeach
</ul>


                    <ul class="wsus__menu_item wsus__menu_item_right">
                        <li><a href="{{route('product-traking.index')}}">track order</a></li>
                        @if (auth()->check())
                        @if (auth()->user()->role === 'user')
                        <li><a href="{{route('user.dashboard')}}">my account</a></li>
                        @elseif (auth()->user()->role === 'vendor')
                        <li><a href="{{route('vendor.dashbaord')}}">Vendor Dashboard</a></li>
                        @elseif (auth()->user()->role === 'state_head')
                        <li><a href="{{route('state_head.dashbaord')}}">State Head Dashboard</a></li>
                        @elseif (auth()->user()->role === 'teacher')
                        <li><a href="{{route('teacher.dashboard')}}">Teacher Dashboard</a></li>
                        @elseif (auth()->user()->role === 'divisional_head')
                        <li><a href="{{route('divisional.dashboard')}}">Divisional Head Dashboard</a></li>
                        @elseif (auth()->user()->role === 'district_head')
                        <li><a href="{{route('district.dashboard')}}">District Head Dashboard</a></li>
                        @elseif (auth()->user()->role === 'subdistrict_head')
                        <li><a href="{{route('subdistrict.dashboard')}}">Subdistrict Head Dashboard</a></li>
                        @elseif (auth()->user()->role === 'taluka_head')
                        <li><a href="{{route('taluka.dashboard')}}">Taluka Head Dashboard</a></li>
                        @elseif (auth()->user()->role === 'admin')
                        <li><a href="{{route('admin.dashbaord')}}">Admin Dashboard</a></li>
                        @endif
                        @else

                        <li><a href="{{route('login')}}">login</a></li>
                        {{-- <li style="margin-top:2.5px">
                            <a href="{{route('exam-category')}}" class="admission-btn">
                                <span style="color:#fff" class="admission-text">Admission</span>
                                <span class="admission-icon"><i style="color:#fff"
                                        class="fas fa-graduation-cap"></i></span>
                            </a>
                        </li> --}}

                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


<section id="wsus__mobile_menu">
    <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
    <!--<ul class="wsus__mobile_menu_header_icon d-inline-flex">-->

      


    <!--</ul>-->
    <form action="{{route('products.index')}}" class="mt-5">
        <input type="text" placeholder="Search..." name="search" value="{{request()->search}}">
        <button type="submit"><i class="far fa-search"></i></button>
    </form>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        {{-- <li class="nav-item" role="presentation">
            <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true">Categories</button>
        </li> --}}
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                role="tab" aria-controls="pills-profile" aria-selected="false">main menu</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        {{-- <div class="tab-pane fade  " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="wsus__mobile_menu_main_menu">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <ul class="wsus_mobile_menu_category">
                        @foreach ($categories as $categoryItem)
                        <li>
                            <a href="#"
                                class="{{count($categoryItem->subCategories) > 0 ? 'accordion-button' : ''}} collapsed"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThreew-{{$loop->index}}"
                                aria-expanded="false" aria-controls="flush-collapseThreew-{{$loop->index}}"><i
                                    class="{{$categoryItem->icon}}"></i> {{$categoryItem->name}}</a>

                            @if(count($categoryItem->subCategories) > 0)
                            <div id="flush-collapseThreew-{{$loop->index}}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul>
                                        @foreach ($categoryItem->subCategories as $subCategoryItem)
                                        <li><a href="#">{{$subCategoryItem->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="wsus__mobile_menu_main_menu">
                <div class="accordion accordion-flush" id="accordionFlushExample2">
                  <ul class="navbar-nav wsus__menu_item box-nav-menu">
    @foreach($categories as $category)
        <li class="nav-item menu-item position-relative {{ $category->subcategories->count() ? 'has-dropdown' : '' }}">
            <a class="nav-link {{ setActive_2([$category->slug]) }}"
               href="{{ url($category->slug) }}">
                {{ $category->name }}
                @if($category->subcategories->count())
    <i class="fas fa-chevron-down arrow-icon"></i>
@endif
            </a>

            @if($category->subcategories->count())
                <ul class="dropdown custom-dropdown-menu">
                    @foreach($category->subcategories->chunk(ceil($category->subcategories->count() / 2)) as $subcategoryChunk)
                        @foreach($subcategoryChunk as $subcategory)
                            <li>
                                <a class="dropdown-item link" href="{{ url($subcategory->slug) }}">
                                    {{ $subcategory->name }}
                                </a>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>


<script>
      document.querySelectorAll('.menu-item.has-dropdown > a').forEach(function (trigger) {
        trigger.addEventListener('click', function (e) {
            // Only on small screens (e.g., mobile)
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const dropdown = this.nextElementSibling;
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        });
    });
</script>
            </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const booksToggle = document.getElementById('booksToggle');
        const booksMenu = document.getElementById('booksMenu');

        booksToggle.addEventListener('click', function() {
            booksMenu.classList.toggle('show');
        });

        document.addEventListener('click', function(event) {
            if (!booksToggle.contains(event.target) && !booksMenu.contains(event.target)) {
                booksMenu.classList.remove('show');
            }
        });
    });
</script>