@extends('admin.main')
@section('content')
@if($message = Session::get('message'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif
<form action="{{$path}}admin/product" method=post>
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
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control">
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
              </div>
              <div class="form-group">
                <label for="detail">Detail</label>
                <input type="text" id="detail" name="detail" class="form-control">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <textarea id="number" name="price" class="form-control editor" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="saleprice">Sale Price</label>
                <input type="number" id="saleprice" name="saleprice" class="form-control">
              </div>
              <div class="form-group">
                <label for="countdown">Count Down</label>
                <input type="number" id="countdown" name="countdown" class="form-control">
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status"  name="status" class="form-control custom-select">
                  <option value=0>Ẩn</option>
                  <option value =1 selected>Hiện</option>
                </select>
              </div>
              <div class="form-group">
                <button class ="btn btn-primary" type="submit">Create</button>
              </div>
            </div>
          </div>
        


</form>
@endsection('content')

    