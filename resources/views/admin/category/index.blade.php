@extends('templates.admin.template')
@section('content')
<div class="row">
  <div class="col-md-5">
    <div class="box box-primary box-solid collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title text-white">Thêm danh mục</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="{{ route('admin.storeCate') }}" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Name Categories</label>
            <input type="text" name="name" value="" placeholder="nhập..." class="form-control" required="mời nhập">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
          <div class="container row">
            <div class="form-group">
            <label for="">Chọn Parent</label> <br>
            <select name="parent" class="form-control select2" style="width: 200px !important;">
              <option value="0">--- not parent---</option>
              <?php  
              function showCategories($categories, $parent =0, $char = '', $select=0)
              {
                  foreach ($categories as $key => $item)
                  {
                      // Nếu là chuyên mục con thì hiển thị
                      if ($item['parent'] == $parent)
                      {
                          if ($select==$item['id'] ) {
                              echo '<option selected="selected" value="'.$item['id'].'">';
                              echo $char . $item['name'];
                              echo '</option>';
                          }else{
                              echo '<option value="'.$item['id'].'">';
                              echo $char . $item['name'];
                              echo '</option>';
                           }
                          // Xóa chuyên mục đã lặp
                          // unset($categories[$key]);
                           
                          // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                          showCategories($categories, $item['id'], $char.'|---',$item['id']);
                      }
                  }
              }
              ?>
               <?php showCategories($arcate); ?>
            </select>
          </div>
          <div class="form-group">
            <div class="col-xs-3">
              <input type="submit" name="" value="Add New" class="btn btn-success">
            </div>
            <div class="col-xs-3">
              <button type="button" class="btn btn-default text-right" data-widget="collapse"><i class="fa fa-arrow-circle-up ">Close</i>
            </div>
          </button>
          </div>
        </form>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-md-5">
    @if(Session::has('msg-s'))
        <div class="alert alert-success alert-dismissable">{{ Session::get('msg-s') }}</div>
      @endif
      @if(Session::has('msg-e'))
        <div class="alert alert-danger alert-dismissable">{{ Session::get('msg-e') }}</div>
      @endif
  </div>
</div>
<div class="row text-center">
  <div class="col-xs-offset-1 col-xs-10">
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
              <th>Name Category</th>
              <th>parent</th>
              <th colspan="2">Chức Năng</th>
            </tr>
            </thead>
            <tbody>
              <?php  
                $i =0;
                foreach ($categories as $key => $value) {
                  $i++;
                  $id          = $value->id;
                  $name        = $value->name;
                  $slug        = str_slug($name);
                  $parent      = $value->parent;
                  $urledit     = route('admin.cateEdit',['slug'=>$slug, 'id'=>$id]);
                  $urldelete   = route('admin.deleteCate',['id'=>$id]);
              ?>
            <tr>
              <td>{{ $i }}</td>
              <td><a href="#" title="xem chi tiết">{{ $name }}</a>
              </td>
              <td>{{ $parent }}</td>
              <td>
                <a href="{{ $urledit }}" class="text-yellow" ><i class="fa fa-edit"></i> Edit</a>
              </td>
              <td>
                <a href="{{ $urldelete }}" onclick="var tb=confirm('Bạn có muốn xóa {{ $value->name }} không ?');if(tb==true){return true;}else{return false;};" class="text-red"><i class="fa fa-trash-o"> Delete</i></a>
              </td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </form>
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-right">
          {{ $categories->links() }}
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
@stop