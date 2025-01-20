<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admindashboard() {
        return view('admin.index');
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

            // Process image uploads
            $imageone = $request->file('image1');
            $imagetwo = $request->file('image2');
            $imagethree = $request->file('image3');

            $imagename1 = time() . '_1.' . $imageone->getClientOriginalExtension();
            $imagename2 = time() . '_2.' . $imagetwo->getClientOriginalExtension();
            $imagename3 = time() . '_3.' . $imagethree->getClientOriginalExtension();

            // Save images in the public 'images' directory
            $imageone->move(public_path('images'), $imagename1);
            $imagetwo->move(public_path('images'), $imagename2);
            $imagethree->move(public_path('images'), $imagename3);

            // Save image names in the database
            $collection->imageone = $imagename1;
            $collection->imagetwo = $imagename2;
            $collection->imagethree = $imagename3;

            $collection->save();

            return redirect()->back()->with('message', 'Collection Added Successfully');

    }

    public function delete_collection($id) {
        $collection = Collection::find($id);
        $collection->delete();

        return redirect()->back()->with('message', 'Collection deleted successfully');
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
