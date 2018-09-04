
@extends('front-end.layout')
@section('content')
 
<div class="container">
    <div class="row profile">
        @include('front-end.profile-sidebar')
        <div class="col-md-9">
            <div class="profile-content">
               <div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{__('leptin_lan.billing_details')}}</h3>
				  </div>
				  <form action="{{url('billing-update')}}" method="post">
				  @csrf
				  <div class="panel-body">
					<input type="hidden" name="total_amount" value="{{Cart::total()}}">
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.country')}}<spam style="color: red;padding:3px;">*</span></label>
					    <select class="form-control" name="country" required>

					    @foreach($country as $country)
						  <option value="{{$country->name}}"

						  <?php 
						  	if($country->name == $billing->country){
						  		echo 'selected';
						  	}
						  ?>
						  >{{$country->name}}</option>
						 @endforeach
						</select>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.District')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.District')}}" name="district" value="{{$billing->district}}" required>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.town')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.town')}}" name="city" value="{{$billing->city}}" required>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.Street_address')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.Street_address')}}" name="s_address1" value="{{$billing->s_address1}}" required>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					  <label for="exampleInputEmail1">{{__('leptin_lan.Appartment')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.appartment')}}" value="{{$billing->s_address2}}" name="s_address2">
					  </div>
					</div>
					
					
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.postcode')}}</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.postcode')}}" value="{{$billing->zip}}" name="zip">
					  </div>
					</div>
					<!-- <div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.Phone')}} <spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.Phone')}}" name="phone" required>
					  </div>
					</div> -->
				<div class="col-md-6">
					  <div class="form-group" style="">
					    <button type="submit" class="btn btn-success">{{__('leptin_lan.update')}}</button> 
					  </div>
					</div>
					</form>
					
					

				  </div>
				</div> 
            </div>
        </div>
    </div>
</div>


@endsection