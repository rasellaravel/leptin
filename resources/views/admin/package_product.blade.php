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
                    <h1><strong>Add Packege Product</strong></h1>
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
                  <form action="{{url('admin/packeg-product-store')}}" method="post" enctype= multipart/form-data>	

                  @csrf
                  <div class="tile-body">
                     
                    <div class="row">
                    
                     
                      
                     <!--  <div class="form-group">
                        <label for="colorpicker-rgb" class="col-sm-2 control-label">Thumbnail Image</label>
                        <div class="col-sm-6">
                          <div class="input-group">
                            <span class="input-group-btn">
                              <span class="btn btn-primary btn-file">
                                <i class="fa fa-upload"></i><input type="file" name="thumb" required>
                              </span>
                            </span>
                            <input type="text" class="form-control" readonly="">

                          </div>
                          <div class="error" style="color: #f1e3e3">{{$errors->first('thumb')}}</div>
                        </div>
                      </div>
 -->
                       
                     <div class="form-group col-sm-6">
                        <label for="exampleInputEmail">Product Details Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail" placeholder="link" name="img" required>
                      </div>

                     <div class="form-group col-sm-6">
                        <label for="exampleInputEmail">Product Details link</label>
                        <input type="text" class="form-control" id="exampleInputEmail" placeholder="link" name="link" required>
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
                            <th class="sort-alpha">Details Link</th>
                            <th class="sort-amount">Images</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;?>
                        @foreach($PackageProduct as $Product)  
                        <?php $i++;?>
                          <tr class="odd gradeX">
                                  <td>{{$i}}</td>
                                  <td>{{$Product->link}}</td>
                                  <td class="text-center">
                                    <img src="{{asset('public/front-end-laptin/product-image/'.$Product->img)}}" height="50px" width="50px;">
                                  </td>
                                  <td><a href="{{url('admin/packeg-product-edit',$Product->id)}}">
                                  <i class="fas fa-edit" style="color: #54e816; font-size: 14px;"></i>
                                  </a> </td>

                                  <td> 
                                  <a onclick="return confirm('Are you sere to delete this item?')" href="{{url('admin/packeg-product-delete', $Product->id)}}"> <i class="far fa-trash-alt" style="color: #54e816; font-size: 14px;"></i>
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