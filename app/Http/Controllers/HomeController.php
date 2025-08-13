<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\Collection;
use App\Models\likes;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

            if(Auth::id()) {
                $id = Auth::user()->id;
                $totalcart = carts::where('user_id', '=', $id)->count();

                $liked = likes::where('user_id', '=', $id)->pluck('product_id');
            } else {
                $totalcart = 0;
                $liked = collect();
            }


            return view('home.userpage', compact('collections','new_products','trending_products','totalcart','liked'));
        }
    }
    public function index() {
        $collections = Collection::all();
        $new_products = Product::where('other', '=', 'New Arrival' )->paginate(8);
        $trending_products = Product::where('other', '=' , 'Trending Products')->paginate(8);

        if(Auth::id()) {
            $id = Auth::user()->id;
            $totalcart = carts::where('user_id', '=', $id)->count();

            $liked = likes::where('user_id', '=', $id)->pluck('product_id');
        }
        else {
            $totalcart = 0;
            $liked = collect();
        }

        return view('home.userpage', compact('collections','new_products','trending_products','totalcart','liked'));
    }

    public function collections() {
        $collections = Collection::all();

        if(Auth::id()) {
            $id = Auth::user()->id;
            $totalcart = carts::where('user_id', '=', $id)->count();
        }
        else {
            $totalcart = 0;
        }
        return view('home.usercollection',compact('collections', 'totalcart'));
    }

    public function liked_product(Request $request, $id) {
        $products = Product::find($id);
        $user = Auth::user();
        $likes = new likes();

        if(Auth::id()) {
            $likes->user_id = $user->id;
            $likes->product_id = $request->product_id;
            $likes->title = $products->title;
            $likes->description = $products->description;
            $likes->collection = $products->collection;
            $likes->naira_price = $products->naira_price;
            $likes->naira_discount = $products->naira_discount;
            $likes->dollar_price = $products->dollar_price;
            $likes->dollar_discount = $products->dollar_discount;
            $likes->image = $products->image;

            $likes->save();

            return redirect()->back()->with(
                'message', "Product saved to liked successfully"
            );
        }
        else {
            return redirect('login');
        }

    }

    public function add_to_cart(Request $request, $id) {
        $products = Product::find($id);
        $user = Auth::user();
        $carts = new carts();

        if(Auth::id()) {
            $carts->user_id = $user->id;
            $carts->product_id = $request->product_id;
            $carts->title = $products->title;
            $carts->description = $products->description;
            $carts->collection = $products->collection;
            //$carts->naira_price = $products->naira_price;
            //$carts->naira_discount = $products->naira_discount;
            $carts->dollar_price = $products->dollar_price;
            $carts->dollar_discount = $products->dollar_discount;
            $carts->image = $products->image;

            if($products->naira_discount != null) {
                $carts->naira_price = $products->naira_discount;
            }
            else {
                $carts->naira_price = $products->naira_price;
            }

            $carts->save();

            return redirect()->back()->with(
                'message', "Product added to carts successfully"
            );
        }
        else {
            return redirect('login');
        }


    }

    public function add_to(Request $request, $id) {
        $products = likes::find($id);
        $user = Auth::user();
        $carts = new carts();

        $carts->user_id = $user->id;
        $carts->product_id = $request->product_id;
        $carts->title = $products->title;
        $carts->description = $products->description;
        $carts->collection = $products->collection;
        //$carts->naira_price = $products->naira_price;
        //$carts->naira_discount = $products->naira_discount;
        $carts->dollar_price = $products->dollar_price;
        $carts->dollar_discount = $products->dollar_discount;
        $carts->image = $products->image;

         if($products->naira_discount != null) {
            $carts->naira_price = $products->naira_discount;
        }
        else {
            $carts->naira_price = $products->naira_price;
        }

        $carts->save();

        return redirect()->back()->with(
            'message', "Product added to carts successfully"
        );
    }

    public function update_quantity(Request $request, $id) {
        $carts = carts::find($id);
        $carts->quantity = $request->quantity;

        $carts->save();

        return redirect()->back();
    }

    public function delete_cart($id) {
        $cart = carts::find($id);
        $cart->delete();

        return redirect()->back()->with(
            'message', 'Cart removed successfully'
        );
    }

    public function delete_like($id) {
        $like = likes::find($id);
        $like->delete();

        return redirect()->back()->with(
            'message', 'Product removed from liked'
        );
    }

    public function delete($id) {
        $like = likes::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($like) {
            $like->delete();
            return redirect()->back()->with('message', 'Product removed from liked.');
        }

        return redirect()->back()->with('error', 'Like not found.');
    }

    public function liked() {
        if(Auth::id()) {
            $id = Auth::user()->id;
            $like = likes::where('user_id', '=', $id)->get();
            $totalcart = carts::where('user_id', '=', $id)->count();

            Log::info('Memory before heavy operation: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB');

            return view('home.userlikes', compact('like','totalcart'));
        }
        else {
            return redirect('login');
        }
    }

    public function carts() {
        if(Auth::id()) {
            $id = Auth::user()->id;
            $cart = carts::where('user_id', '=', $id)->get();
            $totalcart = carts::where('user_id', '=', $id)->count();
            Log::info('Memory after heavy operation: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB');
            return view('home.usercarts', compact('cart','totalcart'));
        }
        else {
            return redirect('login');
        }
    }

    public function products() {
        $products = Product::paginate(12);
        $collections = Collection::all();

        if(Auth::id()) {
            $id = Auth::user()->id;
            $totalcart = carts::where('user_id', '=', $id)->count();

            $liked = likes::where('user_id', '=', $id)->pluck('product_id');
        }
        else {
            $totalcart = 0;
            $liked = collect();
        }

        return view('home.userproducts', compact('products', 'collections', 'totalcart', 'liked'));
    }

    public function services() {

        if(Auth::id()) {
            $id = Auth::user()->id;
            $totalcart = carts::where('user_id', '=', $id)->count();
            $liked = likes::where('user_id', '=', $id)->pluck('product_id');

            Log::info('Memory before heavy operation: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB');

        }
        else {
            Log::info('Memory before heavy operation: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB');
            $totalcart = 0;
            $liked = collect();
        }

        return view('home.services', compact('totalcart', 'liked'));
    }

    public function contact() {
        if(Auth::id()) {
            $id = Auth::user()->id;
            $totalcart = carts::where('user_id', '=', $id)->count();
            $liked = likes::where('user_id', '=', $id)->pluck('product_id');

            Log::info('Memory before heavy operation: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB');

        }
        else {
            $totalcart = 0;
            $liked = collect();

            Log::info('Memory before heavy operation: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB');
        }

        return view('home.contact', compact('totalcart', 'liked'));
    }
}
