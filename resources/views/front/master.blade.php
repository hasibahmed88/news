
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Magz is a HTML5 & CSS3 magazine template is based on Bootstrap 3.">
		<meta name="author" content="Kodinger">
		<meta name="keyword" content="magz, html5, css3, template, magazine template">
		<!-- Shareable -->
		<meta property="og:title" content="HTML5 & CSS3 magazine template is based on Bootstrap 3" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://github.com/nauvalazhar/Magz" />
		<meta property="og:image" content="https://raw.githubusercontent.com/nauvalazhar/Magz/master/images/preview.png" />
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/sweetalert/dist/sweetalert.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="{{ asset('/') }}front/css/style.css">
		<link rel="stylesheet" href="{{ asset('/') }}front/css/skins/all.css">
        <link rel="stylesheet" href="{{ asset('/') }}front/css/demo.css">

	</head>

	<body class="skin-orange">
		<header class="primary">
			<div class="firstbar">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="brand">
								<a href="{{route('/')}}">
									<img width="180px" height="65px" src="{{ asset('/') }}admin/logo-image/{{ $logo_image->logo }}" alt="Magz Logo">
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<form class="search" autocomplete="off">
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="q" class="form-control" placeholder="Type something here">
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-search"></i></button>
										</div>
									</div>
								</div>
								<div class="help-block">
									<div>Popular:</div>
									<ul>
										<li><a href="#">HTML5</a></li>
										<li><a href="#">CSS3</a></li>
										<li><a href="#">Bootstrap 3</a></li>
										<li><a href="#">jQuery</a></li>
										<li><a href="#">AnguarJS</a></li>
									</ul>
								</div>
							</form>
                        </div>
                    @if(Session::get('visitorId'))
                    @else
                    <div class="col-md-3 col-sm-12 text-right">
                        <ul class="nav-icons">
                            <li><a href="{{ route('visitor-login') }}"><i class="ion-person"></i><div>Login</div></a></li>
                            <li><a href="{{ route('visitor-register') }}"><i class="ion-person-add"></i><div>Register</div></a></li>
                        </ul>
                    </div>
                    @endif
					</div>
				</div>
			</div>

			<!-- Start nav -->
			<nav class="menu">
				<div class="container">
					<div class="brand">
						<a href="#">
							<img src="{{ asset('/') }}admin/logo-image/{{ $logo_image->logo }}" alt="Magz Logo">
						</a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
					</div>
					<div id="menu-list">
						<ul class="nav-list">
							<li class="for-tablet nav-title"><a>Menu</a></li>
							<li class="for-tablet"><a href="login.html">Login</a></li>
							<li class="for-tablet"><a href="register.html">Register</a></li>
							<li><a href="{{ route('all-news') }}">All News</a></li>
							<li class="dropdown magz-dropdown"><a href="#">Categories <i class="ion-ios-arrow-right"></i></a>
								<ul class="dropdown-menu">

                                @foreach($categories as $category)
                                    <li><a href="{{ route('category-news',['id'=>$category->id]) }}">{{ $category->category_name }}</a></li>
                                @endforeach

								</ul>
							</li>
							<li class="dropdown magz-dropdown magz-dropdown-megamenu"><a href="#">Mega Menu <i class="ion-ios-arrow-right"></i> <div class="badge">Hot</div></a>
								<div class="dropdown-menu megamenu">
									<div class="megamenu-inner">
										<div class="row">
											<div class="col-md-3">
												<div class="row">
													<div class="col-md-12">
														<h2 class="megamenu-title">Trending</h2>
													</div>
												</div>
												<ul class="vertical-menu">
													<li><a href="#"><i class="ion-ios-circle-outline"></i> Mega menu is a new feature</a></li>
													<li><a href="#"><i class="ion-ios-circle-outline"></i> This is an example</a></li>
													<li><a href="#"><i class="ion-ios-circle-outline"></i> For a submenu item</a></li>
													<li><a href="#"><i class="ion-ios-circle-outline"></i> You can add</a></li>
													<li><a href="#"><i class="ion-ios-circle-outline"></i> Your own items</a></li>
												</ul>
											</div>
											<div class="col-md-9">
												<div class="row">
													<div class="col-md-12">
														<h2 class="megamenu-title">Featured Posts</h2>
													</div>
												</div>
												<div class="row">
													<article class="article col-md-4 mini">
														<div class="inner">
															<figure>
																<a href="single.html">
																	<img src="{{ asset('/') }}front/images/news/img10.jpg" alt="Sample Article">
																</a>
															</figure>
															<div class="padding">
																<div class="detail">
																	<div class="time">December 10, 2016</div>
																	<div class="category"><a href="category.html">Healthy</a></div>
																</div>
																<h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
															</div>
														</div>
													</article>
													<article class="article col-md-4 mini">
														<div class="inner">
															<figure>
																<a href="single.html">
																	<img src="{{ asset('/') }}front/images/news/img11.jpg" alt="Sample Article">
																</a>
															</figure>
															<div class="padding">
																<div class="detail">
																	<div class="time">December 13, 2016</div>
																	<div class="category"><a href="category.html">Lifestyle</a></div>
																</div>
																<h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
															</div>
														</div>
													</article>
													<article class="article col-md-4 mini">
														<div class="inner">
															<figure>
																<a href="single.html">
																	<img src="{{ asset('/') }}front/images/news/img14.jpg" alt="Sample Article">
																</a>
															</figure>
															<div class="padding">
																<div class="detail">
																	<div class="time">December 14, 2016</div>
																	<div class="category"><a href="category.html">Travel</a></div>
																</div>
																<h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
															</div>
														</div>
													</article>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            @if($visitorId = Session::get('visitorId'))

                                <li class="dropdown magz-dropdown"><a href="#">Profile <i class="ion-ios-arrow-right"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><img src="" width="30px" class="border rounded" alt=""> <i class="icon ion-person"></i> {{ Session::get('visitorName') }}</a></li>
                                        <li><a href="#"><i class="icon ion-heart"></i> Favorite</a></li>
                                        <li><a href="#"><i class="icon ion-chatbox"></i> Comments</a></li>
                                        <li><a href="#"><i class="icon ion-key"></i> Change Password</a></li>
                                        <li><a href="#"><i class="icon ion-settings"></i> Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('visitor-logout') }}"><i class="icon ion-log-out"></i> Logout</a></li>
                                    </ul>
                                </li>
                            @endif

						</ul>
					</div>
				</div>
			</nav>
			<!-- End nav -->
		</header>

