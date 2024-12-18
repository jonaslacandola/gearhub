<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   $search = $request->input('search');
        
        $query = Product::query();
        $categories = Category::all();

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        $products = $query->get();

        return view('product.index', compact('products', 'categories', 'search'));
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
                "stock" => "required|numeric",
                "category" => "required|exists:categories,id",
                "images" => "required|array",
                "images.*" => "image|mimes:jpeg,png,jpg|max:4048"
            ]);

            $imagesPath = [];

            if ($request->hasFile('images')) {
                $imgDIR = $validated["name"] . "-" . time();

                foreach ($request->file('images') as $image) {
                    $path = $image->storeAs($imgDIR, time() . "-" . $image->getClientOriginalName() ,'public');
                    $imagesPath[] = $path;
                }
            }

            Product::create([
                "userId" => Auth::id(),
                "name" => $validated["name"],
                "description" => $validated["description"],
                "price" => $validated["price"],
                "stock" => $validated["stock"],
                "categoryId" => $validated["category"],
                "images" => json_encode($imagesPath)
            ]);

            return redirect()->back()->with('success', "Product " . strtoupper($validated["name"]) . " has been created");

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
        return view('product.show', compact('product'));
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
        $product->delete();

        return back();
    }
}
