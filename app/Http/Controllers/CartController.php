<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    public function getAllCartItems(){
        $carts = Cart::All();
        return view('cart.index', ["carts"=>$carts]);
    }

    public function addCart(Request $request, $product_id, $category_id){
        if(Auth::id()){
            $user=auth()->user();

            $product = Product::find($product_id);

            $cart = new cart;

            $cart->name = $user->username;

            $cart->product_name = $product->name;

            $cart->category = $product->category->name;  

            $cart->price = $product->price;  

            $cart->file_path = $product->file_path;  

            $cart->save();

            return redirect()->back()->with('message', 'Product added successfully');
        }
        else{
            return redirect('login');
        }

    }
}
