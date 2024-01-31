<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    public static function getUserData($id = null, $column = null)
    {
        $user_details = User::where('id', $id)->first();
        return $user_details[$column];
    }

    public static function formatDate($date = null)
    {
        $dateString = $date;
        $timestamp = strtotime($dateString);
        $formattedDate = date("d M Y", $timestamp);
        return $formattedDate;
    }
}