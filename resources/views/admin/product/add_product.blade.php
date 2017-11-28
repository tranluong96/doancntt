@extends('templates.admin.template')
@section('content')
<div class="row">
  <div class="col-xs-11">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Thêm Sản Phẩm</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="{{ route('admin.addproduct.store') }}" role="form" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Session::get('ID') }}">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label>Hiện đang Chọn danh mục</label>
                <input class="form-control" id="disabledTextInput" type="text" value="{{ $categories->name }}" readonly>
                <input type="hidden" name="idcate" value="{{ $categories->id }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-3">
              <div class="form-group">
                <label for="">Mã Sản Phẩm</label>
                <input type="text" name="code" class="form-control" placeholder="Enter code product">
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name product">
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label>Nhà cung cấp</label>
                <select class="form-control" name="provider" style="width: 100%;">
                  <option selected="selected" value="0">---mời chọn---</option>
                </select>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Trạng thái hiển thị</label>
                <select name="display" class="form-control" style="width: 100%;">
                  <option selected="selected" value="1">Có</option>
                  <option value="0">Không</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="">Chi Tiết Sản Phẩm</label>
                <textarea class="form-control" rows="3" name="detail"></textarea>
              </div>
            </div>
          </div>
          <div class="">
            <div class="col-xs-12">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Chọn Avatar</label>
                  <input type="file" id="" name="avata">
                  <p class="help-block">Chỉ được chọn 1 ảnh Avatar</p>
                </div>
              </div>
              <!-- <div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputFile">Chọn Ảnh về sản phẩm</label>
                  <input type="file" id="exampleInputFile">
                  <p class="help-block">chọn nhiều Hình ảnh về sản phẩm</p>
                </div>
              </div> -->
            </div>
          <div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-left">
          <div class="row">
            <div class="col-xs-3">
              <button type="submit" class="btn btn-primary">Add New Product</button>
            </div>
            <div class="col-xs-3">
              <a href="{{ route('admin.listproduct') }}" class="btn btn-default">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@stop