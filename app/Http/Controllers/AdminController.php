<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function admindashboard() {
        if(Auth::id()) {
            return view('admin.index');
        }
        else {
            return view('home.userpage');
        }

    }

    public function collection() {
        $collections = Collection::all();

        return view('admin.collection', compact('collections'));
    }

    public function add_collection(Request $request) {
            // Validate inputs
            $request->validate([
                'collection_name' => 'required|string|max:255',
                'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Create a new collection
            $collection = new Collection();
            $collection->collection_name = $request->collection_name;

            if ($request->hasFile('image1')) {
                $image = $request->file('image1');
                $imageone = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $path = $image->storeAs('images', $imageone, 'public');
                $collection->imageone = $imageone;
            }

            if ($request->hasFile('image2')) {
                $image = $request->file('image2');
                $imagetwo = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $path = $image->storeAs('images', $imagetwo, 'public');
                $collection->imagetwo = $imagetwo;
            }

            if ($request->hasFile('image3')) {
                $image = $request->file('image3');
                $imagethree = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $path = $image->storeAs('images', $imagethree, 'public');
                $collection->imagethree = $imagethree;
            }

            // Process image uploads
            // $imageone = $request->file('image1');
            // $imagetwo = $request->file('image2');
            // $imagethree = $request->file('image3');

            // $imagename1 = time() . '_1.' . $imageone->getClientOriginalExtension();
            // $imagename2 = time() . '_2.' . $imagetwo->getClientOriginalExtension();
            // $imagename3 = time() . '_3.' . $imagethree->getClientOriginalExtension();

            // // Save images in the public 'images' directory
            // $imageone->move(public_path('images'), $imagename1);
            // $imagetwo->move(public_path('images'), $imagename2);
            // $imagethree->move(public_path('images'), $imagename3);

            // // Save image names in the database
            // $collection->imageone = $imagename1;
            // $collection->imagetwo = $imagename2;
            // $collection->imagethree = $imagename3;

            $collection->save();

            return redirect()->back()->with('message', 'Collection Added Successfully');

    }

    public function delete_collection($id) {
        $collection = Collection::find($id);
        $collection->delete();

        return redirect()->back()->with('message', 'Collection deleted successfully');
    }

    public function add_products() {
        $collections = Collection::all();

        return view('admin.add_products', compact('collections'));
    }

    public function add_product(Request $request) {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();

        $product->title = $request->title;
        $product->collection = $request->collection;
        $product->naira_price = $request->naira_price;
        $product->naira_discount = $request->naira_discount;
        $product->dollar_price = $request->dollar_price;
        $product->dollar_discount = $request->dollar_discount;
        $product->other = $request->other;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('images', $imagename, 'public');
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with(
            'message', "Product has been added successfully"
        );
    }

    public function view_products() {
        $products = Product::all();
        return view('admin.view_products', compact('products'));
    }

    public function delete_product($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with(
            'message', 'Product deleted successfully'
        );
    }

    public function edit_product($id) {
        $product = Product::find($id);
        $collections = Collection::all();

        return view('admin.edit_product', compact('product','collections'));
    }

    public function confirm_edit(Request $request, $id) {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->collection = $request->collection;
        $product->naira_price = $request->naira_price;
        $product->naira_discount = $request->naira_discount;
        $product->dollar_price = $request->dollar_price;
        $product->dollar_discount = $request->dollar_discount;
        $product->other = $request->other;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('images', $imagename, 'public');
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with(
            'message', 'Product Updated Successfully'
        );

    }

    public function cards() {
        return view('admin.cards');
    }
    public function charts() {
        return view('admin.charts');
    }
    public function tables() {
        return view('admin.tables');
    }
}
