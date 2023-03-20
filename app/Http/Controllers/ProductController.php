<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function getAllProducts(){

        $products = Product::All();
        return view('product.index', ["products"=>$products]);
    }

    public function getProductById($id, $category_id){
        //$categoryPoducts = Product::All();

        return view('product.details')
        ->with('product', Product::where('id', $id)->first())
        ->with('categoryPoducts', Product::where('category_id', $category_id)->whereNot('id', $id)->get());
    }

    public function getCategoryProducts($id)
    {
        $products = Product::where('category_id', $id)->get();
        return view('category.showproductsbycategory', compact('products'));
    }    

    public function create()
    {
        $categories = Category::All();
        return view('product.create', ["categories"=>$categories]);
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
        $categories = Category::All();
        $product = Product::find($id);
        return view('product.update', ["categories"=>$categories])->with('product', $product);
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
    
    public function sortOnPriceHigh(){
        $products = Product::orderBy('price','desc')->get();
        return view('product.index', ["products"=>$products]);  
    }

    public function sortOnPriceLow(){
        $products = Product::orderBy('price','ASC')->get();
        return view('product.index', ["products"=>$products]);
    }

    public function sortOnNameHigh(){
        $products = Product::orderBy('name','asc')->get();
        return view('product.index', ["products"=>$products]);  
    }

    public function sortOnNameLow(){
        $products = Product::orderBy('name','desc')->get();
        return view('product.index', ["products"=>$products]);  
    }

    public function search(Request $request){
        $search_text = $request->get('query');
        $products = Product::where('name', 'LIKE', '%'.$search_text.'%')->with('category')->get();
        return view('product\search',compact('products'));
    }

}