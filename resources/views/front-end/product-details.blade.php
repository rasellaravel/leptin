
@extends('front-end.layout')
@section('content')
 
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-5" style="padding: 40px;margin-top:-104px">
						
						<div class="preview-pic tab-content det-sec">
						 <!-- <label class="text-center">-30</label> -->
						  <div class="tab-pane active" id="pic-1"><img src="{{asset('public/front-end-laptin/product-image/'.$single_Product->product_image)}}" /></div>

						  <?php $i=1;?>
						  @foreach($images as $image)
						  <?php $i++;?>
						  <div class="tab-pane" id="pic-<?php echo $i; ?>"><img src="{{asset('public/front-end-laptin/product-image/'.$image->image)}}" /></div>
						 
						  @endforeach
						</div>
						<ul class="preview-thumbnail nav nav-tabs">


						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{asset('public/front-end-laptin/product-image/'.$single_Product->product_image)}}" /></a></li>
						  <?php $i=1;?>
						  @foreach($images as $image)
						  <?php $i++;?>
						  <li><a data-target="#pic-<?php echo $i; ?>" data-toggle="tab"><img src="{{asset('public/front-end-laptin/product-image/'.$image->image)}}" /></a></li>
						  @endforeach


						</ul>
						
					</div>
					<div class="details col-md-7">
						<p class="product-title"><i>{{$single_Product->product_title}}</i></p>
						<div class="rating">
						  @if($single_Product->discount)
							<span class="review-no">{{$single_Product->product_price}} {{__('leptin_lan.EU')}}</span> &nbsp;&nbsp;
							<span class="main-price">
								 <?php
					                 $dis = ($single_Product->product_price * $single_Product->discount)/100;
					                 echo $single_Product->product_price-$dis;
					              ?>
					              {{__('leptin_lan.EU')}}
							 </span>
						  @else
						  <span class="main-price">{{$single_Product->product_price}} {{__('leptin_lan.EU')}}</span>
						  @endif	

						</div>
						<p class="product-description">{{$single_Product->description}}</p>

						 <div class="center">
						    <form action="{{url('add-to-cart')}}" id="add-to-cart" method="post">
						@csrf
						    <p>
						    <p style="color: rgb(75,27,77);">Keikis</p>
						    <input type="hidden" name="image" value="{{$single_Product->product_image}}">
						      </p><div class="input-group">

						          <span class="input-group-btn">
						              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]" style="padding: 9px; background: white;border: 1px solid #EBEBEB; color: rgb(199,157,66);">
						                <span class="glyphicon glyphicon-minus"></span>
						              </button>
						          </span>
						          <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100" style="text-align: center; width: 50px;border: 1px solid #EBEBEB;">
						          <span class="input-group-btn">
						              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]" style="padding: 9px;    background: white;border: 1px solid #EBEBEB; margin-left: -73px;color: rgb(199,157,66);">
						                  <span class="glyphicon glyphicon-plus"></span>
						              </button>
						          </span>
						      </div>
							<p></p>
						</div>
						
						
						<input type="hidden" name="id" id="id" value="{{$single_Product->id}}">
						<div class="action">
							<button type="submit"> <i class="fas fa-cart-arrow-down"></i> &nbsp;&nbsp;&nbsp;&nbsp;J KREPSELI</button>
						</div>
						</form>

						@if(session('success'))
						<div class="item-added">
							<p>{{session('success')}}</p>
							<a href="{{url('/')}}" class="btn btn-success">{{__('leptin_lan.continue_shopping')}}</a>
							<a href="{{url('cart-item')}}" class="btn btn-success">{{__('leptin_lan.view_cart')}}</a>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>












	<div class="container" style="margin-bottom: 30px;">
		<div class="border-top"></div>
		<div class="row">
			<div class="col-md-4">
				<div class="single-item">
					<img src="{{asset('public/front-end-laptin/img/flower.png')}}">
					<p class="mytitle">Aprasymas</p>
					<p class="mydes">
						 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		              consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess.
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-item">
					<img src="{{asset('public/front-end-laptin/img/flower.png')}}">
					<p class="mytitle">Aprasymas</p>
					<p class="mydes"> -Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		              consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess.
					
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-item border-none">
					<img src="{{asset('public/front-end-laptin/img/flower.png')}}">
					<p class="mytitle">Aprasymas</p>
					<p class="mydes">
						 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		              consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess.
					</p>
				</div>
			</div>
		</div>
	</div>


<div class="container">
    <div class="m-t-5p">
      <div class="cstm-brdr1"></div>
      <div class="col-lg-12">
        <div class="col-lg-offset-3 col-lg-6">
          <p class="cstm-title1">Jūsų perkamiausi</p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="m-t-3p">
      <div class="col-lg-12">
        @foreach($Product as $product)
        <div class="col-lg-3">
          <div class="cstm-sec1">
           @if($product->discount)  
          <label>-{{$product->discount}}%</label>
          @endif
          <?php
            $img = $product->product_image;
           
          ?>

            <a href="{{url('product-details/'.$product->id)}}"><img src="{{asset('public/front-end-laptin/product-image/'.$img)}}" class="img-responsive m-0-auto"></a>
            
            <p>{{$product->product_title}}</p>
            @if($product->discount)

            <p><span style="text-decoration: line-through;">{{$product->product_price}} {{__('leptin_lan.EU')}} </span>&nbsp;
            
              <?php
                 $dis = ($product->product_price * $product->discount)/100;
                 echo $dis;
              ?>
              {{__('leptin_lan.EU')}}
            </p>
            @else
              <p>{{$product->product_price}} {{__('leptin_lan.EU')}}</p>

            @endif


            <a href="{{url('product-details/'.$product->id)}}" class="btn cstm-btn1">Pirkti</a>
          </div>
        </div>
        @endforeach
        
        
      </div>
      <div class="clearfix"></div>
    </div>

  </div>
@endsection

@section('script')
     

@endsection