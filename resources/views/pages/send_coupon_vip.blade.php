<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body {
		font-family: Arial;
	}

	.coupon {
		border: 5px dotted #bbb;
		width: 80%;
		border-radius: 15px;
		margin: 0 auto;
		max-width: 600px;
	}

	.container {
		padding: 2px 16px;
		background-color: #f1f1f1;
	}

	.promo {
		background: #ccc;
		padding: 3px;
	}

	.expire {
		color: red;
	}
	p.code {
    text-align: center;
    font-size: 20px;
	}
	p.expire {
    text-align: center;
	}
	h2.note {
    text-align: center;
    font-size: large;
    text-decoration: underline;
	}
</style>
</head>
<body>

	<div class="coupon">

		<div class="container">
			<h3>Promo code from shop <a target="_blank" href="https://furniture.com/Shopbanhang/">https://furniture.com</a>
			</h3>
		</div>
		<div class="container" style="background-color:white">

			<h2 class="note"><b><i>
				@if($coupon['coupon_condition']==1)
					Reduce {{$coupon['coupon_number']}}%
				@else
					Reduce {{number_format($coupon['coupon_number'],0,',','.')}}k
				@endif
			    for total purchase order</i></b></h2> 

			<p>Have you ever purchased at the shop? <a target="_blank" style="color:red" href="http://furniture.com/Shopbanhang/">furniture.com</a> if you already have an account please <a target="_blank" style="color:red"  href="https://furniture.com/Shopbanhang/log-in">Log in</a> Log in to your account to purchase and enter the code below to receive a discount on your purchase, thank you. Wish you a lot of health and peace in life.. </p>
		</div>
		<div class="container">
			<p class="code">Use the following Code: <span class="promo">{{$coupon['coupon_code']}}</span>with only {{$coupon['coupon_time']}} discount code, hurry before it runs out.</p>
			<p class="expire">Start date: {{$coupon['start_coupon']}} / Code expiration date: {{$coupon['end_coupon']}}</p>
		</div>

	</div>

</body>
</html> 
