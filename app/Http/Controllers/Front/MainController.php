<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\DelivaryAddressRequest;
use App\Http\Requests\Front\RegisterRequest;
use App\Http\Requests\ProductReq;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Delivary;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class MainController extends Controller
{
    public function getHome()
    {
        $categories = Category::select('name','id')->get();
        $newProducts = Products::orderBy('id','desc')->get();
        return view('webSite.index', get_defined_vars());
    }
    public function getCat(Request $request)
    {
        $categories = Category::all();
        $products = Products::where('stock', '>', 0)->when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(6);

        return view('webSite.categories', compact('categories', 'products'));
    }
    public function getCatWithID($id)
    {
        $categories = Category::select('name', 'id')->get();

        $products = Products::where('subCategory_id', $id)->where('stock', '>', 0)->paginate(8);
        return view('webSite.categories', compact('products', 'categories'));
    }
    public function getDetailsPage($id)
    {
        $products = Products::where('id', $id)->first();
        $productsAllImage = Products::where('id', $id)->select('id')->get();
        return view('webSite.shop_details', compact('productsAllImage', 'products'));
    }

    public function AddCart(Request $request, $id)
    {

        $product = Products::findOrFail($id);
        if ($product) {
            $session_id=Session::get('session_id');
            if(empty($session_id)){
                 $session_id=Str::random(40);
                Session::put('session_id',$session_id);
            }
            $carts = Cart::create([
                'quantity' => $request->quantity,
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'session_id'=>$session_id
            ]);
            $product->update(['stock' => $product->stock - $request->quantity]);
            return redirect()->route('cart.show');
        }
    }
    public function editCart($id)
    {
        $carts = Cart::with('product')->findOrFail($id);
        return view('webSite.edit_cart', compact('carts'));
    }
    public function UpdateCart(Request $request, $id)
    {
        $carts = Cart::findOrFail($id);
        $quantities = $carts->quantity;
        $product_id = $carts->product_id;
        $products = Products::findOrFail($product_id);

        if ($carts) {
            $carts->update($request->all());

            if ($quantities > $request->quantity) {
                $plus = $quantities - $request->quantity;
                $products->update([
                    'stock' => ($products->stock + $plus),
                ]);
            } elseif ($quantities == $request->quantity) {
                $products->update([
                    'stock' => $products->stock,
                ]);
            } else {
                $minus = $request->quantity - $quantities;
                $products->update([
                    'stock' => $products->stock - $minus
                ]);
            }
            return redirect()->route('cart.show');
        }
    }



    public function geCartPage()
    {
        $session_id=Session::get('session_id');
        $carts = Cart::where('session_id',$session_id)->get();
        return view('webSite.cart', compact('carts'));
    }


   /* public function deleteOrder($id)
    {
        $orders = Order::with('products')->find($id);
        foreach ($orders->products as $product) {
            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);
        }
        $orders->delete();
        return redirect()->route('cart.show')->with(['success' => 'Remove Success']);
    }*/
    public function getServices()
    {
        return view('webSite.services');
    }
    public function getContact()
    {
        return view('webSite.contact_us');
    }
    public function getAccount()
    {
        return view('webSite.users.account');
    }
    public function getChangePass()
    {
        return view('webSite.users.change_Pass');
    }
    public function EditPassword(Request $request)
    {
        if (!(Hash::check($request->get('oldPassword'), auth()->user()->password))) {
            return redirect()->route('get.change.pass')->with(['error' => 'Current Password Is Wrong']);
        }
        if (strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0) {
            return redirect()->route('get.change.pass')->with(['error' => 'The new password may not be equal to the current password']);
        }
        $validatedData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:6|confirmed',
        ]);
        $user = auth()->user();
        $request_data = $request->except(['password']);
        $request_data['password'] = bcrypt($request->newPassword);
        $user->update($request_data);
        return redirect()->route('get.change.pass')->with(['success' => 'Update Successful']);
    }
    public function toggleFavourite(Request $request, $product_id)
    {
        $product = Products::find($product_id);
        $request->user()->product()->syncWithoutDetaching($product_id);

        return redirect()->route('wishlist.show')->with(['success' => 'Add Success ']);
    }
    public function geWishlistPage()
    {
        $users = User::with('product')->where('id', auth()->user()->id)->get();
        return view('webSite.wishlist', compact('users'));
    }
    public function deleteWishlist($id)
    {
        $wishlist = Products::with('users')->findOrFail($id);
        $wishlist->users()->detach();
        return redirect()->route('wishlist.show')->with(['success' => 'Remove Success']);
    }
    public function countWishlist()
    {
        $user = DB::table('product_user')->count();
    }
    public function getChangeAddress()
    {
        return view('webSite.users.change_address');
    }
    public function UpdateAddress(DelivaryAddressRequest $request)
    {
        $user = User::where('id', $request->id)->find($request->id);
        $user->update($request->all());
        return redirect()->route('change.address')->with(['success' => "Update Successfully"]);
    }

    public function getCheckout()
    {
        $delivary=Delivary::where('user_id',auth()->user()->id)->first();
        return view('webSite.checkout',get_defined_vars());
    }
    public function addCheckout(Request $request)
    {
        $data=$request->all();
        User::where('id',auth()->user()->id)->update([
            'name'=>$data['billing_name'],
            'address'=>$data['billing_address'],
            'city'=>$data['billing_city'],
            'state'=>$data['billing_state'],
            'phone'=>$data['billing_mobile'],
        ]);
        $delivary=Delivary::where('user_id',auth()->user()->id)->count();
        if($delivary){
            Delivary::where('user_id',auth()->user()->id)->update([
                'name'=>$data['shipping_name'],
                'address'=>$data['shipping_address'],
                'city'=>$data['shipping_city'],
                'state'=>$data['shipping_state'],
                'phone'=>$data['shipping_mobile'],
            ]);
        }else{
            Delivary::create([
                'user_id'=>auth()->user()->id,
                'name'=>$data['shipping_name'],
                'address'=>$data['shipping_address'],
                'city'=>$data['shipping_city'],
                'state'=>$data['shipping_state'],
                'phone'=>$data['shipping_mobile'],
            ]);
        }
        return redirect()->route('get.review');
    }
    public function getOrderReview(){
        $carts=Cart::where('user_id',auth()->user()->id)->get();
        $delivaryAddress=Delivary::where('user_id',auth()->user()->id)->first();
      return view('webSite.order_review',get_defined_vars());
    }
    public function place_order(Request $request){
        if($request->payment_method == 'cod'){
            $orders=Order::create([
                'user_id'=>auth()->user()->id,
                'status_code'=>mt_rand(100000,999999),
                'total_price'=>$request->total
            ]);
            $orders->products()->attach($request->products);
            DB::table('carts')->where('user_id',auth()->user()->id)->delete();
            return redirect()->route('get.thanks')->with(['success'=>'success']);

        }else{
       $amount = $request->total;
       $ss= $this->request($amount);
            $ss = ($ss);
            return view('webSite.orders.master')->with(['res'=>$ss,'request'=>$request]);
        }

    }
    public function thanks(){
        if(request('id') && request('resourcePath')){
            $payment_status = $this->getPaymentStatus(request('id'),request('resourcePath'));
         if(isset($payment_status->id)){
             $carts=Cart::where('user_id',auth()->user()->id)->get();
             $id_payment= $payment_status->id;
             $showSuccessPaymentMessage=true;
             return view('webSite.orders.thanks',compact('carts','id_payment'))->with(['success'=>'Successfully']);

         }else{
             $showFailPaymentMessage=false;
             return view('webSite.orders.master')->with(['errors'=>'Fail Please Try again']);

         }
        }
        return view('webSite.orders.thanks');
    }
    public function place_order_master(Request $request){
        $orders=Order::create([
            'user_id'=>auth()->user()->id,
            'total_price'=>$request->total,
            'status_code'=>mt_rand(100000,999999),
            'bank_transaction_id'=>$request->id_payment
        ]);
        $orders->products()->attach($request->products);
        DB::table('carts')->where('user_id',auth()->user()->id)->delete();
        return redirect()->route('get.thanks')->with(['success'=>'success add']);
    }

    public function getOrdersUser(){

        $orders=Order::where('user_id',auth()->user()->id)->get();
        return view('webSite.users.user_order',get_defined_vars());
    }//end orders_user
    public function getOrdersDetails($id){
        $orderDetails=Order::findOrFail($id);
        return view('webSite.users.user_order_details',get_defined_vars());

    }
    public function order_tricking(Request $request){
        $status_code=$request->status_code;
        $orders=Order::where('status_code',$status_code)->first();
       if($orders){
           return view('webSite.orders.tricking',get_defined_vars());

       }else{
           return redirect()->back()->with(['error'=>"Status Code IS Wrong"]);
       }

    }















    private function getPaymentStatus($id,$resourcePath){
        $url = "https://test.oppwa.com/";
        $url.=$resourcePath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
         ;
        return $res = json_decode($responseData);
    }

  private function request($amount) {
    $url = "https://test.oppwa.com/v1/checkouts";
    $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
        "&amount=". $amount.
        "&currency=EUR" .
        "&paymentType=DB";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseData = curl_exec($ch);
    if(curl_errno($ch)) {
        return curl_error($ch);
    }
    curl_close($ch);
   return  $res = json_decode($responseData) ;
}


}
