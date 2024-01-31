@extends('Backend.Layout.app')
@section('content')
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-menu chat-menu d-xl-none">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></div>
                </div>
                <div class="doc-container">
                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="search">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                    @foreach($orders as $order)
                                    <li class="nav-item invoice-item" data-invoice-id="{{ $order->id }}">
                                        <div class="nav-link list-actions" id="invoice-detail">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-dollar-sign">
                                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">Invoice #{{ $order->id }}</p>
                                                    <p class="invoice-customer-name"><span>To:</span>
                                                        {{ UserHelper::getUserData(auth()->user()->id, 'name') }}</p>
                                                    <p class="invoice-generated-date">Date:
                                                        {{ UserHelper::formatDate($order->date) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-container">
                        <div class="invoice-inbox">

                            <div class="inv-not-selected">
                                <p>Open an invoice from the list.</p>
                            </div>

                            <div class="invoice-header-section">
                                <h4 class="inv-number"></h4>
                                <div class="invoice-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-printer action-print"
                                        data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path
                                            d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                        </path>
                                        <rect x="6" y="14" width="12" height="8"></rect>
                                    </svg>
                                </div>
                            </div>

                            <div id="ct" class="">

                                <div class="invoice-detail">
                                    <div class="content-section  animated animatedFadeInUp fadeInUp">

                                        <div class="row inv--head-section">

                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">INVOICE</h3>
                                            </div>
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <img src="{{asset('images/logo/img1.jpg')}}" alt="" width="100">
                                            </div>

                                        </div>

                                        <div class="row inv--detail-section">

                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">Invoice To</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                <p class="inv-detail-title">From : Classic World</p>
                                            </div>

                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">Jesse Cory</p>
                                                <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                <p class="inv-email-address">redq@company.com</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title">Invoice Number :
                                                    </span> <span class="inv-number">[invoice number]</span></p>
                                                <p class="inv-created-date"><span class="inv-title">Invoice Date :
                                                    </span> <span class="inv-date">20 Aug 2020</span></p>
                                                
                                            </div>
                                        </div>

                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Payment Info:</h6>
                                                        </div>
                                                        <div class="col-sm-4 col-12">
                                                            <p class=" inv-subtitle">Bank Name: </p>
                                                        </div>
                                                        <div class="col-sm-8 col-12">
                                                            <p class="">Bank of America</p>
                                                        </div>
                                                        <div class="col-sm-4 col-12">
                                                            <p class=" inv-subtitle">Account Number : </p>
                                                        </div>
                                                        <div class="col-sm-8 col-12">
                                                            <p class="">1234567890</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">Sub Total: </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="sub-total">$13300</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <h4 class="">Grand Total : </h4>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <h4 class="grand-total">$14000</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="inv--thankYou">
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <p class="">Thank you for doing Business with us.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


</div>
<!--  END CONTENT AREA  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{asset('js/pages/backend_orders.js')}}"></script>
@stop