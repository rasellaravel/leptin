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
                    <h1><strong>Update Product</strong></h1>
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
                  <form action="{{url('admin/product-update')}}" method="post" enctype= multipart/form-data> 

                  @csrf
                  <div class="tile-body">
                     <input type="hidden" name="id" value="{{$Product->id}}">
                    <div class="row">
                    
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail">Product Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter Product Title" name="title" value="{{$Product->product_title}}" required>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="exampleInputPassword1">Product Price</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Product Price" name="price" value="{{$Product->product_price}}" required>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="exampleInputPassword2">Discount (%)</label>
                        <input type="number" class="form-control" id="exampleInputPassword2" placeholder="Discount" name="discount" value="{{$Product->discount}}">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail">Thumbnail Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail" placeholder="link" name="thumb">
                        <img src="{{asset('public/front-end-laptin/product-image/'.$Product->product_image)}}" height="100px" width="100px;">
                      </div>


                       <div class="form-group col-sm-12">
                        <label for="exampleInputPassword2">Description</label>
                         <textarea class="form-control" rows="10" name="description" required>{{$Product->description}}</textarea>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail">Preview Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail" placeholder="link" name="image[]" multiple >
                         <div class="remove-image">
                            @foreach($Product_image as $p_img)
                            <div class="single-image" style="float: left;position: relative; padding: 10px;">
                            <img src="{{asset('public/front-end-laptin/product-image/'.$p_img->image)}}" height="70px" width="70px;">
                            <a href="{{url('admin/product_image_delete',$p_img->id)}}" style="position: absolute;
                            left: 22px;
                            color: #a2d200;
                            text-decoration: none; ">delete</a>
                            </div>
                            @endforeach
                          </div>
                      </div>
                       <div class="col-sm-6">
                          <div class="" style="margin-top: 30px;">
                            <label style="font-size: 16px; color: white">
                                <input type="checkbox" <?php if($Product->is_home){echo'checked';}?> name="is_home" value="1" style="height: 20px; width: 20px">
                            </label>
                                
                            
                          </div>
                        <p style="margin-top: -31px;margin-left: 30px;">Special Product</p>
                      </div>
                  


                    </div>

                    <div class="row">

                     
                        <div class="col-sm-offset-4 col-sm-8 text-right">
                          <button type="submit" class="btn btn-greensea">Update</button>
                          <a href="{{url('admin/add-product')}}" class="btn btn-red">Back</a>
                        </div>
                     
                   

                    </div>

                  </div>

                  </form>
                  <!-- /tile body -->
                


                </section>
                <!-- /tile -->
               





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