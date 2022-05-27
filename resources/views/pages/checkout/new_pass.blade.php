@extends('layout')
@section('content')

<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-sm-offset-1">
				@if(session()->has('message'))
				<div class="alert alert-success">
					{!! session()->get('message') !!}
				</div>
				@elseif(session()->has('error'))
				<div class="alert alert-danger">
					{!! session()->get('error') !!}
				</div>
				@endif
				<div class="login-form"><!--login form-->
					@php 
						$token = $_GET['token'];
						$email = $_GET['email'];
					@endphp
					<h2>Enter new password</h2>
					<form action="{{url('/reset-new-pass')}}" method="POST">
						@csrf
						<input type="hidden" name="email" value="{{$email}}"/>
						<input type="hidden"name="token" value="{{$token}}"/>
						<input type="text" name="password_account" placeholder="Enter your new password..." />
						<button type="submit" class="btn btn-default">Send</button>
					</form>
				</div><!--/login form-->
			</div>
			
		</div>
	</div>
</section><!--/form-->

@endsection