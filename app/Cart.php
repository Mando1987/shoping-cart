<?php

namespace App;

class Cart 
{
   public $items = [];
   public $totalQuntity ;
   public $totalPrice ;
   
   public function __construct($cart = null)
   {
        if ($cart){

            $this->items        = $cart->items;
            $this->totalQuntity = $cart->totalQuntity;
            $this->totalPrice   = $cart->totalPrice;

        }else{

            $this->items        = [] ;
            $this->totalQuntity = 0  ;
            $this->totalPrice   = 0  ;

        }
   }

   public function add($product)
   {
      $item =[
          'title'   =>$product->title ,
          'price'   =>$product->price ,
          'Quntity' => 0 ,
          'image'   =>$product->image ,
      ]; 
      if( !array_key_exists($product->id, $this->items) ){

        $this->items[$product->id] = $item  ;
        $this->totalQuntity       += 1  ;
        $this->totalPrice         += $product->price  ;
    }else{
        
        $this->totalQuntity       += 1  ;
        $this->totalPrice         += $product->price  ;
    }
    
    $this->items[$product->id]['Quntity'] += 1  ;
   } 
}
