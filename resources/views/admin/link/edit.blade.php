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
<form action="{{$path}}admin/link/{{$link->id}}" method=post>
@method('PUT')
@csrf
    
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Link</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" value="{{$link->title}}" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label for="position">Position</label>
                <input type="number" id="position" value="{{$link->position}}" name="position" class="form-control"> 
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input id="image" type="text" value="{{$link->image}}" name="image" class="form-control" ></input>
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input id="link" type="text" value="{{$link->link}}" name="link" class="form-control" ></input>
              </div>
              <div class="form-group">
                <label for="order">Order</label>
                <input id="order" type="number" value="{{$link->order}}" name="order" class="form-control"></input>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control custom-select">
                  <option value =0 <?php if($link->status ==0) echo "selected" ?>>Ẩn</option>
                  <option value =1 <?php if($link->status ==1) echo "selected" ?>>Hiện</option>
                  <option value =2 <?php if($link->status ==2) echo "selected" ?>>Trang chủ</option>
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

    