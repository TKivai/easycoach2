<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}" title="HOME"><img src="{{asset('assets/images/easy-e.png')}}" alt="logo" style= "width:200px"></span></a>
			</div> <!-- /.navbar-header -->

	    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
                	<li class="active"><a href="{{url('/')}}"><b>Home</b></a></li>
					<li><a href="{{url('/about')}}"><b>about</b></a></li>
					<li><a href="{{url('/stations')}}"><b>Stations</b></a></li>
					<li><a href="{{url('/contact')}}"><b>contact us</b></a></li>
					
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
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{url('/home')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<b>{{ Auth::user()->name }}</b> <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
                                </a>
                                <br>
                                <a class="dropdown-item" href="{{ url('/home') }}">
									Profile
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
