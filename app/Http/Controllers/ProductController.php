<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $products = Product::query()->orderBy('name')->get();
        $message = $request->session()->get('message');
        return view('products.index', compact('products', 'message', 'user'));
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

    public function destroy(Request $request)
    {
        Product::destroy($request->id);
        $request->session()->flash('message', "Product successfully deleted!");
        return redirect()->route('list_product');
    }
}
