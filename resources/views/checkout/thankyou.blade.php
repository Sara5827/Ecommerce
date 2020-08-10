@extends('layouts.master')

@section('content')
<style>
   .testthanks{
       background-image: url('img/thankyou.png');
       HEIGHT: 560px;
   }
   .text-thanks{
       color:white;
   }
   #thanks{
      margin-top: 100px;
      
   }
   #btq{
    font-size: x-large;
    background-color: #B1C070;
    text-decoration:none;
   }
 
</style>
    
    <div class="col-md-12 testthanks">
        <div class="text-center">
           
            <h1 class="display-3 text-thanks" id="thanks">Merci!</h1>
            <p class="lead text-thanks"  ><strong>Votre commande a été traitée avec succès</strong></p>
            <p>
                Vous rencontrez un problème? Nous contacter <span> Num whatsapp : 06XXXXXXX</span>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm text-thanks m-2" href="{{ route('products.index') }}" id="btq" role="button" >Continuer vers la boutique<i class="fa fa-cart-arrow-down"></i></a>
            </p>
        </div>
    </div>
@endsection
