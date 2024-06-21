<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands', compact('brands'));
    }

    public function list_brand()
    {
        $brands = Brand::all();
        return view('product', compact('brands'));
    }
}
