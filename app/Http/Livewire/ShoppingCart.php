<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ShoppingCart extends Component
{

    public $cartItem;

    public function mount()
    {
        $this->cartItem = session()->get('shoppingCart');

    }
    
    public function incrementQuantity($productId)
    {
        if (isset($this->cartItem[$productId])) {
            $this->cartItem[$productId]['quantity']++;
            session()->put('shoppingCart', $this->cartItem);
            return redirect('cart/index'); 
        }
    }
    
    public function decrementQuantity($productId)
    {
        if (isset($this->cartItem[$productId])) {
            if ($this->cartItem[$productId]['quantity'] > 1) {
                $this->cartItem[$productId]['quantity']--;
            } else {
                unset($this->cartItem[$productId]);
            }
            session()->put('shoppingCart', $this->cartItem);
            return redirect('cart/index');
        }
    }
    
    public function render()
    {
        $this->cartItem = session()->get('shoppingCart');
        return view('livewire.shopping-cart', [
            'shoppingCart' => $this->cartItem,
        ]);
}
}
