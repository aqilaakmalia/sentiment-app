<!DOCTYPE html>
<html lang="en">
<head>
    <title>Single Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/single_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/single_responsive.css') }}">
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>

<body>

<div class="super_container">

	<!-- Header -->
	
    @include('layouts.header')

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	@include('layouts.hamburger_menu')

	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="/home">Home</a></li>
						<li><a href="/product/all"><i class="fa fa-angle-right" aria-hidden="true"></i> Product</a></li>
						<li><a href="/product/{{ $product->category->id_category }}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $product->category->category_name }}</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $product->brand->brand_name }}</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<li class="active"><img src={{ $product->image }} alt="" data-image={{ $product->image }}></li>
									{{-- <li><img src="" alt="" data-image=""></li>
									<li><img src="" alt="" data-image=""></li> --}}
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url('{{ $product->image }}')"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h4>{{ $product->brand->brand_name }}</h4>
						<p>{{ $product->product_name }}</p>
						<ul class="star_rating">
							@php
								$rating = $product->rating;
								$filledStars = (int) $rating;
								$halfStar = ($rating - $filledStars) >= 0.5;
							@endphp
							@for ($i = 1; $i <= 5; $i++)
								@if ($i <= $filledStars)
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
								@elseif ($halfStar && $i == $filledStars + 1)
									<li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
								@else
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								@endif
							@endfor
						</ul>
						<a href="https://www.femaledaily.com" target="_blank">
							<img src="{{ asset('images/logo_fd.jpeg') }}" alt="Female Daily Logo" class="female-daily-logo">
						</a>
					</div>
					<div class="product_price">Rp {{ $price }}</div>
					<div class="sentiment_tag">Sentiment Analysis Result</div>
					<div class="product_info_boxes">
						<div class="product_info_box">
							<span class="product_info_title">Total Review</span><br>
							<span class="data_count">{{ $total_reviews }}</span>
						</div>
						<div class="product_info_box">
							<span class="product_info_title">Positif Review</span><br>
							<span class="data_count">{{ $positif_reviews }}</span>
						</div>
						<div class="product_info_box">
							<span class="product_info_title">Negatif Review</span><br>
							<span class="data_count">{{ $negatif_reviews }}</span>
						</div>			
					</div>

					<!-- Tabs -->
					<div class="tabs_section_container">
						<div class="row">
							<div class="col">
								<div class="tabs_container">
									<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-flex-start">
										<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
										<li class="tab" data-active-tab="tab_2"><span>Ingredients</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">

								<!-- Tab Description -->
								<div id="tab_1" class="tab_container active">
									<div class="row">
										<div class="col desc_col">
											<div class="tab_text_block">
												<p>{{ $product->description }}</p>
											</div>
										</div>
									</div>
								</div>

								<!-- Tab Additional Info -->
								<div id="tab_2" class="tab_container">
									<div class="row">
										<div class="col additional_info_col">
											<div class="tab_text_block">
												<p>-</p>
												{{-- <p>COLOR:<span>Gold, Red</span></p> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>

	<!-- Tab Reviews -->

	<div class="container">
		<div class="row">

			<!-- User Reviews -->

			<div class="col-lg-8 reviews_col">
				<div class="tab_title reviews_title">
					<h4>Reviews ({{ $total_reviews }})</h4>
					<div class="filter_dropdown">
						<div class="filter_menu_item">
								Filter Review
								<i class="fa fa-angle-down"></i>
							<ul class="filter_menu_selection">
								<li><a href="{{ url('/single/' . $product->id_product) }}">Semua</a></li>
								<li><a href="{{ url('/single/' . $product->id_product . '/positif') }}">Review Positif</a></li>
								<li><a href="{{ url('/single/' . $product->id_product . '/negatif') }}">Review Negatif</a></li>
							</ul>
						</div>
					</div>					
				</div>

				<!-- User Review -->
				@foreach($reviews as $review)
				<div class="user_review_container d-flex flex-column flex-sm-row">
					<div class="user">
						<div class="user_pic" style="background-image: url('{{ asset('images/user.png') }}')"></div>
						<div class="user_rating">
							<ul class="star_rating">
                                @for ($i = 0; $i < $review->rating; $i++)
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                @endfor
                                <!-- Display remaining stars as empty -->
                                @for ($i = $review->rating; $i < 5; $i++)
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                @endfor
                            </ul>
						</div>
					</div>
					<div class="review">
						<div class="review_label {{ $review->klasifikasi == 1 ? 'positive' : 'negative' }}">
                            <i class="fa fa-thumbs-{{ $review->klasifikasi == 1 ? 'up' : 'down' }}" aria-hidden="true"></i>
                            {{ $review->klasifikasi == 1 ? 'Review Positif' : 'Review Negatif' }}
                        </div> 
						<div class="review_date">{{ $review->date }}</div>
						<div class="user_name">{{ $review->user }}</div>
						<p>{{ $review->review }}</p>
					</div>
				</div>
				@endforeach

				<!-- Pagination -->
				<nav aria-label="Page navigation">
					<ul class="pagination justify-content-center">
						  <!-- First Page Link -->
						@if ($reviews->currentPage() > 1)
						  	<li class="page-item">
								<a class="page-link" href="{{ $reviews->url(1) }}" aria-label="First">&laquo;</a>
					    	</li>
						@endif

						<!-- Previous Page Link -->
						@if ($reviews->onFirstPage())
							<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
								<span class="page-link" aria-hidden="true">&lsaquo;</span>
							</li>
						@else
							<li class="page-item">
								<a class="page-link" href="{{ $reviews->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
							</li>
						@endif
				
						<!-- Pagination Elements -->
						@php
							$start = max($reviews->currentPage() - 4, 1);
							$end = min($start + 9, $reviews->lastPage());
						@endphp
				
						@if ($start > 1)
							<li class="page-item disabled" aria-disabled="true">
								<span class="page-link">...</span>
							</li>
						@endif
				
						@for ($i = $start; $i <= $end; $i++)
							<li class="page-item {{ $reviews->currentPage() == $i ? 'active' : '' }}" aria-current="page">
								<a class="page-link" href="{{ $reviews->url($i) }}">{{ $i }}</a>
							</li>
						@endfor
				
						@if ($end < $reviews->lastPage())
							<li class="page-item disabled" aria-disabled="true">
								<span class="page-link">...</span>
							</li>
						@endif
				
						<!-- Next Page Link -->
						@if ($reviews->hasMorePages())
							<li class="page-item">
								<a class="page-link" href="{{ $reviews->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
							</li>
						@else
							<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
								<span class="page-link" aria-hidden="true">&rsaquo;</span>
							</li>
						@endif
					</ul>
				</nav>
			</div>

			<!-- Add Review -->
			<div class="col-lg-4 add_review_col">
				<div class="add_review">
					<form id="review_form" action="javascript:void(0);">
						<div>
							<h1>Add Review</h1>
							<input id="review_name" class="form_input input_name" type="text" name="name" placeholder="Name*" required="required" data-error="Name is required.">
						</div>
						<div>
							<h1>Your Rating:</h1>
							<ul class="user_star_rating">
								<li class="star"><i class="fa fa-star-o" aria-hidden="true" data-value="1"></i></li>
								<li class="star"><i class="fa fa-star-o" aria-hidden="true" data-value="2"></i></li>
								<li class="star"><i class="fa fa-star-o" aria-hidden="true" data-value="3"></i></li>
								<li class="star"><i class="fa fa-star-o" aria-hidden="true" data-value="4"></i></li>
								<li class="star"><i class="fa fa-star-o" aria-hidden="true" data-value="5"></i></li>
							</ul>
							<textarea id="review_message" class="input_review" name="message" placeholder="Your Review" rows="4" required data-error="Please, leave us a review."></textarea>
						</div>
						<div class="text-left text-sm-right">
							<button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
						</div>
					</form>
				</div>
			</div>

			<!-- Alert Submit Review -->
			<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title" id="reviewModalLabel">Review Submission</h5>
					</div>
					<div class="modal-body" id="reviewModalBody">
					  Your review has been submitted successfully!
					</div>
					<div class="modal-footer">
					  <button type="button" class="red_button review_close_btn" data-bs-dismiss="modal" onclick="location.reload();">Close</button>
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

<script>
	$(document).ready(function() {
		console.log('jQuery is loaded and document is ready'); // Debug log

		// Handle form submission
		$('#review_form').on('submit', function(event) {
			event.preventDefault(); // Prevent default form submission
			console.log('Form submitted'); // Debug log

			// Gather form data
			var reviewData = {
				id_product: {{ $product->id_product }}, // Ensure this value is set correctly
				user: $('#review_name').val(),
				review: $('#review_message').val(),
				rating: $('.user_star_rating .fa.fa-star').length, // Count filled star icons
			};

			console.log('Review data:', reviewData); // Debug log

			// Send AJAX request
			$.ajax({
				url: 'http://127.0.0.1:5000/predict',
				type: 'POST',
				contentType: 'application/json',
				data: JSON.stringify(reviewData),
				success: function(response) {
					// Show the modal on success
					$('#reviewModalBody').text('Your review has been submitted successfully!');
					$('#reviewModal').modal('show');
					console.log('Response:', response); // Debug log
					// Clear the form inputs
					$('#review_form').trigger("reset");
				},
				error: function(xhr, status, error) {
					// Show error message in the modal
					$('#reviewModalBody').text('Failed to submit review.');
					$('#reviewModal').modal('show');
					console.error('Error:', error); // Debug log
				}
			});
		});
	});
</script>

<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('js/single_custom.js') }}"></script>
</body>

</html>
