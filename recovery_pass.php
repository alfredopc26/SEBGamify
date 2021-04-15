

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SEB | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>S.E.B</b> Gamify</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Debeas cambiar la contraseña.</p>

      <form action="login.html" method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="pass1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" id="pass2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a id="login_pass" class="btn btn-primary btn-block">Cambiar contraseña.</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>

$(document).on('click', '#login_pass', function(){

        var pass1= $("#pass1").val();
        var pass2= $("#pass2").val();

        if(pass1 != pass2){
          $('#result_auth').html("<span class='text-red'>Las contrase;as no coinciden. </span>");
        }else{

          $('#result_auth').html('<div class="loading" style="text-align: center"><img src="./dist/img/loader.gif"/><br/>Un momento, por favor...</div>');
          $.ajax({
              type: "GET",
              url: './script/response_ajax.php',
              dataType: 'json',
              data: 'pass1='+pass1+"&pass2="+pass2+'&uid='+<?php echo $_GET['uid']; ?>+'&action=authenticationpass',
              success: function(data){ 

                  console.log(data);
                  if(data.result){
                      location.href = './index.php';
                  }else{
                      $('#result_auth').html("<span class='text-red'>"+data.error+"</span>");
                  }
                      
              }     
          });
        }

});

$(document).on('click', '#register', function(){


    $('#modalRegister').modal({
        "show": true
    });

        $('#register_form').html('<div class="loading" style="text-align: center"><img src="./dist/img/loader.gif"/><br/>Un momento, por favor...</div>');
        $.ajax({
            type: "GET",
            url: './script/response_ajax.php',
            dataType: 'html',
            data: 'action=request_user',
            success: function(data){ 
                console.log(data);
                $('#register_form').html(data);
      
            }     
        });

});

$(document).on('click', '#submitRegister', function(){

    var data = $('#formRegister').serialize();

    $('#register_form').html('<div class="loading" style="text-align: center"><img src="./dist/img/loader.gif"/><br/>Un momento, por favor...</div>');
    $.ajax({
        type: "GET",
        url: './script/response_ajax.php',
        dataType: 'html',
        data: data+'&action=formUserSubmit',
        success: function(data){ 
            console.log(data);
            $('#register_form').html(data);

        }     
    });

});

</script>
</body>
</html>