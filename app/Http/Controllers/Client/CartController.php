<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\model\Product\Product;
use Session;

class CartController extends Controller
{

    public function add_to_cart(Request $request)
    {
        // return $request->all();
        $product = Product::find($request->proid);
        Cart::add([
            'id' => $request->proid,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $product->product_price,
            'weight' => 550,
            'options' =>
            ['image' => $product->product_image],
            ['discount' => $product->discount],

            ]);
        //     return back();

    }

    public function isCartExist(){
        $total = Cart::subtotal();
        $data=array(
            "total" => $total,
        );
        echo json_encode($data);
    }

    public function show_cart()
    {   
        $cart = Cart::content();
        $total = Cart::subtotal();
        return view('Client.cart.cart',[
            'cart' => $cart,
            'total' => $total,
        ]);
        // return $cart;
    }

    public function delete_cart($id)
    {
        Cart::remove($id);
        return back()->with('message','item removed from cart!!');
    }

    public function update_cart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        return redirect('/show-cart')->with('message','Item updated');
    }
}
