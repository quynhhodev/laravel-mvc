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
                      <th >
                       Sale Price
                      </th>
                      <th>
                        Count Down
                      </th>
                      <th>
                        Status
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
                        {{ $deal->CountDown }}
                      </td>
                      <td>
                        {{ $deal->status }}
                      </td>
                      <td>
                        <a href="../admin/deal/{{$deal->id}}/restore"><i class="fas fa-trash-restore-alt"></i></a>
                        
                        <form style ='display:inline' action="./deal/{{$deal->id}}" method='post'>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger"onclick="return confirm('Xóa vĩnh viễn danh mục này?')" type="submit">Delete</button>
                        </form>
                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$deals->links()}}
  <script>
    
  </script>
@endsection('content')