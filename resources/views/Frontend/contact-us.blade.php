@extends('Frontend.Layout.app')
@section('content')
<!-- top breadcrumb -->
<!-- top breadcrumb -->
<div class="top_breadcrumb">
    <div class="breadcrumb_container">
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
                            <span>Contact Us</span>
                        </a>
                    </li>
                </ol>
            </nav>



            
        </div>
    </div>
</div>
<!-- Contact page content end -->

<!-- contact page map -->

<!-- contact form area -->
<div style="background-image: url('/assets/images/banner/95.jpg');" class="contact-form-area">
    <div style="background-image: url('/assets/images/banner/95.jpg');" class="container">
        <div style="background-image: url('/assets/images/banner/95.jpg');" class="row">
            <div style="background-image: url('/assets/images/banner/95.jpg');" class="col-lg-6">
                <div style="background-image: url('/assets/images/banner/95.jpg');" class="contact-form-inner">
                    <h2>TELL US YOUR REQUIREMENT</h2>
                    <form id="contact-form">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control name" placeholder="Name*" value="{{ auth()->user()->name ?? null }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control user_email" placeholder="Email*" value="{{ auth()->user()->email ?? null }}" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control telephone" placeholder="Phone number*" value="{{ auth()->user()->telephone ?? null }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <textarea name="your-message" cols="40" rows="10"
                                    class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required message"
                                    aria-required="true" aria-invalid="false" placeholder="Message *"
                                    required></textarea>
                            </div>
                        </div>
                        @if(isset(auth()->user()->id) && auth()->user()->id != null)
                        <div class="contact-submit">
                            <input type="submit" value="Send Email" class="wpcf7-form-control wpcf7-submit button">
                        </div>
                        @else
                        <div class="contact-submit">
                            <a href="/login"><input type="button" value="Login" class="wpcf7-form-control wpcf7-submit button"></a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
            <div style="background-image: url('/assets/images/banner/95.jpg');" class="col-lg-6">
                <div style="background-image: url('/assets/images/banner/95.jpg');" class="contact-address-area">
                    <h2>CONTACT US</h2>
                    <p> We're delighted to connect with our valued skincare community. Whether you have inquiries about
                        products, or just want to share your skincare journey with us, we're here for you. Reach out
                        through the provided channels, and our dedicated team of skincare enthusiasts will ensure you
                        receive the support and information you need.
                        Your radiant skin journey starts with a conversation – let's talk!</p>
                    <ul>
                        
                        <li>
                            <i class="fa fa-phone">&nbsp;</i> classicworld95@gmail.com
                        </li>
                        <li>
                            <i class="fa fa-envelope-o"></i>&nbsp;</i> 076 8722537
                        </li>
                    </ul>
                    <h3>
                        <strong>Working hours</strong>
                    </h3>
                    <p>
                        <strong>Monday – Saturday</strong>: &nbsp;09AM – 21PM
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact form area end -->

</div>
<!-- Contact page content end -->

<script src="{{asset('js/pages/frontend_contact.js')}}"></script>

@stop