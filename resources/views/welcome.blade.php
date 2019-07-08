<!DOCTYPE html>

<html class="noIE" lang="en-US">
<!--<![endif]-->
	<head>
	    <title>Easycoach Bus</title>

        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/flexslider.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    
    </head>
<body>
	@extends('layouts.nav')
<!-- Home -->
		<div id="header">
		    <div class="flexslider">
		        <ul class="slides">
		            <li class="slider-item" style="background-image: url('{{asset('assets/images/coach.jpg')}}')">
		                <div class="intro container">
		                    <div class="inner-intro">
								<h1 class="header-title" style="color:#7f0201">
		                            Experience Dignity
		                        </h1>
		                        	
		                        <a href="{{ route('bookings.index') }}" class="btn custom-btn" style="color:#7f0201">
		                            book a ticket now
		                        </a>
		                    </div>
		                </div>
					</li>

		            <li class="slider-item" style="background-image: url('{{asset('assets/images/InsideBus.jpg')}}')">
		                <div class="intro">
		                    <div class="inner-intro">
		                        <h1 class="header-title">
		                            Experience Dignity
		                        </h1>
		                        	
		                        <a href="{{ route('bookings.index') }}" class="btn custom-btn">
		                            book a ticket now
		                        </a>
		                    </div>
		                </div>
		            </li> <!-- /.slider-item -->
		        </ul> <!-- /.slides -->
		    </div> <!-- /.flexslider -->
		</div> <!-- /#header -->
<!-- Find a Tour -->

<!-- Our Blazzing offers -->
	<section class="offer section-wrapper">
		<div class="container">
			<h2 class="section-title">
				Welcome to Easy Coach LTD
			</h2>
			<p class="section-subtitle">
				Our mission is to be the Best Road Passenger Transport compayny in East Africa.
				We are passenger transport and courier service provider registered in the Republic of kenya with an extenxive branch network in Western and Nyanza provinces. we offer good, cheap and secured transport services from every where in east africa and you are all welcome.
			</p>
			<div class="row">
				<div class="col-sm-3 col-xs-6">
					<div class="offer-item">
						<div class="icon">
							<i class="ion-social-euro"></i>
						</div>
						<h3>
							Affordable Pricing
						</h3>
						<p>
							We always have cheap and affordable tickets according to the distance of the jurney.
						</p>
					</div>
				</div> <!-- /.col-md-3 -->

				<div class="col-sm-3 col-xs-6">
					<div class="offer-item">
						<div class="icon">
							<i class="ion-ios-home"></i>
						</div>
						<h3>
							High class Hotels
						</h3>
						<p>
							We have some recommended hotels every where we travel and we can always drop you in person if you are new to that place. 
						</p>
					</div>
				</div> <!-- /.col-md-3 -->

				<div class="col-sm-3 col-xs-6">
					<div class="offer-item">
						<div class="icon">
							<i class="ion-android-bus"></i>
						</div>
						<h3>
							Luxury Transport
						</h3>
						<p>
							We have the best transport system in most of the countries with new and confortable buses for ou clients .
						</p>
					</div>
				</div> <!-- /.col-md-3 -->

				<div class="col-sm-3 col-xs-6">
					<div class="offer-item">
						<div class="icon">
							<i class="ion-ios-locked"></i>
						</div>
						<h3>
							Highest Security
						</h3>
						<p>
							Our transport systems are always where all the buses have the maximum speed not to exceed and someone of the assistant in the bus in case of any need.
						</p>
					</div>
				</div> <!-- /.col-md-3 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.offer -->


<!-- Top place to visit -->
	<section class="visit section-wrapper">
		<div class="container">
			<h2 class="section-title">
				Our stations
			</h2>

			<div class="owl-carousel visit-carousel" id="">
				
				<div class="item">
					<img src="{{asset('assets/images/Mombasa.jpg')}}" alt="visit-image" class="img-responsive visit-item">
				</div>
				<div class="item">
					<img src="{{asset('assets/images/Nairobi.jpg')}}" alt="visit-image" class="img-responsive visit-item">
				</div>
				<div class="item">
					<img src="{{asset('assets/images/kisumu.jpg')}}" alt="visit-image" class="img-responsive visit-item">
				</div>
				<div class="item">
					<img src="{{asset('assets/images/Mombasa.jpg')}}" alt="visit-image" class="img-responsive visit-item">
				</div>
				<div class="item">
					<img src="{{asset('assets/images/Nairobi.jpg')}}" alt="visit-image" class="img-responsive visit-item">
				</div>
				<div class="item">
					<img src="{{asset('assets/images/kisumu.jpg')}}" alt="visit-image" class="img-responsive visit-item">
				</div>
			</div>
		</div> <!-- /.container -->
	</section> <!-- /.visit -->


	<div class="section-wrapper sponsor">
		<div class="container">
			<div class="owl-carousel sponsor-carousel">
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/strath.jpg')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/t3.png')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/t4.png')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/t5.jpg')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/uchumi.jpg')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/nakumatt.jpg')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/strath.jpg')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/t3.png')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/t4.png')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/t5.jpg')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/uchumi.jpg')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
				<div class="item">
					<a href="#">
						<img src="{{asset('assets/images/nakumatt.jpg')}}" alt="sponsor-brand" class="img-responsive sponsor-item">
					</a>
				</div>
			</div> <!-- /.owl-carousel -->
		</div> <!-- /.container -->
	</div> <!-- /.sponsor -->

	<div class="subscribe section-wrapper">
		<a class="brand-logo" href="{{url('/')}}}" title="HOME">
			<img src="{{asset('assets/images/easy-e.png')}}" alt="logo">
		</a>

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
						&copy; Made by Hubert,Antony,Ayan and Mbiraru
					</div>
				</div>
				
				<div class="col-xs-4">
					<div class="top">
						<a href="#header">
							<i class="ion-arrow-up-b"></i>
						</a>
					</div>
				</div>
			</div>
		</div>		
	</footer>


	<script src="{{asset('assets/js/jquery-1.11.2.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/contact.js')}}"></script>
    <script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('assets/js/script.js')}}"></script>

</body>
</html>



