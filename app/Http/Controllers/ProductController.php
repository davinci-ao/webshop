<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAllProducts(){

        $products = Product::All();
        return view('product.index', ["products"=>$products]);
    }

    public function getProductById($id){

        return view('product.details')
        ->with('product', Product::where('id', $id)->first());
    }

    public function getCategoryProducts($id)
{
    $products = Product::where('category_id', $id)->get();
        return view('category.showproductsbycategory', compact('products'));
}       

}
