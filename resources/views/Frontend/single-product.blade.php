@extends('Frontend.Layout.app')
@section('content')

<!-- single product area -->
<div class="single-product-page-area">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-6">
                <div class="images-container">
                    <div class="product-cover">
                        <div class="tab-content">
                            <div class="tab-pane active" id="red">
                                <img src="{{ asset('storage/products/' . $product_details['image']) }}"
                                    alt="harosa single product">
                                <div class="layer hidden-sm-down">
                                    <i class="material-icons zoom-in"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="h1 namne_details">{{ $product_details['name'] }}</h1>
                <p class="called-route d-none">/product-detail/{{ $product_details['id'] }}</p>
                <p class="product-id d-none">{{ $product_details['id'] }}</p>
                
                <div id="product_comments_block_extra" class="no-print">
                    
                    <ul class="comments_advices">
                        <li>
                            <a class="reviews _mPS2id-h show-reviews">Read reviews (<span>{{ count($reviews) }}</span>)</a>
                        </li>
                        @if(isset(auth()->user()->id))
                        <li>
                            <a class="open-comment-form">Write a review</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="product-prices">
                   
                    <div class="product-price h5 has-discount">
                        <div class="current-price">
                            <span>LKR {{ $product_details['price'] }}</span>
                            
                        </div>
                    </div>
                </div>
                <div class="product-information">
                    <div class="product-desc">
                        <p><span>Regular fit, round neckline, short sleeves. Made of extra long staple pima cotton.
                            </span></p>
                    </div>
                    <div class="product-actions">
                        <form action="#">
                            <div class="product-add-to-cart">
                                <span class="control-label">Quantity</span>
                                <div class="box-quantity d-flex">
                                    <input class="quantity mr-40" min="1" max="{{ $product_details['quantity'] }}"
                                        value="1" type="number">
                                    @if(!isset(auth()->user()->id))
                                    <a class="login-add-cart" style="cursor: pointer;"><i
                                            class="fa fa-shopping-cart"></i> Login</a>
                                    @else
                                    <a class="add-cart" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i> add
                                        to
                                        cart</a>
                                    @endif
                                </div>
                            </div>
                            <div class="product-additional-info">
                                <div class="social-sharing">
                                    <span>Connect with us:</span>
                                    <ul>
                                        <li class="facebook"><a href="#" title="Share" target="_blank">Share</a></li>
                                        <li class="twitter"><a href="#" title="Tweet" target="_blank">Tweet</a></li>
                                        <li class="googleplus"><a href="#" title="Google+" target="_blank">Google+</a>
                                        </li>
                                        <li class="pinterest"><a href="#" title="Pinterest"
                                                target="_blank">Pinterest</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments-area">
            @if(count($reviews) != 0)
            <h3>{{ count($reviews) }} reviews</h3>
            @foreach($reviews as $single_review)
            <ol class="commentlist">
                <li>
                    <div class="single-comment">
                        <div class="comment-avatar" style="margin-right: -420px;">
                            <img src="{{ asset('storage/users/' . UserHelper::getUserData($single_review['user_id'], 'image')) }}" width="20%" alt="comment image bege">
                        </div>
                        <div class="comment-info">
                            <a href="#">{{ UserHelper::getUserData($single_review['user_id'], 'name') }}</a>
                            
                            <span class="date">{{ ProductHelper::changeDateFormat($single_review['created_at']) }}</span>
                            <p>{{ $single_review['review'] }}</p>
                        </div>
                    </div>
                </li>
            </ol>
            @endforeach
            @endif
            <div class="comment-respond">
                <h3>Post a Review </h3>
                @if(!isset(auth()->user()->id))
                <small>You need to login first before posting a review *</small>
                @endif
                <form >
                    <div class="text-filds">
                        <label for="review">Review</label>
                        <p class="review-product-id d-none">{{ $product_details['id'] }}</p>
                        <textarea id="review" name="review" class="review" cols="45" rows="8" maxlength="65525" required="required"></textarea>
                    </div>
                    @if(isset(auth()->user()->id))
                    <div class="review-submit">
                        <input name="submit" type="submit" id="submit" class="submit" value="Post Review">
                    </div>
                    @else
                    <div class="review-submit-login">
                        <input name="submit" type="submit" id="submit" class="submit" value="Login">
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<!-- single product area -->

<script src="{{asset('js/pages/frontend_single_product.js')}}"></script>

@stop