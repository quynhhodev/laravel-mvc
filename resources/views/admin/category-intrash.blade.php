@extends('admin.main')
@section('content')
<table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          Id
                      </th>
                      <th >
                          Category Name
                      </th>
                      <th >
                          Slug
                      </th>
                      <th>
                          ParentId
                      </th>
                      <th>
                          Description
                      </th>
                      <th  class="text-center">
                          Status
                      </th>
                      <th  class="text-center">
                          Actions
                      </th>
                      <th>


                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($categories as $category)
                  <tr>
                      <td>
                        {{ $category->id }}
                      </td>
                      <td>
                        {{ $category->catName }}
                      </td>
                      <td>
                        {{ $category->slug }}
                      </td>
                      <td>
                        {{ $category->parentId }}
                      </td>
                      <td>
                        {{ $category->description }}
                      </td>
                      <td>
                        {{ $category->status }}
                      </td>
                      <td>
                        <a href="../admin/category/{{$category->id}}/restore"><i class="fas fa-trash-restore-alt"></i></a>
                        
                        <form style ='display:inline' action="./category/{{$category->id}}" method='post'>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger"onclick="return confirm('Xóa vĩnh viễn danh mục này?')" type="submit">Delete</button>
                        </form>
                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$categories->links()}}
  <script>
    
  </script>
@endsection('content')