<?php
namespace App;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class CartManager{
    
    public function show()
    {    
        $products = session('products');
        
    }
    
    public function add(Request $request, $id)
    {
        $product = Product::find($id);     
        $request->session()->push('product', $product);   
    }

    public function deleteItemOutCart(Request $request, $id){
    
        $products = $request->session()->get('product'); // Get the array
        foreach($products as $key => $product){
            if($product->id == $id){
                unset($products[$key]);
    
                $request->session()->forget('product');
    
                foreach($products as $product){
                    $request->session()->push('product', $product);
                }
                return redirect('cart/index');
            }
        }
    }

    public function emptyCart(Request $request)
    {
        $products = session()->pull('product', []);
        $request->session()->flush('product');
        return redirect('cart/index');
    }

}
?>