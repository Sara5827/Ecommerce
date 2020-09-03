@extends('layouts.master')


@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('content')
<!-- Cart -->

    <section>
        <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
        <link href="{{ asset('font_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/cart.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('font_assets/styles/cart_responsive.css') }}">
    </section>

    
    <!-- Home -->
    @if (Cart::count() > 0)

        <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                <div class="home_content text-center">
                    <div class="home_title">Shopping Cart</div>
                    <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                            <li><a href="/boutique">Home</a></li>
                            <li>Your Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      

    @endif

   


  @if (Cart::count() > 0)
   <div class="px-4 px-lg-0">
     <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Produit</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Prix</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantité</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Supprimer</div>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $product)
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="{{ asset('storage/' . $product->model->image) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0">
                                                     <a href="{{ route('products.show', ['slug' => $product->model->slug]) }}" class="text-dark d-inline-block align-middle">{{ $product->model->title }}</a>
                                                </h5>
                                                    <span class="text-muted font-weight-normal font-italic d-block">
                                                        Catégories: @foreach ($product->model->categories as $category)
                                                        {{ $category->name }}{{ $loop->last ? '' : ', '}}
                                                     @endforeach</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>{{ getPrice($product->subtotal()) }}</strong></td>
                                    <td class="border-0 align-middle">
                                        <select class="custom-select" name="qty" id="qty" data-id="{{ $product->rowId }}" data-stock="{{ $product->model->stock }}">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}" {{ $product->qty == $i ? 'selected' : ''}}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="border-0 align-middle">
                                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- End -->
                </div>
            </div>
           
            <div class="row p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="cart_extra_title">Coupon Code
                    </div>
                    @if (!request()->session()->has('coupon'))
                    <div class="p-4">
                    <form action="{{ route('cart.store.coupon') }}" method="POST">
                        @csrf
                        <div class="input-group mb-4 border rounded-pill p-2">
                            
                            <input type="text" placeholder="Entrez votre code ici" name="code" aria-describedby="button-addon3" class="form-control border-0">
                            <div class="input-group-append border-0">
                                <button id="button-addon3" type="submit" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    @else
                    <div class="p-4">
                        <p class="font-italic mb-4">Un coupon est déjà appliqué.</p>
                    </div>
                    @endif
                   {{-- comment --}}
                </div>
            
                <div class="cart_extra cart_extra_2 col-lg-6">
                    <div class="cart_extra_title">Cart Total
                    </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{ getPrice(Cart::subtotal()) }}</strong></li>
                        @if (request()->session()->has('coupon'))
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Coupon {{ request()->session()->get('coupon')['code'] }}

                        <form action="{{ route('cart.destroy.coupon') }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        </strong><strong>{{ getPrice(request()->session()->get('coupon')['remise']) }}</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Nouveau Sous-total</strong><strong>
                        {{ getPrice(Cart::subtotal() - request()->session()->get('coupon')['remise'])}}
                        </strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>
                        {{ getPrice((Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100)) }}
                        </strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong><strong>
                        {{ getPrice((Cart::subtotal() - request()->session()->get('coupon')['remise']) +(Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100)) }}
                        </strong></li>
                        @else
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>{{ getPrice(Cart::tax()) }}</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                            <h5 class="font-weight-bold">{{ getPrice(Cart::total()) }}</h5>
                        </li>
                        @endif
                        
                        <a href="{{ route('checkout.index') }}" class="checkout_button trans_200">
                           <div class="checkout_button" id="caisse">   <i class="fa fa-credit-card m-2" aria-hidden="true"></i> Passer à la caisse</div>
                            <style>
                               #caisse{
                                    font-size: x-large;
                                    color: white;
                               }
                            </style>
                        </a>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="col-md-12">
    <h5>Votre panier est vide pour le moment.</h5>
    <p>Mais vous pouvez visiter la <a href="{{ route('products.index') }}">boutique</a> pour faire votre shopping.
    </p>
</div>
@endif

@endsection

@section('extra-js')
 <script>
    var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = element.getAttribute('data-id');
            var stock = element.getAttribute('data-stock');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/panier/${rowId}`,
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'PATCH',
                    body: JSON.stringify({
                        qty: this.value,
                        stock: stock
                    })
            }).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            });
        });
    });
 </script>
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


