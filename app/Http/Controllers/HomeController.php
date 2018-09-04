<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\User;
use App\Billing;
use Hash;
use App\billingUpdate;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
       
        return view('home');
        
        
    }

    public function profile()
    {
        $user = User::find(Auth()->user()->id)->first();
        $billing = billingUpdate::where('user_id',Auth()->user()->id)->first();
        return view('front-end.user-profile-update',compact('user','billing'));
    }
    public function userBillingAddressUpdate()
    {
        $billing = billingUpdate::where('user_id',Auth()->user()->id)->first();
        $country = country::all();
        return view('front-end.user-billing-address',compact('country','billing'));
    }
    public function userChangePassword()
    {
        return view('front-end.user-change-password');
    }
    public function profileUpdate(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        if($request->image){
                $image = $request->file('image');
                $imageName  = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path("front-end-laptin/profile-image"),$imageName);
                $user->image = $imageName;
        }

        
        $user->name = $request->f_name;
        $user->last_name = $request->l_name;
        $user->save();
        $billing_get = billingUpdate::where('user_id',Auth()->user()->id)->first();
        if($billing_get){
             $billing = billingUpdate::find($billing_get->id);
             $billing->phone = $request->phone;
             $billing->save();
        }else{
            $billing = new billingUpdate;
            $billing->phone = $request->phone;
            $billing->user_id = Auth()->user()->id;
            $billing->email = $request->email;
            $billing->save();
        }
       
        return back()->with('success');


    }
    public function userPasswordChange(Request $request)
    {
        $user = User::find(Auth()->user()->id)->first();
        $check = Hash::check($request->c_pass,$user ->password);
        if($check=='true'){
           $user = User::find(Auth()->user()->id);
           $user->password = Hash::make($request->n_pass);
           $user->save();
           return back()->with('success');
        }else{
            return back()->with('not_match');
        }
      
    }
    public function paymenyHistry()
    {
        return view('front-end.payment-histry');
    }
    public function BillingUpdate(Request $request)
    {
        $billingUpdate = billingUpdate::where('user_id',Auth()->user()->id)->first();
        if($billingUpdate){
            $billing = billingUpdate::find($billingUpdate->id);
            $billing->country = $request->country;
            $billing->district = $request->district;
            $billing->city = $request->city;
            $billing->s_address1 = $request->s_address1;
            $billing->s_address2 = $request->s_address2;
            $billing->zip = $request->zip;
            $billing->save();
            return back();
        }else{
             $billing = new billingUpdate;
             $billing->user_id = Auth()->user()->id;
             $billing->country = $request->country;
            $billing->district = $request->district;
            $billing->city = $request->city;
            $billing->s_address1 = $request->s_address1;
            $billing->s_address2 = $request->s_address2;
            $billing->zip = $request->zip;
            $billing->save();
            return back();
        }
    }
    
 




     
}
