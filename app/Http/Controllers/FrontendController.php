<?php

namespace App\Http\Controllers;

use App\Product;

class FrontendController extends Controller
{
  public function index()
  {
    return view('index')->with('products', Product::paginate(3));
  }

  public function show(Product $product)
  {
    return view('show')->with('product', $product);
  }
}
