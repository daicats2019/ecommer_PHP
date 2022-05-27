@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Update post list
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
                                <form role="form" action="{{URL::to('/update-category-post/'.$category_post->cate_post_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name post</label>
                                    <input type="text" name="cate_post_name" value="{{$category_post->cate_post_name}}" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Name post">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="cate_post_slug"  value="{{$category_post->cate_post_slug}}" class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description post</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="cate_post_desc" id="exampleInputPassword1" placeholder="Description post">{{$category_post->cate_post_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Display</label>
                                      <select name="cate_post_status" class="form-control input-sm m-bot15">
                                        @if($category_post->cate_post_status==0)
                                            <option selected value="0">Show</option>
                                            <option value="1">Hide</option>
                                        @else
                                             <option value="0">Show</option>
                                            <option selected value="1">Hide</option>
                                        @endif

                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="update_post_cate" class="btn btn-info">Update post list</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection