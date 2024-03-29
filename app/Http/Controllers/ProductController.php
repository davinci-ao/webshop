<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyMail;
use App\Models\Order;


class ProductController extends Controller
{
    public function getAllProducts(){

        $products = Product::All();
        $categories = Category::All();
        return view('product.index', ["products"=>$products], ["categories"=>$categories]);
    }

    public function getProductById($id, $category_id){
        return view('product.details')
        ->with('product', Product::where('id', $id)->first())
        ->with('categoryProducts', Product::where('category_id', $category_id)->whereNot('id', $id)->get());
    }

    public function getCategoryProducts($id)
    {
        $categories = Category::All();
        $products = Product::where('category_id', $id)->get();
        return view('category.showproductsbycategory', compact('products'), ["categories"=>$categories]);
    }    

    public function sortByCategory($id){
        $categories = Category::All();
        $products = Product::where('category_id', $id)->get();
        return view('product.index', compact('products'), ["categories"=>$categories]);
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

    public function storeStockOfProduct(Request $request, $id, $email){
        $details = [
            'title' => 'Order confirmation',
            'body' => 'Thank you for using ProducerGrind.'
        ];
        Mail::to($email)->send(new \App\Mail\MyMail($details));

        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product');  
    }
    
    public function sortOnPriceHigh(){
        $products = Product::orderBy('price','desc')->get();
        $categories = Category::All();
        return view('product.index', ["products"=>$products], ["categories"=>$categories]);  
    }

    public function sortOnPriceLow(){
        $products = Product::orderBy('price','ASC')->get();
        $categories = Category::All();
        return view('product.index', ["products"=>$products], ["categories"=>$categories]);
    }

    public function sortOnNameHigh(){
        $products = Product::orderBy('name','asc')->get();
        $categories = Category::All();
        return view('product.index', ["products"=>$products], ["categories"=>$categories]);  
    }

    public function sortOnNameLow(){
        $products = Product::orderBy('name','desc')->get();
        $categories = Category::All();
        return view('product.index', ["products"=>$products], ["categories"=>$categories]);  
    }

    public function search(Request $request){
        $search_text = $request->get('query');
        $products = Product::where('name', 'LIKE', '%'.$search_text.'%')->with('category')->get();
        return view('product\search',compact('products'));
    }



}