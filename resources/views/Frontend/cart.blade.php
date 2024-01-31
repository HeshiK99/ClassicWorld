@extends('Frontend.Layout.app')
@section('content')

<!-- top breadcrumb -->
<div class="top_breadcrumb">
    <div class="breadcrumb_container ">
        <div class="container">
            <nav data-depth="3" class="breadcrumb">
                <ol>
                    <li>
                        <a href="#">
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Cart</span>
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- top breadcrumb end -->

<!-- cart page content -->
<div class="cart-page-area">
    <div class="container">
        <!-- Form Start -->
        <form action="#">
            <!-- Table Content Start -->
            <div class="table-content table-responsive mb-50">
                <table>
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart_items as $cart_item)
                        <tr>
                            <td class="product-thumbnail">
                                <a href="#"><img src="{{ asset('storage/products/' . $cart_item->image) }}" alt="cart-image"></a>
                            </td>
                            <td class="product-name"><a href="#">{{ $cart_item->name }}</a></td>
                            <td class="product-price"><span class="amount">LKR {{ $cart_item->price }}</span></td>
                            <td class="product-quantity"><span class="quantity">{{ $cart_item->quantity }}</span></td>
                            <td class="product-subtotal">LKR {{ $cart_item->total }}</td>
                            <td class="product-remove" data-id="{{ $cart_item->product_id }}"> <a><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Table Content Start -->
            <div class="row">
                <!-- Cart Button Start -->
                <div class="col-md-8 col-sm-7">
                    <div class="buttons-cart">
                        <!-- <input type="submit" value="Update Cart"> -->
                        <a href="{{ route('frontend.shop') }}">Continue Shopping</a>
                    </div>
                </div>
                <!-- Cart Button Start -->
                <!-- Cart Totals Start -->
                <div class="col-md-4 col-sm-5">
                    <div class="cart_totals">
                        <h2>Cart Totals</h2>
                        <br>
                        <table>
                            <tbody>
                               
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <strong><span class="amount">LKR {{ HeaderHelper::getCartTotal() }}</span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout">
                            <a href="{{ route('frontend.checkout') }}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
                <!-- Cart Totals End -->
            </div>
            <!-- Row End -->
        </form>
        <!-- Form End -->
    </div>
</div>
<!-- cart page content end -->

<script src="{{asset('js/pages/frontend_cart.js')}}"></script>

@stop