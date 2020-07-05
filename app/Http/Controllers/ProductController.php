<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('req')){

            toast( session()->get('msg'), session()->get('req'));
        }
        $products = Product::all();

        return view('product.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $cart =new Cart(session()->get('cart'));
        $cart->removeFromCart($product->id);

        if ($cart->totalPrice <= 0){
            session()->forget('cart');
        }else{
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.show')->with(['req' => 'success' , 'msg'=> 'product remove from cart successfuly']);
    }

    public function addToCart(Product $product){

       if(session()->has('cart')){

           $cart = new Cart (session()->get('cart'));
       }else
       {

          $cart = new Cart;
       }

       $cart->add($product);

        session()->put('cart', $cart);

        return redirect()->back()->with(['req' => 'success', 'msg'=> 'Product added to your cart']) ;

       
    }
    public function showCart(){
        if(session()->has('req')){

            toast( session()->get('msg'), session()->get('req'));
        }

       if (session()->has('cart')){

           $cart = session()->get('cart');

       }else{
           $cart = null;
       }
       return view('cart.show', compact('cart'));
    }
    public function checkout($totalAmount){

       return view('cart.checkout')->with('totalAmount', $totalAmount);
    }

    public function stripeCharge(Request $request)
    {
        $charge = Stripe::charges()->create([
            'currency'    => 'USD',
            'amount'      => $request->amount,
            'source'      => $request->stripeToken,
            'description' => 'test from laravel',
        ]);
        if($charge){
            auth()->user()->orders()->create([
                 'cart' => serialize(session()->get('cart')),
            ]);
            session()->forget('cart');
            return redirect()->route('store')->with(['req' => 'success' , 'msg' => 'Payment added successfuly']);
            
        }else{
            return redirect()->back()->with(['req' => 'erorr' , 'msg' => 'Payment failed to add']);
        }

        
    }
}
