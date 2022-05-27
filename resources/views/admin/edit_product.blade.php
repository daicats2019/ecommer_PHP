@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Product Update
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
                                @foreach($edit_product as $key => $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product name</label>
                                    <input type="text" name="product_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantity product</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Please enter the quantity" name="product_quantity" class="form-control" id="convert_slug" value="{{$pro->product_quantity}}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="product_slug" class="form-control" id="exampleInputEmail1" value="{{$pro->product_slug}}">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" value="{{$pro->product_price}}" name="product_price" class="form-control price_format" id="exampleInputEmail1" >
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Cost</label>
                                    <input type="text" data-validation="length" data-validation-length="min5"  data-validation-error-msg="Please enter the amount" name="price_cost" class="form-control price_format" id="" value="{{$pro->price_cost}}">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Product pictures</label>

                                    <input type="file"  onchange="previewFile(this);" name="product_image" required class="form-control image-preview " id="exampleInputEmail1">

                                    <img id="previewImg" src="{{asset('public/uploads/product/'.$pro->product_image)}}"  width="30%">

                                </div>
                                <style type="text/css">
                                    p.cofile {
                                        text-align: left;
                                        font-size: 16px;
                                        margin: 5px 0;
                                    }
                                </style>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Document</label>
                                    <input type="file" name="document" class="form-control" id="exampleInputEmail1">
                                    @if($pro->product_file)
                                    <p class="cofile">

                                        <a target="_blank" href="{{asset('public/uploads/document/'.$pro->product_file)}}">
                                            {{$pro->product_file}}
                                        </a>

                                        <button type="button" data-document_id="{{$pro->product_id}}" class="btn btn-sm btn-danger btn-delete-document"><i class="fa fa-times"></i></button>

                                    </p>
                                    @else 
                                    <p class="cofile">No file</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description product </label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="ckeditor2">{{$pro->product_desc}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Product Contents</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="ckeditor3" >{{$pro->product_content}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Product portfolio</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Tags Product</label>
                                    <input type="text" data-role="tagsinput" value="{{$pro->product_tags}}" name="product_tags" class="form-control" id="" placeholder="Name category">
                                     
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Brands</label>
                                      <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                             @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                             @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                             @endif
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
                               
                                <button type="submit" name="add_product" class="btn btn-info">Product Update</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection