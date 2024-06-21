<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'module_product';
    protected $primaryKey = 'id_product';
    protected $guarded = ['id_product'];
    
    public function brand(){
        return $this->belongsTo(Brand::class, 'id_brand', 'id_brand');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }
}
