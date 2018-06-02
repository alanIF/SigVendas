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
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php
                            $conn = F_conect();
                            $result = mysqli_query($conn, "Select count(*) total from usuario");
                            if (mysqli_num_rows($result)) {
                                while ($row = $result->fetch_assoc()) {
                                    $total_inquilinos = $row['total'];
                                }
                                echo $total_inquilinos;
                            }

                            $conn->close();
                            ?>
                        </h3>

                        <p>Usuários</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <?php
                            if(permissao()){

                  echo   '<a href="INQ_listar.php" class="small-box-footer"> Ver<i class="fa fa-arrow-circle-right"></i></a>';
                            } ?>
                            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php
                            $conn = F_conect();

                            $result1 = mysqli_query($conn,"Select count(*) total from produto ");
                            if (mysqli_num_rows($result1)) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    $total_propriedades = $row1['total'];
                                }
                                echo $total_propriedades;
                            }
                            $conn->close();
                            ?>   
                        </h3>

                        <p>Produtos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-archive "></i>
                    </div>
                       <?php
                            if(permissao()){
                    echo '<a href="PROP_listar.php" class="small-box-footer"> Ver<i class="fa fa-arrow-circle-right"></i></a>';
                            }?>                
                            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3>
<?php
$conn = F_conect();
$rendimento=0;
$result2 = mysqli_query($conn, "Select count(*) total from entrada");
if (mysqli_num_rows($result2)) {
    while ($row2 = $result2->fetch_assoc()) {
        $rendimento = $row2['total'];
    }
}
    echo $rendimento;

$conn->close();
?> 
                        </h3>

                        <p>Entradas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </div>
                       <?php
                            if(permissao()){
                    
                             echo'   <a href="ENT_listar.php" class="small-box-footer">Ver<i class="fa fa-arrow-circle-right"></i></a>';
                            }
                            ?>
                                        </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>
<?php
$conn = F_conect();
$idUsu = $_SESSION['idUSU'];
$result = mysqli_query($conn, "Select count(*) total from saida where id_usuario=".$_SESSION['idUSU']);
$total = 0;
if (mysqli_num_rows($result)) {
    while ($row = $result->fetch_assoc()) {
        $total = $row['total'];
    }
}
echo $total;
$conn->close();
?>

                        </h3>

                        <p>Saidas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-minus-circle"></i>
                    </div>
                 
                    <a href="SAI_listar.php" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <section class="">
          <div class="box-body col-lg-6">
            <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Saídas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                <div class="box-body">
                   <table id="example1" class="table table-bordered table-striped">
                       <thead><tr>
                               <th>Usuário</th>                               <th>Saida</th>
                             

                           </tr></thead>
<tbody>
   
    <?php
    $conn = F_conect();
   
    $consulta = "Select u.nome usuario,
           s.data_saida data,p.descricao produto,s.qtd quantidade
                from produto p,saida s, usuario u
                where u.id=s.id_usuario and p.id=s.id_produto";
    $result = mysqli_query($conn, $consulta);
    
if (mysqli_num_rows($result)) {
    while ($row = $result->fetch_assoc()) {
    
 echo '<tr>
          
                    <td class="mailbox-name"><a href="">'.$row['usuario'].'</a></td>
                    <td class="mailbox-subject"><b>Produto:'.$row['produto'].' </b> - Data:'.$row['data'].'
                    </td>
    </tr>';
 }
}
        
$conn->close();
?>
</tbody>
                   </table>
                </div>

            </div>
            <!-- /.box-body -->
            
          </div>
            <div class="box-body col-lg-6">
            <div class="box box-danger">

            <div class="box-header with-border">
              <h3 class="box-title">Produtos em Estoque Minimo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                <div class="box-body">
                    
                   <table id="example2" class="table table-bordered table-striped">
                       <thead>
                           <tr>
                               <th>Produto</th>
                                <th>Estoque Minimo</th>
                                   <th>Estoque Atual</th>

                           </tr>
                       </thead>
<tbody>
   
    <?php
                                     $conn = F_conect();
    $result = mysqli_query($conn, "Select * from produto ");
                 if (mysqli_num_rows($result)) {
              while ($row = $result->fetch_assoc()) {
                  $resultE=mysqli_query($conn, "Select sum(e.qtd) total from entrada e where id_produto=".$row['id']);
                  while ($row2 = $resultE->fetch_assoc()) {
                      $total_entrada=$row2['total'];
                   }
                   $resultS=mysqli_query($conn, "Select sum(s.qtd) total from saida s where id_produto=".$row['id']);
                   while ($row2 = $resultS->fetch_assoc()) {
                       $total_saida=$row2['total'];
                  }
                  $estoque=$total_entrada-$total_saida;
                  if($row['estoque_minimo']>$estoque){
    
 echo '<tr>
          <td><b>'.$row['descricao'].'</b></td>
                    <td class=""><p class="badge bg-blue">'.$row['estoque_minimo'].'</p></td>
                    <td class=" "><p class="badge bg-red">'.$estoque.'</p></td>
    </tr>';
 }
}
                 }
        
$conn->close();
?>
</tbody>
                   </table>
                </div>

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
    
    <!-- /.content -->

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>
<?php
include("foot.php");
?>

