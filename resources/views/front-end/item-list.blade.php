
@extends('front-end.layout')

@section('content')
<div class="container" style="margin-top: 60px;">
	<div class="cart_title text-center"><h2>Cart</h2></div>
	@if(Cart::content()->count()>0)

	<table id="cart" class="table table-hover table-condensed" style="margin-top: 50px;">
		<thead>
			<tr>
				<th style="width:50%">{{__('leptin_lan.product')}}</th>
				<th style="width:10%">{{__('leptin_lan.price')}}</th>
				<th style="width:8%">{{__('leptin_lan.Quantity')}}</th>
				<th style="width:22%" class="text-center">{{__('leptin_lan.Subtotal')}}</th>
				<th style="width:10%">{{__('leptin_lan.Action')}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach(Cart::content() as $row)
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs"><img src="{{'public/front-end-laptin/product-image/'.$row->options->img}}" alt="..." class="img-responsive"/></div>
						<div class="col-sm-10">
							<h4 class="nomargin">{{$row->name}}</h4>
							
						</div>
					</div>
				</td>
				<td data-th="Price">{{$row->price}} {{__('leptin_lan.EU')}}</td>
				<form action="{{url('update-cart-item')}}" method="post">
					@csrf
					<td data-th="Quantity">
						<input type="number" name="qty" class="form-control text-center" value="{{$row->qty}}">
					</td>
					<input type="hidden" name="id" value="{{$row->rowId}}">
					<td data-th="Subtotal" class="text-center">{{$row->total}} {{__('leptin_lan.EU')}}</td>
					<td class="actions" data-th="">
						<button class="btn btn-info btn-sm"><i class="fas fa-sync-alt"></i></button>
					</form>

					<a onclick="return confirm('<?php echo __('leptin_lan.sure_delete');?>')" href="{{url('cart-item-delete',$row->rowId)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>								
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr class="visible-xs">
				<td class="text-center"><strong></strong></td>
			</tr>
			<tr>
				<td><a href="{{url('/')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> {{__('leptin_lan.continue_shopping')}}</a></td>
				<td colspan="2" class="hidden-xs"><b>{{__('leptin_lan.total')}}</b></td>
				<td class="hidden-xs text-center"><strong>{{Cart::total()}} {{__('leptin_lan.EU')}}</strong></td>
				<td><a href="{{url('checkout')}}" class="btn btn-success btn-block">{{__('leptin_lan.checkout')}} <i class="fa fa-angle-right"></i></a></td>
			</tr>
		</tfoot>
	</table>


	@else
	<div class="alert alert-danger text-center" role="alert"><p>{{__('leptin_lan.no_product')}}</p>  &nbsp;&nbsp;&nbsp;<a href="{{url('/')}}" class="btn cstm-btn1">{{__('leptin_lan.product')}}</a></div>
	
	@endif
</div>

@endsection