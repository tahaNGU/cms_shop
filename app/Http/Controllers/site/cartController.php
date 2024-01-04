<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class cartController extends Controller
{
    public function addProduct($id)
    {


        $product = product::find($id);
        $rowId = $product['id'];
        \Cart::add(
            array(
                'id' => $rowId,
                'name' => $product['title'],
                'price' => '10000',
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ),
        );
        return back();
    }

    public function index(){
        $cat_total_price=0;
        foreach (\Cart::getContent() as $item) {
            $product=$item['associatedModel']->product_variation()->first();
                $cat_total_price+=$product['price_final'];

        }
        return view('site.order',['cart_product'=>\Cart::getContent(),'total_price'=>$cat_total_price]);
    }

    public function complete_user_information(){
        return view('site.complete_user_information');
    }
    public function user_info_update(Request $request){
        $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'company_name'=>'required',
            'province'=>'required',
            'city'=>'required',
            'tell'=>'required',
            'tell_emergency'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'post_code'=>'required|max:10',
       ]);
        User::find(auth()->user()->id)->update([
            'company_name'=>$request->company_name,
            'province'=>$request->province,
            'city'=>$request->city,
            'post_code'=>$request->post_code,
            'tell'=>$request->tell,
            'tell_emergency'=>$request->tell_emergency,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);
        return back()->with('success','اطلاعات با موفقیت تغییر کرد');
    }


    public function remove_cart($id){
        \Cart::remove($id);
        return back();
    }



    public function finishBasket(){

        if(empty(auth()->user()->address)){
           return redirect()->route('complete_user_information');
        }
        else{
            $arr_product=[];
            $price=0;
            $cat_total_price=0;
            foreach (\Cart::getContent() as $item) {
                $product_cart=$item['associatedModel'];
                $arr_product['product_id'][]=$item['id'];
                $product_variation=$product_cart->product_variation()->first();
                $price+=$product_variation['price_final'];
                $cat_total_price+=$product_variation['price_final'];
            }
            \App\Models\cart::create([
                'product_ids'=>implode(',',$arr_product['product_id']),
                'user_id'=>auth()->id(),
                'price'=>$price
            ]);
            foreach ($arr_product['product_id'] as $item) {
                \Cart::remove($item);
            }
            return back()->with('success','خرید شما انجام شد');
        }

    }
}
