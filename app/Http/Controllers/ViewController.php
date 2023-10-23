<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AddPage;
use App\Models\Category;
use App\Models\Product;
class ViewController extends Controller
{
    public function index(){
        return view('index');
    }
    public function pagesummary(){
        if(Auth::check()){
            $data=AddPage::paginate(2);
            return view('pagesummary',compact('data'));
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    public function addpage(){
        if(Auth::check()){
            return view('pageadd');
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    public function categorysummary(){
        if(Auth::check()){
            $catdata=Category::paginate(2); 
            return view('categorysummary',compact('catdata'));
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    public function addcategory(){
        if(Auth::check()){
            return view('categoryadd');
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    public function productsummary(){
        if(Auth::check()){
            $products = Product::with('category')->paginate(2);
            return view('productsummary',compact('products'));
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    public function productadd(){
        if(Auth::check()){
            $categories = Category::all();
            return view('productadd', compact('categories'));
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    public function changepassword(){
        if(Auth::check()){
            return view('changepassword');
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
}
