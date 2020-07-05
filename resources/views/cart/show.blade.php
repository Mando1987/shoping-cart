@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            @isset($cart->items)
                @foreach($cart->items as $product)
                    <div class="card mb-2">
                        <div class="row no-gutters">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['title'] }}</h5>
                                <div class="row">
                                    <div class="col-md-10">
                                        <form >
                                            <div class="form-row align-items-center">
                                                <div class="col-sm-7 my-1">
                                                    <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Quntity</div>
                                                        </div>
                                                        <input type="text" class="form-control mr-2"
                                                            id="inlineFormInputGroupUsername"
                                                            value="{{ $product['Quntity'] }}">
                                                    
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Total price</div>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            id="inlineFormInputGroupUsername"
                                                            value="{{ $product['price'] * $product['Quntity'] }}" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto my-1">
                                                    <button type="submit" class="btn btn-primary">change</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                    <form action="{{route('cart.remove' , $product['id'])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <div class="form-row align-items-center">
                                                <div class="col-auto my-1">
                                                    <button type="submit" class="btn btn-danger">remove</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                    <h5 class="card-title">Total amout : ${{ $cart->totalPrice }}</h5>
                    <h5 class="card-title">Total Quntity : {{ $cart->totalQuntity }}</h5>
                    <a href="{{ route('cart.checkout', $cart->totalPrice) }}"
                        class="btn btn-dark">Checkout</a>

                </div>
            </div>
        </div>
        @endisset


    </div>
</div>
@endsection
