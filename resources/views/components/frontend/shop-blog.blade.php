

<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>From Our Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach ($pages as $p)
                <div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="{{$path}}template/frontend/images/{{$p->image}}" alt="#">
						<div class="content">
							<p class="date">{{$p->created_at}}</p>
							<a href="#" class="title">{{$p->title}}</a>
							<a href="{{$path}}pageDetail/{{$p->slug}}" class="more-btn">Continue Reading</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
                @endforeach
				
				
			</div>
		</div>
	</section>