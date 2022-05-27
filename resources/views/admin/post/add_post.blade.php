@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Add posts
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
                                <form role="form" action="{{URL::to('/save-post')}}" method="post" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name post</label>
                                    <input type="text" name="post_title" data-validation="length" data-validation-length="min10" data-validation-error-msg="Please enter at least 10 characters" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Name category">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="post_slug" class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Summary post</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="post_desc" id="ckeditor1" placeholder="Category Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="post_content" id="ckeditor2" placeholder="Category Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta keywords</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_meta_keywords" id="exampleInputPassword1" placeholder="Category Description"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Meta Content</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_meta_desc" id="exampleInputPassword1" placeholder="Category Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Post images</label>
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category post </label>
                                      <select name="cate_post_id" class="form-control input-sm m-bot15">
                                        @foreach($cate_post as $key => $cate)
                                            <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                        @endforeach
                                          
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Display</label>
                                      <select name="post_status" class="form-control input-sm m-bot15">
                                            <option value="0">Show</option>
                                            <option value="1">Hide</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_category_product" class="btn btn-info">Add post</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection