<!DOCTYPE html>
<html lang="en">
<head>
    <title>Brands BeautySense</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/brands_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/brands_responsive.css') }}">
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
						<li class="active"><a href="brands"><i class="fa fa-angle-right" aria-hidden="true"></i>Brands</a></li>
					</ul>
				</div>

				<!-- Main Content -->

				<div class="container">
					<div class="brand-tag text-center">Brands</div>
					<!-- Brands -->

					<div class="products_iso">
						<div class="col">
							<!-- Brands Grid -->
							<div class="brand-grid">
								@foreach ($brands as $brand)
									<!-- Brand -->
									<div class="brand-item">
										<a href="/brand/{{ $brand->id_brand }}" class="brand-link">
											<div class="brand brand_filter">
												{{-- <div class="brand_image">
													<img src="{{ $brand->image }}" alt="{{ $brand->brand_name }}">
												</div> --}}
												<div class="brand_info">
													<div class="brand_name">{{ $brand->brand_name }}</div>									
												</div>
											</div>
										</a>
									</div>
								@endforeach
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
