<div class="all-category">
	<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>Brand</h3>
	<ul class="main-category">
        @foreach($brands as $brand)
		<li><a href="{{$path}}brand/{{$brand->slug}}">{{$brand->brandName}}</a>
		</li>
        @endforeach
	</ul>
</div>