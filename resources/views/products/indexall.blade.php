@extends('layouts.master')
@section('content')
 
<section>
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
    <link href="{{ asset('font_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/category.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/category_responsive.css') }}">
</section>

 <!-- Home -->

 <div class="home">
    <div class="home_container d-flex flex-column align-items-center justify-content-end">
        <div class="home_content text-center">
            <div class="home_title">All Products</div>
            <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                    <li><a href="/boutique">Home</a></li>
                    <li>New Products</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Products -->

<div class="products">
    <div class="container">
        <div class="row products_bar_row">
            <div class="col">
                <div class="products_bar d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
                    <div class="products_bar_links">
                        <ul class="d-flex flex-row align-items-start justify-content-start">
                            @foreach (App\Category::all() as $category)
                            <li class="active"><a href="{{ route('products.index', ['categorie' => $category->slug]) }}">{{ $category->name }}</a></li>
                          @endforeach
                            
                        </ul>
                    </div>
                    {{-- <div class="products_bar_side d-flex flex-row align-items-center justify-content-start ml-lg-auto">
                        <div class="products_dropdown product_dropdown_sorting">
                            <div class="isotope_sorting_text"><span>Default Sorting</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                            <ul>
                                <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'>Default</li>
                                <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "price" }'>Price</li>
                                <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "name" }'>Name</li>
                            </ul>
                        </div>
                        <div class="product_view d-flex flex-row align-items-center justify-content-start">
                            <div class="view_item active"><img src="images/view_1.png" alt=""></div>
                            <div class="view_item"><img src="images/view_2.png" alt=""></div>
                            <div class="view_item"><img src="images/view_3.png" alt=""></div>
                        </div>
                        <div class="products_dropdown text-right product_dropdown_filter">
                            <div class="isotope_filter_text"><span>Filter</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                            <ul>
                                <li class="item_filter_btn" data-filter="*">All</li>
                                <li class="item_filter_btn" data-filter=".hot">Hot</li>
                                <li class="item_filter_btn" data-filter=".new">New</li>
                                <li class="item_filter_btn" data-filter=".sale">Sale</li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row products_row products_container grid">
            @foreach ($products as $product)
          <!-- Product -->
          <div class="col-xl-4 col-md-6">
            <div class="product">
              <div class="product_image"><img src="{{ asset('storage/' . $product->image) }}" height="500px" alt=""></div>
              <div class="product_content">
                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                  <div>
                    <div>
                      <div class="product_name"><a  href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a></div>
                      <div class="product_category">In @foreach ($product->categories as $category)
                        {{ $category->name }}{{ $loop->last ? '' : ', '}}
                    @endforeach</a></div>
                    </div>
                  </div>
                  <div class="ml-auto text-right">
                   
                    <div class="product_price text-right">{{ $product->getPrice() }}<span></span></div>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
          @endforeach



        </div>
          <div class="d-flex justify-content-center">{{ $products->appends(request()->input())->links() }}</div>
          
          <br>
          <br>
         <div class="">
            <h3 class="text-center text-light bg-dark comentleave d-flex justify-content-center align-items-center mb-4"> Leave a reply   </h3> 
                <style>
                  .comentleave{
                      height: 20%;
                  }
                </style>
                <div class="mb-4">
                @comments(['model' => $product])
                </div>
         </div>
         
       
    </div>
</div>







@endsection

<script src="{{ asset('font_assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('font_assets/styles/bootstrap-4.1.2/popper.js') }}"></script>
<script src="{{ asset('font_assets/styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('font_assets/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('font_assets/plugins/progressbar/progressbar.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('font_assets/plugins/Isotope/fitcolumns.js') }}"></script>
<script src="{{ asset('font_assets/js/category.js') }}"></script>