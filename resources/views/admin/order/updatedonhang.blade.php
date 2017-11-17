@extends('templates.admin.template')
@section('content')
<div class="row">
  <div class="col-xs-11">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Nhập Đơn Hàng</h3>
      </div>
      <form action="{{ route('admin.upadte.inputorder') }}" role="form" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="{{ Session::get('ID') }}" name="user_id">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="search......">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for=" ">Mã Sản Phẩm</label>
                <input type="text" name="code" class="form-control" value="{{ $arProduct->code }}" placeholder="Enter code" readonly="">
              </div>
              <div class="form-group">
                <label for=" ">Tên Sản Phẩm</label>
                <input type="text" name="name" value="{{ $arProduct->name }}" class="form-control" placeholder="Enter name product" readonly="">
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label for=" ">Giá Nhập Vào</label>
                <input type="number" name="price_old" value="" class="form-control" id="" placeholder="{{ $arProduct->price_old }}">
              </div>
              <div class="form-group">
                <label for=" ">Giá Bán Ra</label>
                <input type="number" name="price" value="" class="form-control" id="" placeholder="{{ $arProduct->price }}">
              </div>
            </div>
            <div class="col-xs-2">
             <div class="form-group">
               <label for=" ">Số lượng</label>
                <input type="number" name="quantity" value="" class="form-control" id="" placeholder="{{ $arProduct->quantity }}">
             </div>
             <div class="form-group">
                  <label>Giảm giá (%)</label>
                  <input type="number" value="" name="discount" class="form-control" placeholder="{{ $arProduct->discount }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for=" ">Chi Tiết Sản Phẩm</label>
                <textarea name="detail" class="form-control" rows="3">{{ $arProduct->detail }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-right">
          <button type="submit" class="btn btn-primary">Nhập Đơn Hàng</button>
        </div>
      </form>
    </div>
    <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh Sách Đơn Hàng Đã Nhập</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Stt</th>
              <th>id_Code</th>
              <th>Tên Sản Phẩm</th>
              <th>Thuộc danh mục</th>
              <th>Số Lượng</th>
              <th>Đơn Giá</th>
              <th>Thành Tiền</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>IP12NC</td>
              <td>Iphone 8
              </td>
              <td>Điện thoại</td>
              <td>1</td>
              <td>23.000.000</td>
              <td>23.000.000</td>
            </tr>
            </tbody>
            <tbody>
              <tr>
                <th>Tổng Tiền</th>
                <th colspan="6" class="text-right">500.0000 vnđ</th>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</div>
@stop