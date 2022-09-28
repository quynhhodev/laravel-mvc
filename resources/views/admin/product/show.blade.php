@extends('admin.main')
@section('content')
<h2>Detail</h2>
<br>
<h3>{{$product->productName}}</h3>
<p><b>Slug: </b>{{$product->slug}}</p>
<p><b>Category Name: </b>{{$product->catName}}</p>
<p><b>Brand Name: </b>{{$product->brandName}}</p>
<p><b>Detail: </b><?php echo $product->detail;?></p>
<p><b>Price: </b>{{$product->price}}</p>
<p><b>Sale Price: </b>{{$product->salePrice}}</p>
<p><?php if($product->status === 0) echo 'ẩn';
            elseif($product->status === 1) echo 'hiện'; 
                else echo'Trang chủ'; ?></p>
@endsection('content')