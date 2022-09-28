@extends('admin.main')
@section('content')

@if($message = Session::get('message'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif
<table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          Id
                      </th>
                      <th >
                          Product Name
                      </th>
                      <th >
                          Slug
                      </th>
                      <th>
                          Cat Name
                      </th>
                      <th>
                          Brand Name
                      </th>
                      <th>
                          Price
                      </th>
                      <th>
                          Sale Price
                      </th>
                      <th>
                          Image
                      </th>
                      <th>
                          Status
                      </th>
                      <th>
                          Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                  <tr>
                      <td>
                        {{ $product->id }}
                      </td>
                      <td>
                        {{ $product->productName }}
                      </td>
                      <td>
                        {{ $product->slug }}
                      </td>
                      <td>
                        {{ $product->catName }}
                      </td>
                      <td>
                        {{ $product->brandName }}
                      </td>
                      <td>
                        {{ $product->price }}
                      </td>
                      <td>
                        {{ $product->salePrice }}
                      </td>
                      <td>
                        {{ $product->image }}
                      </td>
                      <td>
                        @if($product->status==0)
                          <a class="btn btn-secondary" href="#">Ẩn</a>
                        @elseif($product->status==1)
                        <a class="btn btn-primary" href="#">Hiện</a>
                        @else
                        <a class="btn btn-primary" href="#">Trang chủ</a>
                        @endif
                      </td>
                      <td>
                        <a href="../admin/product/{{$product->id}}"><i class="fas fa-eye"></i></a>
                        <a href="../admin/product/{{$product->id}}/edit"><i class="fas fa-edit"></i></a>
                        <a href="../admin/product/{{$product->id}}/trash" onclick="return confirm('Xóa danh mục này?')"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$products->links()}}
  <script>
    
  </script>
@endsection('content')