<?php
    include("head.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
                    <?php
            
                    $idUsu=$_SESSION['idUSU'];
                    $conn = F_conect();
                    $result = mysqli_query($conn, "Select * from usuario where id=" . $idUsu);
                      if (mysqli_num_rows($result)) {
                            while ($row = $result->fetch_assoc()) {
                                $nome=$row['nome'];
                                $email=$row['email'];
                                $senha=$row['senha'];
                                
                            }
                      }else{
                          header("Location: erro.php");
                          
                      }
                    $conn->close();

                
        
    
         ?>
        <section class="col-lg-12 connectedSortable">
            <div class="box box-info">
                <div class="box-header">
                            <h3 class="box-title">Meus Dados</h3>
                        </div>
                                        <div class="box-body">

                 <form class="form-group" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" name="nome" type="text" placeholder="Nome" value="<?php echo $nome?>" required>
                        </div> 
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Email" value="<?php echo $email?>" required>
                        </div>  
                        <div class="form-group">
                            <input class="form-control" name="senha" type="password"  placeholder="Senha" value="<?php echo $senha?>" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="conf_senha" type="password" placeholder="Confirmar Senha"  value="<?php echo $senha?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="botao">Atualizar</button>
                    </form>
        <?php
           
            if (isset($_POST["botao"])) {
                    if(strcmp($_POST['senha'],$_POST['conf_senha'])==0){
                        $objControl1 = new UsuarioController();
                        $objControl1->atualizar($_POST["nome"], $_POST["email"], $_POST["senha"]);
                    }else{
                                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>OPS!</strong><BR/> Senha não correspondentes !!! </div>";

                        
                        
                    }
            }
        ?>     

                    <br/>
                                        </div>
                </div>
           

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          
          <!-- /.box -->

         

         
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
<?php
    include("foot.php");
?>