<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\model\Client\Order;
use App\model\Invoice\Invoice;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{

    public function manageOrder()
    {

        $orders = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->select('orders.*', 'clients.full_name', 'clients.contact_no')
            ->orderBy('id','desc')
            // ->where('invoice.vendor_id',"=",$vid)
            ->get();
        // $vid = Session::get('vendorid');
        // $vendor_orders = invoice::where('vendor_id',"=",$vid)->get();





        return view('Admin.Orders.manage-orders',[
            'orders'=> $orders
        ]);
    }

    public function orderDetails($id){
        $orders = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->join('vendor_auths', 'invoices.vendor_id', '=', 'vendor_auths.id')
            ->select('invoices.*', 'clients.full_name','products.product_name','vendor_auths.vendor_name','vendor_auths.phone')
            ->where('invoices.order_id',$id)
            ->get();

        // echo "</pre>";
        // print_r($orders);
        // exit();


        /*if ($orders->status==3){
            $order = Order::where('id',$id);
            $order->delivery_status = 3;
        }*/

        return view('Admin.Orders.order-details',[
            'orders' => $orders
        ]);
    }

    public function acceptOrder($id){
        /*DB::table('invoices')
            ->where('id', $id)
            ->update(['status'=> 2]);
        return back();*/

        $invoice = Invoice::find($id);
        $invoice->status = 4;
        $invoice->save();
        return back();
    }

    public function deleteSingleOrder($id){
        /*DB::table('invoices')
            ->where('id', $id)
            ->update(['status'=> 2]);
        return back();*/

        $invoice = Invoice::find($id);
        $invoice->delete();
        return back();
    }

    public function deleteOrder($id){
        /*DB::table('invoices')
            ->where('id', $id)
            ->update(['status'=> 2]);
        return back();*/

        $orders = Order::find($id);
        $orders->delete();

        $invoice = Invoice::where('order_id',$id);
        $invoice->delete();
        return back();
    }

}
