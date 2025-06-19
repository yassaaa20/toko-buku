<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }
}
