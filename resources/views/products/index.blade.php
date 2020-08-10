@extends('layouts.master')


@section('content')
@include('products.slider')
  
  <div class="container">
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
              <strong class="display-4 mb-4 text-secondary">{{ $product->getPrice() }}</strong>
              <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-success"><i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter le produit</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img src="{{ asset('storage/' . $product->image) }}" width="250px" height="300px" alt="">
            </div>
          </div>
        </div>
      @endforeach
    </section>
  </div>
  <div class="container">
    {{ $products->appends(request()->input())->links() }}
  </div> 
 
@endsection
