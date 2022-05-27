@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->

                                               
                        <h2 class="title text-center">{{$brand_name->brand_name}}</h2>

                       
                           <div class="row">

                            <div class="col-md-12">
                                    
                                    <label for="amount">Filter brands</label>

                                    @php

                                        $brand_id = [];
                                        $brand_arr = [];

                                     if(isset($_GET['brand'])){
                                            $brand_id = $_GET['brand'];
                                    }else{
                                            $brand_id = $brand_name->brand_id.",";

                                    }
                                     $brand_arr = explode(",", $brand_id);

                                     @endphp

                                    @foreach($brand as $key => $bra)

                                    <label class="checkbox-inline">
                                       <input  type="checkbox"
                                        class="form-control-checkbox brand-filter" data-filters="brand" value="{{$bra->brand_id}}" name="brand-filter" 

                                        {{ in_array($bra->brand_id, $brand_arr) ? 'checked' : ''}} >{{$bra->brand_name}}

                                   </label>

                                    @endforeach

                                </div>
                            </div>

                        <p></p>
                        <div class="row">

                            <div class="col-md-4">
                                    
                                    <label for="amount">Sorted by</label>

                                    <form>
                                        @csrf

                                    <select name="sort" id="sort" class="form-control">
                                        <option value="{{Request::url()}}?sort_by=none">--Filter by--</option>
                                        <option value="{{Request::url()}}?sort_by=tang_dan">--Prices go up--</option>
                                        <option value="{{Request::url()}}?sort_by=giam_dan">--Prices go down--</option>
                                        <option value="{{Request::url()}}?sort_by=kytu_az">Filter by name A to Z</option>
                                        <option value="{{Request::url()}}?sort_by=kytu_za">Filter by name Z to A</option>
                                    </select>

                                    </form>
                               
                            </div>

                             <div class="col-md-4">
                                    
                                    <label for="amount">Filter prices by</label>

                                    <form>
                                        <div id="slider-range"></div>
                                        <style type="text/css">
                                            .style-range p {
                                                float: left;
                                                width: 25%;
                                            }
                                        </style>
                                        <div class="style-range">
                                            <p><input type="text" id="amount_start" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
                                            <p><input type="text" id="amount_end" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>
                                        </div>
                                        <input type="hidden" name="start_price" id="start_price">
                                        <input type="hidden" name="end_price" id="end_price">

                                         <br>
                                         <div class="clearfix"></div>
                                         <input type="submit" name="filter_price" value="Filter prices" class="btn btn-sm btn-default">
                                    </form>
                               
                            </div>



                        </div>
                        @foreach($brand_by_id as $key => $product)

                        <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                           
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                @csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                            <a href="{{URL::to('/chi-tiet/'.$product->product_slug)}}">
                                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                                <h2>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h2>
                                                <p>{{$product->product_name}}</p>

                                             
                                             </a>
                                            <input type="button" value="Add to cart" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                            </form>

                                        </div>
                                      
                                </div>
                           
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Like</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                    
                        </div>
                        </a>
                        @endforeach
                    </div><!--features_items-->
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$brand_by_id->links()!!}
                      </ul>

        <!--/recommended_items-->
@endsection