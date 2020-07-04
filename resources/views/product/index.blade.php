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
                      <a href="#" class="btn btn-primary">buy</a>
                    </div>
                  </div>
            </div>   
            @endforeach
        </div>
    </section>
</div>
@endsection
