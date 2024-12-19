<?php

namespace App\Http\Controllers;  

use App\Models\Product;  
use Illuminate\Http\Request;  

class ProductController extends Controller  
{  
    public function index()  
    {  
        $products = Product::all();  
        return view('products.index', compact('products'));  
    }  

    public function create()  
    {  
        return view('products.create');  
    }  
    public function store(Request $request)  
    {  
        $request->validate([  
            'name' => 'required',  
            'description' => 'required',  
            'price' => 'required|numeric',  
            'stock' => 'required|integer',  
        ]);  
    
        $product = Product::create($request->all());  
        
        return redirect()->route('products.index')->with('success', "Produk {$product->name} berhasil ditambahkan");  
    }

    public function edit(Product $product)  
    {  
        return view('products.edit', compact('product'));  
    }  
    public function update(Request $request, Product $product)  
    {  
        $request->validate([  
            'name' => 'required',  
            'description' => 'required',  
            'price' => 'required|numeric',  
            'stock' => 'required|integer',  
        ]);  
    
        $product->update($request->all());  
        return redirect()->route('products.index')->with('success', "Produk {$product->name} berhasil diperbarui");  
    }  
    
    public function destroy(Product $product)  
    {  
        $productName = $product->name;
        $product->delete();  
        return redirect()->route('products.index')->with('success', "Produk {$productName} berhasil dihapus");  
    }
    
}
