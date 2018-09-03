<?php

namespace App\Http\Controllers;
use App\country;
use App\Admin\Product; 
use Illuminate\Http\Request;
use Cart;
use Session;
use App\ProductImage;
use Mail;
use App\Mail\UserMail; 
use App\PackegeProduct;
class IndexController extends Controller
{
    public function index()
    {
    	$Product = Product::where('is_home',1)->take(4)->get();
        $PackegeProduct = PackegeProduct::orderBy('id','ASC')->take(2)->get();
        $PackegeProduct2 = PackegeProduct::orderBy('id','DESC')->take(2)->get();
        return view('front-end.index',compact('Product','PackegeProduct','PackegeProduct2'));
    }

    public function productDetails($id)
    {
    	$single_Product = Product::find($id);
        $images = ProductImage::where('product_id',$id)->get();
        $Product = Product::orderBy('id','DESC')->take(4)->get();
        return view('front-end.product-details',compact('Product','single_Product','images'));

    }
    public function addToCart(Request $request)
    {
        $flag = 0;
        foreach(Cart::content() as $row){ 
            if($row->id==$request->id){
                $flag = 1; 
            }
        }

        if($flag == 0){

            $single_Product = Product::find($request->id);
            if($single_Product->discount){
                $price1 = $single_Product->product_price*$single_Product->discount/100;
                $price = $single_Product->product_price-$price1;
            }else{
                $price = $single_Product->product_price;
            }
            // dd($request->image);
            $done = Cart::add($single_Product->id, $single_Product->product_title, $request->quant[2],$price,['img'=>$request->image]);
            return back()->with('success',__('leptin_lan.item_add_success')); 
        }else{
            return back()->with('success',__('leptin_lan.item_exist'));  
        }


    }
    public function getCartItem()
    {
        return view('front-end.item-list');
    }
    public function getCartItemDelete($id)
    {
        Cart::remove($id);
        return back();
    }
    public function updateCart(Request $request)
    {
        Cart::update($request->id, $request->qty);
        return back();
    }
    public function checkOut()
    {
        $countrys = country::all();
        return view('front-end.checkout',compact('countrys'));
    }
    public function sendMessage(Request $request)
    {
        Mail::send(new UserMail());
        return back()->with('success','success');
    }
    public function shop()
    {
        $Product = Product::orderBy('id','DESC')->get();
        return view('front-end.shop',compact('Product'));
    }
}
