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
                            <span>Checkout</span>
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- top breadcrumb end -->

<!-- checkout page content -->
<div class="checkout-page-area">

    {{-- <!-- coupon area -->
    <div class="coupon-area">
        <div class="container">
            <div class="coupon-accordion">
                <!-- ACCORDION START -->
                <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                <div id="checkout-login" class="coupon-content">
                    <div class="coupon-info">
                        <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                        <form action="#">
                            <p class="form-row-first">
                                <label>Username or email <span class="required">*</span></label>
                                <input type="text">
                            </p>
                            <p class="form-row-last">
                                <label>Password <span class="required">*</span></label>
                                <input type="text">
                            </p>
                            <p class="form-row">
                                <input type="submit" value="Login">
                                <label>
                                    <input type="checkbox">
                                    Remember me
                                </label>
                            </p>
                            <p class="lost-password">
                                <a href="#">Lost your password?</a>
                            </p>
                        </form>
                    </div>
                </div>
                <!-- ACCORDION END -->
                <!-- ACCORDION START -->
                <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                <div id="checkout_coupon" class="coupon-checkout-content">
                    <div class="coupon-info">
                        <form action="#">
                            <p class="checkout-coupon">
                                <input type="text" class="code" placeholder="Coupon code">
                                <input type="submit" value="Apply Coupon">
                            </p>
                        </form>
                    </div>
                </div>
                <!-- ACCORDION END -->
            </div>
        </div>
    </div>
    <!-- coupon area end --> --}}

    <!-- checkout area -->
    <div class="checkout-area">
        <div class="container">
            <form class="checkout-form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="country-select mb-30">
                                        <label>Country <span class="required">*</span></label>
                                        <select>
                                            <option value="Sri Lanka" selected>Sri Lanka</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" placeholder="Full Name" value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" placeholder="Address" value="{{ auth()->user()->address }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" placeholder="Email Address" value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" placeholder="Phone" value="{{ auth()->user()->telephone }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="different-address">
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>

                                <!-- ACCORDION START -->
                                <h3>Want to update profile details? <span id="gotoprofile" style="cursor: pointer;"><u>Click here to go to your profile</u></span></h3>
                                <!-- ACCORDION END -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(HeaderHelper::getCartItems() as $cart_item)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $cart_item->name }} <strong class="product-quantity"> × {{ $cart_item->quantity }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">LKR {{ $cart_item->total }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">LKR {{ HeaderHelper::getCartTotal() }}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    
                                    @if(HeaderHelper::getCartItemCount() != 0)
                                    <div class="order-button-payment">
                                        <input type="button" class="place-order" value="Place order">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout area end -->

</div>
<!-- checkout page content end -->

<script src="{{asset('js/pages/frontend_checkout.js')}}"></script>

@stop