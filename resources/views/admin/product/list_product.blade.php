@extends('templates.admin.template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">View Products</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="" class="table table-bordered table-hover text-center">
          <thead>
          <tr class="">
            <th>Mã sp</th>
            <th>Name Product</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th colspan="3">Chức Năng</th>
            <th><button type="submit" class="btn btn-success">Xóa</button></th>
          </tr>
          </thead>
          <tbody>
            @foreach( $arProduct as $key => $value)
            <?php  

            ?>
            <tr>
              <td>{{ $value->code }}</td>
              <td><a href="#" title="xem chi tiết">{{ $value->name }}</a>
              </td>
              <td><img src="{{ asset('storage/products/'.$value->picture) }}" title="{{ $value->name}}" class="thumbnail" /></td>
              <td>
                <input type="number" name="" value="{{ $value->quantity }}" placeholder="" class="form-control" disabled="true">
              </td>
              <td>{{ $value->price }} vnđ</td>
              <td>
                <a href="#" class="text-green"><i class="fa fa-power-off" aria-hidden="true"></i></a>
              </td>
              <td>
                <a href="{{ route('admin.editproduct') }}" class="text-yellow" ><i class="fa fa-edit"></i>Edit</a>
              </td>
              <td>
                <a href="#" class="text-red"><i class="fa fa-trash-o">Delete</i></a>
              </td>
              <td>
                <input type="checkbox" class="minimal-red">
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <div class="text-right">
              {{ $arProduct->links() }}
            </div>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
@stop