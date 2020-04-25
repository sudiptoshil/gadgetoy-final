<?php

namespace App\Http\Controllers\Vendor\order;

use App\Http\Controllers\Controller;
use App\model\Invoice\Invoice;
use Illuminate\Http\Request;
use DB;
use Session;

class OrderController extends Controller
{

    public function manageOrder(){

        $vid = Session::get('vendorid');
        $orders = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->join('vendor_auths', 'invoices.vendor_id', '=', 'vendor_auths.id')
            ->select('invoices.*', 'clients.full_name','products.product_name','orders.address')
            ->where('invoices.vendor_id',"=",$vid)
            ->where('invoices.status',"!=",1)
            ->get();
        // $vid = Session::get('vendorid');
        // $vendor_orders = invoice::where('vendor_id',"=",$vid)->get();

        return view('Vendor.Order.manage-order',[
            'orders' => $orders,
            //  'vendor_orders' => $vendor_orders
        ]);

    }


    public function acceptOrder($id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = 2;
        $invoice->save();
        return back();
    }

    public function cancelOrder($id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = 3;
        $invoice->save();
        return back();
    }




}
