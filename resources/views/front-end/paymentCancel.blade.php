
@extends('front-end.layout')

@section('content')

<div class="container" style="margin-top: 50px;">
	<div class="alert alert-info text-center" role="alert">
		<h3>{{__('leptin_lan.payment_cancel')}}</h3>  
		<img src="{{asset('public/front-end-laptin/img/cancel.gif')}}" height="100px" width="150px">
		<p></p>
	  <p> {{__('leptin_lan.cancel_des')}}</p>
	  <a href="{{url('checkout')}}">{{__('leptin_lan.back_checkout')}}</a></p>
	</div>
</div>




@endsection