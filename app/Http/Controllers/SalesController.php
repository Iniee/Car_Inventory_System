<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Sold;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
   
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

        if ($products->product >= $request->input('product')){
            $products->product -= $request->input('product');
            $products->save();
            
            $msg = 'Product sold';
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



    public function store(Request $request)
    {

        if (Product::where('id', '=', $request->get('product_id'))->count() > 0) {
            $this->validate($request, [
                'quantity' => 'required|integer|min:1'
            ]);

            $sale = Sales::create([
                'product_id' => $request->get('product_id'),
                'quantity' => $request->get('quantity')
            ]);
            $sale->save();
            return redirect('')->with('success', 'Product Sold!');
        } else {
            return redirect('/sales')->with('error', 'Product doesn\'t exist!');
        }
    }
}