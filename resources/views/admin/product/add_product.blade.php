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
            <div class="col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Mã Sản Phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter code product">
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name product">
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label>Nhà cung cấp</label>
                <select class="form-control" style="width: 100%;">
                  <option selected="selected">---mời chọn---</option>
                  <option></option>
                </select>
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
                <table class="table table-bordered">
                  <tr>
                    <thead>
                      <th>Tên Thông số</th>
                      <th>Giá Trị</th>
                    </thead>
                  </tr>
                  <tr>
                    <td>Ram</td>
                    <td>256 GB, 3 GB RAM</td>
                  </tr>
                  <tr>
                    <td>Màn hình:</td>
                    <td>Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu</td>
                  </tr>
                  <tr>
                    <td>Kích thước màn hình:</td>
                    <td>1080 x 1920 pixels, 5.5 inches (~401 ppi mật độ điểm ảnh)</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="row col-xs-12">
            <div class="panel-group" id="accordion">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      <i class="fa fa-plus-square"></i> Thêm Mới Thông số kỹ thuật
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="form-group col-xs-4">
                        <div class="form-group">
                          <label for="">Tên Thông Số</label><br>
                          <select class="form-control select2" style="width:300px;">
                              <option value="">---Chọn Name---</option>
                              <option value="">Ram</option>
                              <option value="">CPU</option>
                              <option value="">Màn Hình</option>
                              <option value="">Chipset</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-xs-8">
                      <label for="exampleInputPassword1">Giá Trị Thông Số</label>
                      <input type="text" class="form-control" placeholder="Enter values">
                    </div>
                    </br>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="1">
                      <button class="btn btn-primary" onclick="">Add Parameter</button>
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