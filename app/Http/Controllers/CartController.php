<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Product;

class CartController extends Controller
{
    public function view(){
        return view('shop-cart');
    }

    public function add(CartHelper $cart, $id){
        $product = Product::find($id);

        $cart->add($product);
        //dd(session('cart'));
        return redirect()->back();
    }
    
    public function remove(CartHelper $cart, $id){
        $cart->remove($id);
        //dd(session('cart'));
        return redirect()->back();
    }

    public function update(CartHelper $cart, $id){
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        //dd(session('cart'));
        return redirect()->back();
    }

    public function clear(CartHelper $cart){
        $cart->clear();
        //dd(session('cart'));
        return redirect()->back();
    }
}
