@extends('templates.admin.template')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="box box-danger collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Add News Parameters</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="" method="get" accept-charset="utf-8">
                    <div class="form-group">
                        <label for="">Parameter Name</label>
                        <input type="text" name="" value="" placeholder="nhập..." class="form-control">
                    </div>
                    <div>
                        <input type="button" name="" value="Thêm Mới" class="btn btn-success">
                    </div>
                </form>
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Danh Sách Parameters</h3>
            </div>
        <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th colspan="2">chức năng</th>
                        <th>
                            <input type="button" name="" value="Xóa" class="btn btn-danger">
                        </th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td><input type="text" name="" value="Ram" disabled class="form-control"></td>
                        <td>
                            <a href="{{ route('admin.editparameter') }}" class="text-success"><i class="fa fa-refresh"> Edit</i></a>
                        </td>
                        <td>
                            <a href="#" class="text-red"><i class="fa fa-trash-o"> Delete</i></a>
                        </td>
                        <td>
                            <input type="checkbox" class="minimal-red">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
@stop