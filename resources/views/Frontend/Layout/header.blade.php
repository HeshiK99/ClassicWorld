<!-- Body main wrapper start -->

<!-- HEADER AREA START -->

<style>
    .categori-menu-list li:hover,
    .categori-menu-list li:hover a {
        background-color: #a89842 !important; /* Change this to your desired hover color */
        color: #ffffff !important; /* Change this to your desired text color on hover */
    }
    .categori-menu-list li {
        transition: background-color 0.3s, color 0.3s; /* Add transition for background-color and color changes */
    }
</style>
<header class="header-area" style="background-color:#a89842 ;">


    <!-- Header top area start -->
    <div class="header-top-area d-none d-lg-block" style="background-color:#a89842;">
        <div class="container">
            <div class="header-top-wrapper">
                <div class="top-bar-left">
                    <div class="contact-link">
                        <div class="info_box phone">
                            Call us : <span>(076) 8722537</span>
                        </div>
                        <div class="info_box email">
                            email : <a href="mailto:classicworld95@gmail.com">classicworld95@gmail.com</a>
                        </div>
                    </div>
                    <div class="social_follow">
                        <ul>
                            <li class="facebook"><a
                                    href="https://www.facebook.com/profile.php?id=61554381300044&mibextid=LQQJ4d"></a>
                            </li>
                            <div></div>

                            <li class="instagram"><a
                                    href="https://www.instagram.com/classicworld2024?igsh=OGQ5ZDc2ODk2ZA=="></a></li>
                        </ul>
                    </div>
                </div>
                <div class="topbar-nav">
                    <!-- my account -->
                    <div class="dropdown menu-my-account-container">
                        @if(isset(auth()->user()->id))
                        <button data-bs-toggle="dropdown">
                            <i class="first-icon fa fa-user-circle"></i> {{ auth()->user()->name }} <i
                                class="ion-ios-arrow-down"></i>
                        </button>
                        @else
                        <button data-bs-toggle="dropdown">
                            <i class="first-icon fa fa-user-circle"></i> My Account <i class="ion-ios-arrow-down"></i>
                        </button>
                        @endif
                        <ul class="dropdown-menu">
                            <li><a href="{{route('home')}}">My Account</a></li>
                            <li><a href="{{route('frontend.checkout')}}">Checkout</a></li>
                            <li><a href="{{route('register')}}">Sign in</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar area end -->

    <div class="header-top">
        <div class="container">
            <div class="header-bottom-wrapper">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="{{asset('images/logo/img1.jpg')}}" alt="" width="100">
                    </a>
                </div>

                <div class="ft_newsletter search_top">
                    <form action="{{ route('frontend.search-products') }}" method="POST">
                        @csrf
                        <input class="btn btn-primary float-xs-right hidden-xs-down" name="search" value="Search"
                            type="submit" style="color: black !important; background: white !important;">
                        <div class="input-wrapper">
                            <input name="search" value="" placeholder="Search items..."
                                aria-labelledby="block-newsletter-label" type="text">
                        </div>
                    </form>
                </div>



                <div class="header-bottom-action">

                    <!-- Cart -->
                    <div class="dropdown">
                        <button class="cart-icon" data-bs-toggle="dropdown">
                            <i class="fa fa-shopping-basket"></i>
                            <span class="item_txt"> Cart</span>
                            @if(isset(auth()->user()->id))
                            <span class="item_count">({{ HeaderHelper::getCartItemCount() }})</span>
                            <span class="item_total">- LKR {{ HeaderHelper::getCartTotal() }}</span>
                            @else
                            <span class="item_count">(0)</span>
                            <span class="item_total">- LKR 0</span>
                            @endif
                        </button>
                        <div class="header-cart dropdown-menu">
                            <ul>
                                @if(isset(auth()->user()->id))
                                @foreach(HeaderHelper::getCartItems() as $cart_item)
                                <li>
                                    <div class="row">
                                        <div class="img_content col-md-6">
                                            <img class="product-image img-responsive"
                                                src="{{ asset('storage/products/' . $cart_item->image) }}" alt=""
                                                title="">
                                            <span class="product-quantity">{{ $cart_item->quantity }}x</span>
                                        </div>
                                        <div class="right_block col-md-6">
                                            <span class="product-name">{{ $cart_item->name }}</span>
                                            <span class="product-price">LKR {{ $cart_item->total }}</span>
                                           
                                        </div>
                                    </div>

                                </li>
                                @endforeach
                                @endif
                            </ul>
                            <div class="price_content">
                                <div class="cart-subtotals">
                                    
                                </div>
                                <div class="cart-total price_inline">
                                    <span class="label">Total</span>
                                    <span class="value">LKR {{ HeaderHelper::getCartTotal() }}</span>
                                </div>
                            </div>
                            @if(isset(auth()->user()->id))
                            <div class="checkout">
                                <a href="{{ route('frontend.cart') }}" class="btn btn-primary">cart</a>
                            </div>
                            @else
                            <div class="checkout">
                                <a href="/login" class="btn btn-primary">login to view</a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="header-action-toggle d-lg-none">
                        <button class="toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Header bottom area start -->
    <div class="header-bottom-area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categori-menu">
                        <span class="categorie-title">Categories</span>
                        <nav>
                            <ul class="categori-menu-list menu-hidden">

                                @php
                                $categories = HeaderHelper::getCategories();
                                @endphp
                                @foreach($categories as $category)
                                <li><a href="/shop/filter-category/{{ $category->id }}">{{ $category->name }}</a>
                                </li>
                                @endforeach

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9" style="color:white;">
                    <!-- main-menu -->
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="current">
                                <li><a href="/">Home
                                        <!--i class="fa fa-angle-down"></i-->
                                    </a></li>

                                

                                <li><a href="{{route('frontend.shop')}}">Shop</a></li>
                                <!--li><a href="blog.html">Blog</a></li-->
                                <li><a href="{{route('frontend.about-us')}}">About Us</a></li>
                                <li><a href="{{route('frontend.contact-us')}}">Contact</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header bottom area end -->

