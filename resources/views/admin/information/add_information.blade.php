@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Add information website
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
                            @foreach($contact as $key => $cont)
                                <form role="form" action="{{URL::to('/update-info/'.$cont->info_id)}}" method="post"  enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact Info</label>
                                    <textarea style="resize: none" data-validation="length" data-validation-length="min5" data-validation-error-msg="Please enter at least 5 characters"  rows="8" class="form-control" name="info_contact" id="ckeditor" >{{$cont->info_contact}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Map</label>
                                    <textarea style="resize: none" data-validation="length" data-validation-length="min5" data-validation-error-msg="Please enter at least 5 characters"  rows="8" class="form-control" name="info_map" id="exampleInputPassword1">{{$cont->info_map}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Fanpage</label>
                                    <textarea style="resize: none" data-validation="length" data-validation-length="min5" data-validation-error-msg="Please enter at least 5 characters" rows="8" class="form-control" name="info_fanpage" id="exampleInputPassword1" placeholder="Category Description">{{$cont->info_fanpage}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image logo</label>
                                    <input type="file" name="info_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('/public/uploads/contact/'.$cont->info_logo)}}" height="100" width="200">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slogan logo</label>
                                    <input type="text" name="slogan_logo" required value="{{$cont->slogan_logo}}" class="form-control" id="exampleInputEmail1">
                                   
                                </div>
                                <button type="submit" name="add_info"  class="btn btn-info">Update information</button>
                                </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

                    <section class="panel">
                        <header class="panel-heading">
                          Update social network button information
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
                         
                                <form role="form" id="form-nut" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name button</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Link button</label>
                                      <input type="text" name="link" id="link" class="form-control">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image button</label>
                                    <input type="file" name="info_image" class="form-control" id="image_nut">
                                   
                                </div>
                                <button type="button" name="add_info" class="btn btn-info add-nut">Add button</button>
                                </form>
                          
                            </div>
                            <div class="position-center">
                                <div id="list_nut"></div>
                            </div>

                        </div>
                    </section>

                     <section class="panel">
                        <header class="panel-heading">
                           Update partner information
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
                         
                                <form role="form" id="form-nut" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Partner name</label>
                                    <input type="text" name="name" id="name_doitac" class="form-control">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Link Partner</label>
                                      <input type="text" name="link" id="link_doitac" class="form-control">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Partner image</label>
                                    <input type="file" name="info_image" class="form-control" id="image_doitac">
                                   
                                </div>
                                <button type="button" name="add_info" class="btn btn-info add-doitac">Add Partner</button>
                                </form>
                          
                            </div>
                            <div class="position-center">
                                <div id="list_doitac"></div>
                            </div>

                        </div>
                    </section>

            </div>
@endsection