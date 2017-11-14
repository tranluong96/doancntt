@extends('templates.admin.template')
@section('content')
<div class="row">
  <div class="col-xs-11">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Nhập Đơn Hàng</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
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
            <div class="col-xs-6">
              <div class="form-group">
                <label>Chọn Sản Phẩm</label>
                <select class="form-control select2 disable" style="width: 100%;">
                  <option selected="selected">SamSung</option>
                  <option>Asus</option>
                  <option>Nokia</option>
                  <option>Iphone</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Mã Sản Phẩm</label>
                <input type="text" class="form-control" placeholder="Enter code">
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                <input type="text" class="form-control" placeholder="Enter name product">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label>Trạng thái hiển thị</label>
                <select class="form-control" style="width: 100%;">
                  <option selected="selected">Có</option>
                  <option>Không</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="col-xs-3">
                <label for="exampleInputEmail1">Số lượng</label>
                <input type="number" class="form-control" id="" placeholder="">
              </div>
              <div class="col-xs-3">
                <label for="exampleInputEmail1">Giá Nhập Vào</label>
                <input type="number" class="form-control" id="" placeholder="">
              </div>
              <div class="col-xs-3">
                <label for="exampleInputEmail1">Giá Bán Ra</label>
                <input type="number" class="form-control" id="" placeholder="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 table table-bordered">
              <div class="form-group">
                <label for="exampleInputPassword1">Thông số kỹ thuật</label>
                </br>
                <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Ram</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">2G</option>
                        <option>4G</option>
                        <option>8G</option>
                        <option>16G</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Màn Hình</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">IPS LCD, 4.5", FWVGA</option>
                        <option>IPS LCD, 5.0", FWVGA</option>
                        <option>IPS LCD, 5.5", FWVGA</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Camera sau</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">8 MP</option>
                        <option>4 MP</option>
                        <option>8G</option>
                        <option>16G</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Camera trước</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">---Chưa chọn ---</option>
                        <option>4 MP</option>
                        <option>8G</option>
                        <option>16G</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Vi xử lý</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">---Chưa chọn ---</option>
                        <option>4 MP</option>
                        <option>8G</option>
                        <option>16G</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row col-xs-6">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      <i class="fa fa-plus-square"></i> Thêm Mới Thông số kỹ thuật
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="form-group col-xs-6">
                      <label for="exampleInputPassword1">Tên Thông Số</label>
                      <input type="text" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group col-xs-6">
                      <label for="exampleInputPassword1">Giá Trị Thông Số</label>
                      <input type="text" class="form-control" placeholder="Enter values">
                    </div>
                    </br>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="1">
                      <button class="btn btn-primary" onclick="">Add</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="exampleInputPassword1">Chi Tiết Sản Phẩm</label>
                <textarea class="form-control" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="">
            <div class="col-xs-12">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputFile">Chọn Avatar</label>
                  <input type="file" id="exampleInputFile">
                  <p class="help-block">Chỉ được chọn 1 ảnh Avatar</p>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputFile">Chọn Ảnh về sản phẩm</label>
                  <input type="file" id="exampleInputFile">
                  <p class="help-block">chọn nhiều Hình ảnh về sản phẩm</p>
                </div>
              </div>
            </div>
          <div>
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