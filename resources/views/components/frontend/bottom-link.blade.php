
<!-- Single Widget -->

	<ul>
           @foreach ($links as $link)
               <li><a href="{{$link->link}}">{{$link->title}}</a></li>
           @endforeach
	</ul>

<!-- End Single Widget -->
