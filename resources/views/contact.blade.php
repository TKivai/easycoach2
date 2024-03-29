<!DOCTYPE html>
 
<html class="noIE" lang="en-US">
<!--<![endif]-->
	<head>
		<!-- meta -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
	<title>Contact Us</title>

	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flexslider.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">
    
	<script
		src="http://maps.googleapis.com/maps/api/js">
	</script>
</head>
<body>

<!-- Home -->
	<section class="header">
		
		@extends('layouts.nav')
	</section> <!-- /#header -->

<!-- Section Background -->
	<section class="section-background">
		<div class="container">
			<h2 class="page-header">
				get in touch with us
			</h2>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">&nbsp;contact</li>
			</ol>
		</div> <!-- /.container -->
	</section> <!-- /.section-background -->


	<section class="section-wrapper contact-and-map">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
                    @if(session('msg'))
                    <div class="alert alert-succes alert-block">
                        <button class="close" type="button" data-dismiss="alert">x</button>
                        <strong>{{session('msg')}}</strong>
                    </div>
                    @endif
					<h2 class="section-title">
						Send Message
					</h2>
					<form class="form" action="{{url('/send')}}" method="post">
                        @csrf
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" type="text" placeholder="Name" name="person_name" required>
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" name="email" type="email" placeholder="Email address" required>
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-email"></i>
							</span>
						</div>
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" name="phonenumber" type="tel" placeholder="Phone number">
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-ios-telephone"></i>
							</span>
						</div>
						<div class="input-group">
						<textarea class="form-control border-radius border-right" rows="8" name="msg" placeholder="Write Message"></textarea>	
							<!-- <input type="text" name="text" rows="8" class="form-control border-radius border-right message" placeholder="Write Message"> -->
							<span class="input-group-addon border-radius custom-addon">
								<i class="ion-chatbubbles"></i>
							</span>
						</div>
						<button type="submit" class="btn btn-default border-radius custom-button">SEND MESSAGE </button>
                    </form>
				</div> <!-- /.col-sm-6 -->
				
			</div>
		</div>
	</section>



	<section class="contacts section-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="contact">
						<div class="contact-icon">
							<i class="ion-android-map"></i>
						</div>
						<div class="contact-name">
							Address
						</div>
						<div class="contact-detail">
						 P.O Box 00123 <br>
							Kenya,+254,Nairobi/River road(Town) 
						</div>
					</div> <!-- /.contact -->
				</div> <!-- /.col-sm-4 -->
				<div class="col-sm-4">
					<div class="contact">
						<div class="contact-icon">
							<i class="ion-ios-telephone"></i>
						</div>
						<div class="contact-name">
							Phone
						</div>
						<div class="contact-detail">
							Local: 1-2-1-0hello <br>
							+254743801837
						</div>
					</div> <!-- /.contact -->
				</div> <!-- /.col-sm-4 -->
				<div class="col-sm-4">
					<div class="contact">
						<div class="contact-icon">
							<i class="ion-email"></i>
						</div>
						<div class="contact-name">
							Email Address
						</div>
						<div class="contact-detail">
							easycoach@gmail.com <br>
							<a href="http://www.easycoach.com">www.easycoach.com</a>
						</div>
					</div> <!-- /.contact -->
				</div> <!-- /.col-sm-4 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.contacts -->
 



	<div class="subscribe section-wrapper">
		<a class="brand-logo" href="index.html" title="HOME"><img src="assets/images/easy-e.png" alt="logo"></a>
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
			</div>
		</div>		
	</footer>


	<script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/contact.js"></script>
	<script src="assets/js/script.js"></script>

</body>
</html>