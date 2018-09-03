
@extends('front-end.layout')
@section('content')
 
<div class="container">
    <div class="row profile">
        @include('front-end.profile-sidebar')
        <div class="col-md-9">
            <div class="profile-content">
               <div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{__('leptin_lan.change_password')}}</h3>
				  </div>
				  <div class="panel-body">
					<form action="{{url('user_change_password_update')}}" method="post">
					@csrf
					
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.current_password')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.current_password')}}" name="c_pass" required>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.new_password')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.new_password')}}" name="n_pass" required>
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
					    <button type="submit" class="btn btn-success">{{__('leptin_lan.change_password')}}</button> 
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