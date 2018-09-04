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
            <p class="title2">Svoriokontrolė</p>
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
            <p class="cont" style="font-size: 15px; text-align: justify;">
            Pradėk rytą teisingai - padidink energijos lygį ir suvaldyk apetitą!!!
            Matės žolės (Paragvajinio Bugienio) lapų sudėtyje yra polifenolių, kurie dalyvauja riebalų 
            apykaitos procese, gali mažinti apetitą, padėti natūraliomis priemonėmis kovoti su alkiu.
            Rabarbarų šaknys gali padėti išvalyti Jūsų organizmą, jos prisideda prie natūralaus detoksikacijos proceso, Bei yra vitaminų ir mineralų šaltinis.
            Kiaulpienės lapai dalyvauja organizmo valymosi procesuose,
            bei yra laikomi vienu svarbiausių natūralių pagalbininkų lieknėjimo procese.

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
            <p class="title2">Organizmovalymas</p>
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
            <p class="cont" style="font-size: 15px; text-align: justify;">
            Išvalyk organizmą po dienos - detoksikacija tavo kūnui. 
            Gudobelės uogos, jau seniai įrodyta, jog yra itin veiksmingos gydant ankstyvosios stadijos širdies ir 
            kraujagyslių ligas, gali gerinti kraujotaką ir efektyviai kovoti su aukštu kraujo spaudimu. 
            Laimo lapų ekstrakte, esančios veikliosios medžiagos gali padėti sumažinti dujų kaupimąsi žarnyne
            ir pilvo pūtimą; be to juose gausu vitamino C
            Lotoso lapai, moksliniai tyrimai parodė, jog pastarieji gelbsti, esant nerimui bei stresui, 
            bei gali užkersti kelią riebalų ir angliavandenių įsisavinimui – 
            būtent dėl šios priežasties jie naudojami lieknėjimo produktuose. 



 





            </p>
          </div>
        </div>
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
              <img src="{{asset('public/front-end-laptin/img/dandelion-300x300.jpg')}}">
              <p>dandelion</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/green-tea-300x300.jpg')}}">
              <p>green tea</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/hawthorn-berry-300x300.jpg')}}">
              <p>hawthorn berry</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/goji-300x300.jpg')}}">
              <p>goji</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/lime-leaf-300x300.jpg')}}">
              <p>lime leaf</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/lotus-300x300.jpg')}}">
              <p>lotus</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/rhubarb-300x300.jpg')}}">
              <p>rhubarb</p>
            </div>
            <div class="item">
              <img src="{{asset('public/front-end-laptin/img/senna-leaf-300x300.jpg')}}">
              <p>senna leaf</p>
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
              <p id="first" class="cstm-m-l" style="margin-left: 0px;cursor: pointer; font-size: 18px"><span class="skin-clr" style="font-size: 16px;">+</span>&nbsp;&nbsp;Paspartinamedžiagųapykaitą</p>
              <p class="first" style="font-size: 13px; display: none">
              Pasišalinus toksinams iš mūsų organizmo pagerėja ir palengvėja organizmo darbas.</p>
              <p id="second" class="cstm-m-l" style="margin-left: 0px;cursor: pointer; font-size: 18px"><span class="skin-clr" style="font-size: 16px;">+</span>&nbsp;&nbsp;Stiprinaimuninęsistemą</p>
              <p class="second" style="font-size: 13px;display: none">„Supermaistu“ laikomos Goji uogos (liet. godži, dar vadinamos dygliuotojo ir kininio ožerškio uogomis) padidins Jūsų organizmo atsparumą  bei pagerins savijautą - ne tik pukiai atrodysite, bet taip pat ir jausitės.</p>
              <p id="third" class="cstm-m-l" style="margin-left: 0px;cursor: pointer; font-size: 18px"><span class="skin-clr" style="font-size: 16px;">+</span>&nbsp;&nbsp;ValoJūsųkūną</p>
              <p class="third" style="font-size: 13px;display: none">
              Natūralūs ingredientai, tarp jų - Senna lapai, padės išvalyti Jūsų organizmą ir sumažinti pilvo išsipūtimą bei pūtimo jaus</p>
              <p id="four" class="cstm-m-l" style="margin-left: 0px;cursor: pointer; font-size: 18px"><span class="skin-clr" style="font-size: 16px;">+</span>&nbsp;&nbsp;Suteikiadaugiauenergijos</p>
              <p class="four" style="font-size: 13px;display: none">
              Matės žolės (isp. Yerbe Mate) lapų bei gudobelės (angl. Hawthorn) uogų mišinys ir kitos gamtos gėrybės.</p>
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
            <p class="title black-clr">Arbata su misija</p>
            <hr>
            <div class="cont">
              <p class="skin-clr">
               Leptin siekė atrasti paprastą, natūralų, sveikatai nepavojingą ir veiksmingą būdą išvalyti organizmą be alinančių pastangų. Taip atsirado visiškai natūrali arbata, sukurta po rūpestingų tyrinėjimų, padedanti iš organizmo pašalinti toksinus bei valanti ne tik Jūsų kūną, bet ir mintis. Pagaminta naudojant tik aukščiausios kokybės sudedamąsias dalis, <a href="#" data-toggle="modal" data-target="#myModal1" style="font-size: 14px;"> + Daugiau</a> 
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

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: #d8b763;font-family: 'Raleway', sans-serif;
    font-style: italic;">Arbata su misija</h4>
      </div>
      <div class="modal-body" style="color: #d8b763;
    font-size: 18px;
    font-family: 'Raleway', sans-serif;
    font-style: italic;">
     Leptin siekė atrasti paprastą, natūralų, sveikatai nepavojingą ir veiksmingą būdą išvalyti organizmą be alinančių pastangų. Taip atsirado visiškai natūrali arbata, sukurta po rūpestingų tyrinėjimų, padedanti iš organizmo pašalinti toksinus bei valanti ne tik Jūsų kūną, bet ir mintis. Pagaminta naudojant tik aukščiausios kokybės sudedamąsias dalis,

        Visi žinome, kokia svarbi yra aktyvi gyvensena ir tinkama mityba, bet to ne visada užtenka norint be vargo pasiekti trokštamų rezultatų neprarandant motyvacijos. Ypač, kai įdėtos pastangos neskuba atsispindėti ne tik išvaizdoje, bet ir savijautoje, o juk puikiai jaustis norime jau dabar! Leptin arbata natūraliai palengvins dažnų nusiskundimų simptomus, palengvins organizmo darbą, ir, vartojama kartu laikantis subalansuotos lieknėjimo programos, padės Jums pasiekti pastebimų rezultatų bei pagerinti savijautą.

      </div>
      
    </div>
  </div>
