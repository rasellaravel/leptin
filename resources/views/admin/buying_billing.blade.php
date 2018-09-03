  @extends('admin.layout')

  @section('style')
  @include('admin.product-style')
  @endsection

  @section('content')

  <!-- Page content -->
        <div id="content" class="col-md-12">
          








          <!-- page header -->
          <div class="pageheader">
            

            <h2><i class="fa fa-thumb-tack" style="line-height: 48px;padding-left: 1px;"></i> Products<span></span></h2>
            

            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>You are here</li>
                <li><a href="index.html">Leptin</a></li>
                <li><a href="form-elements.html">Dashboard</a></li>
                <li class="active">Billing</li>
              </ol>
            </div>


          </div>
          <!-- /page header -->
          
          




          <!-- content main container -->
          <div class="main">


            <!-- row -->
            <div class="row">
              

              <!-- col 12 -->
              <div class="col-md-12">
             
                <!-- tile -->
                <section class="tile color transparent-black">


                  <!-- tile header -->
                  <div class="tile-header">
                    <h1><strong>Billing Details</strong></h1>
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <!-- /tile header -->

               
                


                </section>
                <!-- /tile -->
                <section class="tile transparent">
                 <div class="tile-body color transparent-black rounded-corners">
                    <div class="billing-details">
                      <p>Order Id : {{$billing->order_id}}</p>
                      <p>First Name : {{$billing->f_name}}</p>
                      <p>Last Name : {{$billing->l_name}}</p>
                      <p>Country : {{$billing->country}}</p>
                      <p>Street Address1 : {{$billing->street_address1}}</p>
                      <p>Street Address2 : {{$billing->street_address2}}</p>
                      <p>City : {{$billing->city}}</p>
                      <p>District : {{$billing->district}}</p>
                      <p>Zip Code : {{$billing->zip}}</p>
                      <p>Phone : {{$billing->phone}}</p>
                      <p>Email : {{$billing->email}}</p>
                      <p>Date :  <?php
                              $newDate  = strtotime($billing->created_at);
                              echo date('Y-m-d: H:i a',$newDate);
                            ?></p>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="{{url('admin/order')}}" class="btn btn-info">Back to Order</a>
                  </div>
                 </section> 






              </div>
              <!-- /col 12 -->


            </div>
            <!-- /row -->
          


          </div>
          <!-- /content container -->






        </div>
        <!-- Page content end -->


  @endsection


  @section('script')
  @include('admin.product-script')
  @endsection