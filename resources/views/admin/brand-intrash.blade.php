@extends('admin.main')
@section('content')
<table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          Id
                      </th>
                      <th >
                          Brand Name
                      </th>
                      <th >
                          Slug
                      </th>
                      <th>
                          Description
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
                  @foreach($brands as $brand)
                  <tr>
                      <td>
                        {{ $brand->id }}
                      </td>
                      <td>
                        {{ $brand->brandName }}
                      </td>
                      <td>
                        {{ $brand->slug }}
                      </td>
                      <td>
                        {{ $brand->description }}
                      </td>
                      <td>
                      @if($brand->status==0)
                          <a class="btn btn-secondary" href="#">Ẩn</a>
                        @elseif($brand->status==1)
                        <a class="btn btn-primary" href="#">Hiện</a>
                        @else
                        <a class="btn btn-primary" href="#">Trang chủ</a>
                        @endif
                      </td>
                      <td>
                        <a href="../admin/brand/{{$brand->id}}/restore"><i class="fas fa-trash-restore-alt"></i></a>
                        
                        <form style ='display:inline' action="./brand/{{$brand->id}}" method='post'>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger"onclick="return confirm('Xóa vĩnh viễn danh mục này?')" type="submit">Delete</button>
                        </form>
                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$brands->links()}}
  <script>
    
  </script>
@endsection('content')