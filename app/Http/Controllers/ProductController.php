<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()->orderBy('name')->get();
        $message = $request->session()->get('message');
        return view('products.index', compact('products', 'message'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductFormRequest $request)
    {
        $product = Product::create($request->all());
        $request->session()->flash('message', "Product {$product->id} successfully created: {$product->name}!");
        return redirect()->route('list_product');
    }

    public function destroy (Request $request)
    {
        Product::destroy($request->id);
        $request->session()->flash('message', "Product successfully deleted!");
        return redirect()->route('list_product');
    }
}
