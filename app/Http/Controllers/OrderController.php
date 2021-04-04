<?php

namespace App\Http\Controllers;

use App\Models\Delivary;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.orders', get_defined_vars());
    }


    public function view($id)
    {
        $order = Order::with('products')->FindOrFail($id);
        $delivery = Delivary::where('user_id', $order->user_id)->first();
        return view('admin.orders.show', get_defined_vars());
    }

    public function payment_accept($id)
    {
           $order=Order::findOrFail($id);
           $order->update(['status'=>'1']);
        return redirect()->back()->with(['success'=>"Payment Accept"]);
    }

    public function payment_cancel($id)
    {
        $order=Order::findOrFail($id);
        if ($order){
            $order->update(['status'=>'4']);
            return redirect()->back()->with(['success'=>"Payment Cancel"]);
        }else{
            return redirect()->back()->with(['error'=>"Payment Cancel"]);

        }
    }
    public function accept_payment(){
        $orders = Order::where('status',1)->get();
        return view('admin.orders.orders', get_defined_vars());
    }
    public function cancel_payment(){
        $orders = Order::where('status',4)->get();
        return view('admin.orders.orders', get_defined_vars());
    }
    public function process_payment(){
        $orders = Order::where('status',2)->get();
        return view('admin.orders.orders', get_defined_vars());
    }
    public function success_payment(){
        $orders = Order::where('status',3)->get();
        return view('admin.orders.orders', get_defined_vars());
    }


    public function delivery_process($id)
    {
        $order=Order::findOrFail($id);
        $order->update(['status'=>2]);
        return redirect()->route('order.index')->with(['success'=>"Send To Delivery"]);

    }
    public function delivery_success($id)
    {
        $order=Order::findOrFail($id);
        $order->update(['status'=>3]);
        return redirect()->route('order.index')->with(['success'=>"Product Delivery Done"]);

    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }



    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
