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
                  <th >
                      Status
                  </th>
                  <th >
                      Actions
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
                       @foreach($categoriesLv1 as $catLv1)
                      
                        <?php if($catLv1->id == $category->parentId) echo $catLv1->catName; ?>
                      
                      @endforeach 
                      </td>
                      <td>
                        {{ $category->description }}
                      </td>
                      <td>
                        @if($category->status==0)
                          <a class="btn btn-secondary" href="{{$path}}admin/category/{{$category->id}}/changeStatus">Ẩn</a>
                        @else
                        <a class="btn btn-primary" href="{{$path}}admin/category/{{$category->id}}/changeStatus">Hiện</a>
                        @endif
                      </td>
                      <td>
                        <a href="../admin/category/{{$category->id}}"><i class="fas fa-eye"></i></a>
                        <a href="../admin/category/{{$category->id}}/edit"><i class="fas fa-edit"></i></a>
                        <a href="../admin/category/{{$category->id}}/trash" onclick="return confirm('Xóa danh mục này?')"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                 
                @endforeach
              </tbody>
          </table>
          {{$categories->links()}}
@endsection('content')