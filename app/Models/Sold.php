<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_category_id',
        'base_price',
        'total_price',
        'quantity_sold',
        'sold_by',
    ];
}
