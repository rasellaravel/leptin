<html>
  <head>
    <title>Leptin.it</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta name="verify-paysera" content="a13eecc1ddaab12866ad0ba4b4a6f032">
    <link rel="stylesheet" href="{{asset('public/front-end-laptin/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front-end-laptin/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front-end-laptin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front-end-laptin/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front-end-laptin/css/style.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Montserrat:100i,200,300,400,500,600,700,800,900|Raleway:300,400,600" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/front-end-laptin/css/leptin.css')}}"/>
    <script type="text/javascript" src="{{asset('public/front-end-laptin/js/jquery-2.1.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/front-end-laptin/js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/front-end-laptin/js/bootstrap.min.js')}}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('style')

  </head>
<body>
  <div class="main-menu" id="menu1">
    <div class="col-lg-12">
      <div class="col-lg-2 text-center">
        <a href="{{url('/')}}"><img src="{{asset('public/front-end-laptin/img/logo1.png')}}" class="img-responsive m-0-auto"></a>
      </div>
      <div class="col-lg-10">
        <button class = "navbar-toggle" data-toggle="collapse" data-target = ".navHeaderCollapse" >
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="{{url('/')}}">Pagrindinis</a></li>
            <li><a href="#menu2">Kodėl tai veikia</a></li>
            <li><a href="#menu3">Apie mus</a></li>
            <li><a href="#menu4">Kontaktai</a></li>
            <li><a href="{{url('cart-item')}}"><strong>Krepšelis</strong>&nbsp;<i class="fa fa-shopping-cart skin-clr"></i><sup>{{Cart::content()->count()}}</sup></a> 

            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>


  @yield('content')




 <div class="footer" id="menu4">
    <div class="col-lg-12">
      <div class="col-lg-offset-2 col-lg-8">
        <p class="title">Susisiekite</p>
        <hr>
        <p class="text-center">
          Tel: + <a href="tel: ">37067456485</a> info@leptin.it <br>
          MB Dagna <br>
        </p>
        <div class="col-lg-12">
        <form action="{{url('sendMessage')}}" method="post">
        @csrf
          <div class="col-lg-6">
            <input type="text" class="form-control cstm-form-control" placeholder="VARDAS*" name="name" required>
            <input type="text" class="form-control cstm-form-control" placeholder="EL PASTAS*" name="email" required>
            <input type="text" class="form-control cstm-form-control" placeholder="TEMA" name="subject" required>
          </div>
          <div class="col-lg-6">
            <textarea name="msg" id="" cols="30" rows="6" class="form-control cstm-form-control" placeholder="ZINUTE" required></textarea>
            <button type="submit" class="btn cstm-btn3">Siųsti</button>
          </div>
          @if(session('success'))
           &nbsp;&nbsp;&nbsp;<span class="message">Message Send Successfully</span>
           @endif
          </form>
        </div>
        <div class="clearfix"></div>
      </div> 
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="footer1">
    <div class="container">
      <div class="col-lg-12">
      <div class="col-lg-3 text-center">
        @Leptin.it | 2018
      </div>
        <div class="col-lg-5 text-center">
        <a href="#" data-toggle="modal" data-target="#myModal3">PRISTATYMAS </a> &nbsp;|
          <a href="#" data-toggle="modal" data-target="#myModal3">PRISTATYMAS </a> &nbsp;|
          <a href="#" data-toggle="modal" data-target="#myModal3">DUK </a> &nbsp;|
          <a href="#" data-toggle="modal" data-target="#myModal3">APMOKĖJIMAS </a> &nbsp;
        </div>
        <div class="col-lg-4">
           <a href="#" data-toggle="modal" data-target="#myModal3" style="font-size: 14px;"><p>Atsakomybės apribojimas</p></a>
        </div>
       
        
      </div>
      <div class="clearfix"></div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: #d8b763;font-family: 'Raleway', sans-serif;
    font-style: italic;">Atsakomybės apribojimas</h4>
      </div>
      <div class="modal-body" style="color: #d8b763;
    font-size: 16px;
    font-family: 'Raleway', sans-serif;
    font-style: italic;">
    
       "Leptin" produkcija nepadaro ir negarantuoja kokio nors konkretaus rezultato ar poveikio naudojant produktus. Kompanijos parduodančios produkcija pareiga yra užtikrinti, kad visi jo gaminiai būtų saugūs ir atitiktų reikalavimus atitinkančias sąlygas iki pristatymo vietos. Nesėkmė su produkto rezultatais nebus pagrindas grąžinti pinigus.
 
"Leptin" produktai nėra maisto pakaitalas. Kad galėtumėte gauti didžiausią naudą sveikatai, jie turėtų būti suvartojami kartu su sveikos subalansuotos mitybos ir tinkamos sporto programos.
 
Mes negarantuojame jokio konkretaus rezultato ar efekto naudojant mūsų produktus. Mes esame atsakingi už tai, kad visi mūsų gaminiai būtų nekenksmingi ir atitiktų reikalavimus iki pristatymo.
 
Kiekvieno asmens rezultatai bus skirtingi. Nors "Leptin" yra skirtas padėti žmonėms, mes nesame atsakingi už rezultatus ir klientų lūkesčius.


      </div>
      
    </div>
  </div>
</div>


    <!-- endmodal1 -->
  
  @yield('script')



   <script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay: true,
    autoplaySpeed: 1000,
    autoplayTimeout: 30000000,
    // animateOut: 'slideOutDown',
    // animateIn: 'flipInX',
    responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:7
            }
        }
    })
    var owl = $('.owl-carousel');
    owl.owlCarousel();
    $('.customNextBtn').click(function() {
        owl.trigger('next.owl.carousel');
    })
    $('.customPrevBtn').click(function() {
        owl.trigger('prev.owl.carousel', [300]);
    })
  </script>

  <script>
    // smooth scroll bar
      function scrollNav() {
      $('a').click(function(){
        var theClass = $(this).attr("class");
        $('.'+theClass).parent('li').addClass('active');
        //Animate
        $('html, body').stop().animate({
          scrollTop: $( $(this).attr('href') ).offset().top
        }, 1000);
        return false;
      });
      $('.scrollTop a').scrollTop();
      }
      scrollNav();
      // smooth scroll bar ENDS
  </script>
  <script type="text/javascript">
    $('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
  </script>

   
 
</body>
</html>