
<!DOCTYPE html>
<html class="noIE" lang="en-US">
<!--<![endif]-->
	<head>
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
		<title>Easy coach</title>

		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/flexslider.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/section.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">
		<link rel="stylesheet" href="{{asset('css/stripe.css')}}">
    
		<script
			src="http://maps.googleapis.com/maps/api/js">
		</script>
		<script src="https://js.stripe.com/v3/"></script>
		<script src="{{asset('js/stripe.js')}}"></script>


		<script src="{{asset('js/jquery-3.4.1.js')}}"></script>
		<script>
			$('document').ready(function name() {
				$('#station1').on('change', function(e){
					e.preventDefault();
					var station = $('#station1').val();
					console.log(station);
						$.ajax({
							url:"{{ url('getstations') }}",
							method:'GET',
							data: {
								id: station
							}, 	
							success:function(data) {
								$('#station2').empty();
								var details = data.result;
								$('#station2').append('<option value="" disabled selected="">Select destination</option>');
								details.forEach(function(element){
									$('#station2').append('<option value='+element.price+' id = '+element.id+'>'+element.name+'</div></option>');
								});
							}
						});
				});
				$('#station2').on('change', function (e) {
					e.preventDefault();
					var selectedStation = $(this).children("option:selected").attr('id');
					$('#stationid').val(selectedStation);
					var th = $('#station2').val();
					$('#price').val(th);
					$('#fare_amount').val(th);
				});
			});
		</script>
</head>
<body style="color: black">

<!-- Home -->
	<section class="header">
		
		<nav class="navbar navbar-default">
			<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
			<a class="navbar-brand" href="{{ url('/') }}" title="HOME"><img src="{{ asset('assets/images/easy-e.png') }}" alt="logo"></span></a>
				</div> <!-- /.navbar-header -->

		    <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="{{url('/')}}"><b>Home</b></a></li>
						<li><a href="about.html"><b>about</b></a></li>
							<li><a href="Stations.html"><b>Stations</b></a></li>
						<li><a href="services.html"><b>services</b></a></li>
						<li><a href="{{route('bookings.index')}}"><b>Booking</b></a></li>
						<li><a href="contact.html"><b>contact</b></a></li>
						
						@guest
							<li>
								<a href="{{ route('login') }}"><b>{{ __('Login') }}</b></a>
							</li>
							@if (Route::has('register'))
								<li>
									<a href="{{ route('register') }}"><b>{{ __('Register') }}</b></a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<b>{{ Auth::user()->name }}</b> <span class="caret"></span>
								</a>
	
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
	
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul> <!-- /.nav -->
				</div><!-- /.navbar-collapse -->
		  	</div><!-- /.container -->
		</nav>
	</section> <!-- /#header -->

