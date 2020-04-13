<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Str;
// use Illuminate\Http\Request;
use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('products.index')->with('products', Product::all());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('products.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateProductsRequest $request)
  {
    $product = new Product;

    $product_image = $request->image;

    $new_product_image = time() . $product_image->getClientOriginalName();

    $product_image->move('uploads/products', $new_product_image);

    $product->name = $request->name;
    $product->slug = Str::slug($request->name);
    $product->price = $request->price;
    $product->description = $request->description;
    $product->image = 'uploads/products/' . $new_product_image;

    $product->save();


    session()->flash('success', 'Created product.');

    return redirect(route('products.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    return view('products.edit')->with('product', $product);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateProductsRequest $request, Product $product)
  {
    if (request()->hasFile('image')) {

      $product_image = $request->image;

      $new_product_image = time() . $product_image->getClientOriginalName();

      $product_image->move('uploads/products', $new_product_image);

      $product->image = 'uploads/products/' . $new_product_image;

      $product->save();
    }

    $product->name = $request->name;
    $product->slug = Str::slug($request->name);
    $product->price = $request->price;
    $product->description = $request->description;

    $product->save();

    session()->flash('success', 'Updated product.');

    return redirect(route('products.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    if (file_exists($product->image)) {
      unlink($product->image);
    }

    $product->delete();

    session()->flash('success', 'Product deleted.');

    return redirect()->back();
  }
}
