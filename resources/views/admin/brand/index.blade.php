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
                          Brand Name
                      </th>
                      <th >
                          Slug
                      </th>
                      <th>
                          Description
                      </th>
                      <th >
                          Status
                      </th>
                      <th >
                          Actions
                      </th>
                      <th>


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
                        <?php echo $brand->description ?>
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
                        <a href="../admin/brand/{{$brand->id}}"><i class="fas fa-eye"></i></a>
                        <a href="../admin/brand/{{$brand->id}}/edit"><i class="fas fa-edit"></i></a>
                        <a href="../admin/brand/{{$brand->id}}/trash" onclick="return confirm('Xóa danh mục này?')"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$brands->links()}}
  <script>
    
  </script>
@endsection('content')