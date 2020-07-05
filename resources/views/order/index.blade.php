@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <h5 class="card-header">Your orders</h5>
                <div class="card-body">
                    {{-- start orders --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">title</th>
                                <th scope="col">price</th>
                                <th scope="col">Quntity</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                                {{-- get product items --}}
                                @foreach($cart->items as $item)
                                    <tr>
                                        <td>{{ $item['title'] }}</td>
                                        <td>{{ $item['price'] }}</td>
                                        <td>{{ $item['Quntity'] }}</td>
                                    </tr>
                                @endforeach
                                    {{-- get product items --}}
                                <tr>
                                    <td colspan="3">
                                        <span class="btn btn-primary">
                                            Total price <span class="badge  badge-light">{{ $cart->totalPrice }}</span>
                                        </span>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- start orders --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
