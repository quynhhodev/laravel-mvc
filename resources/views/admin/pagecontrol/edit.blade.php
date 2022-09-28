@extends('admin.main')
@section('content')
@if($message = Session::get('message'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif
<form action="{{$path}}admin/page/{{$page->id}}" method=post>
@method('PUT')
@csrf
    
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Page</h3>

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{$page->title}}" >
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{$page->slug}}" >
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="text" id="image" name="image" class="form-control" value="{{$page->image}}"/>
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content"  name="content" class="form-control editor" rows="10">{{$page->content}}</textarea>
              </div>
              <div class="form-group">
                <label for="sumary">Sumary</label>
                <textarea id="sumary" value="{{$page->sumary}}"  name="sumary" class="form-control editor" rows="2"></textarea>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control custom-select">
                  <option value =0 <?php if($page->status == 0) echo "selected" ?>>Ẩn</option>
                  <option value =1 <?php if($page->status == 1) echo "selected" ?>>Hiện</option>
                </select>
              </div>
              <div class="form-group">
                <button class ="btn btn-primary" type="submit">UpDate</button>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        


</form>
@endsection('content')

    