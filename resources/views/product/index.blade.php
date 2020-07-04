@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <div class="row">
            @foreach ($products as $product)
             <div class="col-md-4 mb-2">
                <div class="card">
                <img src="{{$product->image}}" class="card-img-top" >
                    <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">  {{$product->price}}</p>
                        <form  action="{{route('cart.add' , $product->id)}}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="button" class="btn btn-success addToCart">buy</button>
                        </form>
                    </div>
                  </div>
            </div>   
            @endforeach
        </div>
    </section>
</div>
@endsection
