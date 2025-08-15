<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('id');
    
        if ($search) {
            $products = Product::where('title', 'like', '%' . $search . '%')->get();
            $title = "Search: " . $search;
        } else if ($category && $category !== 'all') {
            $products = Product::where('category', $category)->get();
            $title = $category;
        } else {
            $products = Product::all();
            $title = "All Collections";
        }
    
        return view('collection', [
            'products' => $products,
            'title' => $title,
        ]);
    }
    
    public function show($id) {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
    
    public function random() {
        $product = Product::inRandomOrder()->first();
        return response()->json($product);
    }
}
