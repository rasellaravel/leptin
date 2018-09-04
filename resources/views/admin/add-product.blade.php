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
          <li class="active">Prodcuct</li>
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
              <h1><strong>Add Product</strong></h1>
              <div class="controls">
                <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                <a href="#" class="remove"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <!-- /tile header -->

            <!-- tile body -->
            @if(session('success'))

            <p class="alert alert-success">{{session('success')}}</p>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form action="{{url('admin/product-store')}}" method="post" enctype= multipart/form-data>	

              @csrf
              <div class="tile-body">
               
                <div class="row">
                  
                  <div class="form-group col-sm-6">
                    <label for="exampleInputEmail">Product Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter Product Title" name="title">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="exampleInputPassword1">Product Price</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Product Price" name="price">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="exampleInputPassword2">Discount (%)</label>
                    <input type="number" class="form-control" id="exampleInputPassword2" placeholder="Discount" name="discount">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="exampleInputEmail">Thumbnail Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail" placeholder="link" name="thumb">
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="exampleInputEmail">Preview Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail" placeholder="link" name="image[]" multiple >
                  </div>
                  <div class="col-sm-6">
                    <div class="" style="margin-top: 30px;">
                      <label style="font-size: 16px; color: white">
                        <input type="checkbox" name="is_home" value="1" style="height: 20px; width: 20px">

                        Special Product
                      </label>
                    </div>
                    
                  </div>

                  
                  <div class="form-group col-sm-12">
                    <label for="exampleInputPassword2">Description</label>
                    <textarea class="form-control" rows="10" name="description"></textarea>
                  </div>
                  




                </div>

                <div class="row">

                 
                  <div class="col-sm-offset-4 col-sm-8 text-right">
                    <button type="submit" class="btn btn-greensea">Save</button>
                    <button type="reset" class="btn btn-red">Reset</button>
                  </div>
                  
                  

                </div>

              </div>

            </form>
            <!-- /tile body -->
            


          </section>
          <!-- /tile -->
          <section class="tile transparent">
           <div class="tile-body color transparent-black rounded-corners">
            
            <div class="table-responsive">
              <table  class="table table-datatable table-custom" id="basicDataTable">
                <thead>
                  <tr>
                    <th class="sort-alpha">#</th>
                    <th class="sort-alpha">Product Title</th>
                    <th class="sort-amount">Product Price</th>
                    <th class="sort-numeric">Discount</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0;?>
                  @foreach($Product as $Product)	
                  <?php $i++;?>
                  <tr class="odd gradeX">
                    <td>{{$i}}</td>
                    <td>{{$Product->product_title}}</td>
                    <td>@if($Product->product_price)
                      {{$Product->product_price}} EU
                      @endif
                    </td>
                    <td class="text-center">
                      <?php
                      if($Product->discount){
                        echo $Product->discount.' EU';
                      }
                      ?>

                      

                    </td>
                    
                    <td class="text-center">
                     <img src="{{asset('public/front-end-laptin/product-image/'.$Product->product_image)}}" height="50px" width="50px;">
                   </td>


                   <td> 
                    <a href="{{url('admin/product-edit', $Product->id)}}">
                      <i class="fas fa-edit" style="color: #54e816; font-size: 14px;"></i>
                    </a>	
                    
                    
                    &nbsp; &nbsp; <a onclick="return confirm('Are you sere to delete this item?')" href="{{url('admin/product-delete', $Product->id)}}"> <i class="far fa-trash-alt" style="color: #54e816; font-size: 14px;"></i>
                    </a>	
                  </td>
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