<?php
include("head.php");
 if(permissao()==FALSE){
             echo "<script language= 'JavaScript'>
                                            location.href='erro403.php'
                                    </script>";
                }  
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
            <section class="col-lg-12 connectedSortable">
                <div class="col-xs-12">
                      <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title">Cadastrar Usuário</h1>
            </div>
                                                  <div class="box-body">

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
                  <select class="form-control" name="tipo" placeholder="Tipo">
                    <option value="1">Administrador</option>
                    <option value="0">Funcionário</option>
                 

                  </select>
                </div>


                        <button type="submit" class="btn btn-success" name="botao">Cadastrar</button>
                        <a href="../view/INQ_listar.php"><button type="button"  class="btn btn-info">Voltar</button>    </a>

                    </form>
                    <?php
                    require_once '../Controller/IquilinoController.php';
                    if (isset($_POST["botao"])) {
                        $objControl = new IquilinoController();
                        $objControl->Cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"],$_POST["tipo"]);
                    }
                    ?>     

                    <br/>
                                                  </div>
                </div>

</div>


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