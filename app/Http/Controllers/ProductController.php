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

}
