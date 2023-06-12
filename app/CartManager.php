<?php
namespace App;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class CartManager{
    
    public function showCart()
{
    $shoppingCart = session()->get('shoppingCart');
    
    if (!$shoppingCart) {
        $shoppingCart = [];
    }

    foreach ($shoppingCart as $productId => $cartItem) {
        $product = Product::find($productId);
        $shoppingCart[$productId]['subtotal'] = $product->price * $cartItem['quantity'];
    }
    
}
    
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        $product = Product::find($productId);
        
        $shoppingCart = session()->get('shoppingCart');
        if (!$shoppingCart) {
            $shoppingCart = [
                $productId => [
                    'product' => $product,
                    'quantity' => $quantity,
                    "subtotal" => $product->price * $request->quantity,
                ]
            ];
        } else {
            if (isset($shoppingCart[$productId])) {
                $shoppingCart[$productId]['quantity'] += $quantity;
                $shoppingCart[$productId]['subtotal'] = $product->price * $quantity;
                
            } else {
                $shoppingCart[$productId] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    "subtotal" => $product->price * $request->quantity,
                ];
            }
        }
        
        session()->put('shoppingCart', $shoppingCart);
        
    }

    public function removeProductFromCart(Request $request, $id)
{
    $productId = $id;   
    $shoppingCart = session()->get('shoppingCart');
    
    if (isset($shoppingCart[$productId])) {
        unset($shoppingCart[$productId]);
        session()->put('shoppingCart', $shoppingCart);
    }
    

}

    public function emptyCart(Request $request)
    {
        $shoppingCart = session()->pull('shoppingCart', []);
        $request->session()->flush('shoppingCart');
        return redirect('shoppingCart/index');
    }

}
?>