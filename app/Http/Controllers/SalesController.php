<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Sold;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class SalesController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = Product::paginate(25);

        return view('sales.index', compact('products'));
    }

    public function show($product)
     {
         return view('inventory.products.show', [
         'products' => Product::where('name', '=', $product)->first()   
    ]);
    }


    public function update($id, Request $request){
        // dd($id);
        $products = Product::find($id);
        $request->validate([
            'product' => 'required'
        ]);
        
        $sold = array(
            "name" => $request->name,
            "product" => $request->product,
            "description" => $request->description,
            "price" => $request->price,
            "product_category_id" => $request->product_category_id
        );

        if ($products->product >= $request->input('product')){
            $products->product -= $request->input('product');
            $products->save();
            
            $msg = 'Product sold';
            $sold = DB::table('solds')->insert($sold);
            return back()->with('msg', $msg);
        }
        else if($request->input('product') == 0){
            $msg = 'Product should be more than zero';
            return back()->with('msg', $msg);        
        }
        else{
            $err = "Not enough";
            return back()->with('err', $err);
        }
        
        
    }


//     public function sold_items(){
//         $solds = Sold::all();

//         return view('users.dashboard', compact('solds'));
//     }
}