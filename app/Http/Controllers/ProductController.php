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

    public function create()
    {
        return view('product.create');
    } 

    public function store(Request $request){
        $input = $request->all();
        $product = Product::create($input);    
        return redirect('product');  
    }

    public function delete($id){
        $data = Product::find($id);
        $data->delete();
        return redirect('product');  
   }

   public function edit($id)
    {
        $product = Product::find($id);
        return view('product.update')->with('product', $product);
    }

    public function storeProduct(Request $request, $id){
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product');  
    }

    public function storeStockOfProduct(Request $request, $id){
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product');  
    }
}
