<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Order;
use App\Controller\CartController;
use App\Models\OrderDetail;
use Auth;

class CheckOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(CartHelper $cart){
        $dem = count($cart->items);
        // if(count($cart->items)==0){
        if(empty($cart->items)){
            return redirect()->back()->with('error','bạn chưa thêm sản phẩm vào giỏ hàng');
        }else{

            return view('check-out');
        }
    }

    public function submit_form(Request $req, CartHelper $cart){
        $c_id = Auth::user()->id;
        $Vnote = $req -> note;
        if( $Vnote == null){
            $Vnote = "không";
        }else{
            $Vnote = $req-> note;
        }
        if($order = Order::create([
             'account_id' => $c_id,
             'note' => $Vnote,
             'total' =>$cart->total_price,

            ])){
                $order_id = $order->id;

                foreach($cart->items as $product_id => $item){
                    $quantity = $item['quantity'];
                    $price = $item['price'];                    
                    OrderDetail::create([
                        'order_id'=>$order_id, 
                        'product_id'=>$product_id, 
                        'quantity'=>$quantity, 
                        'total'=>$price,
                    ]);
                }

                session(['cart'=>'']);
                return redirect()->route('home.index')->with('success','Đặt hàng thành công');
            }
        else{
            return redirect()->route('home.shop')->with('danger','Đặt hàng không thành công');
        }

    }
}
