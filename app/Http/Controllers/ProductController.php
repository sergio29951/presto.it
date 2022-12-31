<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function CreateProduct(){

        return view('products.create');
    }

    public function categoryShow(Category $category ) {

        return view('categoryShow', compact('category'));
    }

    public function showProducts(Product $product){

        return view('products.show', compact('product'));
    }

    public function indexProducts(){

        $products = Product::where('is_accepted', true)->paginate(6);
        return view('products.index', compact('products'));
    }
}
