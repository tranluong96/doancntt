@extends('templates.admin.template')
@section('content')
<div class="row">
<div class="col-md-6">
        <div class="box box-danger">
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
                        <label for="">Name Old</label>
                        <input type="text" name="" value="Ram" placeholder="" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">New Name</label>
                        <input type="text" name="" value="" placeholder="nhập..." class="form-control">
                    </div>
                    
                </form>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-xs-3">
                        <input type="submit" name="" value="Update" class="btn btn-success">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" name="" value="Cancel" class="btn btn-defaul">
                    </div>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>    
</div>
@stop