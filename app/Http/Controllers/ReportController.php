<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
   public function order_today(){
       $orders=Order::where('status',0)->whereDate('created_at',Carbon::today())->get();
       return view('admin.reports.order_today',get_defined_vars());
   }
    public function delivery_today(){
        $orders=Order::where('status',3)->whereDate('created_at',Carbon::today())->get();
        return view('admin.reports.delivery_today',get_defined_vars());
    }
    public function this_month(){

        $orders=Order::where('status',3)->whereMonth('created_at',Carbon::now()->month)->get();
        return view('admin.reports.this_month',get_defined_vars());
    }
    public function order_search(){
       return view('admin.reports.search');
    }
    public function search_by_year(Request $request){
        $orders=Order::where('status',3)->whereYear('created_at',$request->year)->get();
         $total=$orders->sum('total_price');
        return view('admin.reports.search_month',get_defined_vars());
    }
    public function search_by_month(Request $request){
       $orders=Order::where('status',3)->whereMonth('created_at',$request->month)->get();
        $total=$orders->sum('total_price');
        return view('admin.reports.search_month',get_defined_vars());
    }
    public function search_by_day(Request $request){
       $orders=Order::where('status',3)->whereDate('created_at',$request->day)->get();
        $total=$orders->sum('total_price');
        return view('admin.reports.search_day',get_defined_vars());

    }
}
