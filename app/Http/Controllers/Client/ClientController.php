<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use App\model\Category\Category;
use App\model\Client\Order;
use App\model\Product\Product;
use App\model\Vendor\Brand;
use App\ProductReview;
use Illuminate\Http\Request;
use Cart;
use Session;
use DB;
use Image;

class ClientController extends Controller
{
    public function index()
    {
        $categories = Category::where('root_id',0)->get();
        $products = Product::take(8)->orderBy('id','desc')->get();
        $carouselProducts = Product::all()->random(6);
        $carouselProducts2 = Product::all()->random(6);
        $carouselProducts3 = Product::all()->random(6);

        return view('Client.Home.home')->with([
            'categories'=>$categories,
            'products'=>$products,
            'carouselProducts'=>$carouselProducts,
            'carouselProducts2'=>$carouselProducts2,
            'carouselProducts3'=>$carouselProducts3,

        ]);



    }


    public function subCategory($id){

        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::with('category')->where('category_id',$id)->get();
        return view('Client.category.sub-category')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function productDetails($id,$category_id){

        $products = Product::with('category')
            ->where('category_id',$category_id)
            ->where('id','!=',$id)
            ->take(4)->get();

        $product = Product::find($id);


        $reviews = DB::table('product_reviews')

            ->join('products','product_reviews.product_id','=','products.id')
            ->join('clients','clients.id','=','product_reviews.client_id')
            ->select('product_reviews.*','clients.full_name')
            ->where('product_reviews.product_id',$product->id)
            ->get();

        return view('Client.product.details.product')->with([
            'product' => $product,
            'products' => $products,
            'reviews' => $reviews
        ]);
    }



    public function about(){
        return view('Client.about.about');
    }


    public function contactUs(){
        return view('Client.contact-us.contact');
    }

    public function newsFeed(){
        return view('Client.news-feed.feed');
    }

    public function editProfile()
    {
        return view('Client.profile.edit-profile');
    }

    public function updateProfile(Request $request){
        Client::updateProfile($request);
        return redirect('/client/profile')->with('message','Profile updated successfully!!');
    }

    public function orderList(){
        $uid = Session::get('client_id');
        $orders = DB::table('orders')

            ->join('clients','clients.id','=','orders.client_id')
            ->where('orders.client_id',$uid)
            ->select('clients.*','orders.*')
            ->get();
        return view('Client.profile.order-list',[
            'orders'=>$orders
        ]);

    }

    public function orderList2($id){
        $uid = Session::get('client_id');
        $invoices = DB::table('invoices')
            ->join('orders','invoices.order_id','=','orders.id')
            ->join('products','invoices.product_id','=','products.id')
            ->select('invoices.*','products.product_name','products.product_description')
            ->where('invoices.status',$id)
            ->where('orders.client_id',$uid)
            ->get();

        return view('Client.profile.order-list2',[
            'order' => Order::find($id),
            'invoices' => $invoices
        ]);
    }

    public function orderDetails($id){
        $invoices = DB::table('invoices')
            ->join('orders','invoices.order_id','=','orders.id')
            ->join('products','invoices.product_id','=','products.id')
            ->select('invoices.*','products.product_name','products.product_description')
            ->where('invoices.order_id',$id)
            ->get();

        return view('Client.profile.order-details',[
            'order' => Order::find($id),
            'invoices' => $invoices
        ]);
    }

    public function productReview(Request $request){

        $this->validate($request, [
            'image' => 'required',
            'description' => 'required',
            'rating' => 'required'
        ]);


        $productImage = $request->file('image');
        $imageName    = $productImage->getClientOriginalName();
        $directory    = 'review-images/';
        //$productImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;
        $productImage->move($directory,$imageName);


        //$product = product::find($request->product_id);
        $product = new ProductReview();
        $product->product_id = $request->product_id;
        $product->client_id = $request->client_id;
        $product->description = $request->description;
        $product->image = $imageUrl;
        $product->rating = $request->rating;
        $product->save();
        return back()->with('message','Review submitted successfully');

    }






}
