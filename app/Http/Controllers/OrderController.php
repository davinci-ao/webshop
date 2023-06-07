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
        


        // Save the order data to the database
        $order = new Order;
        $order->username = Auth::user()->username;
        $order->email = $email = Auth::user()->email;
        $order->total_price = $totalPrice;
        // Set other order details as needed
        $order->save();
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
}
