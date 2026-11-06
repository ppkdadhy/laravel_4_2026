<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Managemen Produk || PPKD Sticker";
        $products = Product::with('category')->get();
        // $category = Category::with('products')->count();
        return view('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Produk ||  PPKD Sticker";
        $categories = Category::all();
        return view('admin.product.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'slug' => 'nullable|string|unique:categories,slug,',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',

            // validasi product image
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:png,jpg,jpeg,webp|max:2048',
            'alt'    => 'nullable|array',
            'alt.*'    => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',

        ]);

        // product, product images
        // transaction
        DB::transaction(function () use ($request, $validated) {
            $product = Product::create([
                'category_id' => $validated['category_id'],
                'name' => $validated['name'],
            ]);

            if ($request->hasFile('images')) {
                $imageData = [];

                foreach ($request->file('images') as $key => $file) {
                    $path = $file->store('products', 'public');

                    $imageData[] = [
                        'path' => $path,
                        'alt' => $request->input('alt.{$key}') ?? $product->name,
                        'sort_order' => $key + 1,
                    ];
                }
                $product->images()->createMany($imageData);
            }
        });
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        return $request;
        if ($request->hasFile('img')) {
            if ($product->img) {
                Storage::disk('public')->delete($product->img);
            }

            $validate['img'] = $request->file('img')->store('products', 'public');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product->img) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete();
    }
}
