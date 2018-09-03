<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;
use Cart;
use App\Order;
use Mail;
use App\Mail\sendMail;
use App\Paysera\WebToPay;
use Redirect;

class PaypalController extends Controller
{
    public function index()
    {
    	return view('checkoutdemo');
    }
    public function payWithPaypal( Request $request)
    {
    	
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
		$data['invoice_description'] = "Test Invoice";
		$data['return_url'] = url('/payment/success');
		$data['cancel_url'] = url('/cart');

		$response = $provider->setExpressCheckout($data);
		

		return redirect($response['paypal_link']);

    }
    public function success(Request $request)
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

		$data['invoice_id'] = uniqid();
		$data['invoice_description'] = "Test Invoice";
		$data['return_url'] = url('/payment/success');
		$data['cancel_url'] = url('/cart');

    	

		// $response = $provider->getExpressCheckoutDetails($token);

    	$response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
    	return 'success';
    }

    public function saveData()
    {
    	$order = new Order;

        foreach (Cart::content() as $cart) {
        	$order->user_id = 1;
        	$order->billing_id = 1;
        	$order->product_id = $cart->id;
        	$order->qty = $cart->qty;
        	$order->payment_method = 'paypal';
        	$order->save();
        }

        dd(Cart::content());


    }

    public function sendMail()
    {
    	 Mail::send(new sendMail());

    	 //return view('front-end.invoice-mail');
    }

    public function pasyeraTest()
    {
    	return view('front-end.paysera-test');
    }
    public function pasyeraPayment(Request $request)
    {
    	try {
		    $self_url = $this->get_self_url();
		 
		    $request = WebToPay::redirectToPayment(array(
		        'projectid'     =>121218,
		        'sign_password' => '278308daa55d994df716e2ef196c0fbd',
		        'orderid'       => 0,
		        'amount'        => 50,
		        'currency'      => 'EUR',
		        'country'       => 'LT',
		        'accepturl'     => $self_url.'/payseraaccept',
		        'cancelurl'     => $self_url.'/payseracancel',
		        'callbackurl'   => $self_url.'/payseracallback',
		        'test'          => 1,
		    ));
		    return Redirect::to($request);
		} catch (WebToPayException $e) {
		    // handle exception
		}
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

    public function payseraaccept()
    {
    	return 'accepted';
    }

    public function payseracancel()
    {
    	return 'canceled';
    }

    public function myTest(){

    }
}
