<?php

namespace App\model\Product;

use Illuminate\Database\Eloquent\Model;
use Image;

class Product extends Model
{
    protected $fillable = ['category_id','brand_id','type_id','subcategory_id','vendor_id','product_name','product_description','product_price','sell_unit','product_quantity','discount','currency','product_image'];

    //Database relationship-----------------
    public function category()
    {
        return $this->belongsTo('App\model\Category\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\model\Vendor\Brand');
    }

    public function type()
    {
        return $this->belongsTo('App\model\Type\Type');
    }
    public function vendor()
    {
        return $this->belongsTo('App\model\Vendor\VendorAuth');
    }

    public function color_size()
    {
        return $this->hasMany('App\model\ColorSize\ColorSize',"product_id");
    }

    public function productImage()
    {
        return $this->hasMany('App\model\ProductImage\ProductImage',"product_id");
    }

    // for save product
    public static function save_product_info($request)
    {
        $request->validate([

            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             $image     =$request->file('product_image');
             $imageName =$image->getClientOriginalName();
             $directory ='product_image/';
             $img = Image::make($image)->save($directory.$imageName)->resize(50, 50);
             $product   = new Product();
             $product->type_id                = $request->type_id;
             $product->category_id            = $request->category_id;
             $product->product_image          = $directory.$imageName;
             if ($request->cat_level_three) {
                $product->subcategory_id      = $request->cat_level_three;
             }
             elseif ($request->cat_level_two) {
                $product->subcategory_id      = $request->cat_level_two;
             }
             else {
                $product->subcategory_id      = $request->cat_level_one;
             }

             $product->brand_id               = $request->brand_id;
             $product->type_id                = $request->type_id;
             $product->vendor_id              = $request->vendor_id;
             $product->product_name           = $request->product_name;
             $product->product_description    = $request->product_description;
             $product->product_price          = $request->product_price;
             $product->sell_unit              = $request->sell_unit;
             $product->product_quantity       = $request->product_quantity;
             $product->discount               = $request->discount;
             $product->currency               = $request->currency;
            //  $product->sell_status            = $request->sell_status;
            //  $product->status                 = $request->status;
             $product->save();
    }
}
