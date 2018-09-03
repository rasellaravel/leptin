<?php

/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/

Route::get('/cancel', function () {
    return view('front-end.paymentCancel');
});
Route::get('/', 'IndexController@index')->name('index');
Route::get('product-details/{id}', 'IndexController@productDetails');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('add-to-cart','IndexController@addToCart');
Route::get('cart-item','IndexController@getCartItem');
Route::get('cart-item-delete/{id}','IndexController@getCartItemDelete');
Route::post('update-cart-item','IndexController@updateCart');
Route::get('checkout','IndexController@checkOut')->name('checkout');
Route::post('sendMessage','IndexController@sendMessage');
Route::get('shop','IndexController@shop');
Route::get('user-profile-update','HomeController@profile');
Route::get('user-billing-address','HomeController@userBillingAddressUpdate');
Route::get('user-change-password','HomeController@userChangePassword');

Route::post('profile-update','HomeController@profileUpdate');
Route::post('user_change_password_update','HomeController@userPasswordChange');

Route::post('billing-update','HomeController@BillingUpdate');








Route::get('/admin', 'AdminController@index')->name('admin');

Route::prefix('admin')->group(function(){
	// admin login
	Route::get('login','Auth\AdminLoginController@showLoginForm');
	Route::post('login','Auth\AdminLoginController@login')->name('admin-login');
	Route::get('logout','Auth\AdminLoginController@logout')->name('admin-logout');
	Route::get('add-product','Admin\ProductController@addProduct');
	Route::post('product-store','Admin\ProductController@productStore');
	Route::get('product-delete/{id}','Admin\ProductController@productDelete');
	Route::get('product-edit/{id}','Admin\ProductController@productEdit');
	Route::post('product-update','Admin\ProductController@productUpdate');
	Route::get('order','Admin\ProductController@order');
	Route::get('buying_billing/{id}','Admin\ProductController@buying_billing');
	Route::get('delevar/{id}','Admin\ProductController@productDelevar');

	Route::get('product_image_delete/{id}','Admin\ProductController@ProductImageDelete');
	Route::get('packeg-product','Admin\ProductController@PackageProduct');
	Route::post('packeg-product-store','Admin\ProductController@PackageProductStore');
	Route::post('packeg-product-update','Admin\ProductController@PackageProductUpdate');
	Route::get('packeg-product-edit/{id}','Admin\ProductController@PackageProductedit');
	Route::get('packeg-product-delete/{id}','Admin\ProductController@PackageProductdelete');

	

}); 



// Route::get('pay','PaypalController@index');
Route::get('payWithPaypal','PaypalController@payWithPaypal');

Route::get('saveData','PaypalController@saveData');

Route::get('/payment/success','PayController@paypalSuccess');
Route::get('/payment/cancel','PayController@paypalCancel');
Route::post('payment','PayController@payment');

Route::get('sendMail','PaypalController@sendMail');




// Route::get('p_test','PaypalController@pasyeraTest');
// Route::post('pasyeraPayment','PaypalController@pasyeraPayment');
// Route::get('payseracallback','PaypalController@payseraCallback');
// Route::get('payseraaccept','PaypalController@payseraaccept');
// Route::get('payseracancel','PaypalController@payseracancel');
// Route::get('mytest','PaypalController@myTest');


Route::get('payseracallback','PayController@payseraCallback');
Route::get('payseraaccept','PayController@payseraaccept');
Route::get('payseracancel','PayController@payseracancel');

