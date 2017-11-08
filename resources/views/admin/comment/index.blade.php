@extends('templates.admin.template')
@section('content')
<div class="row text-center">
  <div class="col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Danh sách danh mục</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <style type="text/css" media="screen">
        img{
          width: 100px;
          height: 50px;
          display: inline !important;
          margin: 0 !important;
        }
      </style>
      <div class="box-body">
        <form action="">
          <table id="" class="table table-bordered table-hover text-center">
            <thead>
            <tr class="">
              <th>.#</th>
              <th>Name</th>
              <th>Avatar</th>
              <th>Sản Phẩm</th>
              <th>Content</th>
              <th>parent</th>
              <th colspan="1">Chức Năng</th>
              <th><button type="submit" class="btn btn-success">Xóa</button></th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td><a href="#" title="xem chi tiết">Đỗ quang lai</a>
              </td>
              <td class="text-center"><img src="{{ asset('images/logo/dt.png') }}" title="hình ảnh" class="thumbnail" /></td>
              <td>Iphone 5 plus</td>
              <td>Điện thoại này còn không ad ?</td>
              <td>0</td>
              <td>
                <a href="#" class="text-red"><i class="fa fa-trash-o"> Delete</i></a>
              </td>
              <td>
                <input type="checkbox" class="minimal-red">
              </td>
            </tr>
            </tbody>
            <thead>
            <tr class="">
              <th colspan="7" rowspan="" headers="" scope=""></th>
              <th colspan="" class="text-right"><button type="submit" class="btn btn-success">Xóa</button></th>
            </tr>
            </thead>
          </table>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@stop