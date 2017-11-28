<div class="row">
  <style type="text/css">
    .Choicefile
    {
        display:block;
        background:#0877D8;
        border:1px solid #fff;
        color:#fff;
        width:100px;
        text-align:center;
        text-decoration:none;
        cursor:pointer;
        padding:5px 0px;
    }
    #uploadfile,.removeimg
    {
       display:none;
    }
    #thumbbox
    {
      position:relative;
      width:100px;
    }
    .removeimg
    {
      background: url("http://png-3.findicons.com/files/icons/2181/34al_volume_3_2_se/24/001_05.png") repeat scroll 0 0 transparent;

    height: 24px;
    position: absolute;
    right: 5px;
    top: 5px;
    width: 24px;

    }
</style>
</div>
<div class="row">
  <div class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">View Messages</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-6">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" id="name"  readonly="">
        </div>
        <div class="form-group col-md-6">
            <label for="">Gmail</label>
            <input type="text" name="name" class="form-control" placeholder="Name" id="email" readonly="">
        </div>
        <div class="form-group">
          <label for="">Messages</label><br />
          <textarea name="" id="content" class="form-control" readonly="">ukm àasfasfsaf</textarea>
        </div>
      </div>
      <div class="modal-footer">
        <a href="javascript:void(0)" onclick="$('.modal').css({display:'none', transition:'0.3 all'});"><button type="button" onclick="" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Trần Lượng</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jQuery/my-query.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admin/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- Page script -->
<script type="text/javascript">
  
$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });

function modelView(a)
{
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{route('admin.ajax.Viewcontact')}}",
    type: 'post',
    cache: false,
    data: {aid: a },
    success: function(data){
      $('#name').val(data.name);
      $('#email').val(data.email);
      $('#content').val(data.content);
      $('.modal').css({display:'block', transition:'0.3 all'});
    },
    error: function (){
      alert('Có lỗi xảy ra');
    }
  });
  
}
$(function(){
  function countallcontact(){
    setTimeout(function(){
      var a = 1;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{route('admin.ajax.allcontact')}}",
        type: 'post',
        data: {data:a},
        success: function(data){
         $('#countallcontact').html(data);
         $('#allContact').html(data);
       },
       complete: countallcontact
     });
    },200);
  };
  countallcontact();

  function getarcontact(){
    setTimeout(function(){
      var a = 1;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{route('admin.ajax.getallcontact')}}",
        type: 'post',
        data: {data:a},
        success: function(data){
         $('#get_arcontact').html(data);
       },
       complete: getarcontact
     });
    },500);
  };
  getarcontact();
});

function readURL(input,thumbimage) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#thumbimage").attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    $("#thumbimage").show();
  }
  else {
    $("#thumbimage").attr('src', input.value);
    $("#thumbimage").show();
  }
  $('.filename').text($("#uploadfile").val());
  $('.Choicefile').css('background', '#C4C4C4');
  $('.Choicefile').css('cursor', 'default');
  $(".Choicefile").unbind('click');
  $(".removeimg").show();
}
$(document).ready(function () {
  $(".Choicefile").bind('click', function () {
    
    $("#uploadfile").click();
    
  });
  $(".removeimg").click(function () {
    $("#thumbimage").attr('src', '{{ asset('images/logo/avata.png') }}').show();
    $("#myfileupload").html('<input type="file" name="avata" id="uploadfile" onchange="readURL(this);" />');
    $(".removeimg").hide();
    $(".Choicefile").bind('click', function () {
      $("#uploadfile").click();
    });
    $('.Choicefile').css('background','#0877D8');
    $('.Choicefile').css('cursor', 'pointer');
    $(".filename").text("");
  });
})



$(function(){

  $('#check_all').on('change', function() {
    var checkall = document.getElementById("check_all");
    var check    = document.getElementsByClassName("check");
    if (checkall.checked) {
      for (var i = 0; i < check.length; i++) {
        check[i].checked = true;
      }
    }else{
      for (var i = 0; i < check.length; i++) {
        check[i].checked = false;
      }
    }
  });
})
function changerDisplaymes()
{
  $('#liststar').css({display:'none', transition:'0.3 all'});
  $('#listmes').css({display:'block', transition:'0.3 all'});
}
function changerDisplayStar()
{
  $('#liststar').css({display:'block', transition:'0.3 all'});
  $('#listmes').css({display:'none', transition:'0.3 all'});
}



function setStar(id,so){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{route('admin.ajax.setStar')}}",
    type: 'post',
    data: {aid: id, aso:so},
    success: function(data){
     $('#setStar-'+id).html(data);
   },
   error: function (){
    alert('Có lỗi xảy ra');
  }
});
}

$(function(){
  $('#check_all').on('change', function() {
    var checkall = document.getElementById("check_all");
    var check    = document.getElementsByClassName("check");
    if (checkall.checked) {
      for (var i = 0; i < check.length; i++) {
        check[i].checked = true;
      }
    }else{
      for (var i = 0; i < check.length; i++) {
        check[i].checked = false;
      }
    }
  });

  function getContact(){
    setTimeout(function(){
      var a = 1;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{route('admin.ajax.getcontact')}}",
        type: 'post',
        data: {data:a},
        success: function(data){
         $('#countcontact').html(data);
       },
       complete: getContact
     });
    },200);
  };
  getContact();

});
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
@yield('script')
</body>
</html>
