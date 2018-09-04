<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Cart;
use Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Billing;
use App\Order;
use Mail;
use App\Mail\sendMail;
use App\Paysera\WebToPay;
use Redirect;
use Auth;
use App\billingUpdate;

class PayController extends Controller
{
    public function payment(Request $request)
    {

        if(!Auth::check()){
            $find = User::where('email',$request->email)->first();
            if($find){
                return back()->with('msg','You have already account please login');
            }
        }


        $billing =  array(
            'f_name'=> $request->f_name,
            'l_name'=> $request->l_name,
            'country'=> $request->country,
            's_address1'=> $request->s_address1,
            's_address2'=> $request->s_address2,
            'city'=> $request->city,
            'district'=> $request->district,
            'zip'=> $request->zip,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'o_note'=> $request->o_note,
            'p_method'=> $request->p_method,
            'total_amount'=> $request->total_amount,

        );

        Session::put('billing',$billing);
        if($request->p_method=='paypal'){
            $provider = new ExpressCheckout;
            $data = [];
            
            $data['items'] = [];
            foreach (Cart::content() as $key => $cart) {
                $item = [

                    'name' =>$cart->name,
                    'price' =>$cart->price,
                    'qty' =>$cart->qty

                ];

                $data['items'][] = $item;
            }

            $total = 0;
            foreach($data['items'] as $item) {
                $total += $item['price']*$item['qty'];
            }

            $data['total'] = $total;
            $data['invoice_id'] = uniqid();
            session::put('order_id',$data['invoice_id']);
            $data['invoice_description'] = "Leptin.lt product buying invoice";
            $data['return_url'] = url('/payment/success');
            $data['cancel_url'] = url('/payment/cancel');
            $response = $provider->setExpressCheckout($data);
			return Redirect::to($response['paypal_link']);
        }else{
          try {
            $self_url = $this->get_self_url();
            $order_id = uniqid();
            session::put('order_id',$order_id);
            $request = WebToPay::redirectToPayment(array(
                'projectid'     =>121218,
                'sign_password' => '278308daa55d994df716e2ef196c0fbd',
                'orderid'       => $order_id,
                'amount'        => $billing['total_amount'],
                'currency'      => 'EUR',
                'country'       => 'LT',
                'accepturl'     => $self_url.'payseraaccept',
                'cancelurl'     => $self_url.'payment/cancel',
                'callbackurl'   => $self_url.'/payseracallback',
                'test'          => 1,
            ));
            return Redirect::to($request);
        } catch (WebToPayException $e) {
            // handle exception
        } 
    }
}

public function payseraCallback()
{   
    try {
        $response = WebToPay::checkResponse($_GET, array(
            'projectid'     =>121218,
            'sign_password' => '278308daa55d994df716e2ef196c0fbd',
        ));
        if ($response['test'] !== '0') {
            throw new Exception('Testing, real payment was not made');
        }
        if ($response['type'] !== 'macro') {
            throw new Exception('Only macro payment callbacks are accepted');
        }

        $orderId = $response['orderid'];
        $amount = $response['amount'];
        $currency = $response['currency'];



            //@todo: patikrinti, ar užsakymas su $orderId dar nepatvirtintas (callback gali būti pakartotas kelis kartus)
            //@todo: patikrinti, ar užsakymo suma ir valiuta atitinka $amount ir $currency
            //@todo: patvirtinti užsakymą

        echo 'OK';
    } catch (Exception $e) {
        echo get_class($e) . ': ' . $e->getMessage();
    }

}


  //    public function payWithPaypal()
  //   {

  //   	$provider = new ExpressCheckout;
  //   	$data = [];

		// $data['items'] = [];
		// foreach (Cart::content() as $key => $cart) {
		// 	$item = [

		// 		'name' =>$cart->name,
		// 		'price' =>$cart->price,
		// 		'qty' =>$cart->qty

		// 	];

		// 	$data['items'][] = $item;
		// }

		// $total = 0;
		// foreach($data['items'] as $item) {
		//     $total += $item['price']*$item['qty'];
		// }

		// $data['total'] = $total;



		// $data['invoice_id'] = uniqid();
		// $data['invoice_description'] = "Test Invoice";
		// $data['return_url'] = url('/payment/success');
		// $data['cancel_url'] = url('/payment/cancel');

		// $response = $provider->setExpressCheckout($data);


		// return redirect($response['paypal_link']);

