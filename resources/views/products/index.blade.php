@extends('layouts.master')
@section('content')
@include('products.slider')
		<!-- Products -->    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="section_title text-center">Popular on Little Closet</div>
          </div>
        </div>
        <div class="row page_nav_row">
          <div class="col">
            <div class="page_nav">
              <ul class="d-flex flex-row align-items-start justify-content-center">
                @foreach (App\Category::all() as $category)
                  <li class="active"><a href="{{ route('products.index', ['categorie' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        
        <div class="row products_row">
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
      <div class="row load_more_row">
        <div class="col">
          <div class="button load_more ml-auto mr-auto"><a href="{{ route('products.indexall')}}">load more</a></div>
        </div>
      </div>
    
      {{-- <div class="container">
        <section class="row row-cols-md-2">
          @foreach ($products as $product)
        
            <div class="col mb-4">
              <div class="row no-gutters border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
                <div class="col p-3 d-flex flex-column position-static">
                  <small class="d-inline-block text-success mb-2">
                    @foreach ($product->categories as $category)
                        {{ $category->name }}{{ $loop->last ? '' : ', '}}
                    @endforeach
                  </small>
                  <h5 class="mb-0">{{ $product->title }}</h5>
                  <p class="mb-3 text-muted">{{ $product->subtitle }}</p>
                  <strong class="display-4 mb-4 text-secondary"></strong>
                  <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-success"><i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter le produit</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  <img src="{{ asset('storage/' . $product->image) }}" width="250px" height="300px" alt="">
                </div>
              </div>
            </div>
          @endforeach
        </section>
      </div> --}}
      {{-- <div class="container">
        {{ $products->appends(request()->input())->links() }}
      </div>  --}}
     
      </div>
    </div>
    <script src="{{ asset('font_assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('font_assets/styles/bootstrap-4.1.2/popper.js') }}"></script>
    <script src="{{ asset('font_assets/styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
    <script src="{{ asset('font_assets/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('font_assets/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('font_assets/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('font_assets/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('font_assets/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('font_assets/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('font_assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('font_assets/js/cart.js') }}"></script>
 
@endsection
