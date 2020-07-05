<?php

namespace App;

class Cart 
{
    /**
     * 
     * out put 
     * items = [
     *    0 =>[
     *            title   : title,
     *            price   : 123,
     *            image   : url,
     *            Quntity : 1,
     *        ] ,               
     *    1 =>[
     *            title   : title,
     *            price   : 123,
     *            image   : url,
     *            Quntity : 1,
     *        ] ,               
     * 
     *     ] , 
     *   $totalQuntity = 12,
     *   $totalPrice =123;
     * 
     */
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
          'id'      =>$product->id ,
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

   public function removeFromCart($id)
   {
      if (array_key_exists($id , $this->items)){

          $this->totalQuntity -= $this->items[$id]['Quntity']; 
          $this->totalPrice   -= $this->items[$id]['Quntity'] * $this->items[$id]['price']; 
          unset($this->items[$id]);
      }
   }
   
   public function updateQuntity($id, $quntity){
       // remove product Quntity and price from cart total ;
       $this->totalQuntity -= $this->items[$id]['Quntity']; 
       $this->totalPrice   -= $this->items[$id]['Quntity'] * $this->items[$id]['price']; 
       
       //add new Quntity and price for product ;
       $this->items[$id]['Quntity'] = $quntity;
       $this->totalQuntity         += $quntity; 
       $this->totalPrice           += $quntity * $this->items[$id]['price']; 
   
   }
}
