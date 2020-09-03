@extends('layouts.master')

@section('content')
<section>
  <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
  <link href="{{ asset('font_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/plugins/flexslider/flexslider.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/product.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/product_responsive.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

</section>

 <!-- Home -->

 <div class="home">
  <div class="home_container d-flex flex-column align-items-center justify-content-end">
    <div class="home_content text-center">
      <div class="home_title">Product Page</div>
      <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
          <li><a href="/boutique">Home</a></li>
          <li><a href="/test"> all Products</a></li>
          <li>New Products</li>
        </ul>
      </div>
    </div>
  </div>
</div>


 <!-- Show product -->
<div class="product">
  <div class="container">
    <div class="row">
      
      <!-- Product Image -->
      <div class="col-lg-6">
        <div class="product_image_slider_container">
             <img src="{{ asset('storage/' . $product->image) }}" class="w-100" alt="testimageproduct">
        </div>
      </div>
      <!-- i must use slider for showing pictures categories -->
        @if ($product->images)
        <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail" width="50">
          @foreach (json_decode($product->images, true) as $image)
            <img src="{{ asset('storage/' . $image) }}" width="50" class="img-thumbnail">
          @endforeach
        @endif

      <!-- Product Info -->
      <div class="col-lg-6 product_col">
        <div class="product_info">
          <h1 class="">{{ $product->title }}</h1>
          <div class="product_category">In <a href="category.html">
             @foreach ($product->categories as $category)
              {{ $category->name }}{{ $loop->last ? '' : ', '}}
             @endforeach</a></div>
             <div class="product_price mb-2">{{ $product->getPrice() }}</div>
          <small class="product_reviews">{{ $stock }}</small>
           
              <div class="product_text">
                <p>{!! $product->description !!}</p>
              </div>
            <div class="product_buttons">
              <div class="text-right d-flex flex-row align-items-start justify-content-start">
              
                @if ($stock === 'Disponible')
                <form action="{{ route('cart.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <div class="" id="test_btn">
                    <button type="submit" class="btn btn-outline-dark w-100" id="test-btn_height" height="56px"><i class="fa fa-cart-plus" id="cart-icon"></i></button>
                  </div>
                  <style>
                    #test_btn{
                      margin: 0 auto;
                      width: 240px;
                      height: 70px;
                    }
                    #test-btn_height{
                      height: 56px;
                      border: 1px solid gray;
                    }
                    #cart-icon{
                      font-size: xx-large!important;
                    }
                  </style>
                  
                 


                </form>
                @endif
                {{-- <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                  <div><div><img src="{{ asset('images/cart.svg') }}" class="svg" alt=""><div>+</div></div></div>
                </div> --}}
              </div>
            
              </div>
            </div>
          </div>
        </div>
  </div>
  <div class="container">
    <h3 class="text-center text-light bg-dark comentleave d-flex justify-content-center align-items-center mt-4 mb-4"> Leave a reply   </h3> 
        <style>
          .comentleave{
              height: 20%;
          }
        </style>
        <div class="mb-4">
        @comments(['model' => $product])
        </div>
 </div>

  <div class="features">
			<div class="container">
				<div class="row">
					
					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src="{{ asset('images/icon_1.svg') }}" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Fast Secure Payments</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon ml-auto mr-auto"><img src="{{ asset('images/icon_2.svg') }}" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Premium Products</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src="{{ asset('images/icon_3.svg') }}" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Free Delivery</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

  
<div class="container">
      <!-- Swiper -->
    <div class="swiper-container gallery-top">
      <div class="swiper-wrapper">
        @foreach($products as $product )
      <div class="swiper-slide"><img  src="{{ asset('storage/' . $product->image) }}" class="svg w-100 h-100" alt=""></div>
      @endforeach
       
      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next swiper-button-white"></div>
      <div class="swiper-button-prev swiper-button-white"></div>
    </div>
    <div class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        @foreach($products as $product )
        <div class="swiper-slide"><img  src="{{ asset('storage/' . $product->image) }}" class="svg w-100 h-100" alt=""></div>
        @endforeach
      
      </div>
    </div>
</div>
  </aside>
  <script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  </script>

<!-- Swiper JS -->

  @endsection

@section('extra-js')
  <script>
    // var mainImage = document.querySelector('#mainImage');
    // var thumbnails = document.querySelectorAll('.img-thumbnail');

    thumbnails.forEach((element) => element.addEventListener('click', changeImage));

    function changeImage(e) {
      mainImage.src = this.src;
    }
  </script>
@endsection
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
