<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{   

    public function index()
    {
        $product_to_check = Product::where('is_accepted', null)->first();
        $products = Product::orderBy('created_at', 'Desc')->get();
        return view('revisor.index', compact('product_to_check', 'products'));

    }


    public function acceptProduct(Product $product)
    {
        $product->setAccepted(true);

        return redirect()->Route('revisor.index')->with('message', 'Complimenti Prodotto Accettato');
    }

    public function rejectProduct(Product $product)
    {
        $product->setAccepted(false);

        return redirect()->Route('revisor.index')->with('message', 'Prodotto Rifiutato');
    }

    public function resetProduct(Product $product)
    {
        $product->setAccepted(null);

        return redirect()->Route('revisor.index')->with('message', 'Prodotto Rifiutato');
    }
    
    public function becomeRevisor(User $user){

        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Complimenti hai richiesto di diventare revisore correttamente');

    }

    public function makeRevisor(User $user){

        Artisan::call('presto:makeUserRevisor',["email"=>$user->email]);
        return redirect('/')->with('message', 'complimenti sei diventato revisore');

    }

    public function becomeWorker(){

        return view('become-worker');

    }

    public function reviseProduct(Product $product){

        return view('revisor.show', compact('product'));
    }
}
