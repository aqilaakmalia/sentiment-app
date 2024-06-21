<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
Use \Carbon\Carbon;
use DateTime;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Exception;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews);
    }

    public function detailProduct($id_product, $filter = null) {
        $product = Product::findOrFail($id_product);
        
        $price = number_format($product->harga, 0, ',', '.');
        
        $query = Review::where('id_product', $id_product);
    
        if ($filter === 'positif') {
            $query->where('klasifikasi', 1);
        } elseif ($filter === 'negatif') {
            $query->where('klasifikasi', 0); 
        }
    
        // Order the reviews by created_at in descending order
        $query->orderBy('created_at', 'desc');
        
        $total_reviews = $query->count();
        $positif_reviews = Review::where('id_product', $id_product)->where('klasifikasi', 1)->count();
        $negatif_reviews = Review::where('id_product', $id_product)->where('klasifikasi', 0)->count();
        
        $reviews = $query->paginate(10);
        
        return view('single', compact('product', 'price', 'reviews', 'total_reviews', 'positif_reviews', 'negatif_reviews'));
    }
    
         

    public function reviewProduct(Request $request){
        $id_product = $request->query('id_product');
    
        $product = Product::with('category', 'brand')->find($id_product);
    
        if (!$product) {
            return response()->json([
                "code" => 404,
                "status" => "error",
                "message" => "Product not found"
            ], 404);
        }
    
        $perPage = $request->query('per_page', 10);
        $reviews = Review::select('id_review', 'id_product', 'user', 'review', 'date', 'rating', 'klasifikasi')
        ->where('id_product', $id_product)
        ->paginate($perPage);
        $total_reviews = Review::where('id_product', $id_product)->count();
        $positif_reviews = Review::where('id_product', $id_product)->where('klasifikasi', 1)->count();
        $negatif_reviews = Review::where('id_product', $id_product)->where('klasifikasi', 0)->count();

        return response()->json([
            "code" => 200,
            "status" => "success get reviews",
            "product" => [
                "id_product" => $product->id_product,
                "category" => $product->category->category_name,
                "brand" => $product->brand->brand_name,
                "product_name" => $product->product_name,
                "image"=> $product->image,
                "description"=> $product->description,
                "total_review"=> $total_reviews,
                "positif_review"=> $positif_reviews,
                "negatif_review"=> $negatif_reviews,
                "rating"=> $product->rating,
            ],
            "reviews" => $reviews
        ], 200);
    }

    public function viewCsvContent(Request $request)
    {
        try {
            // Validasi file
            $request->validate([
                'csv_file' => 'required|mimes:csv,txt|max:2048', // Sesuaikan dengan kebutuhan Anda
            ]);

            // Baca file CSV
            $file = $request->file('csv_file');
            $csvData = file_get_contents($file->path());

            // Tampilkan isi CSV kepada pengguna
            return response()->json(['csv_content' => $csvData], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //sociolla
    public function uploadCsvSociolla(Request $request)
    {
        try {
            // Validasi file
            $request->validate([
                'csv_file' => 'required|mimes:csv,txt|max:2048', // Sesuaikan dengan kebutuhan Anda
            ]);
    
            // Baca file CSV
            $file = $request->file('csv_file');
            $csvData = file_get_contents($file->path());
            $rows = explode("\n", trim($csvData));
    
            foreach (array_slice($rows, 1) as $row) {
                // Memisahkan data menggunakan tanda titik koma (;)
                $data = str_getcsv($row, ',');
    
                // Validasi jumlah kolom
                // if (count($data) != 5) {
                //     throw new \Exception('Invalid data format in CSV row');
                //     continue;
                // }
    
                $brandName = $request->input('brand');
                $brand = Brand::where('brand_name', $brandName)->first();
    
                $productName = $request->input('product');
                $product = Product::where('product_name', $productName)
                    ->where('id_brand', optional($brand)->id_brand)
                    ->first();
    
                if ($product) {
                    $idProduct = $product->id_product;
    
                    // Mengonversi string waktu menjadi tanggal saat ini
                    $date = $this->convertDateSoco($data[3]);
    
                    // Simpan data ke dalam tabel
                    Review::create([
                        'id_product' => $idProduct,
                        'user' => $data[0],
                        'review' => $data[1],
                        'klasifikasi' => $data[2],
                        'date' => $date,
                        'rating' => $data[4]
                    ]);
                } else {
                    return response()->json(['message' => 'The product does not yet exist in the database'],400);
                }
            }
    
            // Berikan respons sukses
            return response()->json(['message' => 'Data from CSV file has been successfully uploaded'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function convertDateSoco($timeString)
    {
        $timeString = trim($timeString);
        $time = 0;

        if (preg_match('/(\d+)([a-z]+)/', $timeString, $matches)) {
            $value = (int)$matches[1];
            $unit = strtolower($matches[2]);

            switch ($unit) {
                case 's':
                    $time = $value;
                    break;
                case 'min':
                    $time = $value * 60;
                    break;
                case 'h':
                    $time = $value * 3600;
                    break;
                case 'd':
                    $time = $value * 86400;
                    break;
                case 'mo':
                    $time = $value * 2628000; // assuming 30 days per month
                    break;
                case 'y':
                    $time = $value * 31536000; // assuming 365 days per year
                    break;
            }
        }

        return Carbon::now()->subSeconds($time);
    }

    //female daily
    public function uploadCsvFd(Request $request)
    {
        DB::beginTransaction();
        try {
            // Validasi file
            $request->validate([
                'csv_file' => 'required|mimes:csv,txt|max:2048', // Sesuaikan dengan kebutuhan Anda
            ]);
    
            // Baca file CSV
            $file = $request->file('csv_file');
            $csvData = file_get_contents($file->path());
            $rows = explode("\n", trim($csvData));
    
            foreach (array_slice($rows, 1) as $row) {
                // Memisahkan data menggunakan tanda titik koma (;)
                $data = str_getcsv($row, ',');
    
                $brandName = $request->input('brand');
                $brand = Brand::where('brand_name', $brandName)->first();
    
                $productName = $request->input('product');
                $product = Product::where('product_name', $productName)
                    ->where('id_brand', optional($brand)->id_brand)
                    ->first();
    
                if ($product) {
                    $idProduct = $product->id_product;
                    $date = $this->convertDateFd($data[3]);
    
                    // Cek apakah tanggal valid
                    if (empty($date)) {
                        throw new Exception('Invalid date format: ' . $data[3]);
                    }
    
                    // Simpan data ke dalam tabel
                    Review::create([
                        'id_product' => $idProduct,
                        'user' => $data[0],
                        'review' => $data[1],
                        'klasifikasi' => $data[2],
                        'date' => $date,
                        'rating' => '4'
                    ]);
                } else {
                    throw new Exception('The product does not yet exist in the database');
                }
            }
    
            DB::commit();
    
            // Berikan respons sukses
            return response()->json(['message' => 'Data from CSV file has been successfully uploaded'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function convertDateFd($inputDate) 
    {
        $now = new DateTime();
        $formattedDate = '';
    
        switch (true) {
            case preg_match('/(\d+)\s+seconds\s+ago/i', $inputDate, $matches):
                $formattedDate = $now->modify("-{$matches[1]} seconds")->format('Y-m-d');
                break;
            case preg_match('/(\d+)\s+minutes\s+ago/i', $inputDate, $matches):
                $formattedDate = $now->modify("-{$matches[1]} minutes")->format('Y-m-d');
                break;
            case preg_match('/an\s+hour\s+ago/i', $inputDate):
                $formattedDate = $now->modify('-1 hour')->format('Y-m-d');
                break;
            case preg_match('/(\d+)\s+hours\s+ago/i', $inputDate, $matches):
                $formattedDate = $now->modify("-{$matches[1]} hours")->format('Y-m-d');
                break;
            case preg_match('/a\s+day\s+ago/i', $inputDate):
                $formattedDate = $now->modify('-1 day')->format('Y-m-d');
                break;
            case preg_match('/(\d+)\s+days\s+ago/i', $inputDate, $matches):
                $formattedDate = $now->modify("-{$matches[1]} days")->format('Y-m-d');
                break;
            case preg_match('/(\d+)-(\d{2})-(\d{2})/i', $inputDate, $matches):
                $monthNumber = date_parse($matches[2])['month'];
                $formattedDate = "{$matches[1]}-$monthNumber-{$matches[3]}";
                break;
            case preg_match('/(\d{2})\s+(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\s+(\d{4})/i', $inputDate, $matches):
                $monthNumber = DateTime::createFromFormat('M', $matches[2])->format('m');
                $formattedDate = "{$matches[3]}-$monthNumber-{$matches[1]}";
                break;
            case preg_match('/(\d{2})-(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)-(\d{2})/i', $inputDate, $matches):
                $monthNumber = DateTime::createFromFormat('M', $matches[2])->format('m');
                $formattedDate = "20{$matches[3]}-$monthNumber-{$matches[1]}";
                break;
            default:
                // Handle unrecognized format
                $formattedDate = ''; // Atur nilai default menjadi string kosong
                break;
        }
    
        return $formattedDate;
    }
    
    public function deleteReviewsByProduct(Request $request)
    {
        // Validasi input request
        $request->validate([
            'id_product' => 'required|integer|exists:module_product,id_product'
        ]);

        DB::beginTransaction();
        try {
            // Ambil id_product dari request
            $idProduct = $request->input('id_product');

            // Hapus data dari tabel review berdasarkan id_product
            $deletedRows = Review::where('id_product', $idProduct)->delete();

            if ($deletedRows === 0) {
                // Jika tidak ada baris yang dihapus, artinya id_product tidak ditemukan di tabel review
                DB::rollBack();
                return response()->json([
                    'message' => 'Product not found in reviews'
                ], 404);
            }

            DB::commit();

            // Berikan respons sukses
            return response()->json([
                'message' => 'Reviews deleted successfully',
                'deletedRows' => $deletedRows
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    
    
}
