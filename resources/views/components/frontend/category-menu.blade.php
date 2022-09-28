<div class="all-category">
	<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
	<ul class="main-category">
        @foreach($categoriesLv1 as $catLv1)
		<li><a href="#">{{$catLv1->catName}} <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<ul class="sub-category">
                @foreach($categoriesLv2 as $catLv2)
                @if($catLv2->parentId==$catLv1->id) 
				<li><a href="{{$path}}category/{{$catLv2->slug}}">
                        {{$catLv2->catName}}    
                    </a>
                </li>
                @endif
                @endforeach
			</ul>
		</li>
        @endforeach
	</ul>
</div>
<!-- 
<pre>
@php
    print_r($categoriesLv1);
@endphp
</pre> -->
