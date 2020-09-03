@extends('layouts.master')

@section('content')

<section>
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
        <link href="{{ asset('font_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/cart.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/cart_responsive.css') }}">

</section>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Search Page</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="#">Home</a></li>
							<li><a href="category.html">Woman</a></li>
							<li>New Products</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

<div class="container">
<div class="row products_row products_container grid">

  @foreach ($products as $product)				
  <!-- Product -->
  <div class="col-xl-4 col-md-6 grid-item new"> 
    <div class="product">
      <div class=""><img src="{{ asset('storage/' . $product->image) }}" height="400px" width="370px" alt=""></div>
      <div class="product_content">
        <div class="product_info d-flex flex-row align-items-start justify-content-start">
          <div>
            <div>
              <div class="product_name"><a  href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a></div>
              <div class="product_category">In <a href="category.html"> 
                @foreach ($product->categories as $category)
                {{ $category->name }}{{ $loop->last ? '' : ', '}}
                @endforeach</a></div>
            </div>
          </div>
          <div class="ml-auto text-right">
            <div class="product_price text-right">{{ $product->getPrice() }}
              <span></span></div>
          </div>
        </div>
     
      </div>
    </div>
  </div>

  @endforeach
  
  {{ $products->appends(request()->input())->links() }}
</div>
</div>
  {{-- @foreach ($products as $product)
    <div class="col-md-6">
      <div class="row no-gutters border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <small class="d-inline-block text-info mb-2">
            @foreach ($product->categories as $category)
                {{ $category->name }}{{ $loop->last ? '' : ', '}}
            @endforeach
          </small>
          <h5 class="mb-0">{{ $product->title }}</h5>
          <p class="mb-3 text-muted">{{ $product->subtitle }}</p>
          <strong class="display-4 mb-4 text-secondary">{{ $product->getPrice() }}</strong>
          <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-success"><i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter le produit</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('storage/' . $product->image) }}" width="250px" height="300px" alt="">
        </div>
      </div>
    </div>
  @endforeach --}}

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
<script src="{{ asset('font_assets/plugins/flexslider/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('font_assets/js/product.js') }}"></script>
 
@endsection
