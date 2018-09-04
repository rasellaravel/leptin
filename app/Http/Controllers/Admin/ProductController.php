<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Billing;
use App\ProductImage;
use App\PackegeProduct;
class ProductController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function addProduct()
    {
    	$Product = Product::all();
    	return view('admin.add-product',compact('Product'));
    }
    public function productStore(Request $request)
    {
    	$Product = new Product;

        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'thumb' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $thum_img = $request->file('thumb');
        $thumb = rand().'.'.$thum_img->getClientOriginalExtension();
        $thum_img->move(public_path("front-end-laptin/product-image"),$thumb);
        $Product->product_image = $thumb;
        $Product->product_title = $request->title;
        $Product->product_price = $request->price;
        $Product->discount = $request->discount;
        $Product->description = $request->description;
        if($request->is_home == 1) {
            $Product->is_home = $request->is_home;
        }
        $Product->save();

        $images = $request->file('image');
        if($images){
            foreach ($images as $image) {
                $ProductImage = new ProductImage;
                $newName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path("front-end-laptin/product-image"),$newName);
                $ProductImage->product_id = $Product->id;
                $ProductImage->image = $newName;
                $ProductImage->save();

                $request -> session() -> flash("success", "true");
            }
        }

        return back()->with('success','Product Added successfully');

    }
    public function productDelete($id)
    {

    	Product::find($id)->delete();
    	return back();
    }

    public function productEdit($id)
    {
    	$Product = Product::find($id);
        $Product_image = ProductImage::where('product_id',$id)->get();

        return view('admin.product-edit',compact('Product','Product_image'));
    }
    public function productUpdate(Request $request)
    {

    	$Product = Product::find($request->id);
    	if($request->thumb){
            $image = $request->file('thumb');
            $imageName  = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("front-end-laptin/product-image"),$imageName);
            $Product->product_image = $imageName;
        }


        $Product->product_title = $request->title;
        $Product->product_price = $request->price;
        $Product->discount = $request->discount;
        $Product->description = $request->description;
        if($request->is_home == 1) {
            $Product->is_home = $request->is_home;
        }else{
           $Product->is_home = 0;
       }
       $Product->save();
       $images = $request->file('image');
       if($images){
        foreach ($images as $image) {
            $ProductImage = new ProductImage;
            $newName = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("front-end-laptin/product-image"),$newName);
            $ProductImage->product_id = $request->id;
            $ProductImage->image = $newName;
            $ProductImage->save();
        }
    }

    return redirect('admin/add-product');
}

public function order()
{   
    $orders = Order::all();
    return view('admin.order',compact('orders'));
}
public function buying_billing($id)
{
    $billing = Billing::where('order_id',$id)->orderby('id','DESC')->first();
    return view('admin.buying_billing',compact('billing'));
}
public function productDelevar($id)
{
    $orders = Order::find($id);
    $orders->status = 1;
    $orders->save();
    return back();
}
public function ProductImageDelete($id)
{
    ProductImage::find($id)->delete();
    return back();
}
public function PackageProduct()
{
    $PackageProduct = PackegeProduct::all();
    return view('admin.package_product',compact('PackageProduct'));
}
public function PackageProductStore(Request $request)
{
    $request->validate([
        'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $PackageProduct =  new PackegeProduct;
    $image = $request->file('img');
    $imageName  = rand().'.'.$image->getClientOriginalExtension();
    $image->move(public_path("front-end-laptin/product-image"),$imageName);
    $PackageProduct->img = $imageName;
    $PackageProduct->link = $request->link;
    $PackageProduct->save();
    $request -> session() -> flash("success", "true");
    return back();


}
public function PackageProductdelete($id)
{
    PackegeProduct::find($id)->delete();
    return back();
}
public function PackageProductedit($id)
{
    $data = PackegeProduct::find($id);
    return view('admin.edit-product-packeges',compact('data'));
}
public function PackageProductUpdate(Request $request)
{
    $PackageProduct = PackegeProduct::find($request->id);

    $image = $request->file('img');
    if($image){
        $imageName  = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("front-end-laptin/product-image"),$imageName);
        $PackageProduct->img = $imageName;
    }
    $PackageProduct->link = $request->link;
    $PackageProduct->save();
    return redirect('admin/packeg-product');
}
}
