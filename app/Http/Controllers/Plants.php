<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Plants extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('plants', compact('products'));
    }
}
