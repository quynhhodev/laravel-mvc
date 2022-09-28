@extends('admin.main')
@section('content')
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
                        {{ $product->productName }}
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
                        <a href="../admin/product/{{$product->id}}/restore"><i class="fas fa-trash-restore-alt"></i></a>
                        
                        <form style ='display:inline' action="./product/{{$product->id}}" method='post'>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger"onclick="return confirm('Xóa vĩnh viễn danh mục này?')" type="submit">Delete</button>
                        </form>
                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$products->links()}}
  <script>
    
  </script>
@endsection('content')