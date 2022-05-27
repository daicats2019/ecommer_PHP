@extends('layout')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Home page</a></li>
				<li class="active">Checkout cart</li>
			</ol>
		</div>

		<div class="register-req">
			<p>Please register or login to check out the cart and review your purchase history</p>
		</div><!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
				<style type="text/css">
				.col-md-6.form-style input[type=text] {
					margin: 5px 0;
				}
			</style>
			<div class="col-md-12 clearfix">
				<div class="bill-to">
					<p>Fill in shipping information</p>

					<div class="col-md-6 form-style">
						<form method="POST">
							@csrf
							<input type="text"  name="shipping_email" class="shipping_email form-control" placeholder="Enter email">
							<input type="text" name="shipping_name" class="shipping_name form-control" placeholder="Enter first and last name">
							<input type="text" name="shipping_address" class="shipping_address form-control" placeholder="Shipping address">
							<input type="text" name="shipping_phone" class="shipping_phone form-control" placeholder="Phone">
							<textarea name="shipping_notes" class="shipping_notes form-control" placeholder="Notes on your order" rows="5"></textarea>

							@if(Session::get('fee'))
							<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
							@else 
							<input type="hidden" name="order_fee" class="order_fee" value="10000">
							@endif

							@if(Session::get('coupon'))
							@foreach(Session::get('coupon') as $key => $cou)
							<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
							@endforeach
							@else 
							<input type="hidden" name="order_coupon" class="order_coupon" value="no">
							@endif



							<div class="">
								<div class="form-group">
									<label for="exampleInputPassword1">Choose a form of payment</label>
									<select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
										<option value="0"> Transfer</option>
										<option value="1">Cash</option>   
									</select>
								</div>
							</div>
							<input type="button" value="Order confirmation" name="send_order" class="btn btn-primary btn-sm send_order">
						</form>
					</div>
					<div class="col-md-6">	
						<form>
							@csrf 

							<div class="form-group">
								<label for="exampleInputPassword1">Select city</label>
								<select name="city" id="city" class="form-control input-sm m-bot15 choose city">

									<option value="">--Select city--</option>
									@foreach($city as $key => $ci)
									<option value="{{$ci->matp}}">{{$ci->name_city}}</option>
									@endforeach

								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Select district</label>
								<select name="province" id="province" class="form-control input-sm m-bot15 province choose">
									<option value="">--Select district--</option>

								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Select ward</label>
								<select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
									<option value="">--Select ward--</option>   
								</select>
							</div>


							<input type="button" value="Charge shipping" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">


						</form>
					</div>



				</div>
			</div>
			<div class="col-sm-12 clearfix">
				@if(session()->has('message'))
				<div class="alert alert-success">
					{!! session()->get('message') !!}
				</div>
				@elseif(session()->has('error'))
				<div class="alert alert-danger">
					{!! session()->get('error') !!}
				</div>
				@endif
				<div class="table-responsive cart_info">

					<form action="{{url('/update-cart')}}" method="POST">
						@csrf
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td class="image">Image</td>
									<td class="description">Product name</td>
									<td class="price">Product price</td>
									<td class="quantity">Quantity</td>
									<td class="total">Total</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@if(Session::get('cart')==true)
								@php
								$total = 0;
								@endphp
								@foreach(Session::get('cart') as $key => $cart)
								@php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
								@endphp

								<tr>
									<td class="cart_product">
										<img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
									</td>
									<td class="cart_description">
										<h4><a href=""></a></h4>
										<p>{{$cart['product_name']}}</p>
									</td>
									<td class="cart_price">
										<p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											
											
											<input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >
											

										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">
											{{number_format($subtotal,0,',','.')}}đ

										</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
									</td>
								</tr>

								@endforeach
								<tr>
									<td><input type="submit" value="Update cart" name="update_qty" class="check_out btn btn-default btn-sm"></td>
									<td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Delete all</a></td>
									<td>
										@if(Session::get('coupon'))
										<a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Remove coupoon code</a>
										@endif
									</td>


									<td colspan="2">
										<li>Total amount :<span>{{number_format($total,0,',','.')}}đ</span></li>
										@if(Session::get('coupon'))
										<li>
											
											@foreach(Session::get('coupon') as $key => $cou)
											@if($cou['coupon_condition']==1)
											Discount Code : {{$cou['coupon_number']}} %

											<p>
												@php 
												$total_coupon = ($total*$cou['coupon_number'])/100;

												@endphp
											</p>
											<p>
												@php 
												$total_after_coupon = $total-$total_coupon;
												@endphp
											</p>
											@elseif($cou['coupon_condition']==2)
											Discount Code : {{number_format($cou['coupon_number'],0,',','.')}} k

											<p>
												@php 
												$total_coupon = $total - $cou['coupon_number'];

												@endphp
											</p>
											@php 
											$total_after_coupon = $total_coupon;
											@endphp
											@endif
											@endforeach
											
											

										</li>

										@endif

										@if(Session::get('fee'))
										<li>	
											<a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>

											Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span></li> 
											<?php $total_after_fee = $total + Session::get('fee'); ?>
											@endif 
											<li>Total:
												@php 
												if(Session::get('fee') && !Session::get('coupon')){
													$total_after = $total_after_fee;
													echo number_format($total_after,0,',','.').'đ';

												}elseif(!Session::get('fee') && Session::get('coupon')){
													$total_after = $total_after_coupon;
													echo number_format($total_after,0,',','.').'đ';
												}elseif(Session::get('fee') && Session::get('coupon')){
													$total_after = $total_after_coupon;
													$total_after = $total_after + Session::get('fee');
													echo number_format($total_after,0,',','.').'đ';
												}elseif(!Session::get('fee') && !Session::get('coupon')){
													$total_after = $total;
													echo number_format($total_after,0,',','.').'đ';
												}

												@endphp

											</li>
											
											<div class="col-md-12">
												@php 

													$vnd_to_usd = $total_after/23083;
												@endphp
												<div id="paypal-button"></div>
												<input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
											</div>	
											<div class="col-md-12">
												<img src="{{asset('public/qr-code-example.png')}}">
											</div>	
										</td>

									</tr>
									@else 
									<tr>
										<td colspan="5"><center>
											@php 
											echo 'Please add product to cart';
											@endphp
										</center></td>
									</tr>
									@endif
								</tbody>

								

							</form>
							@if(Session::get('cart'))
							<tr><td>

								<form method="POST" action="{{url('/check-coupon')}}">
									@csrf
									<input type="text" class="form-control" name="coupon" placeholder="Enter discount code"><br>
									<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Calculate discount code">

								</form>
							</td>
						</tr>
						@endif

					</table>


				</div>
			</div>

		</div>
	</div>


</div>


</section> <!--/#cart_items-->

@endsection