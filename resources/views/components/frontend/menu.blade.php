<?php
    use App\View\Components\frontend\CategoryMenu;
?>

<div class="header-inner">
	<div class="container">
		<div class="cat-nav-head">
			<div class="row">
				<div class="col-lg-3">
                    <!-- Brand Begin -->
					<x-frontend.BrandMenu/>
                    <!-- Brand End -->
				</div>
				<div class="col-lg-3">
                    <!-- Category Begin -->
					<x-frontend.CategoryMenu/>
                    <!-- Category End -->
				</div>
				<div class="col-lg-6 col-12">
					<div class="menu-area">
						<!-- Main Menu -->
						<nav class="navbar navbar-expand-lg">
							<div class="navbar-collapse">	
								<div class="nav-inner">	
									<ul class="nav main-menu menu navbar-nav">
										@foreach ($links as $link)
										<li class="active"><a href="{{$path}}{{$link->link}}">{{$link->title}}</a></li>
										@endforeach
									</ul>
								</div>
							</div>
						</nav>
						<!--/ End Main Menu -->	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>