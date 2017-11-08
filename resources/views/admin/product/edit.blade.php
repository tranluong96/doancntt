@extends('templates.admin.template')
@section('content')
<div class="row">
  <div class="col-xs-11">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Sản Phẩm</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label>Hiện đang Chọn danh mục</label>
                <input class="form-control" id="disabledTextInput" type="text" value="Điện Thoại" readonly>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label>Chọn Sản Phẩm</label>
                <select class="form-control select2" style="width: 100%;">
                  <option>--- chưa chọn ---</option>
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
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter code product">
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name product">
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
            <div class="col-xs-12 table table-bordered">
              <div class="form-group">
                <label for="exampleInputPassword1">Thông số kỹ thuật</label>
                </br>
                <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label>Ram</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option>---chưa chọn---</option>
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
                        <option>--- chưa chọn ---</option>
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
                        <option>--- chưa chọn ---</option>
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
        <div class="box-footer text-left">
          <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop