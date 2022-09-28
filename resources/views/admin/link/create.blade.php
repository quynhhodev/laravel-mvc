@extends('admin.main')
@section('content')
@if($message = Session::get('message'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif
<form action="{{$path}}admin/link" method=post>
@csrf
    
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label for="position">Position</label>
                <input type="number" id="position" name="position" class="form-control">
                
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="text" id="image"  name="image" class="form-control" ></input>
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="text" id="link"  name="link" class="form-control "></input>
              </div>
              <div class="form-group">
                <label for="order">Order</label>
                <input type="number" id="order"  name="order" class="form-control "></input>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status"  name="status" class="form-control custom-select">
                  <option value=0>Ẩn</option>
                  <option value =1 selected>Hiện</option>
                  <option value =2 >Trang chủ</option>
                </select>
              </div>
              <div class="form-group">
                <button class ="btn btn-primary" type="submit">Create</button>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        


</form>
@endsection('content')

    