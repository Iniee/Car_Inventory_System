<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
Use DB;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(25);

        return view('inventory.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('inventory.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @param  App\Product  $model
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $product)
    {
        $product->create($request->all());

        return redirect()
            ->route('products.index')
            ->withStatus('Product successfully registered.');
    }


     public function show($product)
     {
         return view('inventory.products.show', [
         'products' => Product::where('name', '=', $product)->first()
    ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();

        return view('inventory.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()
            ->route('products.index')
            ->withStatus('Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->withStatus('Product removed successfully.');
    }

    /**
     * DRAW INVENTORY DATA FROM DB
     */

    //  public function draw()
    //  {
        // , DB::raw("product_category_id")
        // SELECT product_category_id,created_at, COUNT(*) FROM `products` GROUP BY 'product_category_id';
        // $report = Product::select(DB::raw("'product_category_id','created_at',COUNT(*) as count"))->groupBY(DB::raw('product_category_id'));
        // Carbon::parse($report->created_at)->format('M');

        // $report = DB::table('products')
        //         ->selectRaw('product_category_id','created_at','count(*)')
        //         ->groupBy('product_category_id')
        //         ->Carbon::parse($report->created_at)->format('M')
        //         ->get();

        // $report = DB::table('products')->select('product_category_id', 'created_at')->get();

        // $report = DB::table('products')
        // ->select(DB::raw('SUM(product) as sum_of_product'))
        // ->groupBy('product_category_id')
        // ->orderBy('created_at', date('M')) 
        // ->get();

        // $labels = $report->keys();
        // $data = $report->values();
        
        // dd($report);

    //     return view ('users.dashboard')
    //         ->with('labels', $labels)
    //         ->with('data', $data);
    //   }
}