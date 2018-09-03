
@extends('front-end.layout')
@section('content')
 
<div class="container">
    <div class="row profile">
        @include('front-end.profile-sidebar')
        <div class="col-md-9">
            <div class="profile-content">
            <form action="{{url('profile-update')}}" method="post" enctype="multipart/form-data">
            @csrf
               <div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{__('leptin_lan.profile_info')}}</h3>
				  </div>
				  <div class="panel-body">
				    <div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.f_name')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.f_name')}}" name="f_name" value="{{$user->name}}" required>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.l_name')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="text" name="l_name" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.l_name')}}" value="{{$user->last_name}}" required>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.email')}}<spam style="color: red;padding:3px;">*</span></label>
					    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.email')}}" value="{{$user->email}}" required disabled>
					  </div>
					</div>

					<div class="col-md-6">
					  <div class="form-group" style="">
					    <label for="exampleInputEmail1">{{__('leptin_lan.profile_image')}}</label>
					    <input type="file" name="image" class="form-control">
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="exampleInputEmail1">{{__('leptin_lan.Phone')}} </label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('leptin_lan.Phone')}}" name="phone" value="{{$billing->phone}}" required>
					  </div>
					</div> 
					<div class="col-md-6">
					  <div class="form-group" style="">
					    <button type="submit" class="btn btn-success" style="margin-top: 22px;">{{__('leptin_lan.update')}}</button> 
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