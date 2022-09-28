<section class="small-banner section">
	<div class="container-fluid">
		<div class="row">
			<!-- Single Banner  -->
			@foreach ($catsShowHome as $csh)
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-banner">
					<img src="{{$path}}template/frontend/images/collection1.jpg" alt="#">
					<div class="content">
						<p>Man's Collectons</p>
						<h3>{{$csh->catName}}<br> collection</h3>
						<a href="{{$path}}category/{{$csh->slug}}">Discover Now</a>
					</div>
				</div>
			</div>
			@endforeach
			
			<!-- /End Single Banner  -->
			
		</div>
	</div>
</section>