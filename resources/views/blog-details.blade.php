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

<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="{{URL::asset('site')}}/img/ezgif-4-bd0103e419.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>{{$Blog_detail->title}}</h2>
                    <ul>
                        <li>{{$Blog_detail->account->name}}</li>
                        <li>{{$Blog_detail->created_at}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
        <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                @foreach($Category as $cat)
                                    <li><a href="{{route('home.shop_category',['id'=>$cat->id])}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($Blog as $blog)
                                <a href="{{route('home.blog_details',['id'=>$blog->id])}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <!-- <img src="{{URL::asset('uploads')}}/{{$blog->images}}" alt=""> -->
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$blog->title}}</h6>
                                        <span>{{$blog->created_at}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                @foreach($Category as $cat)
                                    <a href="{{route('home.shop_category',['id'=>$cat->id])}}">{{$cat->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="{{URL::asset('uploads')}}/{{$Blog_detail->images}}" alt="">
                    <h3>{!!$Blog_detail->title!!}</h3>
                    {!!$Blog_detail->description!!}
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="{{URL::asset('site')}}/img/blog/details/details-author.jpg" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6>{{$Blog_detail->account->name}}</h6>
                                    <span>Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span>Categories:</span> Perfume</li>
                                    <li><span>Tags:</span> All, Trending, Life Style</li>
                                </ul>
                                <div class="blog__details__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Post You May Like</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($Blog as $blog)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{URL::asset('site')}}/img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$blog->created_at}}</li>
                        </ul>
                        <h5><a href="{{route('home.blog_details',['id'=>$blog->id])}}">{{$blog->title}}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Blog Section End -->


@stop();