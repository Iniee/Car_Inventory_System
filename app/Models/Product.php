<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';


     protected $fillable = [
        'name', 
        'description', 
        'product_category_id', 
        'price', 
        'quantity',
        'created_by'
    ];

    public function category()
    {
        return $this->belongsTo( ProductCategory::class, 'product_category_id');
    }
}