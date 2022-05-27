@extends('layout')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						@if(session()->has('message'))
							<div class="alert alert-success">
								{!! session()->get('message') !!}
							</div>
							@elseif(session()->has('error'))
							<div class="alert alert-danger">
								{!! session()->get('error') !!}
							</div>
							@endif
						<h2>Log in to your account</h2>
						<form action="{{URL::to('/login-customer')}}" method="POST">
							{{csrf_field()}}
							<input type="text" name="email_account" placeholder="Account" />
							<input type="password" name="password_account" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Remember login
							</span>
							
							<span>
								<a href="{{url('/forgot-password')}}">Forgot password</a>
							</span>

							<button type="submit" class="btn btn-default">Login</button>

						</form>
						
						<style type="text/css">

							ul.list-login {
							    margin: 10px;
							    padding: 0;
							}
							ul.list-login li {
							    display: inline;
							    margin: 5px;
							}
							
						</style>

						<ul class="list-login">

							<li>
								<a href="{{url('login-customer-google')}}">
									<img width="10%" alt="Sign in with google account"  src="{{asset('public/frontend/images/gg.png')}}">
								</a>
							</li>
							
							<li>
								<a href="{{url('login-facebook-customer')}}">
									<img width="10%" alt="Login with facebook account"  src="{{asset('public/frontend/images/fb.png')}}">
								</a>
							</li>
						</ul>
							
						
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Register</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="customer_name" placeholder="Name"/>
							<input type="email" name="customer_email" placeholder="Email address"/>
							<input type="password" name="customer_password" placeholder="Password"/>
							<input type="text" name="customer_phone" placeholder="Phone"/>
							<button type="submit" class="btn btn-default">Register</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection