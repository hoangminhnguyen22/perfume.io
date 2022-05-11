@extends('layouts.site')

@section('main')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Brand Perfume</span>
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
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon d-flex justify-content-center align-items-center">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 12.345.678</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>

                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <div class="hero__item set-bg" data-setbg="{{URL::asset('uploads')}}/1640697259-product.jpg">
                        <div class="hero__text">
                            <span>AUTH PERFUME</span>
                            <h2>Perfume <br />100% Auth</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="{{route('home.shop')}}" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($Product as $pro)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{URL::asset('uploads')}}/{{$pro->images}}">
                            <h5><a href="{{route('home.shop_details',['id'=>$pro->id])}}">{{$pro->name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($Category as $pro)
                            <li data-filter=".{{str_replace(' ','',$pro->name)}}">{{$pro->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($Product as $pro)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{str_replace(' ','',$pro->category->name)}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{URL::asset('uploads')}}/{{$pro->images}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{route('cart.add',['id'=>$pro->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{route('home.shop_details',['id'=>$pro->id])}}">{{$pro->name}}</a></h6>
                            <h5>{{number_format($pro->price)}}VND</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($Product as $pro)
                                <a href="{{route('home.shop_details',['id'=>$pro->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::asset('uploads')}}/{{$pro->images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$pro->name}}</h6>
                                        <span>{{number_format($pro->price)}}VND</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($Product as $pro)
                                <a href="{{route('home.shop_details',['id'=>$pro->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::asset('uploads')}}/{{$pro->images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$pro->name}}</h6>
                                        <span>{{number_format($pro->price)}}VND</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($Product as $pro)
                                <a href="{{route('home.shop_details',['id'=>$pro->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::asset('uploads')}}/{{$pro->images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$pro->name}}</h6>
                                        <span>{{number_format($pro->price)}}VND</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($Product as $pro)
                                <a href="{{route('home.shop_details',['id'=>$pro->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::asset('uploads')}}/{{$pro->images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$pro->name}}</h6>
                                        <span>{{number_format($pro->price)}}VND</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($Product as $pro)
                                <a href="{{route('home.shop_details',['id'=>$pro->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::asset('uploads')}}/{{$pro->images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$pro->name}}</h6>
                                        <span>{{$pro->price}}</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($Product as $pro)
                                <a href="{{route('home.shop_details',['id'=>$pro->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::asset('uploads')}}/{{$pro->images}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$pro->name}}</h6>
                                        <span>{{$pro->price}}</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($Blog as $bl)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{URL::asset('uploads')}}/{{$bl->images}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$bl->create_at}}</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{route('home.blog_details',['id'=>$bl->id])}}">{{$bl->title}}</a></h5>
                            <p>Thời điểm hiện tại, thế giới mùi hương nở rộ vô vàn tên tuổi, đa dạng, và liên tục được thay mới. Hơn... </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@stop();
