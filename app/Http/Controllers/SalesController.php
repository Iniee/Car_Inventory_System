<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Sold;

class SalesController extends Controller
{

    public function sold_products(){

        $sold = Sold::first();

        dd($sold);
    }
}
