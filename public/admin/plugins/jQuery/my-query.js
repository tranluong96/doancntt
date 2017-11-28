
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
function delComment(id)
    {
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: "{{route('admin.ajax.delete')}}",
          type: 'post',
          data: {aid: id},
          success: function(data){
            $('#comment-'+data).fadeOut(1000);
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

    function modalView(a)
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