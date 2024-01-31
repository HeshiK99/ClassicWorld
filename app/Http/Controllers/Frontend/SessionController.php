<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function routeUpdate(Request $request)
    {
        // Set the session value
        session(['route' => $request->update_route]);

        return 1;
    }
}