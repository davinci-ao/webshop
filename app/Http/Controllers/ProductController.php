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
use App\Models\Order;
use App\Mail\StockNotification;
use App\Models\Stock;


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

    public function storeStockOfProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
    
        // Update de voorraad van het product
        $product->update($input);
    
        // Controleren of het product op voorraad is en de voorraad groter is dan 0
        if ($product->stock > 0) {
            // Product is op voorraad met een voorraad groter dan 0
            $stocks = Stock::where('product_id', $id)->get();
    
            foreach ($stocks as $stock) {
                $details = [
                    'title' => 'Product back in stock',
                    'name' => $product->name, // Naam van het product
                    'file_path' => $product->file_path, // Pad naar het bestand
                ];
                Mail::to($stock->email)->send(new StockNotification($details));
            }
        }
    
        return redirect('product');
    }

    public function storeStockNotification(Request $request)
{
    $data = $request->validate([
        'product_id' => 'required|numeric',
        'email' => 'required|email',
    ]);

    // Opslaan van de gegevens in de database
    Stock::create([
        'product_id' => $data['product_id'],
        'email' => $data['email'],
    ]);

    return response()->json(['message' => 'Gegevens succesvol opgeslagen.']);
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