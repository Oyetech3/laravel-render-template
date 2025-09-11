<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Cloudinary\Cloudinary;
use Exception;
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

    private $cloudinary;

    public function __construct()
    {
        // Initialize Cloudinary once
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ]
        ]);
    }

    public function add_collection(Request $request) {
            // Validate inputs
            $request->validate([
                'collection_name' => 'required|string|max:255',
                'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            try {
                // Create collection
                $collection = new Collection();
                $collection->collection_name = $request->collection_name;

                // Define image mappings
                $imageFields = [
                    'image1' => 'imageone',
                    'image2' => 'imagetwo',
                    'image3' => 'imagethree',
                ];

                // Upload all images
                foreach ($imageFields as $inputName => $dbField) {
                    if ($request->hasFile($inputName)) {
                        $publicId = $this->uploadToCloudinary($request->file($inputName));
                        $collection->$dbField = $publicId;
                    }
                }

                $collection->save();

                return redirect()->back()->with('message', 'Collection Added Successfully');

            } catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => 'Failed to create collection: ' . $e->getMessage()]);
            }

            // if ($request->hasFile('image3')) {
            //     $image = $request->file('image3');
            //     $imagethree = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            //     $path = $image->storeAs('images', $imagethree, 'public');
            //     $collection->imagethree = $imagethree;
            // }

            // $collection->save();

            // return redirect()->back()->with('message', 'Collection Added Successfully');

    }

    private function uploadToCloudinary($file)
    {
        $result = $this->cloudinary->uploadApi()->upload($file->getRealPath(), [
            'folder' => 'mutmine_collections',
            'public_id' => 'collection_' . time() . '_' . uniqid(),
            'transformation' => [
                'width' => 800,
                'height' => 800,
                'crop' => 'fill',
                'quality' => 'auto',
                'format' => 'webp' // Convert to WebP for better performance
            ]
        ]);

        return $result['public_id'];
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
            try {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => config('services.cloudinary.cloud_name'),
                        'api_key' => config('services.cloudinary.api_key'),
                        'api_secret' => config('services.cloudinary.api_secret'),
                    ]
                ]);

                $uploadedFile = $request->file('image');
                $result = $cloudinary->uploadApi()->upload($uploadedFile->getRealPath(), [
                    'folder' => 'mutmine_beads',
                    'public_id' => 'product_' . time() . '_' . uniqid(),
                    'transformation' => [
                        'width' => 800,
                        'height' => 800,
                        'crop' => 'fill',
                        'quality' => 'auto'
                    ]
                ]);

                $product->image = $result['public_id'];

            } catch (Exception $e) {
                return redirect()->back()->withErrors(['image' => 'Failed to upload image. Please try again.']);
            }
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
            try {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => config('services.cloudinary.cloud_name'),
                        'api_key' => config('services.cloudinary.api_key'),
                        'api_secret' => config('services.cloudinary.api_secret'),
                    ]
                ]);

                $uploadedFile = $request->file('image');
                $result = $cloudinary->uploadApi()->upload($uploadedFile->getRealPath(), [
                    'folder' => 'mutmine_beads',
                    'public_id' => 'product_' . time() . '_' . uniqid(),
                    'transformation' => [
                        'width' => 800,
                        'height' => 800,
                        'crop' => 'fill',
                        'quality' => 'auto'
                    ]
                ]);

                $product->image = $result['public_id'];

            } catch (Exception $e) {
                return redirect()->back()->withErrors(['image' => 'Failed to upload image. Please try again.']);
            }
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
