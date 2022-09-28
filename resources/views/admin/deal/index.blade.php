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
                          Slug
                      </th>
                      <th>
                          Image
                      </th>
                      <th>
                          Detail
                      </th>
                      <th>
                          Price
                      </th>
                      <th>
                          Sale Price
                      </th>
                      <th>
                          Count Down
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
                  @foreach($deals as $deal)
                  <tr>
                      <td>
                        {{ $deal->id }}
                      </td>
                      <td>
                        {{ $deal->title }}
                      </td>
                      <td>
                        {{ $deal->slug }}
                      </td>
                      <td>
                        {{ $deal->image }}
                      </td>
                      <td>
                        {{ $deal->detail }}
                      </td>
                      <td>
                        {{ $deal->price }}
                      </td>
                      <td>
                        {{ $deal->salePrice }}
                      </td>
                      <td>
                        {{ $deal->countDown }}
                      </td>
                      <td>
                        @if($deal->status==0)
                          <a class="btn btn-secondary" href="#">Ẩn</a>
                        @else($deal->status==1)
                        <a class="btn btn-primary" href="#">Hiện</a>
                        
                        @endif
                      </td>
                      <td>
                        <a href="../admin/deal/{{$deal->id}}"><i class="fas fa-eye"></i></a>
                        <a href="../admin/deal/{{$deal->id}}/edit"><i class="fas fa-edit"></i></a>
                        <a href="../admin/deal/{{$deal->id}}/trash" onclick="return confirm('Xóa danh mục này?')"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{ $deals->links()}}
  <script>
    
  </script>
@endsection('content')