<?php
include("head.php");
?>
<script type="text/javascript">
  function confirmar(){
    // só permitirá o envio se o usuário responder OK
    var resposta = window.confirm("Deseja mesmo" + 
                   " excluir esta Entrada?");
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
                            <h3 class="box-title">Estoque</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                         <th>Produto</th>
                                         <th>Estoque Disponível</th>
                                        <th>Estoque Minimo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../Controller/EstoqueController.php';
                                    $objControl = new EstoqueController();
                                    $objControl->listar();
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> <a href="imprimir_estoque.php"><i class="glyphicon glyphicon-print" aria-hidden="true"></i></a></th>


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
    <!-- jQuery 2.2.3 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/chartjs/chart.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="
https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js
"></script>
<script src="
https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js
"></script>
<script src="
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
		dom: 'Bfrtip',
 buttons: [
     {
      extend:'pdfHtml5',
       text: "<i class='fa fa-print info'></i>"
     }
 ],
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
            "autoWidth": false,
            "language": {
      "url": "../sql/translate.json"
   }
        });
    });
</script>
<?php
include("foot.php");
?>

