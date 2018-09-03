@extends('front-end.layout')

@section('content')

    <div class="cstm-bg1">
    <div class="col-lg-12 p-0">
      <div class="col-lg-5 p-0">
        <div class="cstm-text1">
          <p>Arbatos su misija:</p>
          <p>sielos ir kuno lengvumas</p>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
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
    
  <div class="m-t-5p">
    <div class="cstm-sec2">
      <div class="container">
        <div class="col-lg-12 col-xs-12">
          <div class="col-lg-4 col-xs-12">
            <div class="cstm-sec2-sub">
              <p class="title">100% <br> Natūralu</p>
              <div>
                <img src="{{asset('public/front-end-laptin/img/icon1.png')}}">
              </div>
            </div> 
          </div>
          <div class="col-lg-4 col-xs-12">
            <div class="cstm-sec2-sub">
              <p class="title">Nemokamas <br>  pristatymas</p>
              <img src="{{asset('public/front-end-laptin/img/icon2.png')}}">
            </div> 
          </div>
          <div class="col-lg-4 col-xs-12">
            <div class="cstm-sec2-sub">
              <p class="title">Premium <br> kokybė</p>
              <img src="{{asset('public/front-end-laptin/img/icon3.png')}}">
            </div> 
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="m-t-5p" id="menu2">
    <div class="container">
      <div class="col-lg-12">
        <div class="col-lg-5">
          <div class="cstm-sec3">
            <p class="number">1.</p>
            <p class="title1">Rytas :</p>
            <p class="title2">SVOrio kontrolė</p>
            <div class="col-lg-12 m-t-10p">
            @foreach($PackegeProduct as $PackegeProduct)
              <div class="col-lg-6 text-center">
                <a href="{{url($PackegeProduct->link)}}"><img src="{{asset('public/front-end-laptin/product-image/'.$PackegeProduct->img)}}" class="img-responsive m-0-auto">
                 </a>
                <a href="{{url($PackegeProduct->link)}}" class="btn cstm-btn2">PIRKTI</a>
              </div>
              @endforeach
            </div>
            <div class="clearfix"></div>
            <p class="cont">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess.
            </p>
          </div>
        </div>
        <div class="col-lg-2 text-center">
          <!-- <i class="fa fa-plus fa-5x"></i> -->
          <img src="{{asset('public/front-end-laptin/img/plus.png')}}" class="img-responsive m-t-125p hidden-xs">
          <div class="visible-xs text-center">
            <br><br>
            <img src="{{asset('public/front-end-laptin/img/plus.png')}}" class="img-responsive cstm-plus-xs">
            <br><br>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="cstm-sec3">
            <p class="number">2.</p>
            <p class="title1">Vakaras :</p>
            <p class="title2">organizmo valymas</p>
            <div class="col-lg-12 m-t-10p">
             @foreach($PackegeProduct2 as $PackegeProduct)
              <div class="col-lg-6 text-center">
                <a href="{{url($PackegeProduct->link)}}"><img src="{{asset('public/front-end-laptin/product-image/'.$PackegeProduct->img)}}" class="img-responsive m-0-auto">
                 </a>
                <a href="{{url($PackegeProduct->link)}}" class="btn cstm-btn2">PIRKTI</a>
              </div>
              @endforeach
            </div>
            <div class="clearfix"></div>
            <p class="cont">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="m-t-5p" id="menu3">
    <div class="cstm-sec4">
      <div class="cstm-sec4-sub1">
        <div class="col-lg-12 p-0 cstm-center">
          <div class="col-lg-6 p-0">
            <img src="{{asset('public/front-end-laptin/img/img11.jpg')}}" class="img-responsive">
          </div>
          <div class="col-lg-6 p-0 text-center" style="">
            <p class="title">Nauda</p>
            <div class="cont" style="">
              <p class="cstm-m-l" style="margin-left: 0px"><span class="skin-clr">#</span>&nbsp;&nbsp;Paspartina medžiagų apykaitą</p>
              <p style="font-size: 14px;">Pasišalinus toksinams iš mūsų organizmo pagerėja ir palengvėjaorganizmo darbas, suvalgytas maistas veiksmingiau ir sparčiau virškinamas.</p>
              <p class="cstm-m-l" style="margin-left: 0px"><span class="skin-clr">#</span>&nbsp;&nbsp;Stiprinaimuninę sistemą</p>
              <p style="font-size: 14px;">Supermaistu“ laikomos Goji uogos (liet. godži, dar vadinamosdygliuotojo ir kininio ožerškio uogomis) padidins Jūsų organizmoatsparumą  bei pagerins savijautą - netik pukiai atrodysite, bet taip pat ir jausitės.</p>
              <p class="cstm-m-l" style="margin-left: 0px"><span class="skin-clr">#</span>&nbsp;&nbsp;ValoJūsų kūną</p>
              <p style="font-size: 14px;">Natūralūs ingredientai, tarp jų - Senna lapai, padės išvalytiJūsų organizmą ir sumažinti pilvo išsipūtimą bei pūtimo jausmą.</p>
              <p class="cstm-m-l" style="margin-left: 0px"><span class="skin-clr">#</span>&nbsp;&nbsp;Suteikiadaugiau energijos</p>
              <p style="font-size: 14px;">Matės žolės (isp. Yerbe Mate) lapų bei gudobelės (angl.Hawthorn) uogų mišinys ir kitos gamtos gėrybės yra būtinos viso kūnosveikatai</p>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="cstm-sec4">
      <div class="cstm-sec4-sub2">
        <div class="col-lg-12 p-0 cstm-center">
          <div class="col-lg-6 p-0 text-center">
            <p class="title black-clr">Sveika mityba</p>
            <hr>
            <div class="cont">
              <p class="skin-clr">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>
          <div class="col-lg-6 p-0">
            <img src="{{asset('public/front-end-laptin/img/img12.jpg')}}" class="img-responsive">
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="cstm-sec4">
      <div class="cstm-sec4-sub3">
        <div class="col-lg-12 p-0 cstm-center">
          <div class="col-lg-6 p-0">
            <img src="{{asset('public/front-end-laptin/img/img13.jpg')}}" class="img-responsive">
          </div>
          <div class="col-lg-6 p-0 text-center">
            <p class="title black-clr">Apie mus</p>
            <hr>
            <div class="cont">
              <p class="skin-clr">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="m-t-5p">
      <div class="cstm-brdr1"></div>
      <div class="col-lg-12">
        <div class="col-lg-offset-2 col-lg-8">
          <p class="cstm-title1">100% natūralūs ingredientai </p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    
    <div class="cstm-slider m-t-5p">
      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
          <div class="so-btn text-center">
            <a class="customNextBtn"><i class="fa fa-angle-left fa-4x"></i></a>
          </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
          <div class="owl-carousel">
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Senos <br> lapai</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Goji</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Gudobelės <br> uogos</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Laimo <br> lapai</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Pienių <br> lapai</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Žalia <br> arbata</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Lotoso <br> lapai</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Rabarbarų <br> lapai</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/flower.png')}}">
              <p>Ramiz</p>
            </div>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
          <div class="so-btn text-center">
            <a class="customPrevBtn"><i class="fa fa-angle-right fa-4x"></i></a>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <!-- <br>
      <div class="so-btn text-center">
        <a class="customPrevBtn"><i class="fa fa-angle-right fa-4x"></i></a>
        <a class="customNextBtn"><i class="fa fa-angle-left fa-4x"></i></a>
      </div> -->
    </div>
    <br><br>
    <div class="cstm-brdr1"></div>
  </div>
  
  <!-- COPY SECTION -->
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
                 echo $product->product_price-$dis;
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
  <!-- COPY SECTION -->

  @endsection