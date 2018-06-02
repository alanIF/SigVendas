<?php
    include("head.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
          <section class="content">

 <br/>
 <div class="row">
                     <section class="col-lg-12 connectedSortable">

   <div class="box box-primary">
       <div class="box-header with-border">
                            <h3 class="box-title">Relatórios </h3>
                                           <a href="imprimir_relatorio.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</a>

                        </div>

   </div>
        
                              <div class="box box-primary">

         <div class="box-header with-border">
                            <h3 class="box-title"> Saídas dos Produto</h3>
                            
                        </div>
                                <div class="box-body">

   <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
       $conn = F_conect();

                  $result1 = mysqli_query($conn, "Select p.descricao produto, sum(s.qtd) saida from produto p, saida s where p.id=s.id_produto group by p.descricao");
                  $total = 0;
                      if (mysqli_num_rows($result1)){
                            while ($row1 = $result1->fetch_assoc()) {
                                   echo "<tr>";
                                   echo "<td>".$row1['produto']."</td>";
                                   echo "<td>".$row1['saida']."</td>";

                                   echo "</tr>";
                                   $total=$row1['saida']+$total;
                                
                             }
                      }
                                              $conn->close();

                       
      ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total: <?php echo $total;?> </th>

                                    </tr>
                                </tfoot>
                            </table>
                    </div>
            </div>
 <br/>
 
    
        
                              <div class="box box-success">

         <div class="box-header with-border">
                            <h3 class="box-title"> Entradas dos Produto</h3>
                        </div>
                                <div class="box-body">

   <table id="example2" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
       $conn = F_conect();

                  $result1 = mysqli_query($conn, "Select p.descricao produto, sum(e.qtd) saida from produto p, entrada e where p.id=e.id_produto group by p.descricao");
                  $total = 0;
                      if (mysqli_num_rows($result1)){
                            while ($row1 = $result1->fetch_assoc()) {
                                   echo "<tr>";
                                   echo "<td>".$row1['produto']."</td>";
                                   echo "<td>".$row1['saida']."</td>";

                                   echo "</tr>";
                                   $total=$row1['saida']+$total;
                                
                             }
                      }
                                              $conn->close();

                       
      ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total: <?php echo $total;?> </th>

                                    </tr>
                                </tfoot>
                            </table>
                    </div>
            </div>
 
 <br/>
 
    
        
                              <div class="box box-warning">

         <div class="box-header with-border">
                            <h3 class="box-title"> Saidas por  Usuários</h3>
                        </div>
                                <div class="box-body">

   <table id="example3" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Usuários</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
       $conn = F_conect();

                  $result1 = mysqli_query($conn, "Select u.nome usuario, sum(s.qtd) saida from usuario u, saida s where u.id=s.id_usuario group by u.nome");
                  $total = 0;
                      if (mysqli_num_rows($result1)){
                            while ($row1 = $result1->fetch_assoc()) {
                                   echo "<tr>";
                                   echo "<td>".$row1['usuario']."</td>";
                                   echo "<td>".$row1['saida']."</td>";

                                   echo "</tr>";
                                   $total=$row1['saida']+$total;
                                
                             }
                      }
                                              $conn->close();

                       
      ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total: <?php echo $total;?> </th>

                                    </tr>
                                </tfoot>
                            </table>
                    </div>
            </div>
    
 
 
    
        
                              <div class="box box-danger">

         <div class="box-header with-border">
                            <h3 class="box-title">Produtos Abaixo do Estoque Minimo</h3>
                        </div>
                                <div class="box-body">

   <table id="example4" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Estoque Minimo</th>

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
                      echo"<tr class='danger'>";
                    echo"<td>" . $row['descricao'] . "</td>";
                    echo"<td>".$estoque."</td>";
                    echo"<td>" . $row['estoque_minimo'] . "</td></tr>";

                  }
                  

              }
    }  
                                  
                                  
                                  ?>  
                                </tbody>
                                
                            </table>
                    </div>
            </div>
            </section>

 </div>
           </section>

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
    $(document).ready(function () {
        $('#example1').DataTable( {
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


    } );
        $("#example3").DataTable({
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
        $("#example4").DataTable({
         dom: 'Bfrtip',
 buttons: [
     {
      extend:'pdfHtml5',
       text: "<i class='fa fa-print info'></i>"
     }
 ] ,"language": {
      "url": "../sql/translate.json"
   }
        });
        $('#example2').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
               dom: 'Bfrtip',
 buttons: [
     {
      extend:'pdfHtml5',
       text: "<i class='fa fa-print info'></i>"
     }
 ] ,"language": {
      "url": "../sql/translate.json"
   } 
        });
    });
</script>

  
<?php
    include("foot.php");
?>