
@extends('front-end.layout')

@section('content')

<div class="container" style="margin-top: 50px;">
	<div class="alert alert-info text-center" role="alert">
		<h3>{{__('leptin_lan.Congratulations')}}</h3>  
		<img src="{{asset('public/front-end-laptin/img/success.gif')}}" height="100px" width="150px">
		<p>{{__('leptin_lan.thankyou')}}</p>
	  <p> {{__('leptin_lan.success_des')}}</p>
	  <a href="{{url('/')}}">{{__('leptin_lan.back_home')}}</a></p>
	</div>
</div>




@endsection