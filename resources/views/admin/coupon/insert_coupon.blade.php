@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Add discount code
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
                                <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add discount code</label>
                                    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Start day</label>
                                    <input type="text"  name="coupon_date_start" class="form-control" id="start_coupon" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">End day</label>
                                    <input type="text" name="coupon_date_end" class="form-control" id="end_coupon" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Discount code</label>
                                    <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Quantity</label>
                                      <input type="text" name="coupon_time" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Code feature</label>
                                     <select name="coupon_condition" class="form-control input-sm m-bot15">
                                             <option value="0">----Seclect-----</option>
                                            <option value="1">Reduce by percent</option>
                                            <option value="2">Reduce by money</option>
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Enter number % or money</label>
                                     <input type="text" name="coupon_number" class="form-control" id="exampleInputEmail1" >
                                </div>
                               
                               
                                <button type="submit" name="add_coupon" class="btn btn-info">Add coupon</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection