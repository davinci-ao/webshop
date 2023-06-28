<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyMail;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    
    public function index(){
        $shoppingCart = session()->get('shoppingCart');
        $email = Auth::user()->email;
        return view('order.index', ["email"=>$email]);
    }

    public function sendEmailConfirmation($email){
        $details = [
            'title' => 'Order confirmation',
            'body' => 'Thank you for using ProducerGrind.'
        ];
        Mail::to($email)->send(new \App\Mail\MyMail($details));
        
        $shoppingCart = session()->get('shoppingCart');
        $totalPrice = 0;

        // Calculate the total price of the order
        foreach ($shoppingCart as $cartItem) {
            $totalPrice += $cartItem['product']['price'];
        }
        
        foreach ($shoppingCart as $productId => $cartItem) {
            $product = Product::find($productId);
        }

       // Save the order data to the database
        $order = new Order;
        $order->email = $email;
        $order->total_price = $totalPrice;
        $order->save();

foreach ($shoppingCart as $productId => $cartItem) {
    $quantity = $cartItem['quantity'];
    $order->products()->attach($productId, ['quantity' => $quantity]);
}

    // Clear the shopping cart
    session()->forget('shoppingCart');

    // Redirect the user to the desired URL
    return redirect('order/success');
    }

    public function information(){
        if (Auth::user()) {   // Check is user logged in
            $email = Auth::user()->email;
            return view('order/information', ["email"=>$email]);
        } else {
            return view('order/information');
        }
       
    }
    
    public function success(){
        return view('order/success');
    }

    public function delivery(){
         return view('order/delivery');
     }

     public function overview(){
        return view('order/overview');
       
    }
    
    public function orders()
{
    if (Auth::check()) { // Check if user is logged in
        $user = Auth::user();
        $orders = Order::where('email', $user->email)->get();
        return view('order.index', compact('orders'));
    } else {
        return view('order.index', ['orders' => []]);
    }
}
}
