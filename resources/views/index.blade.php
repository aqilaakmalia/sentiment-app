<!DOCTYPE html>
<html lang="en">
<head>
    <title>BeautySense</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">
</head>
    
<body>

<div class="super_container">

	<!-- Header -->

    @include('layouts.header')

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	@include('layouts.hamburger_menu')

	<!-- Slider -->

	<div class="main_slider" style="background-image:url(images/slider_1.jpg)"> 
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>All-natural and all for you</h6>
						<h1>Discover sustainable skincare that makes difference</h1>
						<div class="red_button shop_now_button"><a href="/product/all">search now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_1.png)">
						<div class="banner_category">
							<a href="/product/1">face wash</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_2.png)">
						<div class="banner_category">
							<a href="/product/2">toner</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_3.png)">
						<div class="banner_category">
							<a href="/product/6">serum</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_4.png)">
						<div class="banner_category">
							<a href="/product/3">moisturizer</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_5.png)">
						<div class="banner_category">
							<a href="/product/4">sunscreen</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_6.png)">
						<div class="banner_category">
							<a href="/categories/5">eye cream</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>New Arrivals</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Face_Wash">facewash</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Toner">toner</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Serum">serum</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Eye_Cream">eyecream</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Moisturizer">moisturizer</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Sunscreen">sunscreen</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
						@foreach ($products as $product) 
						<!-- Product -->
						<div class="product-item {{ $categoryNames[$product->id_product] }}">
							<div class="product product_filter">
								<div class="product_image">
									<img src="{{ $product->image }}" alt="{{ $product->product_name }}">
								</div>
								<div class="favorite"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="/single/{{ $product->id_product }}">{{ $product->product_name }}</a></h6>
									<div class="product_price">{{ $brandNames[$product->id_product] }}</div>
									{{-- <div class="product_price">Rp {{ number_format($product->harga, 0, ',', '.') }}</div> --}}
								</div>
							</div>
							{{-- <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div> --}}
						</div>
						@endforeach
					</div>
				</div>				
			</div>
		</div>
	</div>

	<!-- Deal of the week -->

	<div class="deal_ofthe_week">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
						<img src="images/deal_ofthe_week.png" alt="">
					</div>
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>Deal Of The Week</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	{{-- <div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Best Sellers</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">

							<!-- Slide 1 -->

							<div class="owl-item product_slider_item">
								<div class="product-item">
									<div class="product discount">
										<div class="product_image">
											<img src="images/product_1.png" alt="">
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
											<div class="product_price">$520.00<span>$590.00</span></div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 2 -->

							<div class="owl-item product_slider_item">
								<div class="product-item women">
									<div class="product">
										<div class="product_image">
											<img src="images/product_2.png" alt="">
										</div>
										<div class="favorite"></div>
										<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
											<div class="product_price">$610.00</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 3 -->

							<div class="owl-item product_slider_item">
								<div class="product-item women">
									<div class="product">
										<div class="product_image">
											<img src="images/product_3.png" alt="">
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">Blue Yeti USB Microphone Blackout Edition</a></h6>
											<div class="product_price">$120.00</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 4 -->

							<div class="owl-item product_slider_item">
								<div class="product-item accessories">
									<div class="product">
										<div class="product_image">
											<img src="images/product_4.png" alt="">
										</div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
										<div class="favorite favorite_left"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
											<div class="product_price">$410.00</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 5 -->

							<div class="owl-item product_slider_item">
								<div class="product-item women men">
									<div class="product">
										<div class="product_image">
											<img src="images/product_5.png" alt="">
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">Pryma Headphones, Rose Gold & Grey</a></h6>
											<div class="product_price">$180.00</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 6 -->

							<div class="owl-item product_slider_item">
								<div class="product-item accessories">
									<div class="product discount">
										<div class="product_image">
											<img src="images/product_6.png" alt="">
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
											<div class="product_price">$520.00<span>$590.00</span></div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 7 -->

							<div class="owl-item product_slider_item">
								<div class="product-item women">
									<div class="product">
										<div class="product_image">
											<img src="images/product_7.png" alt="">
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
											<div class="product_price">$610.00</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 8 -->

							<div class="owl-item product_slider_item">
								<div class="product-item accessories">
									<div class="product">
										<div class="product_image">
											<img src="images/product_8.png" alt="">
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">Blue Yeti USB Microphone Blackout Edition</a></h6>
											<div class="product_price">$120.00</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 9 -->

							<div class="owl-item product_slider_item">
								<div class="product-item men">
									<div class="product">
										<div class="product_image">
											<img src="images/product_9.png" alt="">
										</div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
										<div class="favorite favorite_left"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
											<div class="product_price">$410.00</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slide 10 -->

							<div class="owl-item product_slider_item">
								<div class="product-item men">
									<div class="product">
										<div class="product_image">
											<img src="images/product_10.png" alt="">
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="/single">Pryma Headphones, Rose Gold & Grey</a></h6>
											<div class="product_price">$180.00</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<!-- Benefit -->

	{{-- @include('layouts.benefit') --}}

	<!-- Newsletter -->
	
	{{-- @include('layouts.newsletter') --}}

	<!-- Footer -->

    @include('layouts.footer')

</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
