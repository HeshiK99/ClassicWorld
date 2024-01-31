<?php

namespace App\Helpers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\OrderItems;
use DateTime;
use Illuminate\Support\Facades\DB;

class ProductHelper
{
    public static function getDateDifference($date2 = null)
    {
        $date1 = date('Y-m-d H:i:s');

        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);

        $interval = $date1->diff($date2);
        $daysDifference = $interval->days;
        
        if($daysDifference < 10)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function arrayCount($array = null)
    {
        return $product_count = count($array);
    }

    public static function newArrivals($count = 3)
    {
        $currentDate = new DateTime();
        $tenDaysAgo = $currentDate->modify('-10 days');
        $tenDaysAgoFormatted = $tenDaysAgo->format('Y-m-d');

        $new_arrivals = Product::where('active', 1)->where('deleted', 0)->where('created_at', '>=', $tenDaysAgoFormatted)->limit($count)->get();
        return $new_arrivals;
    }

    public static function bestSellers($count = 3)
    {
        $bestSellingItems = OrderItems::select('product_id', DB::raw('SUM(quantity) as total_quantity_sold'))
        ->groupBy('product_id')
        ->orderByDesc('total_quantity_sold')
        ->limit($count)
        ->get();

        foreach($bestSellingItems as $single_item)
        {
            $product_details = Product::where('id', $single_item->product_id)->first();
            $single_item['id'] = $product_details['id'];
            $single_item['image'] = $product_details['image'];
            $single_item['name'] = $product_details['name'];
            $single_item['price'] = $product_details['price'];
        }
        
        return $bestSellingItems;
    }

    public static function changeDateFormat($date = null)
    {
        $dateTime = new DateTime($date);
        $formattedDate = $dateTime->format("F j, Y \a\\t g:i a");
        return $formattedDate;
    }

    public static function viewDateInput($date = null)
    {
        $dateString = $date;
        $dateTime = new DateTime($dateString);
        $formattedDate = $dateTime->format('Y-m-d');

        return $formattedDate;
    }
}