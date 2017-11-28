@extends('templates.admin.template')
@section('content')
<div class="row">
    <div class="col-md-5">
        <div id="alertajax"></div>
        @if(Session::has('msg-s'))
            <div class="alert alert-success alert-dismissable">{{ Session::get('msg-s') }}</div>
        @endif
        @if(Session::has('msg-e'))
            <div class="alert alert-danger alert-dismissable">{{ Session::get('msg-e') }}</div>
        @endif
      </div>
</div>
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
                <form action="" method="">
                    <div class="form-group">
                        <label for="">Parameter Name</label>
                        <input type="text" name="name" id="name" value="" placeholder="nhập..." class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chọn danh mục</label> <br>
                        <select id="parameters" name="category" class="form-control select2" style="width: 250px;">
                            @foreach( $categories as $key => $value )
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <input type="button" onclick="addPara()" value="Thêm Mới" class="btn btn-success">
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
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th colspan="2">chức năng</th>
                        </tr>
                    </thead>
                    <tbody id=getparameters>
                        
                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>
        </div>
       
    </div>
</div>
</div>
@section('script')
    <script type="text/javascript" >
        function addPara(){
            aname = $('#name').val();
            apara = $('#parameters').val();
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.add.parameters')}}",
                type: 'post',
                data: {name: aname, para: apara},
                success: function(data){
                   $('#alertajax').html(data);
                },
                error: function (){
                    alert('Có lỗi xảy ra');
                }
            });
        }

        function destroy(id){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.destroy.parameters')}}",
                type: 'post',
                data: {aid: id},
                success: function(data){
                    $('#alertajax').html(data);
                },
                error: function (){
                    alert('Có lỗi xảy ra');
                }
            });
        }

        $( document ).ready(function() {
            function getParameters(){
                setTimeout(function(){
                    var a = 1;
                    $.ajaxSetup({
                        headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                      });
                    $.ajax({
                        url: "{{route('admin.ajaxParameters')}}",
                        type: 'post',
                        data: {data:a},
                        success: function(data){
                           $('#getparameters').html(data);
                        },
                        complete: getParameters
                    });
                },200);
            };
            getParameters();
        });
        
    </script>
@stop
@stop