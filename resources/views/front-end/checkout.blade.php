@extends('front-end.layout')
@section('content')

<section class="billing" style="margin-top: 40px;">
	<div class="container">
	  <div class="alert alert-info" role="alert">  
	  @if(!Auth::check())
	  	<form class="form-horizontal" action="{{route('login')}}" method="post" style="padding-top: 25px;">
	  	@csrf
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
		    <div class="col-sm-3">
		      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
		    </div>
		    <label for="inputEmail3" class="col-sm-1 control-label">Password</label>
		    <div class="col-sm-3">
		      <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="Password">
		    </div>
		     <button type="submit" class="btn cstm-btn1 pull-right"  style="margin-right: 103px; margin-top: 2px;">Login</button>
		  </div>
		 </form>
		 @else



		 @endif
	    
	   <!--  {{__('leptin_lan.fill_form')}} -->

	  </div>


	  @if(Auth::check())
	  <?php
	  	$info = DB::table('billings')->where('user_id',Auth::user()->id)->first(); 
	  	$user = DB::table('users')->where('id',Auth::user()->id)->first(); 
	  ?>
	  @endif

		<div class="row">
		<form action="{{url('payment')}}" method="post">
		@csrf
			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{__('leptin_lan.billing_details')}}</h3>
				  </div>
				  <div class="panel-body">
				    <div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.f_name')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.f_name')}}" name="f_name" value="<?php if(Auth::check()){echo $user->name;}?>" <?php if(Auth::check()){echo 'readonly';}?> required>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.l_name')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" name="l_name" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.l_name')}}" value="<?php if(Auth::check()){echo $info->l_name;}?>" <?php if(Auth::check()){echo 'readonly';}?> required>
					  </div>
					</div>
					<input type="hidden" name="total_amount" value="{{Cart::total()}}">
					<div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.country')}}<spam style="color: red;padding:3px;">*</span></label>
					    <select class="form-control" name="country" required>

					    @foreach($country as $country)
						  <option value="{{$country->name}}"<?php if(Auth::check()){if($country->name==$info->country){echo 'selected';}}?> >{{$country->name}}</option>
						 @endforeach
						</select>
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.Street_address')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.Street_address')}}" name="s_address1" value="<?php if(Auth::check()){echo $info->street_address1;}?>"  required>
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="form-group">
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.appartment')}}" name="s_address2" value="<?php if(Auth::check()){echo $info->street_address2;}?>">
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.town')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.town')}}" name="city" value="<?php if(Auth::check()){echo $info->city;}?>" required>
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.District')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.District')}}" name="district" value="<?php if(Auth::check()){echo $info->district;}?>" required>
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.postcode')}}</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.postcode')}}" name="zip" value="<?php if(Auth::check()){echo $info->zip;}?>">
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.Phone')}} <spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.Phone')}}" name="phone" value="<?php if(Auth::check()){echo $info->phone;}?>" required>
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.email')}} <spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.email')}}" name="email" value="<?php if(Auth::check()){echo $info->email;}?>" <?php if(Auth::check()){echo 'readonly';}?> required>
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.order_note')}}</label>
					    <textarea class="form-control" rows="3" name="o_note"></textarea>
					  </div>
					</div>
					

				  </div>
				</div> 
			</div>
		



			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{__('leptin_lan.your_cart')}} <span class="pull-right total_item_for_checkout">{{Cart::content()->count()}}</span></h3>
				  </div>
				  <div class="panel-body">
				    <ul class="list-group">

				    @foreach(Cart::content() as $row)
					  <li class="list-group-item">
					    <span class="badge">{{$row->total}} {{__('leptin_lan.EU')}}</span>
					    {{$row->name}}

					  </li>
					  @endforeach
					   <li class="list-group-item">
					    <span class="badge">{{Cart::total()}} {{__('leptin_lan.EU')}}</span>
					    <b>{{__('leptin_lan.total')}}</b>
					    


					  </li>
				   </ul>
				  </div>
				</div>

				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{__('leptin_lan.payment_method')}}</h3>
				  </div>
				  <div class="panel-body payment-method">
				   <div class="radio col-md-6">
					  <label>
					    <input type="radio" name="p_method" id="optionsRadios1" value="paysera" style="display: none;" checked>
					    <img src="{{asset('public/front-end-laptin/img/paysera.png')}}" id="paysera">
					  </label>
					</div>
					 <div class="radio col-md-6">
					  <label>
					    <input type="radio" name="p_method" id="optionsRadios1 payment_hidden" value="paypal" style="display: none;">
					    <img src="{{asset('public/front-end-laptin/img/paypal.png')}}" id="paypal" style="padding-top: 15px;">
					  </label>
					</div>
					
				  </div>
				</div>

				<div class="proced_to_checkout">
					<button type="submit" class="btn btn-success">{{__('leptin_lan.p_to_checkout')}}</button>
				</div>



			</div>

         </form>	





		</div>
	</div>
</section>

<script type="text/javascript">
    $('#paysera').css('border','1px solid red');
	$('#paypal').click(function(){
		$('#paysera').css('border','');
		$('#paypal').css('border','1px solid red');
	});
	$('#paysera').click(function(){
		$('#paypal').css('border','');
		$('#paysera').css('border','1px solid red');
	});
	
</script>

@endsection