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
                <li class="active">Order</li>
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
                    <h1><strong>Product Order</strong></h1>
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
                    
                    <div class="table-responsive">
                      <table  class="table table-datatable table-custom" id="basicDataTable">
                        <thead>
                          <tr>
                            <th class="sort-alpha">Order Id</th>
                            <th class="">Name</th>
                            <th class="">Phone</th>
                            <th class="">Email</th>
                            <th class="">Product</th>
                            <th class="">Quentity</th>
                            <th class="">Price</th>
                            <th class="">Total</th>
                            <th class="">Date</th>
                            <th class="">Status</th>
                            <th>Dalivary</th>
                            <th>Billing</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)  
                        <tr>
                          <td>{{$order->order_id}}</td>
                          <td>
                          <?php
                            $userInfo = DB::table('billings')->where('order_id',$order->order_id)->first();
                            echo $userInfo->f_name.' '.$userInfo->l_name;
                          ?>
                          </td>
                          <td><?php echo $userInfo->phone;?></td>
                          <td><?php echo $userInfo->email;?></td>
                          <td>{{$order->product_name}}</td>
                          <td>{{$order->qty}}</td>
                          <td>{{$order->price}} EU</td>
                          <td>{{$order->total}} EU</td>
                          <td>
                            <?php
                              $newDate  = strtotime($order->created_at);
                              echo date('Y-m-d: H:i a',$newDate);
                            ?>
                          </td>
                          <td><?php
                          if($order->status==0){
                            echo 'Pending...';
                          }else{
                            echo'Delivared';
                          }
                          ?></td>
                          <td>
                          @if($order->status==0)
                          <a href="{{url('admin/delevar',$order->id)}}" class="btn btn-success"> Delevar </a>
                          @endif
                          </td>
                          <td><a href="{{url('admin/buying_billing',$order->order_id)}}" class="btn btn-info">See billing</a></td>
                        </tr>
                        @endforeach

                        </tbody>
                      </table>
                    </div>

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