</div>




    <div class="cstm-sec4">
      <div class="cstm-sec4-sub3">
        <div class="col-lg-12 p-0 cstm-center">
          <div class="col-lg-6 p-0">
            <img src="{{asset('public/front-end-laptin/img/img13.jpg')}}" class="img-responsive">
          </div>
          <div class="col-lg-6 p-0 text-center">
            <p class="title black-clr">Leptin komanda</p>
            <hr>
            <div class="cont">
              <p class="skin-clr">
              Visi žinome apie sporto ir tinkamos mitybos svarbą, bet taip pat suprantame, jog to ne visada užtenka norint greičiau ir be vargo pasiekti trokštamų rezultatų. Leptin komanda siekė rasti paprastą, lengvą ir, svarbiausia, veiksmingą būdą išvalyti organizmą be alinančių pastangų; Leptin kūrėjų tikslas yra prisidėti, jog ši patirtis ir puikūs rezultatai būtų prieinami kiekvienam.

             
              <a href="#" data-toggle="modal" data-target="#myModal" style="font-size: 14px;"> + Daugiau</a> 
              </p>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

      <!-- modal 1 -->
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: #d8b763;font-family: 'Raleway', sans-serif;
    font-style: italic;">Leptin komanda</h4>
      </div>
      <div class="modal-body" style="color: #d8b763;
    font-size: 15px;
    font-family: 'Raleway', sans-serif;
    font-style: italic;">

       Visi žinome apie sporto ir tinkamos mitybos svarbą, bet taip pat suprantame, jog to ne visada užtenka norint greičiau ir be vargo pasiekti trokštamų rezultatų. Leptin komanda siekė rasti paprastą, lengvą ir, svarbiausia, veiksmingą būdą išvalyti organizmą be alinančių pastangų; Leptin kūrėjų tikslas yra prisidėti, jog ši patirtis ir puikūs rezultatai būtų prieinami kiekvienam.
       Leptin komanda nenuilstamai ieškojo natūralių gamtos gėrybių ir jų mišinių, kurie turėtų didžiausią teigiamą poveikį Jūsų kūnui. Tad Leptin misija buvo aiški: rasti ingredientus galinčius mums padėti ne tik jaustis, bet ir atrodyti puikiai.  <br>
        Leptin atsirinko tik pačias geriausias ir aukščiausios kokybės natūralias žaliavas (jų tarpe - laimo bei kiaulpienių lapai, godži uogos bei kitos gamtos gėrybės), kurios buvo pramintos „super ingredientais“. Būtent šių „super ingredientų“ pagrindu ir buvo sukurta Leptin produktų linija, turinti iš esmės pakeisti tai, kaip Jūs atrodote bei jaučiatės.
        Taip gimė Leptin arbata - visiškai natūrali arbata, sukurta po rūpestingų tyrinėjimų, padedanti atsikratyti toksinų, išvalyti bei išgryninti ne tik Jūsų kūną, bet ir mintis. Pagaminta naudojant tik aukščiausios kokybės sudedamąsias dalis, Leptin  arbata natūraliai palengvins dažnų nusiskundimų simptomus, ir, vartojama kartu laikantis subalansuotos lieknėjimo programos, padės Jums pasiekti pastebimų rezultatų.

      </div>
      
    </div>
  </div>
</div>


    <!-- endmodal1 -->
  
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

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#first').click(function(){
        $('.second').css('display','none');
        $('.third').css('display','none');
        $('.four').css('display','none');
        $('.first').fadeIn(800);
      });
      $('#second').click(function(){
        $('.first').css('display','none');
        $('.third').css('display','none');
        $('.four').css('display','none');
        $('.second').fadeIn(800);
      });
      $('#third').click(function(){
        $('.first').css('display','none');
        $('.second').css('display','none');
        $('.four').css('display','none');
        $('.third').fadeIn(800);
      });
      $('#four').click(function(){
        $('.first').css('display','none');
        $('.second').css('display','none');
        $('.third').css('display','none');
        $('.four').fadeIn(800);
      });
    });
  </script>
  @endsection