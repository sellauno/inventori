<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function toDashboard()
    {
        $data = Order::all();
        return view('index', ['order' => $data]);
    }
}
