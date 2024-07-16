<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class ProductChartController extends Controller
{
        public function productChart()
    {
        // Fetch product data for the product chart
        $products = Product::select('name', \DB::raw('COUNT(*) as count'))
                           ->groupBy('name')
                           ->get();

        $productLabels = $products->pluck('name');
        $productCounts = $products->pluck('count');

        return view('Charts.productchart', compact('productLabels', 'productCounts'));
    }
}
