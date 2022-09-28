@extends('admin.main')
@section('content')
<h2>Detail</h2>
<br>
<h3>Title: {{$link->title}}</h3>
<p><b>Position: </b>{{$link->position}}</p>
<p><b>Image:</b> {{$link->image}}</p>
<p><b>Link: </b>{{$link->link}}</p>
<p><b>Order: </b>{{$link->order}}</p>
<p><b>State: </b><?php if($link->status === 0) echo 'Ẩn';
            elseif($link->status === 1 ) echo 'Hiện'; 
                else echo 'Trang chủ';?></p>
@endsection('content')