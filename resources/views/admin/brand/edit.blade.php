@extends('admin.main')
@section('content')
@if($message = Session::get('message'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif
<form action="{{$path}}admin/brand/{{$brand->id}}" method=post>
@method('PUT')
@csrf
    
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Brand</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="brandName">Brand Name</label>
                <input type="text" id="brandName" value="{{$brand->brandName}}" name="brandName" class="form-control">
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" value="{{$brand->slug}}" name="slug" class="form-control"> 
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description"  name="description" class="form-control editor" rows="4"><?php echo $brand->description?></textarea>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control custom-select">
                  <option value =0 <?php if($brand->status ==0) echo "selected" ?>>Ẩn</option>
                  <option value =1 <?php if($brand->status ==1) echo "selected" ?>>Hiện</option>
                  <option value =2 <?php if($brand->status ==2) echo "selected" ?>>Trang chủ</option>
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

    