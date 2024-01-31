<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class Dashboardcontroller extends Controller
{
    public function dailySales(Request $request)
    {
        // Get the current date
        $currentDate = Carbon::now();

        // Get the start and end dates of the current week
        $currentWeekStart = $currentDate->copy()->startOfWeek();
        $currentWeekEnd = $currentDate->copy()->endOfWeek();

        // Get the start and end dates of the last week
        $lastWeekStart = $currentDate->copy()->startOfWeek()->subWeek();
        $lastWeekEnd = $currentDate->copy()->endOfWeek()->subWeek();

        // Get orders for this week
        $thisWeekOrders = Orders::whereBetween('date', [$currentWeekStart, $currentWeekEnd])->get();

        // Get orders for last week
        $lastWeekOrders = Orders::whereBetween('date', [$lastWeekStart, $lastWeekEnd])->get();

        // Initialize arrays to store daily total amounts
        $thisWeekTotalAmounts = [];
        $lastWeekTotalAmounts = [];

        // Loop through this week's orders and calculate daily total amounts
        foreach ($thisWeekOrders as $order) {
            $date = Carbon::parse($order->date)->format('Y-m-d');
            $thisWeekTotalAmounts[$date] = isset($thisWeekTotalAmounts[$date]) ? $thisWeekTotalAmounts[$date] + $order->total : $order->total;
        }

        // Loop through last week's orders and calculate daily total amounts
        foreach ($lastWeekOrders as $order) {
            $date = Carbon::parse($order->date)->format('Y-m-d');
            $lastWeekTotalAmounts[$date] = isset($lastWeekTotalAmounts[$date]) ? $lastWeekTotalAmounts[$date] + $order->total : $order->total;
        }

        // Output the results
        return [
            'thisWeekTotalAmounts' => $thisWeekTotalAmounts,
            'lastWeekTotalAmounts' => $lastWeekTotalAmounts,
        ];
    }

    public function monthlySales(Request $request)
    {
        if(auth()->user()->type == 'admin')
        {
            $monthlyCounts = Orders::select(DB::raw('MONTH(date) as month'), DB::raw('SUM(total) as total'))
            ->groupBy(DB::raw('MONTH(date)'))
            ->get();
        }
        else
        {
            $monthlyCounts = Orders::select(DB::raw('MONTH(date) as month'), DB::raw('SUM(total) as total'))
            ->where('users_id', auth()->user()->id)
            ->groupBy(DB::raw('MONTH(date)'))
            ->get();
        }
        

        $result = [];

        foreach ($monthlyCounts as $count) {
            $result[$count->month] = $count->total;
        }

        return [
            'monthly_result' => $result,
        ];
    }
}
