<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php $userInfo = Session::get('billing'); ?>
<div class="main-tmp" style="width: 800px; margin:0 auto; height: auto;border: 2px solid #e0b8b8; background-color: #e083ae; ">
	<div class="inv-heading" style="text-align: center">
		<h1>{{__('leptin_lan.invoice')}}</h1>
		<p>{{__('leptin_lan.leptin')}}</p>
	</div>
	<div class="shipped_to" style="float: left;padding-left: 50px;">
		<b>{{__('leptin_lan.shiptd_to')}}: </b>
		<p><?php echo $userInfo['f_name'];?>
		 <?php echo $userInfo['l_name'];?></p>
		 <p><?php echo $userInfo['s_address1'];?>
          <?php echo $userInfo['s_address2'];?></p>
          <p>{{__('leptin_lan.Phone')}}: <?php echo $userInfo['phone'];?></p>
          <p>{{__('leptin_lan.email')}}: <?php echo $userInfo['email'];?></p>
	</div>
	<div class="date" style="float: right; padding-right:60px; ">
		<p><b>{{__('leptin_lan.invoice_id')}} : {{session::get('order_id')}}</b></p>
		<p>{{__('leptin_lan.payment')}} : <?php echo $userInfo['p_method'];?></p>
		<p>{{__('leptin_lan.date')}} : <?php echo date("Y/m/d h:i a");?></p>
	</div>
	<br>
	<br>
	<br>

	<br>
	<br>
	<br>
	<br>

	<br>
	<br>
	<div class="product-list" style="margin-top: 40px;">
		<table style="padding: 43px;">
			<tr>
				<th width="10%">{{__('leptin_lan.sl')}}</th>
				<th width="30%">{{__('leptin_lan.product_name')}}</th>
				<th width="20%">{{__('leptin_lan.price')}}</th>
				<th width="30%">{{__('leptin_lan.Product_Quentity')}}</th>
				<th width="20%">{{__('leptin_lan.Subtotal')}}</th>
			</tr>
			<?php $i=0;?>
		 @foreach(Cart::content() as $row)
		 <?php $i++;?>
			<tr>

				<td style="text-align: center;">{{$i}}</td>
				<td style="text-align: center;">{{$row->name}}</td>
				<td style="text-align: center;">{{$row->price}} {{__('leptin_lan.EU')}}</td>
				<td style="text-align: center;">{{$row->qty}}</td>
				<td style="text-align: center;">{{$row->total}} {{__('leptin_lan.EU')}}</td>
			</tr>

			@endforeach
			
		</table>
		<div class="price-total" style="width: 50%; text-align: center; float: left; margin-top: 40px;">
		<b>Total</b>
		</div>
		<div class="price-total" style="width: 50%; text-align: center; float: left; margin-top: 20px;">
		   <p style=" margin-right: -20px;"><b>{{Cart::total()}} {{__('leptin_lan.EU')}} </b></p>
		</div>
	</div>
	<div class="inv-heading" style="text-align: center;margin-top: 120px;">
		<h2>{{__('leptin_lan.billing_details')}}</h2>
		<p></p>
	</div>
	<div class="billing-info" style="padding: 40px;">
	    
		<p>{{__('leptin_lan.f_name')}}: <?php echo $userInfo['f_name'];?></p>
		<p>{{__('leptin_lan.l_name')}}: <?php echo $userInfo['l_name'];?></p>
		<p>{{__('leptin_lan.country')}}: <?php echo $userInfo['country'];?></p>
		<p>{{__('leptin_lan.s_address1')}}: <?php echo $userInfo['s_address1'];?></p>
		<p>{{__('leptin_lan.s_address2')}}: <?php echo $userInfo['s_address2'];?></p>
		<p>{{__('leptin_lan.city')}}: <?php echo $userInfo['city'];?></p>
		<p>{{__('leptin_lan.District')}}: <?php echo $userInfo['district'];?></p>
		<p>{{__('leptin_lan.zip')}}: <?php echo $userInfo['zip'];?></p>
		<p>{{__('leptin_lan.Phone')}}: <?php echo $userInfo['phone'];?></p>
		<p>{{__('leptin_lan.email')}}: <?php echo $userInfo['email'];?></p>
		<p>{{__('leptin_lan.payment')}}: <?php echo $userInfo['p_method'];?></p>
	</div>
</div>
</body>
</html>