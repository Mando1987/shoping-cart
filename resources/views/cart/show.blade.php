@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            @isset($cart->items)
                
            @foreach($cart->items as $product)
            
                <div class="card mb-2">
                    <div class="row no-gutters">
                        {{-- <div class="col-md-2">
                            <img src="{{ $product['image'] }}" class="card-img-top" >
                        </div> --}}
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['title'] }}</h5>
                                <p class="card-text"> {{ $product['Quntity'] }}</p>
                                <a href="#" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Your Cart</div>
                    <div class="card-body">
                        <h5 class="card-title">Total amout   : ${{$cart->totalPrice}}</h5>
                        <h5 class="card-title">Total Quntity : {{$cart->totalQuntity}}</h5>
                        <a href="{{route('cart.checkout', $cart->totalPrice)}}" class="btn btn-dark">Checkout</a>
                        
                    </div>
                </div>
            </div>
            @endisset


    </div>
</div>
@endsection
