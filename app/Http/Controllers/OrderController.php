<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('order.create');
    }

    public function confirm()
    {
        return view('order.confirm');
    }
}
