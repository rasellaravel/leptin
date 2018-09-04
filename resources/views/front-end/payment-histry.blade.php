
@extends('front-end.layout')
@section('content')
 
<div class="container">
    <div class="row profile">
        @include('front-end.profile-sidebar')
        <div class="col-md-9">
            <div class="profile-content">
               <div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Payment Histry</h3>
				  </div>
				  <div class="panel-body">
					<table class="table table-hover">
					  <thead>
					  	<th>Invoice Id</th>
					  	<th>Product Name</th>
					  	<th>Price</th>
					  	<th>Quentity</th>
					  	<th>Date</th>
					  	<th>Total</th>

					  </thead>
					  <?php
					  	$histry = DB::table('orders')->where('user_id',Auth::user()->id)->orderBy('id','DESC')->get(); 

					  ?>
					  <tbody>
					  <?php
					  	if($histry){
					  		foreach($histry as $histry){


					  ?>
					 	<tr>
					 		<td>{{$histry->order_id}}</td>
					 		<td>{{$histry->product_name}}</td>
					 		<td>{{$histry->price}} EU</td>
					 		<td>{{$histry->qty}}</td>
					 		<td>
					 			<?php 
					 				$orig = strtotime($histry->created_at);
					 				echo date('D-M-Y: h:i a',$orig);
					 			?>
					 		</td>
					 		<td>{{$histry->total}} EU</td>
					 	</tr>
					  	<?php 	} }?>
					  	
					  </tbody>
					</table>



				  </div>
				</div> 

                             		                            
            </div>
        </div>
    </div>
</div>


@endsection