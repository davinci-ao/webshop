<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyMail;

class OrderController extends Controller
{
    
    public function index(){
        $shoppingCart = session()->get('shoppingCart');
        $email = Auth::user()->email;
        return view('order.index', ["email"=>$email]);
    }

    public function sendEmail($email){
        $details = [
            'title' => 'Order confirmation',
            'body' => 'Thank you for using ProducerGrind.'
        ];
        Mail::to($email)->send(new \App\Mail\MyMail($details));
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
