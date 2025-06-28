<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\DataTables\ProductLicenceKeyDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductLicenceKey;
use App\Models\ProductAttribute;
use Str;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:200'],
            // 'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max: 600'],
            'long_description' => ['required'],
            'seo_title' => ['nullable','max:200'],
            'seo_description' => ['nullable','max:250'],
            'status' => ['required'],
            'book_sample' => ['nullable', 'mimes:pdf', 'max:10000'] // max 10MB
        ]);

        /** Handle the image upload */
        $imagePath = $this->uploadImage($request, 'image', 'uploads');



        $product = new Product();

                    // Handle PDF upload
    if($request->hasFile('book_sample')){
        $pdf = $request->book_sample;
        $pdfPath = $pdf->store('uploads/book-samples', 'public');
        $product->book_sample = $pdfPath;
    }
        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->is_approved = 1;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->android_desc = $request->android_desc;
        $product->ios_desc = $request->ios_desc;
        $product->product_key = $request->product_key;
        $product->coin_price = $request->coin_price;
        $product->referral_points_max_use = $request->referral_points_max_use;
        // $product->app_store_link = $request->app_store_link;
        // $product->play_store_link = $request->play_store_link;
        $product->save();

        //     $platforms = [
        //     'android' => ['a', 'b', 'c'],
        //     'ios' => ['a', 'b', 'c', 'd', 'e', 'f'],
        //   ];

        // $textAttributes = [
        //     'heading' => 'text',
        // ];

        // foreach ($platforms as $platform => $features) {
        //     // Heading
        //     $field = "best_protectIon_{$platform}_heading";
        //     $textAttributes[$field] = 'text';

        //     // Features
        //     foreach ($features as $feature) {
        //         $textAttributes["best_protectIon_{$platform}__{$feature}_title"] = 'text';
        //         $textAttributes["best_protectIon_{$platform}__{$feature}_desc"] = 'html';
        //     }
        // }

        

        // foreach ($textAttributes as $field => $type) {
        //     if ($request->filled($field)) {
        //         ProductAttribute::create([
        //             'product_id' => $product->id,
        //             'name' => $field,
        //             'type' => $type,
        //             'value' => $request->input($field),
        //         ]);
        //     }
        // }

        // Define platforms and features
            $platforms = [
                'android' => ['a', 'b', 'c'],
                'ios' => ['a', 'b', 'c', 'd', 'e', 'f'],
            ];

            // Init text fields
            $textAttributes = [];

            // Best Protection
            foreach ($platforms as $platform => $features) {
                $textAttributes["best_protectIon_{$platform}_heading"] = 'text';
                foreach ($features as $feature) {
                    $textAttributes["best_protectIon_{$platform}__{$feature}_title"] = 'text';
                    $textAttributes["best_protectIon_{$platform}__{$feature}_desc"] = 'html';
                }
            }

            // ✅ Add Cyber-Security fields
            foreach ($platforms as $platform => $features) {
                $textAttributes["cyber_security_title_{$platform}"] = 'text';
                foreach ($features as $feature) {
                    $textAttributes["cyber_security_{$platform}_{$feature}_title"] = 'text';
                    $textAttributes["cyber_security_{$platform}_{$feature}_desc"] = 'html';
                }
            }
            
            // ✅ Add Footer Product Info (Single Feature)
            $textAttributes["footer_main_title_product"] = 'text';
            $textAttributes["footer_sub_title_product"] = 'text';
            $textAttributes["footer_desc_product"] = 'html';

            // Save text/html fields
            foreach ($textAttributes as $field => $type) {
                if ($request->filled($field)) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'name' => $field,
                        'type' => $type,
                        'value' => $request->input($field),
                    ]);
                }
            }

        // ✅ Add System Requirements fields
            $systemReqPlatforms = ['android', 'ios'];
            foreach ($systemReqPlatforms as $platform) {
                $textAttributes["system_req_title_{$platform}"] = 'text';
                $textAttributes["system_req_operating_system_{$platform}"] = 'text';
                $textAttributes["system_req_desc_{$platform}"] = 'html';
            }

            // ✅ Store text/html attributes
            foreach ($textAttributes as $field => $type) {
                if ($request->filled($field)) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'name' => $field,
                        'type' => $type,
                        'value' => $request->input($field),
                    ]);
                }
            }
        // Image fields
        foreach ($platforms as $platform => $features) {
            foreach ($features as $feature) {
                $field = "best_protectIon_{$platform}_icon_{$feature}";
                if ($request->hasFile($field)) {
                    $path = $this->uploadImage($request, $field, 'uploads');
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'name' => $field,
                        'type' => 'image',
                        'value' => $path,
                    ]);
                }
            }
        }


        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function keys(string $id) {
        
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        $childCategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        $attributes = ProductAttribute::where('product_id', $product->id)->pluck('value', 'name')->toArray();
     ///   return $attributes;
        return view('admin.product.edit', compact('attributes','product', 'categories', 'brands', 'subCategories', 'childCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:200'],
            // 'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max: 600'],
            'long_description' => ['required'],
            'seo_title' => ['nullable','max:200'],
            'seo_description' => ['nullable','max:250'],
            'status' => ['required']
        ]);
        $product = Product::findOrFail($id);
        /** Handle the image upload */
        $imagePath = $this->updateImage($request, 'image', 'uploads', $product->thumb_image);

        $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->android_desc = $request->android_desc;
        $product->ios_desc = $request->ios_desc;
        $product->product_key = $request->product_key;
        $product->coin_price = $request->coin_price;
        $product->referral_points_max_use = $request->referral_points_max_use;
        // $product->app_store_link = $request->app_store_link;
        // $product->play_store_link = $request->play_store_link;
        $product->save();

         // ✅ Platforms & Features
        $platforms = [
            'android' => ['a', 'b', 'c'],
            'ios' => ['a', 'b', 'c', 'd', 'e', 'f'],
        ];
          $textAttributes = [];
             // Best Protection & Cyber Security Attributes
        foreach ($platforms as $platform => $features) {
            $textAttributes["best_protectIon_{$platform}_heading"] = 'text';
            $textAttributes["cyber_security_title_{$platform}"] = 'text';

            foreach ($features as $feature) {
                // Best Protection
                $textAttributes["best_protectIon_{$platform}__{$feature}_title"] = 'text';
                $textAttributes["best_protectIon_{$platform}__{$feature}_desc"] = 'html';

                // Cyber Security
                $textAttributes["cyber_security_{$platform}_{$feature}_title"] = 'text';
                $textAttributes["cyber_security_{$platform}_{$feature}_desc"] = 'html';
            }
        }
        // Footer Product Info
        $textAttributes["footer_main_title_product"] = 'text';
        $textAttributes["footer_sub_title_product"] = 'text';
        $textAttributes["footer_desc_product"] = 'html';

         // System Requirements
        foreach (['android', 'ios'] as $platform) {
            $textAttributes["system_req_title_{$platform}"] = 'text';
            $textAttributes["system_req_operating_system_{$platform}"] = 'text';
            $textAttributes["system_req_desc_{$platform}"] = 'html';
        }
           // ✅ Sync Attributes
            $existingAttributes = $product->attributes()->pluck('id', 'name')->toArray();

            foreach ($textAttributes as $field => $type) {
                if ($request->filled($field)) {
                    $data = [
                        'product_id' => $product->id,
                        'name' => $field,
                        'type' => $type,
                        'value' => $request->input($field),
                    ];

                    if (isset($existingAttributes[$field])) {
                        ProductAttribute::where('id', $existingAttributes[$field])->update($data);
                        unset($existingAttributes[$field]);
                    } else {
                        ProductAttribute::create($data);
                    }
                }
            }
            // ✅ Handle image attributes
            foreach ($platforms as $platform => $features) {
                foreach ($features as $feature) {
                    $field = "best_protectIon_{$platform}_icon_{$feature}";
                    if ($request->hasFile($field)) {
                        $path = $this->uploadImage($request, $field, 'uploads');

                        $data = [
                            'product_id' => $product->id,
                            'name' => $field,
                            'type' => 'image',
                            'value' => $path,
                        ];

                        if (isset($existingAttributes[$field])) {
                            ProductAttribute::where('id', $existingAttributes[$field])->update($data);
                            unset($existingAttributes[$field]);
                        } else {
                            ProductAttribute::create($data);
                        }
                    }
                }
            }  

            //  if (!empty($existingAttributes)) {
            //     ProductAttribute::whereIn('id', array_values($existingAttributes))->delete();
            // }

        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if(OrderProduct::where('product_id',$product->id)->count() > 0){
            return response(['status' => 'error', 'message' => 'This product have orders can\'t delete it.']);
        }

        /** Delte the main product image */
        $this->deleteImage($product->thumb_image);

        /** Delete product gallery images */
        $galleryImages = ProductImageGallery::where('product_id', $product->id)->get();
        foreach($galleryImages as $image){
            $this->deleteImage($image->image);
            $image->delete();
        }

        /** Delete product variants if exist */
        $variants = ProductVariant::where('product_id', $product->id)->get();

        foreach($variants as $variant){
            $variant->productVariantItems()->delete();
            $variant->delete();
        }

        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();

        return response(['message' => 'Status has been updated!']);
    }

    /**
     * Get all product sub categores
     */

    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();

        return $subCategories;
    }

    public function getChildCategories(Request $request)
    {
        $childCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return $childCategories;
    }

 
    public function productKeys(Request $request , $id , ProductLicenceKeyDataTable $dataTable) {
 
        if ($request->method() == 'POST') {
            
             $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = fopen($request->file('csv_file'), 'r');
        $header = fgetcsv($file); // skip header

        while ($row = fgetcsv($file)) {
            ProductLicenceKey::create([
                'sr_no' => $row[0],
                'product_key' => $row[1],
                'assigned' => 'N',
                'assigned_user' => null,
                'product_id' => $id,
            ]);
        }

        fclose($file);

        return redirect()->back()->with('success', 'CSV imported successfully.');
        }




        // return view('admin.product.keys', [
        //     'product' => Product::findOrFail($id),
        // ]);

         $pendingKeysCount = ProductLicenceKey::whereNull('assigned_user')->where('product_id', $id)->count();

        return $dataTable->render('admin.product.keys', compact('pendingKeysCount'));

    }


    public function product_key_edit(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                'sr_no' => 'required|unique:product_licence_keys,sr_no,' . $id,
                'product_key' => 'required',
            ]);
            $productKey = ProductLicenceKey::findOrFail($id);
            $productKey->sr_no = $request->sr_no;
            $productKey->product_key = $request->product_key;
            $productKey->save();    
            return redirect()->back()->with('success', 'Product key updated successfully.');
        }
        $productKey = ProductLicenceKey::findOrFail($id);
        return view('admin.product.key-edit', compact('productKey'));
        
    }

    public function product_key_delete($id)
    {
        $productKey = ProductLicenceKey::findOrFail($id);
        $productKey->delete();
        return redirect()->back()->with('success', 'Product key deleted successfully.');
        
    }

}