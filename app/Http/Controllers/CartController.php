<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CartController extends Controller
{
    public function getAllCartItems(){
        $cartItems = Cart::All();
        return view('cart.index', ["cartItems"=>$cartItems]);
    }

    public function getAllCartsWithProduct_id($id){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('carts/cart_product', ["carts"=>$carts], ["product_id"=>$id]);
    }

    public function addCart(Request $request, $id){
        if(Auth::id()){
            return redirect()->back();
            $user=auth()->user;
            $cart = new cart;
            $cart->name = $user->name;
        }
        else{
            return redirect('login');
        }

    }
}
