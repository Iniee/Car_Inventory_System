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
            'quantity' => 'required'
        ]);
        $unit_price = $request->price;
        $quantity = $request->quantity;
        $total_price = $unit_price * $quantity;
        
        $sold = array(
            "name" => $request->name,
            "quantity_sold" => $request->quantity,
            "base_price" => $request->price,
            "total_price" => $total_price,
            "sold_by" => auth()->user()->name,
            "product_category_id" => $request->product_category_id
        );
        
        if ($products->quantity >= $request->input('quantity') && $request->input('quantity') != 0 ){
            $products->quantity -= $request->input('quantity');
            $products->save();
            
            $msg = 'Product sold';
            Sold::create($sold);
                        
            return redirect('product/sell/index')->with('message', $msg);
        }
        
        else{
            $err = "Not enough";
            return back()->with('err', $err);
        }
        
       
    }


    public function soldItem()
    {
        return view('sales.admin_sold_table',  [
         'solds' => Sold::latest()->paginate(10) ]);
    }

   public function salesoldItem()
    {
        return view('sales.sale_sold_table',  [
         'solds' => Sold::where('sold_by', '=', auth()->user()->name)->latest()->paginate(10) ]);
    }
}