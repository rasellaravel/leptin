
@extends('front-end.layout')
@section('content')

<div class="container">
	<div class="card">
		<div class="container-fliud">
			<div class="wrapper row">
				<div class="preview col-md-5" style="padding: 40px;margin-top:-104px">
					
					<div class="preview-pic tab-content det-sec">
						@if($single_Product->discount)  
						<label>-{{$single_Product->discount}}%</label>
						@endif
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
					<p class="product-title" style="line-height: 1"><i>{{$single_Product->product_title}}</i></p>
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
				<p class="mytitle">Veikimas</p>
				<p class="mydes">
					Privalumai gali būti:
					padidėjęs metabolizmas,
					padidėjusi energija,
					apetito slopinimas ir sumažėjęs pilvo pūtimas
					- prašome perskaityti mūsų atsakomybės apribojimą.
					<br><br>
					<span style="font-size: 15px;">Ispejimai:</span> 

					Visuomet pasitarkite su savo gydytoju prieš vartodami Leptin Teatox, jei turite sveikatos nusiskundimų ar nustatytų sveikatos sutrikimų. Nors visuose Leptin Teatox produktuose naudojami ingredientai yra 100 proc. natūralūs, turėtumėte įsitikinti, jog nesate alergiškas/-a nei vienai iš arbatos mišinio sudedamųjų dalių.
					Jaunesniems nei 18 metų asmenims, rekomenduotina Leptin Teatox produktų įsigyti su tėvų sutikimu.
					<a href="#" data-toggle="modal" data-target="#myModal5" style="font-size: 14px;"> + Daugiau</a> 
					

				</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="single-item">
				<img src="{{asset('public/front-end-laptin/img/flower.png')}}">
				<p class="mytitle">Vartojimas</p>
				<p class="mydes"> &quot;LeptinTeatox&quot; 14 dienų nuostabųjį paketą sudaro:
1 maišelis &quot;Ryto energija&quot; arbata (14 arbatinių pakeliukų) ir
 1 maišelis &quot;Organizmo valymas&quot; arbata (7 arbatiniai pakeliai). <br><br>
Vartojimas:
1 žingnis: 1 pakelį &quot;Ryto energijos&quot; užpilkyte karštu vandeniu ir palikite 3-5
minutėms.  Išgerkite 30 min prieš pusryčius. <br><br>
2 žingsnis: 1 pakelį &quot;Organizmo valymas&quot; užpilkyte karštu vandeniu ir palikite 3-5
minutėms, priklausomai nuo skonio, galite pridėti cukraus, medaus ar
citrinos. Gerkite kas antrą naktį.</p>
					
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-item border-none">
					<img src="{{asset('public/front-end-laptin/img/flower.png')}}">
					<p class="mytitle">Ingredientai</p>
					<p class="mydes">
						Ryto energija: žalioji arbata, matės lapai, laimo lapai,lotoso lapeliai,kiaulpienės lapai, rabarbarų šaknys ir goji uogos.
						Organizmo valymas  - Gudobelės uogos, lotoso lapeliai, laimo lapeliai, sena lapai, "Psyllium Husk" ir "Poria Cocos" stiebo žievė. <br>
						 <img src="{{asset('public/front-end-laptin/img/dandelion-300x300.jpg')}}" style="width: 75px; height: 75px;"> 
						  <img src="{{asset('public/front-end-laptin/img/green-tea-300x300.jpg')}}" style="width: 75px; height: 75px;"> 
						   <img src="{{asset('public/front-end-laptin/img/hawthorn-berry-300x300.jpg')}}" style="width: 75px; height: 75px;"> 
						    <img src="{{asset('public/front-end-laptin/img/goji-300x300.jpg')}}" style="width: 73px; height: 73px;"> 

						    
						     <img src="{{asset('public/front-end-laptin/img/lime-leaf-300x300.jpg')}}" style="width: 75px; height: 75px;"> 
						  <img src="{{asset('public/front-end-laptin/img/lotus-300x300.jpg')}}" style="width: 75px; height: 75px;"> 
						   <img src="{{asset('public/front-end-laptin/img/rhubarb-300x300.jpg')}}" style="width: 75px; height: 75px;"> 
						    <img src="{{asset('public/front-end-laptin/img/senna-leaf-300x300.jpg')}}" style="width: 73px; height: 73px;"> 

					</p>
				</div>
			</div>
		</div>
	</div>




<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: #d8b763;font-family: 'Raleway', sans-serif;
    font-style: italic;">Ispejimai</h4>
      </div>
      <div class="modal-body" style="color: #d8b763;
    font-size: 15px;
    font-family: 'Raleway', sans-serif;
    font-style: italic;">

Visuomet pasitarkite su savo gydytoju prieš vartodami Leptin Teatox, jei turite sveikatos nusiskundimų ar nustatytų sveikatos sutrikimų. Nors visuose Leptin Teatox produktuose naudojami ingredientai yra 100 proc. natūralūs, turėtumėte įsitikinti, jog nesate alergiškas/-a nei vienai iš arbatos mišinio sudedamųjų dalių.
Jaunesniems nei 18 metų asmenims, rekomenduotina Leptin Teatox produktų įsigyti su tėvų sutikimu.

<br><br>
Leptin produktas galintis sąveikauti su kontraceptiniais preparatais yra Colon Cleanse valomoji arbata. Siekiant išplauti toksinus iš kūno, šis produktas turi lengvą vidurius laisvinantį poveikį, dėl kurio kontraceptinės tabletės gali būti kartu pašalindamas juos iš organizmo. Imantis atsargos priemonių, siūlome kontraceptines tabletes vartoti kelios valandos prieš geriant Colon Cleanse arbatą.

       

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