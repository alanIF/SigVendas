<?php
include("head.php");
 if(permissao()==FALSE){
             echo "<script language= 'JavaScript'>
                                            location.href='erro403.php'
                                    </script>";
                }  
?>
<script type="text/javascript">
  function confirmar(){
    // só permitirá o envio se o usuário responder OK
    var resposta = window.confirm("Deseja mesmo" + 
                   " excluir este Usuário?");
    if(resposta)
      return true;
    else
      return false; 
  }
</script>
                         

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="texto">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->

            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->

                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-12 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Usuários</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Senha</th>
                                        <th>Tipo</th>

                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../Controller/IquilinoController.php';
                                    $objControl = new IquilinoController();
                                    $objControl->listar();
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> <a href="INQ_cadastro.php"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>


                                    </tr>
                                </tfoot>
                            </table>
 
                        </div>
                        <!-- /.box-body -->
                    </div>


                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "language": {
      "url": "../sql/translate.json"
   }
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<?php
include("foot.php");
?>

