<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::orderBy('id', 'ASC')->paginate();
        return view('products.index', compact('products'));
    }

    public function show($id){
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

}
