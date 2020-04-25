<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Vendor\VendorAuth;
use App\model\Vendor\Brand;
use App\model\Category\Category;
use App\model\Type\Type;
use App\model\Product\Product;
use Image;

class ProductController extends Controller
{   
    // for product list-----------
    public function manage_product()
    {   
        $products = Product::all();
        return view('Admin.Product.manage_product',[
            'products' => $products
        ]);
    }

    // for add product -----------

    public function add_product()
    {   $vendors  = VendorAuth::where('activity',1)->get();
        $category = Category::where('root_id',0)->get();
    	$brands   = Brand::all();
        $types    = Type::all();
        return view('Admin.Product.add_product',[
            'vendors' => $vendors,
            'types'   => $types,
            'category'=> $category,
            'brands'  => $brands
        ]);
    }

    public function save_product(Request $request)
    {
        Product::save_product_info($request);
        return back()->with('message','product saved successfully!!');
    }

    public function product_details($id)
    {   $product       = Product::find($id);
        $colorsize     = $product->color_size;
        $productimage  = $product->productImage;
        // return $colorsize;
        // exit();
        return view('Admin.Product.product_details',[
            'product'      => $product,
            'colorsize'    => $colorsize,
            'productimage' => $productimage
        ]);
    }

    

}
