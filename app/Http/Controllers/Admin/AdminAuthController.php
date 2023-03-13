<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
            if($user->is_admin == 1){
                return redirect()->route('adminDashboard')->with('success','You are Logged in sucessfully.');
            }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

    public function index(){
        return view('welcome');
    }

    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }

    public function getAllProducts(){
        $products = Product::All();
        return view('admin/editproduct', ["products"=>$products]);
    }

    public function getAllCategories(){
        $categories = Category::All();
        return view('admin/editcategory', ["categories"=>$categories]);
    }

    public function getAllUsers(){
        $users = User::All();
        return view('admin/edituser', ["users"=>$users]);
    }
}