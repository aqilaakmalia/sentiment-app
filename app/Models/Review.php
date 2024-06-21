<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'module_review';
    protected $primaryKey = 'id_review';
    protected $guarded = ['id_review'];

    public function brand(){
        return $this->belongsTo(Brand::class, 'id_brand', 'id_brand');
    }

    public function category(){
        return $this->belongsTo(Brand::class, 'id_category', 'id_category');
    }
}