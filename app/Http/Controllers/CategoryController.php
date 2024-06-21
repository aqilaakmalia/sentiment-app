<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function productsByCategory($categoryId)
    {
        if ($categoryId === 'all') {
            $products = Product::with('brand', 'category')->get();
        } else {
            $products = Product::with('brand', 'category')
                ->where('id_category', $categoryId)
                ->get();
        }

        return view('product', compact('products'));
    }

    public function productsByBrand($brandId)
    {
        if ($brandId === 'all') {
            $products = Product::with('brand', 'category')->get();
        } else {
            $products = Product::with('brand', 'category')
                ->where('id_brand', $brandId)
                ->get();
        }

        return view('product', compact('products'));
    }

    public function recom(){
        $categories = Category::all();
        return view('categories_recom', compact('categories'));
    }
}
