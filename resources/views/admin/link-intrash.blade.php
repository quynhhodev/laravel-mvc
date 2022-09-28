@extends('admin.main')
@section('content')
<table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          Id
                      </th>
                      <th >
                          Title
                      </th>
                      <th >
                          Position
                      </th>
                      <th>
                          Image
                      </th>
                      <th>
                          Link
                      </th>
                      <th>
                          Order
                      </th>
                      <th>
                          Status
                      </th>
                      <th>
                          Actions
                      </th>
                      <th>


                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($links as $link)
                  <tr>
                      <td>
                        {{ $link->id }}
                      </td>
                      <td>
                        {{ $link->title }}
                      </td>
                      <td>
                        {{ $link->position }}
                      </td>
                      <td>
                        {{ $link->image }}
                      </td>
                      <td>
                        {{ $link->link }}
                      </td>
                      <td>
                        {{ $link->order }}
                      </td>
                      <td>
                      @if($link->status==0)
                          <a class="btn btn-secondary" href="#">Ẩn</a>
                        @elseif($link->status==1)
                        <a class="btn btn-primary" href="#">Hiện</a>
                        @else
                        <a class="btn btn-primary" href="#">Trang chủ</a>
                        @endif
                      </td>
                      <td>
                        <a href="../admin/link/{{$link->id}}/restore"><i class="fas fa-trash-restore-alt"></i></a>
                        
                        <form style ='display:inline' action="./link/{{$link->id}}" method='post'>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger"onclick="return confirm('Xóa vĩnh viễn danh mục này?')" type="submit">Delete</button>
                        </form>
                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$links->links()}}
  <script>
    
  </script>
@endsection('content')