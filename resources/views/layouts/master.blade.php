<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application E-Commerce développée avec le Framework Laravel 6 par Ludovic Guénet">
    <meta name="author" content="Ludovic Guénet">
    @yield('extra-meta')

    <title>E-Commerce Bio</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('extra-script')

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- FontAwesome 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ecommerce App CSS -->
    <link rel="stylesheet" href="{{ asset('css/ecommerce.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
<div>
  <div class="">
    <header class="blog-header p-4 pt-3">
      <div class="row flex-nowrap justify-content-between align-items-center ">
        <div class="col-4">
          <a class="blog-header-logo" style="color: #218838 !important;" href="{{ route('products.index') }}"><img src="https://www.epicerieverte.ma/frontassets/images/logo-mobile.png" width="90" alt=""></a>
        </div>
        <div class="text-center d-flex">
          <a href="{{ route('products.index') }}">
            <div class="d-flex  m-1">
              <div style="color: #218838 !important;"><i class="fa fa-home" id="home"></i> </div>
              <h5 style="color: #218838 !important;"> Accueil </h5>
            </div>
          </a> 
          <div class="col-4  d-flex">
            <a class="text-muted m-1" href="{{ route('cart.index') }}"><h5 style="color: #218838 !important;">Panier </h5></a>
            <span class="text-success d-flex">
              <i class="fa fa-cart-arrow-down m-1" style="color: #218838 !important;" id="panier"></i>
              <small> {{ Cart::count() }} </small>
            </span>
          </div>
        </div>
       
        <div class="col-4 d-flex justify-content-end align-items-center">
          @include('partials.search')
          @include('partials.auth')
        </div>
      </div>
    </header>

  <div class="nav-scroller py-1 mb-2 container">
    <nav class="nav d-flex justify-content-between">
      @foreach (App\Category::all() as $category)
      <a class="p-2 text-muted" href="{{ route('products.index', ['categorie' => $category->slug]) }}">{{ $category->name }}</a>
      @endforeach
    </nav>
  </div>

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
  <div class="row m-2 "> 
    @yield('content')
  </div>
</div>

<footer class=" bg-success">
    <div class="card-body d-flex justify-content-around container">
      <div class="d-flex m-2">
        <i class="fa fa-credit-card icon-footer m-2"></i>
        <p class="text-Footer m-1">Paiement sécurisé par carte bancaire</p>
      </div>
      <div class="d-flex m-2">
        <i class="fa fa-truck icon-footer  m-2"></i>
        <p class="text-Footer m-1">Livraison rapide à domicile sue casablanca  </p>
      </div>
      <div class="d-flex m-2">
        <i class="fa fa-phone icon-footer m-2"></i>
          <p class="text-Footer m-1">Service client <br> Message Whatsaap au: 06 64 42 82 40</p>
      </div>   
  </div>
  <style>
    .text-Footer{
      color: white;
      font-family: Arial, Helvetica, sans-serif;
      font-size: medium;
    }
    .icon-footer{
      color: white;
      font-size: large;
    }
    .haut{
      font-size: xx-large;
       
    }
    #home{
      font-size: large;
      margin: 4px;
    }
    #panier{
      font-size: x-large;
      margin: 8px;
    }
  </style>
</footer>

<footer class="blog-footer">
  <p>
    <img src="https://www.epicerieverte.ma/frontassets/images/logo-mobile.png" alt="" width="90px">
  </p>
  <p>
      🛒 Boutique des Produits -KM 6,Route XXX 20000 <br> Casablanca - Maroc
  </p>
  <p>
    <a href="#"> <i class="fa fa-angle-double-up haut text-success"></i> </a>
  </p>
</footer>
</div>
@yield('extra-js')
</body>
</html>
