<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home () {

        $products = Product::where('is_accepted', true)->get()->sortByDesc('created_at')->take(6);
        return view('welcome', compact('products'));
    }

    public function searchProducts(Request $request)
    {
       $products=Product::search($request->searched)->where('is_accepted',true)->paginate(10);
       return view('products.index', compact('products'));
    }

    public function setLanguage($lang){

        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function contactTeam(){
        return view('contact-team');
    }

}
