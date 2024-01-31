@extends('Frontend.Layout.app')
@section('content')

<style>
    .img-height {
        height: 320px !important;
    }
</style>


<!-- top breadcrumb -->
<div class="top_breadcrumb">
    <div class="breadcrumb_container ">
        <div class="container">
            <nav data-depth="3" class="breadcrumb">
                <ol>
                    <li><a href="/"><span>Home</span></a></li>
                    <li><a href="#"><span>Shop</span></a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- top breadcrumb end -->

<!-- Shop page wraper -->
<div class="shop-page-wraper">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 shop-content">
                <div class="product-toolbar">
                    <div class="topbar-title">
                        <h1>products & Categories</h1>
                    </div>
                    <div class="product-toolbar-inner">
                        <div class="product-view-mode">
                            <ul class="nav nav-tabs">
                                <li><a data-bs-toggle="tab" href="#grid" class="active"><i class="ion-grid"></i></a>
                                </li>
                                <li><a data-bs-toggle="tab" href="#list"><i class="ion-navicon"></i></a></li>
                            </ul>
                        </div>
                        <div class="woocommerce-ordering">
                            <form method="get" class="woocommerce-ordering hidden-xs">
                                <div class="orderby-wrapper">
                                    <label>Sort By :</label>
                                    <select class="nice-select-menu filter-dropdown orderby">
                                        <option value="/shop/filter/default" data-display="Select">Default sorting</option>
                                        <option value="/shop/filter/popularity">Sort by popularity</option>
                                        <option value="/shop/filter/rating">Sort by average rating</option>
                                        <option value="/shop/filter/newness">Sort by newness</option>
                                        <option value="/shop/filter/lowtohigh">Sort by price: low to high</option>
                                        <option value="/shop/filter/hightolow">Sort by price: high to low</option>
                                    </select>

                                </div>
                            </form>
                        </div>
                        <p class="woocommerce-result-count">There are {{ ProductHelper::arrayCount($products) }}
                            products</p>
                    </div>
                    <div class="shop-page-product-area tab-content">
                        <div id="grid" class="tab-pane fade show active">
                            <div class="row">
                                <!-- single product -->
                                @foreach($products as $product)
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="/product-detail/{{$product->id}}" class="thumbnail product-thumbnail">
                                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="harosa product" class="img-height">
                                            </a>
                                            @if(ProductHelper::getDateDifference($product->created_at) == true)
                                            <ul class="product-flag">
                                                <li class="new"><span>New</span></li>
                                            </ul>
                                            @endif
                                            <div class="quick-view">
                                                <a href="/product-detail/{{$product->id}}" data-bs-toggle="modal" data-bs-target="#product_modal" data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                            </div>

                                        </div>
                                        <div class="product_desc">
                                            <h1> <a href="single-product.html" class="product_name" title="{{ $product->name }}">{{ $product->name }}</a></h1>
                                            <div class="product-price-and-shipping">

                                                <span class="price price-sale">LKR {{ $product->price }}</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart" data-id="{{ $product->id }}">
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

                        <div id="list" class="tab-pane fade">
                            <div class="row">
                                <!-- single product list view -->
                                @foreach($products as $product)
                                <div class="col-md-12">
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="/product-detail/{{$product->id}}" class="thumbnail product-thumbnail">
                                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="harosa product" class="img-height">
                                            </a>
                                            @if(ProductHelper::getDateDifference($product->created_at) == true)
                                            <ul class="product-flag">
                                                <li class="new"><span>New</span></li>
                                            </ul>
                                            @endif
                                            <div class="quick-view">
                                                <a href="/product-detail/{{$product->id}}" data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                            </div>

                                        </div>
                                        <div class="product_desc">
                                            <h1><a href="single-product.html" class="product_name" title="{{ $product->name }}">{{ $product->name }}</a>
                                            </h1>
                                            <div class="product-desc">
                                                <p><span>Regular fit, round neckline, short sleeves. Made of extra long
                                                        staple pima cotton. </span></p>
                                            </div>
                                            <div class="product-price-and-shipping">

                                                <span class="price price-sale">LKR {{ $product->price }}</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart" data-id="{{ $product->id }}">
                                                    <a>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- single product list view end -->
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="woocommerce-pagination">
                    <ul class="page-numbers">
                        {!! $products->links() !!}

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 sidebar-shop">
                <div class="sidebar-product-categori">
                    <div class="shop-categori-title">
                        <h3>Categories</h3>
                    </div>
                    <div class="product-filter mb-30">
                        <div class="widget-title">
                            <h3>Filter by price</h3>
                        </div>
                        <div class="widget-content">
                            <div id="price-range"></div>
                            <div class="price-values">
                                <div class="price_text_btn">
                                    <span>Price:</span>
                                    <input type="text" class="price-amount">
                                </div>
                                <button class="button filter-by-price" type="submit">Filter</button>
                            </div>
                        </div>
                    </div>

                    <div class="advertising">
                        <a href="shop.html"><img src="{{ asset('assets/images/banner/shop.jpeg') }}" alt="harosa images"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- Shop page wraper end -->

<script src="{{asset('js/pages/frontend_shop.js')}}"></script>

@stop