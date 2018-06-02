<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>SGA</title>
	<!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="../dist/css/style.css" />
	<!-- Google Font -->
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
	<link type="text/css" rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <!-- Bootstrap Core JS -->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	
	<section class="container">
	    <section class="login-form">
		<section>
                                        <img src="../imagens/logo.png" alt=""  />

			<!--<img src="images/logo.png" alt="" /> -->
		</section>
		<form class="form-group" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" name="nome" type="text" placeholder="Nome" required>
                        </div> 
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Email" required>
                        </div>  
                        <div class="form-group">
                            <input class="form-control" name="senha" type="password"  placeholder="Senha" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="conf_senha" type="password" placeholder="Confirmar Senha" required>
                        </div>

                        <button type="submit" class="btn btn-default" name="botao">Cadastrar</button>
                    </form>
                    <?php
                        require_once '../Model/connect.php'; 

                    require_once '../Controller/UsuarioController.php';
                    if (isset($_POST["botao"])) {
                        if (strcmp($_POST['senha'], $_POST['conf_senha']) == 0) {
                            $objControl = new UsuarioController();
                            $objControl->Cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"]);
                        } else {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>OPS!</strong><BR/> Senha não correspondentes !!! </div>";
                        }
                    }
                    ?>  
		<section>
                    <a href="../index.php">Voltar</a>
		</section>
		</section>
	</section>
	
</body>
</html>