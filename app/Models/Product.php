<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';


     protected $fillable = [
        'name', 
        'description', 
        'product_category_id', 
        'price', 
        'product'
    ];

    public function category()
    {
        return $this->belongsTo( ProductCategory::class, 'product_category_id')->withTrashed();
    }
}