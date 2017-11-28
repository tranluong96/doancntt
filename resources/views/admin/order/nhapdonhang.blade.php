@extends('templates.admin.template')
@section('content')
<div class="row">
  <div class="col-md-5">
      @if(Session::has('msg-s'))
          <div class="alert alert-success alert-dismissable">{{ Session::get('msg-s') }}</div>
      @endif
      @if(Session::has('msg-e'))
          <div class="alert alert-danger alert-dismissable">{{ Session::get('msg-e') }}</div>
      @endif
    </div>
</div>
<div class="row">
  <div class="col-xs-11">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Nhập Đơn Hàng</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="{{ route('admin.inputOrder') }}" role="form" method="post" enctype="multipart/form-data">
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
            <div class="col-xs-6">
              <div class="form-group">
                <label>Chọn Danh mục sản phẩm</label>
                <select name="idcate" class="form-control select2 disable" style="width: 100%;">
                  @foreach( $categories as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <div class="form-group">
                <label for=" ">Mã Sản Phẩm</label>
                <input type="text" name="code" class="form-control" placeholder="Enter code">
              </div>
              <div class="form-group">
                <label for=" ">Tên Sản Phẩm</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name product">
              </div>
            </div>
            <div class="col-xs-4">
              <div class="form-group">
                <label for=" ">Giá Nhập Vào</label>
                <input type="number" name="price_old" class="form-control" id="" placeholder="">
              </div>
              <div class="form-group">
                <label for=" ">Giá Bán Ra</label>
                <input type="number" name="price" class="form-control" id="" placeholder="">
              </div>
            </div>
            <div class="col-xs-2">
             <div class="form-group">
               <label for=" ">Số lượng</label>
                <input type="number" name="quantity" class="form-control" id="" placeholder="">
             </div>
             <div class="form-group">
                  <label>Giảm giá (%)</label>
                  <input type="number" value="0" name="discount" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for=" ">Chi Tiết Sản Phẩm</label>
                <textarea name="detail" class="form-control" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="">
            <div class="col-xs-12">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Chọn Avatar</label>
                  <input name="avata" type="file" id="">
                  <p class="help-block">Chỉ được chọn 1 ảnh Avatar</p>
                </div>
              </div>
              <!-- <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Chọn Ảnh về sản phẩm</label>
                  <input type="file" id="">
                  <p class="help-block">chọn nhiều Hình ảnh về sản phẩm</p>
                </div>
              </div> -->
            </div>
          <div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-right">
          <button type="submit" class="btn btn-success">Nhập Đơn Hàng</button>
        </div>
      </form>
    </div>
  </div>
</div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="col-xs-5 text-left">
              <h3 class="box-title">Danh Sách Đơn Hàng Đã Nhập</h3>
            </div>
            <div class="col-xs-2 pull-right">
              <h3 class="box-title">
                <?php $date = date("Y-m-d"); ?>
                <form action="{{ route('admin.excel.addorder') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" value="{{ $date }}" name="date">
                  <button type="submit" onclick="" class="btn btn-primary">Xuất file Excels</button>
                </form>
              </h3>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            
            <input type="hidden" value="{{ $date }}" id="datetime">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Stt</th>
                <th>id_Code</th>
                <th>Số Lượng</th>
                <th>Giá nhập vào</th>
                <th>Giá bán ra </th>
                <th>Tổng tiền</th>
              </tr>
              </thead>
              <tbody id="getValueInOrder">
                
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
@section('script')
  <script type="text/javascript"> 
    function getListInOrder(){
        setTimeout(function(){
        var date = $('#datetime').val();
        // alert(date);
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
            $.ajax({
                url: "{{route('admin.ajax.getInOrder')}}",
                type: 'post',
                data: {adate:date},
                success: function(data){
                   $('#getValueInOrder').html(data);
                },
                complete: getListInOrder
            });
        },200);
    };
    getListInOrder();

  </script>
@stop
@stop