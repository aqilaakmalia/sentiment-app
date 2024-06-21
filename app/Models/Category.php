<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'module_category';
    protected $primaryKey = 'id_category';
    protected $guarded = ['id_category'];
}
