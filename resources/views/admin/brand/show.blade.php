@extends('admin.main')
@section('content')
<h2>Detail</h2>
<br>
<h3>{{$brand->brandName}}</h3>
<p>{{$brand->slug}}</p>
<p><?php echo $brand->description ?></p>
<p><?php if($brand->status === 0) echo 'Ẩn';
            elseif($brand->status === 1 ) echo 'Hiện'; 
                else echo 'Trang chủ';?></p>
@endsection('content')