<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function getAllCategories(){

        $categories = Category::All();
        return view('category.index', ["categories"=>$categories]);
    }

    public function getCrossUpSellProducts(){

        $categories = Category::Where('category', '!=category')and('price' < 'price');
        return view('category.index', ["categories"=>$categories]);
    }

}
