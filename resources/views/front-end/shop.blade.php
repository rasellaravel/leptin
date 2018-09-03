@extends('front-end.layout')
@section('content')
 
<div class="container">
	<div class="m-t-3p">
      <div class="col-lg-12">
       @foreach($Product as $product)
        <div class="col-lg-3">
          <div class="cstm-sec1" style="margin-top: 39px;">
           @if($product->discount)  
          <label>-{{$product->discount}}%</label>
          @endif
          <?php
            $img = $product->product_image;
            
          ?>
          <a href="{{url('product-details/'.$product->id)}}">
            <img src="{{asset('public/front-end-laptin/product-image/'.$img)}}" class="img-responsive m-0-auto"></a>
            
            <p>{{$product->product_title}}</p>
            @if($product->discount)

            <p><span style="text-decoration: line-through;">{{$product->product_price}} {{__('leptin_lan.EU')}} </span> &nbsp;
            
              <?php
                 $dis = ($product->product_price * $product->discount)/100;
                 echo $product->product_price-$dis;
              ?>
              {{__('leptin_lan.EU')}}
            
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