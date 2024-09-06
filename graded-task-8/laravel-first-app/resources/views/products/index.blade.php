@extends('layout')
@section('title', 'products')

@section('content')
    <section class="main">
        <div class="container">
            <div class="row row-gap-2">
                @foreach($products as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card py-3 d-flex flex-column align-items-center">
                            @if(isset($product['images']) && count($product['images']) > 0)
                                <img src="{{asset('images/'.$product['images'][0]['name'])}}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$product['name']}}</h5>
                                <p class="card-text" id="card-desc">{{$product['info']}}</p>
                                <p class="card-text"> price: {{$product['price']}}$</p>
                                <button class="btn btn-primary" type="submit">Add to cart</button>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