<!-- Section Background -->
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p> Fill your details properly and check to get your ticket booked.
							</p>
						</div>
				</div>
				<div class="row" style="padding-top: 70px">
					<div class="col-md-4 col-md-pull-5">
						<label for="station1">Select your start</label>
						<select class="form-control border-radius" id="station1" name= "station1" form="bookingform">
							<option value="" disabled selected="">Select your start </option>
							@foreach ($start_station as $station) 
								<option value="{{$station->id}}">{{$station->name}}</option>
							@endforeach
						</select>
						<br><br>
						<label for="station2">Select your destination</label>
						<select class="form-control border-radius" id="station2" form="bookingform" name="station2">
							<option value=""></option>
						</select>
						<br><br>
						<form action="{{route('bookings.store')}}" method="post" id="bookingform">
							@csrf
								<input type="hidden" name="stationid" id="stationid" hidden value=" ">
								<input type="hidden" name="user_id" hidden value="{{Auth::id()}}">

								<label for="price">Price:</label>
								<input class="form-control" type="text" name="price" id="price" value=" " readonly>
								
								<br><br>
								<label for="start_date">Start date</label>
								<input class="form-control" type="date" name="start_date" id="start_date">
								<br><br>
								<input class="btn btn-default border-radius custom-sub-btn" type="submit" value="Book ticket">
								<br><br>
						</form>
						
						<form action="{{ route('api.pay') }}" method="post" id="payment-form">
							<div class="form-row">
								<label for="card-element">
								Pay with Credit or debit card
								</label>
								<div id="card-element">
								<!-- A Stripe Element will be inserted here. -->
								</div>
							
								<!-- Used to display form errors. -->
								<div id="card-errors" role="alert"></div>
							</div>

							<input type="hidden" name="fare_amount" id="fare_amount" value="">
						
							<button>Submit Payment</button>

						</form>

						<div id="selectid"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="subscribe section-wrapper">
			<a class="brand-logo" href="index.html" title="HOME"><img src="{{ asset('assets/images/easy-e.png') }}" alt="logo"></a>
			<p class="subscribe-now">
				Subscribe to our Newsletter
			</p>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
						<div class="input-group">
							<input type="email" class="form-control border-radius" placeholder="Email address">
							<span class="input-group-btn">
								<button class="btn btn-default border-radius custom-sub-btn" type="button">DONE</button>
							</span>
						</div><!-- /input-group -->
					</div>
				</div>
			</div>
						
		
		
			<ul class="social-icon">
				<li><a href="#"><i class="ion-social-twitter"></i></a></li>
				<li><a href="#"><i class="ion-social-facebook"></i></a></li>
				<li><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-googleplus"></i></a></li>
			</ul>
		</div> <!-- /.subscribe -->
	
	
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-xs-4">
						<div class="text-left">
							&copy; Made by Hubert,Antony,Ayan,Mbiraru
						</div>
					</div>
					
					<div class="col-xs-4">
						<!-- <div class="top">
							<a href="#header">
								<i class="ion-arrow-up-b"></i>
							</a>
						</div> -->
					</div>
				</div>
			</div>		
		</footer>

		<script type="text/javascript">
			var stripe = Stripe('pk_test_VYqO2ihCGLeUZ5FjwrWHmAIn00TLib2dW2');

			// Create an instance of Elements.
			var elements = stripe.elements();

			// Custom styling can be passed to options when creating an Element.
			// (Note that this demo uses a wider set of styles than the guide below.)
			var style = {
			base: {
				color: '#32325d',
				fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
				fontSmoothing: 'antialiased',
				fontSize: '16px',
				'::placeholder': {
				color: '#aab7c4'
				}
			},
			invalid: {
				color: '#fa755a',
				iconColor: '#fa755a'
			}
			};

			// Create an instance of the card Element.
			var card = elements.create('card', {style: style});

			// Add an instance of the card Element into the `card-element` <div>.
			card.mount('#card-element');

			// Handle real-time validation errors from the card Element.
			card.addEventListener('change', function(event) {
			var displayError = document.getElementById('card-errors');
			if (event.error) {
				displayError.textContent = event.error.message;
			} else {
				displayError.textContent = '';
			}
			});

			// Handle form submission.
			var form = document.getElementById('payment-form');
			form.addEventListener('submit', function(event) {
			event.preventDefault();

			stripe.createToken(card).then(function(result) {
				if (result.error) {
				// Inform the user if there was an error.
				var errorElement = document.getElementById('card-errors');
				errorElement.textContent = result.error.message;
				} else {
				// Send the token to your server.
				stripeTokenHandler(result.token);
				}
			});
			});

			// Submit the form with the token ID.
			function stripeTokenHandler(token) {
			// Insert the token ID into the form so it gets submitted to the server
			var form = document.getElementById('payment-form');
			var hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('name', 'stripeToken');
			hiddenInput.setAttribute('value', token.id);
			form.appendChild(hiddenInput);

			// Submit the form
			form.submit();
			}
		</script>
	
	
		<script src="{{ asset('assets/js/jquery-1.11.2.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets/js/contact.js') }}"></script>
		<script src="{{ asset('assets/js/script.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>