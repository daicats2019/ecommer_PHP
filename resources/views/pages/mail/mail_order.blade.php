<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order confirmation</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div class="container" style="background: #222;border-radius: 12px;padding:15px;">
		<div class="col-md-12" >

			<p style="text-align: center;color: #fff">This is an automated email. Please do not reply to this email.</p>
			<div class="row" style="background: cadetblue;padding: 15px">

				
				<div class="col-md-6" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px">
					<h4 style="margin:0">FURNITURE COMPANY </h4>
					<h6 style="margin:0">SALE - SHIPPING - IMPORT PROFESSIONAL SERVICES</h5>
				</div>

				<div class="col-md-6 logo"  style="color: #fff">
					<p>Hi <strong style="color: #000;text-decoration: underline;">{{$shipping_array['customer_name']}}</strong></p>
				</div>
				
				<div class="col-md-12">
					<p style="color:#fff;font-size: 17px;">You or someone else has registered the service at the shop with the following information:</p>
					<h4 style="color: #000;text-transform: uppercase;">Information bill</h4>
					<p>Code orders : <strong style="text-transform: uppercase;color:#fff">{{$code['order_code']}}</strong></p>
					<p>Promo codes apply: <strong style="text-transform: uppercase;color:#fff">{{$code['coupon_code']}}</strong></p>
					<p>Shipping fee: <strong style="text-transform: uppercase;color:#fff">{{$shipping_array['fee']}}</strong></p>
					<p>Service fee: <strong style="text-transform: uppercase;color:#fff">Order online</strong></p>
					
					<h4 style="color: #000;text-transform: uppercase;">Receiver's information</h4>

					<p>Email : 
						@if($shipping_array['shipping_email']=='')
							<span style="color:#fff">do not have</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_email']}}</span>
						@endif
					</p>

					<p>Sender's first and last name : 
						@if($shipping_array['shipping_name']=='')
							<span style="color:#fff">do not have</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_name']}}</span>
						@endif
					</p>
					<p>Delivery address : 
						@if($shipping_array['shipping_address']=='')
							<span style="color:#fff">do not have</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_address']}}</span>
						@endif
					</p>	
					<p>Phone : 
						@if($shipping_array['shipping_phone']=='')
							<span style="color:#fff">do not have</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_phone']}}</span>
						@endif
					</p>	
					<p>Order Notes : 
						@if($shipping_array['shipping_notes']=='')
							<span style="color:#fff">do not have</span>
						@else
							<span style="color:#fff">{{$shipping_array['shipping_notes']}}</span>
						@endif
					</p>	
					<p>Paymentsn : <strong style="text-transform: uppercase;color:#fff">
						@if($shipping_array['shipping_method']==0)
							Transfer ATM
						@else
							Cash
						@endif
					
					</strong></p>
					<p style="color:#fff">If the consignee information does not have, we will contact the orderer to exchange information about the order placed..</p>



					<h4 style="color: #000;text-transform: uppercase;">Products ordered</h4>

					<table class="table table-striped" style="border:1px">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity to order</th>
								<th>To money</th>

							</tr>
						</thead>

						<tbody>
							@php 
							$sub_total = 0;
							$total = 0;
							@endphp	

							@foreach($cart_array as $cart)

							@php 
							$sub_total = $cart['product_qty']*$cart['product_price'];
							$total+=$sub_total;
							@endphp	

							<tr>
								<td>{{$cart['product_name']}}</td>
								<td>{{number_format($cart['product_price'],0,',','.')}}vnđ</td>
								<td>{{$cart['product_qty']}}</td>
								<td>{{number_format($sub_total,0,',','.')}}vnđ</td>
							</tr>
							@endforeach

							<tr>
								
								<td colspan="4" align="right">Total payment without discount code: {{number_format($total,0,',','.')}}vnđ</td>
							</tr>

						</tbody>
					</table>

				</div>

				<p style="color:#fff">For more information, please contact the website at:<a target="_blank" href="http://furniture.com/Shopbanhang/">Furniture Shop</a>,or contact us via hotline: 19005689. Thank you for ordering from our shop.</p>

			</div>
		</div>
	</div>
</body>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
</html>