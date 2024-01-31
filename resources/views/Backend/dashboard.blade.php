@extends('Backend.Layout.app')
@section('content')

<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Dashboard</h3>
            </div>
            
        </div>

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        @if(auth()->user()->type == 'admin')
                        <h5 class="">Revenue - LKR{{ DashboardHelper::getTotalOrderRevenue(auth()->user()->id, 'admin') }}</h5>
                        @else
                        <h5 class="">Payments - LKR{{ DashboardHelper::getTotalOrderRevenue(auth()->user()->id, 'customer') }}</h5>
                        @endif
                        <ul class="tabs tab-pills">
                            <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                        </ul>
                    </div>

                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div id="content_1" class="tabcontent">
                                <div id="revenueMonthly"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           

            @if(auth()->user()->type == 'admin')
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget-two">
                    <div class="widget-content">
                        <div class="w-numeric-value">
                            <div class="w-content">
                                <span class="w-value">Daily sales</span>
                                <span class="w-numeric-title">Go to columns for details.</span>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="w-chart">
                            <div id="daily-sales"></div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget-one">
                    <div class="widget-content">
                        <div class="w-numeric-value">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                            </div>
                            <div class="w-content">
                                <span class="w-value">{{ DashboardHelper::getTotalOrders() }}</span>
                                <span class="w-numeric-title">Total Orders</span>
                            </div>
                        </div>
                        <div class="w-chart">
                            <div id="total-orders"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(auth()->user()->type == 'customer')
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one">
                    <div class="widget-heading">
                        <h5 class="">Transactions</h5>
                    </div>

                    <div class="widget-content">
                        @foreach(DashboardHelper::getLatestOrders(auth()->user()->id, auth()->user()->type, 4) as $order)
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>Order ID: #{{ $order['id'] }}</h4>
                                        <p class="meta-date">{{ ProductHelper::viewDateInput($order['created_at']) }}</p>
                                    </div>

                                </div>
                                <div class="t-rate rate-dec">
                                    <p><span>-LKR{{ $order['total'] }}</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <polyline points="19 12 12 19 5 12"></polyline>
                                        </svg></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                <div class="widget widget-account-invoice-one">

                    <div class="widget-heading">
                        <h5 class="">Account Info</h5>
                    </div>

                    <div class="widget-content">
                        <div class="invoice-box">

                            <div class="acc-total-info">
                                <h5>Total Expenses</h5>
                                <p class="acc-amount">LKR {{ DashboardHelper::getTotalPayments(auth()->user()->id) }}</p>
                            </div>

                            
                        </div>
                    </div>

                </div>
            </div>
            @endif

            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Recent Orders</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-content">Customer</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Order</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Price</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Date</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Status</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(DashboardHelper::getLatestOrders(auth()->user()->id, auth()->user()->type, 7) as $order)
                                    <tr>
                                        <td>
                                            <div class="td-content customer-name"><img src="{{ asset('storage/users/' . $order['user_image']) }}" alt="avatar">{{ $order['user_name'] }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand">#{{ $order['id'] }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content pricing">LKR {{ $order['total'] }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content">{{ ProductHelper::viewDateInput($order['created_at']) }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content"><span class="badge outline-badge-success">PAID</span></div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-three">

                    <div class="widget-heading">
                        <h5 class="">Top Selling Product</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-content">Product</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Price</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">QTY Remaining</div>
                                        </th>
                                        <th>
                                            <div class="th-content">Sold</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(DashboardHelper::getBestSellingItems() as $items)
                                    <tr>
                                        <td>
                                            <div class="td-content product-name"><img src="{{ asset('storage/products/' . $items->product_image) }}" alt="product">{{ $items->product_name }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content"><span class="pricing">LKR {{ $items->product_price }}</span></div>
                                        </td>
                                        <td>
                                            <div class="td-content"><span class="discount-pricing">{{ $items->product_quantity }}</span></div>
                                        </td>
                                        <td>
                                            <div class="td-content">{{ $items->total_quantity_sold }}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @stop