@extends('admin.main')
@section('content')
@if($message = Session::get('message'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{$path}}admin/category/{{$category->id}}" method="post">
@method('PUT')
@csrf
    
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="catName">Catagory Name</label>
                <input type="text" id="catName" value="{{$category->catName}}" name="catName" class="form-control">
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" value="{{$category->slug}}" name="slug" class="form-control"> 
              </div>
              <div class="form-group">
                <label for="parentId">Parent Id</label>
                <select name="parentId" id="parentId" >
                  <option value="0">Không có cha @@</option>
                  @foreach($categoriesLv1 as $catLv1)
                  <option value='{{$catLv1->id}}' <?php if ($catLv1->id==$category->parentId) echo 'selected';?>>{{$catLv1->catName}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description"  name="description" class="form-control editor" rows="4">{{$category->description}}</textarea>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control custom-select">
                  <option value =0 <?php if($category->status ==0) echo "selected" ?>>Ẩn</option>
                  <option value =1 <?php if($category->status ==1) echo "selected" ?>>Hiện</option>
                </select>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" type="submit">UpDate</button>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        


</form>
@endsection('content')

    