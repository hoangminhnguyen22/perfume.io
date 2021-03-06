<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dolce&Gabbana</title>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{URL::asset('site')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('site')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('site')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('site')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('site')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('site')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('site')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('site')}}/css/style.css" type="text/css">

    <link rel="icon" href="{{URL::asset('uploads')}}/logo_title.png">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@nhomTMDT.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                @if(Auth::check())
                                    <div>{{Auth::user()->name}}</div>
                                @else
                                    <div>Login</div>
                                @endif
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    @if(Auth::check())
                                        <li><a href="{{route('info_customer.index')}}"><i class="fa fa-user"></i> Th??ng tin kh??ch h??ng</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-user"></i>
                                                @if(Auth::user()->role_id==1)
                                                {{"b???n l?? qu???n l??"}}
                                                @elseif(Auth::user()->role_id==2)
                                                {{"b???n l?? nh??n vi??n"}}
                                                @elseif(Auth::user()->role_id==3)
                                                {{"b???n l?? th??nh vi??n"}}
                                                @endif
                                            </a></li> -->
                                        @if(Auth::user()->role_id==1)
                                            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-user"></i>
                                                {{"Trang qu???n l??"}}
                                            </a></li>
                                        @endif
                                        <li><a href="{{route('login.out')}}"><i class="fa fa-key"></i> ????ng xu???t</a></li>
                                    @else
                                        <li><a href="{{route('login.index')}}"><i class="fa fa-user"></i> ????ng nh???p</a></li>
                                        <li><a href="{{route('register.index')}}"><i class="fa fa-key"></i> ????ng k??</a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                                <a href="#"><i class="fa fa-key"></i> Register</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo d-flex justify-content-center">
                        <a href="{{route('home.index')}}"><img src="{{URL::asset('uploads')}}/logo.png" alt="" class="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <nav class="header__menu">
                        <ul>
                            <!-- <li class="active"><a href="{{route('home.index')}}">Home</a></li> -->
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li><a href="{{route('home.shop')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{route('home.shop_cart')}}">Shoping Cart</a></li>
                                    <li><a href="{{route('home.check_out')}}">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('home.blog')}}">Blog</a></li>
                            <li><a href="{{route('home.contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-end">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{route('cart.view')}}"><i class="fa fa-shopping-bag"></i> <span>{{$cart->total_quantity}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">total: <span>{{number_format($cart->total_price)}}VND</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->



    @yield('main')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('home.index')}}"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address:  ???????ng 60-49 Qu???n 5, H??? Ch?? Minh</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social d-flex align-items-center">
                            <a href="#" class="d-flex justify-content-center align-items-center"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="d-flex justify-content-center align-items-center"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="d-flex justify-content-center align-items-center"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="d-flex justify-content-center align-items-center"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{URL::asset('site')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{URL::asset('site')}}/js/bootstrap.min.js"></script>
    <script src="{{URL::asset('site')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{URL::asset('site')}}/js/jquery-ui.min.js"></script>
    <script src="{{URL::asset('site')}}/js/jquery.slicknav.js"></script>
    <script src="{{URL::asset('site')}}/js/mixitup.min.js"></script>
    <script src="{{URL::asset('site')}}/js/owl.carousel.min.js"></script>
    <script src="{{URL::asset('site')}}/js/main.js"></script>



</body>

</html>
