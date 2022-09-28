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
<form action="{{$path}}admin/product/{{$product->id}}" method=post>
@method('PUT')
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
                <input  type="text" value="{{$product->productName}}" id="productName" name="productName" class="form-control">
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" value="{{$product->slug}}" id="slug" name="slug" class="form-control">
                
              </div>
              <div class="form-group">
                <label for="catId">Catagory Name</label>
                <select name="catId" id="catId" >
                  @foreach($categoriesLv1 as $categoryLv1)
                    <optgroup label="{{$categoryLv1->catName}}">
                      @foreach($categoriesLv2 as $categoryLv2)
                        @if($categoryLv2->parentId==$categoryLv1->id)
                          <option value="{{$categoryLv2->id}}" @if($categoryLv2->id == $product->catId) <?php echo'selected';?> @endif>{{$categoryLv2->catName}}</option>
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
                    
                    <option value="{{ $brand->id}}" @if($brand->id == $product->brandId) <?php echo'selected';?> @endif>{{$brand->brandName}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="detail">Detail</label>
                <textarea id="detail"  name="detail" class="form-control editor" rows="4">{{$product->detail}}</textarea>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" value="{{$product->price}}" name="price" class="form-control">
              </div>
              <div class="form-group">
                <label for="salePrice">Sale Price</label>
                <input type="number" id="salePrice" value="{{$product->salePrice}}" name="salePrice" class="form-control">
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" value="{{$product->image}}" id="image" name="image" class="form-control">
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status"  name="status" class="form-control custom-select">
                  <option value=0 <?php if($product->status == 0) echo 'selected';?>>Ẩn</option>
                  <option value =1 <?php if($product->status == 1) echo 'selected';?>>Hiện</option>
                  <option value =2 <?php if($product->status == 2) echo 'selected';?>>Trang Chủ</option>
                </select>
              </div>
              <div class="form-group">
                <button class ="btn btn-primary" type="submit">Update</button>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        


</form>
@endsection('content')

    