</header>
<!-- HRADER AREA END -->

<!-- offcanvas Start -->
<div class="offcanvas offcanvas-start" id="offcanvasMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Offcanvas</h5>
        <button class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">

        <div class="contact-link">
            <div class="info_box phone">
                Call us : <span>(012) 800 456 789</span>
            </div>
            <div class="info_box email">
                email : <a href="mailto:demo@example.com">demo@example.com</a>
            </div>
        </div>

        <div class="offcanvas-accordion accordion" id="accordionExample">
            <div class="accordion-item">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne"><i
                        class="first-icon fa fa-user-circle"></i> My Account</button>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <ul class="offcanvas-meta">
                        <li><a href="{{route('home')}}">My Account</a></li>
                        <li><a href="{{route('frontend.checkout')}}">Checkout</a></li>
                        @if(!isset(auth()->user()->id))
                        <li><a href="{{ route('register') }}">Sign in</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo">$
                    USD</button>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <ul class="offcanvas-meta">
                        <li><a href="#">$ USD</a></li>
                        <li><a href="#">€ EUR</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"><img src="assets/images/icons/en.webp"
                        alt="language-selector">English</button>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <ul class="offcanvas-meta">
                        <li>
                            <a href="#">
                                <img src="assets/images/icons/en.webp" alt="French">
                                <span>English</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="assets/images/icons/fr.webp" alt="French">
                                <span>French</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <nav class="canvas-menu">
            <ul>
                <li class="current"><a href="/">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Home Shop 1</a></li>
                        <li><a href="index-2.html">Home Shop 2</a></li>
                        <li><a href="index-3.html">Home Shop 3</a></li>
                        <li><a href="index-4.html">Home Shop 4</a></li>
                        <li><a href="index-5.html">Home Shop 5</a></li>
                        <li><a href="index-6.html">Home Shop 6</a></li>
                    </ul>
                </li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="contact-us.html">Contact</a></li>
                <li><a href="#">Features </a>
                    <ul class="mega-sub-menu">
                        <li><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="faq.html">Frequently Questins</a></li>
                                <li><a href="404.html">Error 404</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog-no-sidebar.html">None Sidebar</a></li>
                                <li><a href="blog.html">Sidebar right</a></li>
                                <li><a href="single-blog.html">Image Format</a></li>
                                <li><a href="single-blog-gallery.html">Gallery Format</a></li>
                                <li><a href="single-blog-audio.html">Audio Format</a></li>
                                <li><a href="single-blog-video.html">Video Format</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-list.html">Shop List View</a></li>
                                <li><a href="shop-right.html">Shop Right</a></li>
                                <li><a href="single-product.html">Shop Single</a></li>
                                <li><a href="cart.html">Shoping Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="social_follow">
            <ul>
                <li class="facebook"><a href="#"></a></li>
                <li class="twitter"><a href="#"></a></li>
                <li class="youtube"><a href="#"></a></li>
                <li class="googleplus"><a href="#"></a></li>
                <li class="instagram"><a href="#"></a></li>
            </ul>
        </div>

    </div>
</div>


<!-- offcanvas END -->