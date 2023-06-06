<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin\Product;
use App\Http\Controllers\Controller;

class ProductStockController extends Controller
{
    public function ProductStock()
    {
        $product = Product::all();
        return view('admin.stock.stock', compact('product'));
    }
}
