<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
  public function index(){
      $coupons=Coupon::paginate(10);
      return view('admin.coupons.show',get_defined_vars());
  }
  public function store(CouponRequest $request){
      Coupon::create($request->all());
      return redirect()->back()->with(['success'=>'Add Coupon Successfully']);
  }
  public function update(CouponRequest $request){
      $id=$request->id;
      $coupons =Coupon::findOrFail($id);
      $coupons->update($request->all());
      return redirect()->back()->with(['success'=>'Update Coupon Successfully']);


  }
    public function destroy(Request $request){
        $id=$request->id;
        $coupons =Coupon::findOrFail($id);
        $coupons->delete();
        return redirect()->back()->with(['success'=>'Delete Coupon Successfully']);
    }
    public function apply_coupon(Request $request){

      $coupon=$request->coupon;
      $total=$request->total;
      $coupons=Coupon::where('name',$coupon)->first();
      if(!$coupon){
          return redirect()->back()->with(['error'=>'Coupon Not Found']);
      }else{
          Session::put('coupon',[
              'name'=>$coupons->name,
              'discount'=>$coupons->discount,
              'balance'=>$total- $coupons->discount
          ]);
          return redirect()->back()->with(['success'=>'Coupon Added']);
      }
    }
    public function remove_coupon(){
      Session::forget('coupon');
        return redirect()->back()->with(['success'=>'Coupon Removed']);

    }
}
