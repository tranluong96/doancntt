@extends('templates.admin.template')
@section('content')
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <div class="box box-primary">
      <div class="box-header with-border text-center">
        <h3 class="box-title "><i class="fa fa-user"></i>Edit Users</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="{{ route('admin.user.update',['id'=> $aruser->id]) }}" enctype="multipart/form-data" method="post" role="form">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="row">
                <div class="col-xs-6">
                     <div class="form-group">
                        <label for="">UserName</label>
                        <input type="text" name="username" value="{{$aruser->name}}" class="form-control" disabled="">
                    </div>
                    <div class="form-group">
                        <label for="">Xác nhận bằng Mật Khẩu</label>
                        <input type="password" name="password_old" value="" class="form-control">
                        @if(Session::has('msg-e'))
                            <div class="alert alert-danger alert-dismissable">{{ Session::get('msg-e') }}</div>
                        @endif
                        @if ($errors->has('password_old'))
                            <p class="has-error alert-danger">{{$errors->first('password_old')}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="">avatar</label>
                        <figure>
                            @if( $aruser->picture != "")
                                <img src="{{ asset('storage/admins/'.$aruser->picture) }}" alt="" style="width: 200px; height: 150px;" class="thumbnail" >
                            @else
                                <img src="{{ asset('images/logo/avata.png') }}" title="hình ảnh" class="thumbnail"  style="width: 200px; height: 150px;" />
                            @endif
                            <input type="checkbox" class="minimal-red"  name="delete_picture" value="yes" onclick="var tb=confirm('Bạn có muốn xóa {{$aruser->picture}} không ?');if(tb==true){return true;}else{return false;};" /> Delete
                        </figure>
                        <hr>
                        <input type="file" name="avata" value="" class="form-control">
                    </div>
                </div>
            </div>
                
            <div class="col-xs-12">
                <div class="form-group">
                <label for="">Gmail</label>
                <input type="email" name="gmail" value="{{ $aruser->email }}" class="form-control">
                @if ($errors->has('gmail'))
                    <p class="has-error alert-danger">{{$errors->first('gmail')}}</p>
                @endif
            </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="">Fullname</label>
                    <input type="text" name="fullname" value="{{ $aruser->fullname }}" class="form-control">
                    @if ($errors->has('fullname'))
                        <p class="has-error alert-danger">{{$errors->first('fullname')}}</p>
                    @endif
                </div>    
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="">Địa Chỉ</label>
                    <input type="text" name="address" value="{{ $aruser->address }}" class="form-control">
                    @if ($errors->has('address'))
                        <p class="has-error alert-danger">{{$errors->first('address')}}</p>
                    @endif
                </div>    
            </div>
            <div class="xol-xs-12">
                
            </div>
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop