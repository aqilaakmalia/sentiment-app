<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function listProduct()
    {
        // Ambil semua produk beserta id_category
        $products = Product::select('id_product', 'id_category', 'id_brand', 'product_name', 'image', 'harga')
        ->where('rating', '>=', 3.9)
        ->get();
    
        // Buat array kosong untuk menyimpan nama kategori dan merek
        $categoryNames = [];
        $brandNames = [];
    
        // Loop melalui setiap produk untuk mendapatkan nama kategori dan merek
        foreach ($products as $product) {
            // Ambil id_category dan id_brand dari produk saat ini
            $id_category = $product->id_category;
            $brandId = $product->id_brand;
    
            // Temukan kategori sesuai dengan id_category
            $category = Category::find($id_category);
    
            // Temukan merek sesuai dengan id_brand
            $brand = Brand::find($brandId);
    
            // Jika kategori ditemukan, simpan nama kategori ke dalam array
            if ($category) {
                $categoryNames[$product->id_product] = str_replace(' ', '_', $category->category_name);
            } else {
                // Jika kategori tidak ditemukan, tetapkan nilai null
                $categoryNames[$product->id_product] = null;
            }
    
            // Jika merek ditemukan, simpan nama merek ke dalam array
            if ($brand) {
                $brandNames[$product->id_product] = $brand->brand_name;
            } else {
                // Jika merek tidak ditemukan, tetapkan nilai null
                $brandNames[$product->id_product] = null;
            }
        }
    
        // Kembalikan data produk, nama kategori, dan nama merek ke view
        return view('index',  compact('products', 'categoryNames', 'brandNames'));
    }

    public function getTopRatedProductInCategory($id_category)
    {
        // Inisialisasi variabel untuk produk teratas dan presentase positif tertinggi
        $topRatedProduct = null;
        $highestPositivePercentage = 0;
        $transformProduct = []; // Inisialisasi array untuk menyimpan informasi tambahan produk
    
        // Mendapatkan semua produk atau produk berdasarkan kategori
        if ($id_category === 'all') {
            $products = Product::with('brand', 'category')->get();
        } else {
            $products = Product::with('brand', 'category')
                ->where('id_category', $id_category)
                ->get();
        }
    
        // Loop melalui setiap produk untuk menghitung presentase review positif
        foreach ($products as $product) {
            $positiveReviewsCount = Review::where('id_product', $product->id_product)->where('klasifikasi', 1)->count();
            $totalReviewsCount = Review::where('id_product', $product->id_product)->count();
    
            // Menghitung presentase review positif
            $positivePercentage = ($totalReviewsCount > 0) ? round(($positiveReviewsCount / $totalReviewsCount) * 100, 1) : 0;
    
            // Menambahkan informasi tambahan produk ke array $transformProduct
            $transformProduct[] = [
                'product' => $product, // Menyimpan data produk
                'positive_percentage' => $positivePercentage,
                'is_top' => false // Set awal untuk is_top
            ];
    
            // Memperbarui nilai tertinggi jika presentase review positif lebih tinggi dari yang saat ini
            if ($positivePercentage > $highestPositivePercentage) {
                $highestPositivePercentage = $positivePercentage;
                $topRatedProduct = $product;
            }
        }
    
        // Menandai produk tertinggi
        foreach ($transformProduct as &$item) {
            if ($item['product']->id_product == $topRatedProduct->id_product) {
                $item['is_top'] = true;
            }
        }

        // Mengurutkan produk berdasarkan persentase review positif dari terkecil hingga terbesar
        usort($transformProduct, function ($a, $b) {
            return $a['positive_percentage'] <=> $b['positive_percentage'];
        });
    
        // Mengirimkan data ke view
        return view('recommendation', compact('products', 'transformProduct'));
    }
     
}
    

