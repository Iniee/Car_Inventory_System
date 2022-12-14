<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'productcategories';
    
    protected $fillable = ['name'];
    
    
    
    public function products() {
        return $this->hasMany(Product::class);
    }
  

    public function sold() {
        return $this->hasMany(Sold::class);
    }
  
}