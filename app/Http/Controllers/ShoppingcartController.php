<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingcartController extends Controller
{
    public function getAllFromShoppingcart(){
        return view('shoppingcart.index');
    }
}
