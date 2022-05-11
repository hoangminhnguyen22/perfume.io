@extends('layouts.site')
@section('main')
 <!-- Hero Section Begin -->
 <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        @foreach($Category as $cat)
                            <li><a href="{{route('home.shop_category',['id'=>$cat->id])}}">{{$cat->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{URL::asset('site')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(Session::has('error'))
                        <tr>
                            <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{Session::get('error')}}
                            </div>
                        </tr>
                        @endif
                            @foreach ($cart->items as $item)
                            <tr>
                                
                                <td class="shoping__cart__item">
                                    <img src="{{URL::asset('uploads')}}/{{$item['images']}}" alt="">
                                    <h5>{{$item['name']}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{number_format($item['price'])}} VND
                                </td>
                                <td class="shoping__cart__quantity">
                                    <form action="{{route('cart.update',['id' => $item['id']])}}" method="GET" role="form">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="quantity" value="{{$item['quantity']}}">
                                            </div>
                                        </div>
                                        <button type="submit" value="Update" class="btn btn-primary">Submit</button>
                                    </form>
                                </td>
                                <td class="shoping__cart__total">
                                    {{number_format($item['price_products'])}} VND
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{route('cart.remove',['id'=>$item['id']])}}" ><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn ">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class=""></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>{{number_format($cart->total_price)}}VND</span></li>
                        <li>Total <span>{{number_format($cart->total_price)}}VND</span></li>
                    </ul>
                    
                    <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
            
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@stop();