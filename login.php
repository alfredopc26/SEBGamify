

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
      <p class="login-box-msg">Inicie sesion para continuar...</p>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo" id='user'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span id="result_auth"></span>
        <?php echo "<span class='text-red'>".($_GET['error'] == 1 ? 'El usuario debe esperar a que el administrador lo active': '')."</span>"; ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <a class="btn btn-primary btn-block" id="login">Iniciar</a>
          </div>
          <!-- /.col -->
        </div>

      <p class="mb-0">
        <a href="#" id="register" class="text-center">Solicitud de registro</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<div class="modal fade" id="modalRegister" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Solicitud de registro a la plataforma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="register_form"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="submitRegister">Solicitar</button>
      </div>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>

$(document).on('click', '#login', function(){

        var user= $("#user").val();
        var pass= $("#password").val();


        $('#result_auth').html('<div class="loading" style="text-align: center"><img src="./dist/img/loader.gif"/><br/>Un momento, por favor...</div>');
        $.ajax({
            type: "GET",
            url: './script/response_ajax.php',
            dataType: 'json',
            data: 'user='+user+"&pass="+pass+'&action=authentication',
            success: function(data){ 

                console.log(data);
                if(data.result){
                    location.href = './index.php';
                }else{
                    $('#result_auth').html("<span class='text-red'>"+data.error+"</span>");
                }
                	   
            }     
        });

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