<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Account;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::orderBy('id','asc')->search()->paginate(15); // lỗi search , create_at lỗi thay id vào
        //dd($data);
        return view('admin.order.index', compact('data')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.create');
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */


    //Phần em viết
    public function edit(Order $order)
    {
        $account = Account::where('id',$order->account_id)->select('id', 'name')->get();
        $orderDetails = OrderDetail::join('products', 'product_id', '=', 'products.id')->where('order_id', $order->id)->select('order_id', 'product_id', 'orderdetails.quantity as amount', 'name', 'images', 'total', 'price')->orderBy('product_id','ASC')->get();
        //dd($order);
        return view('admin.order.edit', compact('order', 'account', 'orderDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if($request->status == 1){
            if ($order->update(['status' => 1])) {
                return redirect()->route('order.index')->with('success', 'Cập nhật thành công');
            }
            else
             return redirect()->route('order.index')->with('error', 'Chỉnh sửa thất bại');
        }
        else{
            if ($order->update(['status' => 0])) {
                return redirect()->route('order.index')->with('success', 'Cập nhật thành công');
            }
            else
                return redirect()->route('order.index')->with('error', 'Chỉnh sửa thất bại');
        }
        
    }
    //Đến đây
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success','xóa thành công');
    }
}
