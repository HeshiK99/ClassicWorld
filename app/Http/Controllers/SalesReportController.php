<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class SalesReportController extends Controller
{
    public function index()
    {
        $orders = Orders::where('paid', 1)->orderBy('created_at', 'DESC')->get();

        return view('Backend.sales-reports', compact('orders'));
    }
}
