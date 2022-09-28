<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Product;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopcartController extends Controller
{
    public function cart(){
        if(Cart::Count()<= 0){
            return view('frontend.shopcart.cart_empty');
        }
        else{
            return view('frontend.shopcart.cart');
        }
    }

    public function cartAdd($slug){
        $product = Product::where('slug', $slug)->first();
        Cart::add(['id'=>$product->id,'detail'=>$product->detail , 'name'=>$product->productName, 'price'=>$product->price, 'qty'=> 1, 'weight'=> 0, 'options'=>['image'=>$product->image]]);
        //return view('frontend.shopcart.cart_empty')->with('product',$product);
        return redirect()->back();
    }

    public function cartDelete($rowid){
        Cart::remove($rowid);
        return redirect()->back();
    }

    public function cartDec($row_id){
        $row = Cart::get($row_id);
        if($row->qty >1){
            Cart::update($row_id, $row->qty-1);
            
        }
        return view('frontend.shopcart.cart');
    }

    public function cartInc($row_id){
        $row = Cart::get($row_id);
        if($row->qty <10){
            Cart::update($row_id, $row->qty+1);
            
        }
        return view('frontend.shopcart.cart');
    }

    public function checkout(){
        if(  Auth::guard('customer')->check()){
            $customer = Auth::guard('customer')->user();
            return view('frontend.shopcart.checkout',['customer'=>$customer]);
        }
        else{
            return redirect('login')->with('message', 'Please login');
        }

    }
    public function doCheckout(Request $request){
        // cap nhat thong tin khach hang
        $id = $request->id;
        $customerName = $request->customerName;
        $phone = $request->phone;
        $address = $request->address;
        $email = $request->email;

        DB::update('update hongocquynhcustomers set customerName = ?, phone =?, address = ?, email = ? where id = ?', [$customerName, $phone, $address, $email, $id]);
        // luu thong tin don hang
        $customerId = $id;
        $total = Cart::total();
        $total.
        $status = 1;
        $note = $request->note;
        DB::insert('insert into hongocquynhorders (customerId, total, note, status) values (?, ?, ?, ?)', [$customerId, $total, $note, $status]);
        // luu thong tin chi tiet don hang
        $orderId = DB::select('select id from hongocquynhorders order by created_at desc')[0]->id;
        
        
        foreach(Cart::content() as $row){
            $productId = $row->id;
            $price = $row->price;
            $quantity = $row->qty;
            DB::insert('insert into hongocquynhorderdetails (orderId, productId, price, quantity) values (?, ?, ?, ?)', [$orderId, $productId, $price, $quantity]);
        }

        // xoa noi dung cart
        Cart::destroy();
        return view('frontend.shopcart.ordersuccess');

    }
    
}