  //   }
public function paypalSuccess(Request $request)
{
   $provider = new ExpressCheckout;
   $token = $request->token;
   $PayerID = $request->PayerID;

   $data['items'] = [];
   foreach (Cart::content() as $key => $cart) {
     $item = [

        'name' =>$cart->name,
        'price' =>$cart->price,
        'qty' =>$cart->qty

    ];

    $data['items'][] = $item;
}



$total = 0;
foreach($data['items'] as $item) {
  $total += $item['price']*$item['qty'];
}

$data['total'] = $total;

$data['invoice_id'] = session::get('order_id');
$data['invoice_description'] = "Leptin.lt product buying invoice";
$data['return_url'] = url('/payment/success');
$data['cancel_url'] = url('/payment/cancel');
$response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
    $userInfo = Session::get('billing');
if(!Auth::check()){
    $password = Hash::make(str_random(8));
    $user = new User;
    $user->name = $userInfo['f_name'];
    $user->last_name = $userInfo['l_name'];
    $user->email = $userInfo['email'];
    $user->password = $password;
    $user->save();
    $userId = $user->id;
}else{
    $userId = Auth()->user()->id;
}

$billingUpdate = billingUpdate::where('user_id',Auth()->user()->id)->first();
        if(!$billingUpdate){
            $billing_up = new billingUpdate;
             $billing_up->user_id = Auth()->user()->id;
             $billing_up->country = $userInfo['country'];
            $billing_up->district = $userInfo['district'];
            $billing_up->city = $userInfo['city'];
            $billing_up->s_address1 = $userInfo['s_address1'];
            $billing_up->s_address2 = $userInfo['s_address2'];
            $billing_up->zip = $userInfo['zip'];;
            $billing_up->save();
        }


$billing = new Billing;
$billing->user_id = $userId;

$billing->f_name = $userInfo['f_name'];
$billing->l_name = $userInfo['l_name'];
$billing->country = $userInfo['country'];
$billing->order_id = session::get('order_id');

$billing->street_address1 = $userInfo['s_address1'];
$billing->street_address2 = $userInfo['s_address2'];

$billing->city = $userInfo['city'];
$billing->district = $userInfo['district'];
$billing->zip = $userInfo['zip'];
$billing->phone = $userInfo['phone'];
$billing->email = $userInfo['email'];
$billing->order_note = $userInfo['o_note'];
$billing->save();

$order = new Order;


foreach (Cart::content() as $cart) {
   $order = new Order;
   $order->user_id = $userId;
   $order->billing_id = $billing->id;
   $order->product_id = $cart->id;
   $order->order_id = session::get('order_id');
   $order->qty = $cart->qty;
   $order->product_name = $cart->name;
   $order->price = $cart->price;
   $order->total = $cart->total;
   $order->payment_method = $userInfo['p_method'];
   $order->save();
}
Mail::send(new sendMail());
Cart::destroy();
session()->forget('billing');
session()->forget('order_id');
return view('front-end.paymentSuccess');
}

public function payseraaccept()
{
$userInfo = Session::get('billing');
if(!Auth::check()){
    $password = Hash::make(str_random(8));
    $user = new User;
    $user->name = $userInfo['f_name'];
    $user->last_name = $userInfo['l_name'];
    $user->email = $userInfo['email'];
    $user->password = $password;
    $user->save();
    $userId = $user->id;
}else{
    $userId = Auth()->user()->id;
}




$billing = new Billing;
$billing->user_id = $user->id;

$billing->f_name = $userInfo['f_name'];
$billing->l_name = $userInfo['l_name'];
$billing->country = $userInfo['country'];
$billing->order_id = session::get('order_id');

$billing->street_address1 = $userInfo['s_address1'];
$billing->street_address2 = $userInfo['s_address2'];

$billing->city = $userInfo['city'];
$billing->district = $userInfo['district'];
$billing->zip = $userInfo['zip'];
$billing->phone = $userInfo['phone'];
$billing->email = $userInfo['email'];
$billing->order_note = $userInfo['o_note'];
$billing->save();

$order = new Order;


foreach (Cart::content() as $cart) {
   $order = new Order;
   $order->user_id = $userId;
   $order->billing_id = $billing->id;
   $order->product_id = $cart->id;
   $order->order_id = session::get('order_id');
   $order->qty = $cart->qty;
   $order->product_name = $cart->name;
   $order->price = $cart->price;
   $order->total = $cart->total;
   $order->payment_method = $userInfo['p_method'];
   $order->save();
}
Mail::send(new sendMail());
Cart::destroy();
session()->forget('billing');
session()->forget('order_id');
return view('front-end.paymentSuccess');

}



public function paypalCancel()
{
    return view('front-end.paymentCancel');
}
public function get_self_url()
{
    $s = substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0,
        strpos($_SERVER['SERVER_PROTOCOL'], '/'));

    if (!empty($_SERVER["HTTPS"])) {
        $s .= ($_SERVER["HTTPS"] == "on") ? "s" : "";
    }

    $s .= '://'.$_SERVER['HTTP_HOST'];

    if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
        $s .= ':'.$_SERVER['SERVER_PORT'];
    }

    $s .= dirname($_SERVER['SCRIPT_NAME']);

    return $s;
}

}
