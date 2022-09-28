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
                          Content
                      </th>
                      <th>
                          Sumary
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
                  @foreach($pages as $page)
                  <tr>
                  <td>
                        {{ $page->id }}
                      </td>
                      <td>
                        {{ $page->title }}
                      </td>
                      <td>
                        {{ $page->slug }}
                      </td>
                      <td>
                        {{ $page->content }}
                      </td>
                      <td>
                        {{ $page->sumary }}
                      </td>
                      <td>
                      @if($page->status==0)
                          <a class="btn btn-secondary" href="#">Ẩn</a>
                        @else
                        <a class="btn btn-primary" href="#">Hiện</a>
                        @endif
                      </td>
                      <td>
                        <a href="../admin/page/{{$page->id}}/restore"><i class="fas fa-trash-restore-alt"></i></a>
                        
                        <form style ='display:inline' action="./page/{{$page->id}}" method='post'>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger"onclick="return confirm('Xóa vĩnh viễn danh mục này?')" type="submit">Delete</button>
                        </form>
                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$pages->links()}}
  <script>
    
  </script>
@endsection('content')