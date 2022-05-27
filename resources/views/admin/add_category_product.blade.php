@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Add product category
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
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name category</label>
                                    <input type="text"  class="form-control"  onkeyup="ChangeToSlug();" name="category_product_name"  id="slug" placeholder="category" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slug_category_product" class="form-control" id="convert_slug" placeholder="Name category">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category Description</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Category Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category keywords</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Category Description"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Belonging to the category</label>
                                      <select name="category_parent" class="form-control input-sm m-bot15">
                                        <option value="0">---Category Parent---</option>
                                        @foreach($category as $key => $val)
                                           <option value="{{$val->category_id}}">{{$val->category_name}}</option>
                                        @endforeach
                                            
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Display</label>
                                      <select name="category_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Show</option>
                                            <option value="1">Hide</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_category_product" class="btn btn-info">Add category</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection