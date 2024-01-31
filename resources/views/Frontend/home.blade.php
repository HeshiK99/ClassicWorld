@extends('Frontend.Layout.app')
@section('content')

<style>
    .img-height {
    height: 320px !important;
    }
</style>

<!-- Slider area -->
<div class="slider-area">
    <div class="container">
        <div class="row">
            <div class="slideshow_container col-md-8 col-sm-12 col-xs-12">
                <!-- slider start -->
                <div class="slider-inner">
                    <div id="mainSlider" class="nivoSlider nevo-slider">
                        <img style="filter:blur(10px);"src="assets/images/banner/2_6.jpg" alt="main slider" title="#htmlcaption1" />
                        <img style="filter:blur(5px);"src="assets/images/banner/2_5.jpeg" alt="main slider" title="#htmlcaption2" />
                    </div>
                    <div id="htmlcaption1" class="nivo-html-caption slider-caption">
                        <div class="slider-progress"></div>
                        <div class="container">
                            <div class="slider-content slider-content-1 slider-animated-1">
                                <h1 class="hone" style="font-size: 80px ; color:white; ">Classic <BR/> &nbsp; &nbsp; &nbsp;  World</h1>
                               
                            </div>
                        </div>
                    </div>
                    <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                        <div class="slider-progress"></div>
                        <div class="container">
                            <div class="slider-content slider-content-2 slider-animated-2 pull-left">
                                <h1 class="hone" style="font-size: 60px ; color:brawn;">Discover Your Skin Care Journy Here</h1>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider end -->
            </div>
            <div class="banner_slide col-md-4">
                
                <div class="banner-box">
                    <a href="shop.html"><img src="assets/images/banner/h6.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider area end -->

<!-- Policy area -->
<div class="policy-area">
    <div class="container">
        <div class="policy-area-inner">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="single-policy">
                        <div class="icon"><i class=" fa fa-truck"></i></div>
                        <div class="txt_cms">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="single-policy">
                        <div class="icon"><i class=" fa fa-credit-card"></i></div>
                        <div class="txt_cms">
                            <h2>Money Guarantee</h2>
                            <p>30 days money back</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="single-policy">
                        <div class="icon"><i class=" fa fa-question-circle"></i></div>
                        <div class="txt_cms">
                            <h2>Online Support</h2>
                            <p>online 24/24 on day</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="single-policy">
                        <div class="icon"><i class=" fa fa-sun-o"></i></div>
                        <div class="txt_cms">
                            <h2>Secure Payment</h2>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Policy area end -->

<!-- product tabs container slider -->
<div class="product-tabs-container-slider product_block_container">
    <div class="container">
        <div class="pos_tab">
            <div class="pos_title_cate">
                <h2>Our Products</h2>
            </div>
            <div class="pos_desc">
                <p>Come and Choose the best Products suitable for your skin from us for a low price</p>
            </div>
        </div>

        <ul class="nav tabs_slider">
            <li><a href="#newarrival" data-bs-toggle="tab" class="active">New Arrival</a></li>
            <li><a href="#bestseller" data-bs-toggle="tab">Bestseller</a></li>
            
        </ul>

        <div class="tab-content pos_content">
            <div class="tab-pane fade show active" id="newarrival">
                <div class="productTabContent0 owl-carousel">
                    <!-- single product -->
                    @foreach(ProductHelper::newArrivals(8) as $new_arrivals)
                    <div class="item-product">
                        <div class="product-miniature js-product-miniature">
                            <div class="img_block">
                                <a href="/product-detail/{{$new_arrivals->id}}" class="thumbnail product-thumbnail">
                                    <img src="{{ asset('storage/products/' . $new_arrivals->image) }}"
                                        alt="harosa product" class="img-height">
                                </a>
                                <ul class="product-flag">
                                    <li class="new"><span>New</span></li>
                                </ul>
                                <div class="quick-view">
                                    <a href="/product-detail/{{$new_arrivals->id}}" data-original-title="Quick View"
                                        class="quick_view"><i class="fa fa-search"></i></a>
                                </div>
                                
                            </div>
                            <div class="product_desc">
                                <h1> <a href="/product-detail/{{$new_arrivals->id}}" class="product_name"
                                        title="{{ $new_arrivals->name }}">{{ $new_arrivals->name }}</a></h1>
                                <div class="product-price-and-shipping">
                                    
                                    <span class="price price-sale">LKR {{ $new_arrivals->price }}</span>
                                </div>
                                <div class="cart">
                                    <div class="product-add-to-cart" data-id="{{ $new_arrivals->id }}">
                                        <a>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- single product end -->
                </div>
            </div>
            <div class="tab-pane fade" id="bestseller">
                <div class="productTabContent0 owl-carousel">
                    @foreach(ProductHelper::bestSellers(8) as $best_seller)
                    <div class="item-product">
                        <div class="product-miniature js-product-miniature">
                            <div class="img_block">
                                <a href="/product-detail/{{$best_seller->id}}" class="thumbnail product-thumbnail">
                                    <img src="{{ asset('storage/products/' . $best_seller->image) }}"
                                        alt="harosa product" class="img-height">
                                </a>
                                <ul class="product-flag">
                                    <li class="new"><span>New</span></li>
                                </ul>
                                <div class="quick-view">
                                    <a href="/product-detail/{{$best_seller->id}}" data-original-title="Quick View"
                                        class="quick_view"><i class="fa fa-search"></i></a>
                                </div>
                                
                            </div>
                            <div class="product_desc">
                                
                                <h1> <a href="/product-detail/{{$best_seller->id}}" class="product_name"
                                        title="{{ $best_seller->name }}">{{ $best_seller->name }}</a></h1>
                                <div class="product-price-and-shipping">
                                    
                                    <span class="price price-sale">LKR {{ $best_seller->price }}</span>
                                </div>
                                <div class="cart">
                                    <div class="product-add-to-cart" data-id="{{ $best_seller->id }}">
                                        <a>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>

    </div>
</div>
<!-- product tabs container slider end -->

<!-- home banner -->
<div class="home-banner">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="banner-box m-0">
                    <a href="shop.html"><img src="assets/images/banner/1_2.jpg" alt="harosa"></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="banner-box m-0">
                    <a href="shop.html"><img src="assets/images/banner/1_9.webp" alt="harosa"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- home banner end -->



<!-- static product -->
<div class="static_product">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="item-static">
                    <div class="banner-box"><a href="#"> <img src="assets/images/product/1_2.webp" alt=""
                                class="img-responsive"></a></div>
                    <div class="content-static">
                        
                        <h2> &nbsp;SKIN CLEAR <br/>MASK</h2>
                        <p>Hydrate,Nourish and Improve Skin Tone</p>
                        <a href="{{route('frontend.shop')}}">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item-static">
                    <div class="banner-box"><a href="#"> <img src="assets/images/product/1_3.webp" alt=""
                                class="img-responsive"></a></div>
                    <div class="content-static">
                        
                        <h2>ORANGE VITAMIN C MASK </h2>
                        <p>Helps Soothe , Nourish and Clear Skin</p>
                        <a href="{{route('frontend.shop')}}">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item-static">
                    <div class="banner-box"><a href="#"> <img src="assets/images/product/1_1.webp" alt=""
                                class="img-responsive"></a></div>
                    <div class="content-static">
                        
                        <h2>AVACADO VITAMIN E MASK</h2>
                        <p>Helps soothe dryness,Refresh and Boost Skin</p>
                        <a href="{{route('frontend.shop')}}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- static product -->

<!-- home banner -->
<div class="home-banner">
    <div class="banner-box">
        <a href="#"> <img src="assets/images/banner/3_5.webp" alt="" class="img-responsive"></a>
    </div>
</div>
<!-- home banner end -->

<div class="home_blog_post_area general product_block_container">
    <div class="home_blog_post">
        <div class="container">
            <div class="page_title_area pos_title">
                
                <h3>Hydrate <span>and</span> Glow</h3>
                <p> Essential  Skin  Care  For  Everyday</p>
            </div>
            <div class="home_blog_post_inner">
                <div class="blog_slider owl-carousel">
                    <!-- single blog item -->
                    <div class="item">
                         <div class="blog_post">
                            <div class="post_thumbnail">
                                <a href="single-blog.html" class="img_content">
                                    <img src="assets/images/blog/11.jpeg" alt="">
                                </a>
                                
                            </div> 
                            <div class="post_content">
                        
                                <div class="content-inner">
                                    <h4 class="post_title" style="font-size: 20px ; text-align:center;">NATURAL</h4>
                                    <div class="post_meta">
                                        
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <!-- single blog item end -->
                    <!-- single blog item -->
                    <div class="item">
                        <div class="blog_post">
                            <div class="post_thumbnail">
                                <a href="single-blog.html" class="img_content">
                                    <img src="assets/images/blog/12.webp" alt="">
                                </a>
                                
                            </div>
                            <div class="post_content">
                                
                                <div class="content-inner">
                                    <h4 class="post_title"style="font-size: 20px ; text-align:center;" >ORGANIC</h4>
                                    <div class="post_meta">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single blog item end -->
                    <!-- single blog item -->
                    <div class="item">
                        <div class="blog_post">
                            <div class="post_thumbnail">
                                <a href="single-blog.html" class="img_content">
                                    <img src="assets/images/blog/13.jpeg" alt="">
                                </a>
                                
                            </div>
                            <div class="post_content">
                                
                                <div class="content-inner">
                                    <h4 class="post_title" style="font-size: 20px ; text-align:center;">LUXURY</h4>
                                    <div class="post_meta">
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single blog item end -->
                    <!-- single blog item -->
                    <div class="item">
                        <div class="blog_post">
                            
                            <div class="post_content">
                                
                                <div class="content-inner">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single blog item end -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/pages/frontend_home.js')}}"></script>

@stop