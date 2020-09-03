<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application E-Commerce développée avec le Framework Laravel 6 par Ludovic Guénet">
    <meta name="author" content="Ludovic Guénet">
    @yield('extra-meta')

    <title>E-Commerce CasaMod</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('extra-script')
  

  

    <!-- Ecommerce App CSS -->
    <link rel="stylesheet" href="{{ asset('css/ecommerce.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/responsive.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    
   

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    
   
    <style>
      html,
      body {
        position: relative;
        height: 100%;
      }
  
      body {
        background: rgb(255, 255, 255);
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }
  
      .swiper-container {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
      }
  
      .swiper-slide {
        background-size: cover;
        background-position: center;
        cursor: pointer;
      }
  
      .gallery-top {
        height: 80%;
        width: 100%;
      }
  
      .gallery-thumbs {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
      }
  
      .gallery-thumbs .swiper-slide {
        height: 100%;
        opacity: 0.4;
      }
  
      .gallery-thumbs .swiper-slide-thumb-active {
        opacity: 1;
      }
    </style>


  </head>

  <body>


    
       <!-- Menu -->

        <div class="menu">

          <!-- Search -->
          <div class="menu_search">
            <form action="#" id="menu_search_form" class="menu_search_form">
              <input type="text" class="search_input" placeholder="Search Item" required="required">
              <button class="menu_search_button"><img src="images/search.png" alt=""></button>
            </form>
          </div>
          <!-- Navigation -->
          <div class="menu_nav">
            <ul>
              <li><a href="{{ route('products.index') }}">Home</a></li>
            <li><a href="{{ route('products.indexall')}}">Products</a></li>
              <li><a  href="{{ route('cart.index') }}">Cart</a></li>
             
            </ul>
          </div>
          <!-- Contact Info -->
          <div class="menu_contact">
            <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
              <div><div><img src="{{ asset('images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
              <div>+212 637 24 30 53</div>
            </div>
            <div class="menu_social">
              <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="https://www.linkedin.com/in/sara-ouldjelloul-26b904160/"> <i class="fab fa-linkedin-in" ></i></a></li>
                <li><a href="https://www.facebook.com/oiseau.reveuse"><i class="fab fa-facebook-f" ></i></a></li>
                <li><a href="https://sara-ol.com/"> <i class="fa fa-smile"></i>  </a></li>
                <li><a href="https://dribbble.com/sara1234"><i class="fas fa-basketball-ball"></i></a></li>
              </ul>
            </div>
          </div>
        </div>

       <!-- Header -->
        <div class="super_container">   
            <header class="header">
                <div class="header_overlay"></div>
                <div class="header_content d-flex flex-row align-items-center justify-content-start">
                  <div class="logo">
                    <a href="#">
                      <div class="d-flex flex-row align-items-center justify-content-start">
                        <img src="{{ asset("images/thelife.png") }}" class="" width="100px" alt="">
                        
                      </div>
                    </a>	
                  </div>
                  <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                  <nav class="main_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-start">

                      <li class="active"><a href="#">Home</a></li>
                      <li><a href="#">cart</a></li>
                      <li><a href="#">produits</a></li>
                      <li><a href="#">Contact</a></li>
                    
                    </ul>
                  </nav>
                  <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                    <!-- Search -->
                    @include('partials.search')

                  
      
                    <!-- Cart -->
                    
                    {{ Cart::count() }}
                    <div class="cart">
                      <a href="{{ route('cart.index') }}">
                        <div class="">
                          
                          <img class="svg" src="{{ asset('images/cart.svg') }}" alt="https://www.flaticon.com/authors/freepik">
                          
                         </div>
                      </a>
                  </div>
                    
                    <!-- Phone -->
                    <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                      <div><div><img src="{{ asset('images/phone.svg') }}" alt="https://www.flaticon.com/authors/freepik"></div></div>
                      <div>+212 637-243052</div>
                    </div>
                  </div>
                </div>
            </header>
        </div>


    <!-- Products -->
    
    @yield('content')

    @yield('show')

          

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

          @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
          @endif

          @if (count($errors) > 0)
              <div class="alert alert-danger">
                <ul class="mb-0 mt-0">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
          @endif

        
          @if (request()->input('q'))
            <h6 class="container">{{ $products->total() }} résultat(s) pour la recherche "{{ request()->q }}"</h6>
          @endif

   
          

          


      <!-- Footer -->

      <footer class="footer">
        <div class="footer_content">
          <div class="container">
            <div class="row">
              
              <!-- About -->
              <div class="col-lg-4 footer_col">
                <div class="footer_about">
                  <div class="footer_logo">
                    <a href="#">
                      <div class="d-flex flex-row align-items-center justify-content-start">
                        <div class="footer_logo_icon"></div>
                        <div>The life </div>
                      </div>
                    </a>		
                  </div>
                  <div class="footer_about_text">
                    <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Fusce venenatis vel velit vel euismod.
                      Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Fusce venenatis vel velit vel euismod.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Footer Links -->
              <div class="col-lg-4 footer_col">
                <div class="footer_menu">
                  <div class="footer_title mb-4">Address</div>
                    <ul class="list-unstyled">
                      <li>
                        <p>
                          <i class="fa fa-home mr-3"></i> Morroco, Casablanca 20000</p>
                      </li>
                      <li>
                        <p>
                          <i class="fa fa-envelope mr-3"></i> ouldjelloulsara@gmail.com</p>
                      </li>
                      <li>
                        <p>
                          <i class="fa fa-phone mr-3"></i> + 0x xxx xxx xx</p>
                      </li>
                      <li>
                        <p>
                          <i class="fa fa-print mr-3"></i> + 0x xxx xxx xx</p>
                      </li>
                    </ul>
                </div>
              </div>

              <!-- Footer Contact -->
              <div class="col-lg-4 footer_col mt-4">
                  <div class="footer_social">
                    <div class="footer_title ">Stay in Touch</div>
                    <ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
                      <li><a href="https://www.linkedin.com/in/sara-ouldjelloul-26b904160/"> <i class="fab fa-linkedin-in" ></i></a></li>
                      <li><a href="https://www.facebook.com/oiseau.reveuse"><i class="fab fa-facebook-f" ></i></a></li>
                      <li><a href="https://sara-ol.com/"> <i class="fa fa-smile"></i>  </a></li>
                      <li><a href="https://dribbble.com/sara1234"><i class="fas fa-basketball-ball"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer_bar">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-center">
                  <div class="copyright order-md-1 order-2">
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  ©<script>document.write(new Date().getFullYear());</script> websites built with Laravel | made with <i class="far fa-heart"></i>  by <a href="https://sara-ol.com/" target="_blank">SaraOuldjelloul</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

@yield('extra-js')
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
<script src="{{ asset('font_assets/js/custom.js') }}"></script>

</body>
</html>
