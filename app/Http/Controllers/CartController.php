<?php

namespace App\Http\Controllers;
use App\CartManager;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function show()
    {    
        $cart = new CartManager();
        return view('cart/index', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $cart = new CartManager();
        $products = $cart->addToCart($request, $id);
        return redirect('cart/index');
    }

    public function removeProductFromCart(Request $request, $id)
    {
        $cart = new CartManager();
        $products = $cart->removeProductFromCart($request, $id);
        return redirect('cart/index');
    }

    public function emptyCart(Request $request)
    {
        $cart = new CartManager();
        $products = $cart->emptyCart($request);
        return redirect('cart/index');
    }
}