@yield('body')

		<!-- Start footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Company Info</h1>
							<div class="block-body">
								<figure class="foot-logo">
									<img src="{{ asset('/') }}front/images/logo-light.png" class="img-responsive" alt="Logo">
								</figure>
								<p class="brand-description">
									Magz is a HTML5 &amp; CSS3 magazine template based on Bootstrap 3.
								</p>
								<a href="{{ route('about') }}" class="btn btn-magz white">About Us <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Popular Tags <div class="right"><a href="#">See All <i class="ion-ios-arrow-thin-right"></i></a></div></h1>
							<div class="block-body">
								<ul class="tags">
									<li><a href="#">HTML5</a></li>
									<li><a href="#">CSS3</a></li>
									<li><a href="#">Bootstrap 3</a></li>
									<li><a href="#">Web Design</a></li>
									<li><a href="#">Creative Mind</a></li>
									<li><a href="#">Standing On The Train</a></li>
									<li><a href="#">at 6.00PM</a></li>
								</ul>
							</div>
						</div>
						<div class="line"></div>
						<div class="block">
							<h1 class="block-title">Newsletter</h1>
							<div class="block-body">
								<p>By subscribing you will receive new articles in your email.</p>

                                <form class="newsletter" action="{{ route('newsletter') }}" method="POST">
                                @csrf

                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control " placeholder="Your mail">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary btn-block white"><i class="ion-paper-airplane"></i>Subscribe</button>
                                        </div>
                                    </div>
                                    <p>By subscribing you will receive new articles in your email.</p>
                                </form>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Latest News</h1>
							<div class="block-body">
                            @foreach($blogs as $blog)
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ asset('/') }}admin/blog-image/{{ $blog->blog_image }}" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">{{ Str::limit($blog->blog_title, 40, '...') }}</a></h1>
										</div>
									</div>
                                </article>
                            @endforeach
								<a href="{{ route('all-news') }}" class="btn btn-magz white btn-block">See All <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-12 col-sm-6">
						<div class="block">
							<h1 class="block-title">Follow Us</h1>
							<div class="block-body">
								<p>Follow us and stay in touch to get the latest news</p>
								<ul class="social trp">
									<li>
										<a href="#" class="facebook">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#" class="twitter">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-twitter-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="youtube">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-youtube-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="googleplus">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-googleplus"></i>
										</a>
									</li>
									<li>
										<a href="#" class="instagram">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-instagram-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="tumblr">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-tumblr"></i>
										</a>
									</li>
									<li>
										<a href="#" class="dribbble">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-dribbble"></i>
										</a>
									</li>
									<li>
										<a href="#" class="linkedin">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-linkedin"></i>
										</a>
									</li>
									<li>
										<a href="#" class="skype">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-skype"></i>
										</a>
									</li>
									<li>
										<a href="#" class="rss">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-rss"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="line"></div>
						<div class="block">
							<div class="block-body no-margin">
								<ul class="footer-nav-horizontal">
									<li><a href="{{ route('/') }}">Home</a></li>
									<li><a href="{{ route('contact') }}">Contact</a></li>
									<li><a href="{{ route('about') }}">About</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							COPYRIGHT &copy; MAGZ 2017. ALL RIGHT RESERVED.
							<div>
								Made with <i class="ion-heart"></i> by <a href="http://kodinger.com">Kodinger</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

		<!-- JS -->
		<script src="{{ asset('/') }}front/js/jquery.js"></script>
		<script src="{{ asset('/') }}front/js/jquery.migrate.js"></script>
		<script src="{{ asset('/') }}front/scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="{{ asset('/') }}front/scripts/jquery-number/jquery.number.min.js"></script>
		<script src="{{ asset('/') }}front/scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="{{ asset('/') }}front/scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="{{ asset('/') }}front/scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="{{ asset('/') }}front/scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="{{ asset('/') }}front/scripts/toast/jquery.toast.min.js"></script>
		<script src="{{ asset('/') }}front/js/demo.js"></script>
        <script src="{{ asset('/') }}front/js/e-magz.js"></script>
        <script src="{{ asset('js/share.js') }}"></script>

	</body>
</html>
