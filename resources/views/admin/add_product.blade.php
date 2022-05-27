@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Add products
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product name</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Please enter at least 10 characters" name="product_name" class="form-control " id="slug" placeholder="Name category" onkeyup="ChangeToSlug();"> 
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Quantity Product</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Please enter the quantity" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="Fill in the quantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="product_slug" class="form-control " id="convert_slug" placeholder="Name category">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Please enter the amount" name="product_price" class="form-control price_format" id="" placeholder="Name category">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Cost</label>
                                    <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Please enter the amount" name="price_cost" class="form-control price_format" id="" placeholder="Name category">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product pictures</label>
                                    
                                   <input type="file" name="product_image" onchange="previewFile(this);"  required class="form-control image-preview " id="exampleInputEmail1">

                                   <!--  <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"> -->

                                   <img id="previewImg" src=" http://aimory.vn/wp-content/uploads/2017/10/no-image.png " width="30%" >

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Document</label>
                                    <input type="file" name="document" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Description</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="product_desc" id="ckeditor1" placeholder="Product Description"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Product Contents</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content"  id="my-editor" placeholder="Product Contents"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Category product</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_parent==0)
                                                <option style="font-size: 15px" value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @foreach($cate_product as $key => $cate_sub)
                                                    @if($cate_sub->category_parent!=0 && $cate_sub->category_parent==$cate->category_id)
                                                    <option style="color: red;font-size: 15px" value="{{$cate_sub->category_id}}">---{{$cate_sub->category_name}}</option>   
                                                    @endif
                                                @endforeach

                                            @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tags product</label>

                                    <input type="text" data-role="tagsinput" name="product_tags" class="form-control">
                                     
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Brand</label>
                                      <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Display</label>
                                      <select name="product_status" class="form-control input-sm m-bot15">
                                         <option value="0">Show</option>
                                            <option value="1">Hide</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_product" class="btn btn-info">Add products</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection