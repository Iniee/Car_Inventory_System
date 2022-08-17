<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    use HasFactory;


    protected $table = 'sold';


    protected $fillable = [
        'sold_price' 
    ];

    public function update()
    {
        return $this->belongsTo( Sales::class, 'category_id');
        return $this->belongsTo( Sales::class, 'product_id');
        return $this->belongsTo( Sales::class, 'employee_id');
    }
}
