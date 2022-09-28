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
                      <th >
                          Status
                      </th>
                      <th >
                          Actions
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
                        <?php echo $link->image ?>
                      </td>
                      <td>
                        <?php echo $link->link ?>
                      </td>
                      <td>
                        <?php echo $link->order ?>
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
                        <a href="../admin/link/{{$link->id}}"><i class="fas fa-eye"></i></a>
                        <a href="../admin/link/{{$link->id}}/edit"><i class="fas fa-edit"></i></a>
                        <a href="../admin/link/{{$link->id}}/trash" onclick="return confirm('Xóa danh mục này?')"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$links->links()}}
  <script>
    
  </script>
@endsection('content')