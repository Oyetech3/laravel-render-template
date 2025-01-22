<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\likes;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function redirect() {
        $usertype = Auth::user()->usertype;
        if($usertype == 1) {
            return view('admin.index');
        }
        else {
            $collections = Collection::all();
            $new_products = Product::where('other', '=', 'New Arrival' )->paginate(8);
            $trending_products = Product::where('other', '=' , 'Trending Products')->paginate(8);

            return view('home.userpage', compact('collections','new_products','trending_products'));
        }
    }
    public function index() {
        $collections = Collection::all();
        $new_products = Product::where('other', '=', 'New Arrival' )->paginate(8);
        $trending_products = Product::where('other', '=' , 'Trending Products')->paginate(8);

        return view('home.userpage', compact('collections','new_products','trending_products'));
    }

    public function collections() {
        return view('home.usercollection');
    }

    public function liked_product(Request $request, $id) {
        $products = Product::find($id);
        $user = Auth::user();
        $likes = new likes();

        $likes->user_id = $user->id;
        $likes->product_id = $request->product_id;
        $likes->title = $products->title;
        $likes->description = $products->description;
        $likes->collection = $products->collection;
        $likes->naira_price = $products->naira_price;
        $likes->naira_discount = $products->naira_discount;
        $likes->dollar_price = $products->dollar_price;
        $likes->dollar_discount = $products->dollar_discount;

        $likes->save();
        
        return redirect()->back()->with(
            'message', "Product saved to liked successfully"
        );

    }
}
