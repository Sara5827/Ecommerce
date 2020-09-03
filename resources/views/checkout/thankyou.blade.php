@extends('layouts.master')

@section('content')
<style>
   .testthanks{
       background-color: white;
      
   }
   .text-thanks{
       color:rgb(100, 98, 98);
   }
   #thanks{
      margin-top: 100px;
      
   }
   #btq{
    font-size: x-large;
    text-decoration:none;
   }
 
</style>
    
    <div class=" testthanks">
        <div class="text-center">
           
            <h1 class="display-3 text-thanks" id="thanks">Merci!</h1>
            <p class="lead text-thanks"  ><strong>Votre commande a été traitée avec succès</strong></p>
            <p>
                Vous rencontrez un problème? Nous contacter <span> Num whatsapp : 06XXXXXXX</span>
            </p>
            <p class="lead">
                <a  href="{{ route('products.index') }}" id="decoration">  <button type="button" id="btq" class="btn btn-outline-secondary">Continuer vers la boutique<i class="fa fa-cart-arrow-down"></i></button> </a>
                <style>
                    #decoration{text-decoration: none!important;}
                   
                </style>
                {{-- <a class="btn btn-primary btn-sm text-thanks m-2" href="{{ route('products.index') }}" id="btq" role="button" class="bg-info" >Continuer vers la boutique<i class="fa fa-cart-arrow-down"></i></a> --}}
            </p>
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
<script src="{{ asset('font_assets/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('font_assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('font_assets/js/cart.js') }}"></script>
