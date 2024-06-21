<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products BeautySense</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
</head>
    

<body>

<div class="super_container">

	<!-- Header -->

	@include('layouts.header')

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	@include('layouts.hamburger_menu')

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="/home">Home</a></li>
						<li class="active"><a href="product/all"><i class="fa fa-angle-right" aria-hidden="true"></i>Products</a></li>
					</ul>
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Product Category</h5>
						</div>
						<ul class="sidebar_categories">
							<li class="{{ Request::is('product/all') ? 'active' : '' }}"><a href="/product/all">@if(Request::is('product/all'))<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif All</a></li>
							<li class="{{ Request::is('product/1') ? 'active' : '' }}"><a href="/product/1">@if(Request::is('product/1'))<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Face Wash</a></li>
							<li class="{{ Request::is('product/2') ? 'active' : '' }}"><a href="/product/2">@if(Request::is('product/2'))<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Toner</a></li>
							<li class="{{ Request::is('product/6') ? 'active' : '' }}"><a href="/product/6">@if(Request::is('product/6'))<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Serum</a></li>
							<li class="{{ Request::is('product/3') ? 'active' : '' }}"><a href="/product/3">@if(Request::is('product/3'))<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Moisturizer</a></li>
							<li class="{{ Request::is('product/4') ? 'active' : '' }}"><a href="/product/4">@if(Request::is('product/4'))<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Sunscreen</a></li>
							<li class="{{ Request::is('product/5') ? 'active' : '' }}"><a href="/product/5">@if(Request::is('product/5'))<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>@endif Eye Cream</a></li>
						</ul>
					</div>

					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Brand</h5>
						</div>
						<ul class="sidebar_categories">
							<li class="{{ Request::is('brand/1') ? 'active' : '' }}">
								<a href="/brand/1">
									@if(Request::is('brand/1'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Wardah
								</a>
							</li>
							<li class="{{ Request::is('brand/2') ? 'active' : '' }}">
								<a href="/brand/2">
									@if(Request::is('brand/2'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Acnes
								</a>
							</li>
							<li class="{{ Request::is('brand/3') ? 'active' : '' }}">
								<a href="/brand/3">
									@if(Request::is('brand/3'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Somethinc
								</a>
							</li>
							<li class="{{ Request::is('brand/4') ? 'active' : '' }}">
								<a href="/brand/4">
									@if(Request::is('brand/4'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Npure
								</a>
							</li>
							<li class="{{ Request::is('brand/5') ? 'active' : '' }}">
								<a href="/brand/5">
									@if(Request::is('brand/5'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									True To Skin
								</a>
							</li>
							<li class="{{ Request::is('brand/6') ? 'active' : '' }}">
								<a href="/brand/6">
									@if(Request::is('brand/6'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Trueve
								</a>
							</li>
							<li class="{{ Request::is('brand/7') ? 'active' : '' }}">
								<a href="/brand/7">
									@if(Request::is('brand/7'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Cosrx
								</a>
							</li>
							<li class="{{ Request::is('brand/8') ? 'active' : '' }}">
								<a href="/brand/8">
									@if(Request::is('brand/8'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Avoskin
								</a>
							</li>
							<li class="{{ Request::is('brand/9') ? 'active' : '' }}">
								<a href="/brand/9">
									@if(Request::is('brand/9'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Emina
								</a>
							</li>
							<li class="{{ Request::is('brand/10') ? 'active' : '' }}">
								<a href="/brand/10">
									@if(Request::is('brand/10'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Pyunkang Yul
								</a>
							</li>
							<li class="{{ Request::is('brand/11') ? 'active' : '' }}">
								<a href="/brand/11">
									@if(Request::is('brand/11'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Scarlett
								</a>
							</li>
							<li class="{{ Request::is('brand/12') ? 'active' : '' }}">
								<a href="/brand/12">
									@if(Request::is('brand/12'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Whitelab
								</a>
							</li>
							<li class="{{ Request::is('brand/13') ? 'active' : '' }}">
								<a href="/brand/13">
									@if(Request::is('brand/13'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Pond's
								</a>
							</li>
							<li class="{{ Request::is('brand/14') ? 'active' : '' }}">
								<a href="/brand/14">
									@if(Request::is('brand/14'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									The Originote
								</a>
							</li>
							<li class="{{ Request::is('brand/15') ? 'active' : '' }}">
								<a href="/brand/15">
									@if(Request::is('brand/15'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Skintific
								</a>
							</li>
							<li class="{{ Request::is('brand/16') ? 'active' : '' }}">
								<a href="/brand/16">
									@if(Request::is('brand/16'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Azarine
								</a>
							</li>
							<li class="{{ Request::is('brand/17') ? 'active' : '' }}">
								<a href="/brand/17">
									@if(Request::is('brand/17'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									MS Glow
								</a>
							</li>
							<li class="{{ Request::is('brand/18') ? 'active' : '' }}">
								<a href="/brand/18">
									@if(Request::is('brand/18'))
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif
									Imju Naturie
								</a>
							</li>
						</ul>
					</div>					

					<!-- Price Range Filtering -->
					{{-- <div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Filter by Price</h5>
						</div>
						<p>
							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						<div class="filter_button"><span>filter</span></div>
					</div> --}}

					<!-- Sizes -->
					{{-- <div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Sizes</h5>
						</div>
						<ul class="checkboxes">
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>S</span></li>
							<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>L</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>XL</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>XXL</span></li>
						</ul>
					</div> --}}

					<!-- Color -->
					{{-- <div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Color</h5>
						</div>
						<ul class="checkboxes">
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Black</span></li>
							<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>Pink</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
						</ul>
						<div class="show_more">
							<span><span>+</span>Show More</span>
						</div>
					</div> --}}

				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Choose Sorting</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
											</ul>
										</li>
										<li>
											<span>Show</span>
											<span class="num_sorting_text">6</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
												<li class="num_sorting_btn"><span>24</span></li>
											</ul>
										</li>
									</ul>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

								<!-- Product Grid -->

								<div class="product-grid">
									@foreach ($products as $product)
									<!-- Product -->
									<div class="product-item {{ $product->category->category_name }}">
										<div class="product product_filter">
											<div class="image-wrapper">
												<img class="product-image"src="{{ $product->image }}" alt="{{ $product->product_name }}">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<div class="brand_name">{{ $product->brand->brand_name }}</div>
												<div class="product_name"><a href="/single/{{ $product->id_product }}">{{ $product->product_name }}</a></div> 
												<div class="product_price">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
											</div>
										</div>
										{{-- <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div> --}}
									</div>
									@endforeach
								</div>

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_bottom clearfix">
									<ul class="product_sorting">
										<li>
											<span>Show:</span>
											<span class="num_sorting_text">04</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>01</span></li>
												<li class="num_sorting_btn"><span>02</span></li>
												<li class="num_sorting_btn"><span>03</span></li>
												<li class="num_sorting_btn"><span>04</span></li>
											</ul>
										</li>
									</ul>
									<span class="showing_results">Showing 1–3 of 12 results</span>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Benefit -->

	{{-- @include('layouts.benefit') --}}

	<!-- Newsletter -->

	@include('layouts.newsletter')

	<!-- Footer -->

	@include('layouts.footer')

</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('js/product_custom.js') }}"></script>
</body>

</html>
