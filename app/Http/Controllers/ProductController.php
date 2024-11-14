<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        try {
            $validated = $request->validate([
                "name" => "required|string|max:255",
                "description" => "required|string",
                "price" => "required|numeric",
                "images" => "required|array",
                "images.*" => "image|mimes:jpeg,png,jpg|max:4048"
            ]);

            $imagesPath = [];

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->storeAs('products_images', time() . "-" . $image->getClientOriginalName() ,'public');
                    $imagesPath[] = $path;
                }
            }

            Product::create([
                "name" => $validated["name"],
                "description" => $validated["description"],
                "price" => $validated["price"],
                "images" => json_encode($imagesPath)
            ]);

            return redirect()->route('product.index')->with('success', "Product has been created");

        } catch (Exception $error) {
            Log::error('create_error:', [$error->getMessage()]);
            
            return redirect()->back()->with('error', "Product could not be created, add a valid product");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
