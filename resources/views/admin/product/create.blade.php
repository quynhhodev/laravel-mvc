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
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="productName" class="form-control">
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control">
                
              </div>
              <div class="form-group">
                <label for="catId">Catagory Name</label>
                <select name="catId" id="catId" >
                  @foreach($categoriesLv1 as $categoryLv1)
                    <optgroup label="{{$categoryLv1->catName}}">
                      @foreach($categoriesLv2 as $categoryLv2)
                        @if($categoryLv2->parentId==$categoryLv1->id)
                          <option value="{{$categoryLv2->id}}">{{$categoryLv2->catName}}</option>
                        @endif
                      @endforeach

                    </optgroup>

                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="brandId">Brand Name</label>
                <select name="brandId" id="brandId" >
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id}}">{{$brand->brandName}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="detail">Detail</label>
                <textarea id="detail"  name="detail" class="form-control editor" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control">
              </div>
              <div class="form-group">
                <label for="salePrice">Sale Price</label>
                <input type="number" id="salePrice" name="salePrice" class="form-control">
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="form-control">
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status"  name="status" class="form-control custom-select">
                  <option value=0>Ẩn</option>
                  <option value =1 selected>Hiện</option>
                  <option value =2 >Trang Chủ</option>
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

    