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
                      <th >
                          Image
                      </th>
                      <th>
                          Content
                      </th>
                      <th>
                          Summary
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
                        {{ $page->image }}
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
                        <a href="../admin/page/{{$page->id}}"><i class="fas fa-eye"></i></a>
                        <a href="../admin/page/{{$page->id}}/edit"><i class="fas fa-edit"></i></a>
                        <a href="../admin/page/{{$page->id}}/trash" onclick="return confirm('Xóa danh mục này?')"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$pages->links()}}
  <script>
    
  </script>
@endsection('content')