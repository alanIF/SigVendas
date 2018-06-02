<?php
include("head.php");
?>

                    

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
                            <h3 class="box-title">Ações dos Usuários</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                         <th>Ação</th>
                                         <th>Usuário</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../Controller/LogsController.php';
                                    $objControl = new LogsController();
                                    $objControl->listar();
                                    ?>

                                </tbody>
                              
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

