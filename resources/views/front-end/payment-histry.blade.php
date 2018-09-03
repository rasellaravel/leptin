
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
					  	<th>Subtatal</th>

					  </thead>
					  <tbody>
					  <tr>
					  	<td colspan="4" class="text-center">dfsdf</td>
					  </tr>
					  <tr>
					  	<td></td>
					  	<td></td>
					  	<td></td>
					  	<td></td>
					  	<td></td>
					  </tr>
					  	
					  </tbody>
					</table>



				  </div>
				</div> 

                             		                            
            </div>
        </div>
    </div>
</div>


@endsection