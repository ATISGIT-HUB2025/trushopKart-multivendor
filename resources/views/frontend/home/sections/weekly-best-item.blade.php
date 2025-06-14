@php
    $categoryProductSliderSectionThree = json_decode($categoryProductSliderSectionThree->value, true);
@endphp
<section id="wsus__weekly_best" class="home2_wsus__weekly_best_2 ">
    <div class="container">
        <div class="row">
            @foreach ($categoryProductSliderSectionThree as $sliderSectionThree)
                @php
                    $lastKey = [];
                    $category = null;
                    $products = collect();

                    foreach ($sliderSectionThree as $key => $categoryId) {
                        if ($categoryId === null) {
                            break;
                        }
                        $lastKey = [$key => $categoryId];
                    }

                    if (!empty($lastKey)) {
                        $key = array_keys($lastKey)[0];
                        $id = $lastKey[$key];

                        if ($key === 'category') {
                            $category = \App\Models\Category::find($id);
                        } elseif ($key === 'sub_category') {
                            $category = \App\Models\SubCategory::find($id);
                        } else {
                            $category = \App\Models\ChildCategory::find($id);
                        }

                        if ($category) {
                            $products = \App\Models\Product::with('reviews')
                                ->where($key.'_id', $category->id)
                                ->orderBy('id', 'DESC')
                                ->take(6)
                                ->get();
                        }
                    }
                @endphp

                @if($category && $products->isNotEmpty())
                    <div class="col-xl-6 col-sm-6">
                        <div class="wsus__section_header">
                            <h3>{{$category->name}}</h3>
                        </div>
                        <div class="row weekly_best2">
                            @foreach ($products as $item)
                                <!-- Your product display code here -->
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
