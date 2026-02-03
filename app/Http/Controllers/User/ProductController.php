<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function index()
    {
        $company = Company::first();
        $categories = Product::select('category')->distinct()->pluck('category');
        $products = Product::all();
        return view('Product.product', compact('categories', 'products','company'));
    }
}
