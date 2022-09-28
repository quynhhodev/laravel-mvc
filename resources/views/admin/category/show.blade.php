@extends('admin.main')
@section('content')
<h2>Detail</h2>
<br>
<h3>{{$category->catName}}</h3>
<p>{{$category->slug}}</p>
<p>{{$category->parentId}}</p>
<p>{{$category->description}}</p>
<p><?php if($category->status === 0) echo 'ẩn';
            else echo 'hiện'; ?></p>
@endsection('content')