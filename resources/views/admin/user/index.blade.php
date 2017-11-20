@extends('templates.admin.template')
@section('content')
<style>
img{
    display: inline-block !important;
    width:100px; 
    height:80px;
}
</style>
<div class="row">
  <div class="col-xs-5">
    @if(Session::has('msg-s'))
        <div class="alert alert-success alert-dismissable">{{ Session::get('msg-s') }}</div>
      @endif
      @if(Session::has('msg-e'))
        <div class="alert alert-danger alert-dismissable">{{ Session::get('msg-e') }}</div>
      @endif
  </div>
</div>

<div class="row">
  <div class="col-xs-offset-1 col-xs-10">
    <div class="box box-success">
      <div class="box-header with-border bg-success">
        <h3 class="box-title"><i class="fa fa-users"></i> Danh sách Khách Hàng</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="">
          <table id="" class="table table-bordered table-hover text-center">
            <thead>
            <tr class="">
              <th>.#</th>
              <th>Name</th>
              <th>Fullname</th>
              <th>Avatar</th>
              <th>Gmail</th>
              <th>Quyền truy cập</th>
              <th colspan="3">Chức Năng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($arUser as $key => $value)
                <?php 
                  $hinhanh = $value->picture;
                  $slug    = str_slug($value->fullname);
                  $edit = route('admin.user.edit',['slug'=>$slug, 'id'=>$value->id]);
                  $delete = route('admin.user.delete',['id'=>$value->id]);
                ?>
              <tr>
                <td>1</td>
                <td><a href="javascipt:void(0)" title="">{{ $value->name }}</a>
                </td>
                <td><a href="#" title="xem chi tiết">{{ $value->fullname }}</a>
                </td>
                <td class="text-center">
                  @if($hinhanh != "")
                    <img src="{{ asset('storage/admins/'.$hinhanh) }}" title="hình ảnh" class="thumbnail" />
                  @else
                    <img src="{{ asset('images/logo/avata.png') }}" title="hình ảnh" class="thumbnail" />
                  @endif
                </td>
                <td>{{ $value->email }}</td>
                <td>Administrator</td>
                <td>
                  <a href="{{ $edit }}" class="text-yellow"><i class="fa fa-edit"> Edit</i></a>
                </td>
                <td>
                  <a href="{{ $delete }}" class="text-red"><i class="fa fa-trash-o"> Delete</i></a>
                </td>
                <td>
                  <a href="{{ route('admin.user.seeProfile',['id'=>$value->id]) }}"><i>xem chi tiết...</i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<div class="row">
  <div class="col-xs-offset-1 col-xs-10">
    <div class="box box-success">
      <div class="box-header with-border bg-success">
        <h3 class="box-title"><i class="fa fa-user"></i> Danh sách Admin</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      
      <div class="box-body">
        <form action="">
          <table id="" class="table table-bordered table-hover text-center">
            <thead>
            <tr class="">
              <th>.#</th>
              <th>Name</th>
              <th>Fullname</th>
              <th>Avatar</th>
              <th>Gmail</th>
              <th>Quyền truy cập</th>
              <th colspan="3">Chức Năng</th>
            </tr>
            </thead>
            <tbody>
             @foreach($arUser as $key => $value)
                <?php 
                  $hinhanh = $value->picture;
                  $slug    = str_slug($value->fullname);
                  $edit = route('admin.user.edit',['slug'=>$slug, 'id'=>$value->id]);
                  $delete = route('admin.user.delete',['id'=>$value->id]);
                ?>
              <tr>
                <td>1</td>
                <td><a href="javascipt:void(0)" title="">{{ $value->name }}</a>
                </td>
                <td><a href="#" title="xem chi tiết">{{ $value->fullname }}</a>
                </td>
                <td class="text-center">
                  @if($hinhanh != "")
                    <img src="{{ asset('storage/admins/'.$hinhanh) }}" title="hình ảnh" class="thumbnail" />
                  @else
                    <img src="{{ asset('images/logo/avata.png') }}" title="hình ảnh" class="thumbnail" />
                  @endif
                </td>
                <td{{ $value->email }}</td>
                <td>{{ $value->email }}</td>
                <td>Administrator</td>
                <td>
                  <a href="{{ $edit }}" class="text-yellow"><i class="fa fa-edit"> Edit</i></a>
                </td>
                <td>
                  <a href="{{ $delete }}" class="text-red"><i class="fa fa-trash-o"> Delete</i></a>
                </td>
                <td>
                  <a href="{{ route('admin.user.seeProfile',['id'=>$value->id]) }}"><i>xem chi tiết...</i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@stop