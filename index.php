<?php         

if (isset($_POST["botao"])) {
                require_once 'Model/connect.php';   
                require_once './Controller/UsuarioController.php';
                $objControl = new UsuarioController();
                $objControl->Login($_POST["email"], $_POST["senha"]);
            }
        ?>
<!DOCTYPE html>

<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Vendas - SIGvendas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

 
</head>
<body  class="hold-transition login-page">
	 <div class="login-box">
  <div class="login-logo">
    SIG Vendas
  </div>
               <div class="login-box-body">
    <p class="login-box-msg">Faça o login para entrar no Sistema!</p>


		<form role='form' action='' method='post' enctype="multipart/form-data" >
      <div class="form-group has-feedback">

                            <input class="form-control" type='email' name="email" placeholder="Email" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  
      </div>  
      <div class="form-group has-feedback">
                            <input class="form-control" type='password' name="senha" placeholder="Senha" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  
      </div>
             <div class="">

                     <button type="submit" class="btn btn-primary btn-block btn-flat" name='botao'>Entrar</button>
        </div>
 </form>
               </div>
         </div>

               
</body>
    <!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
		


</html>