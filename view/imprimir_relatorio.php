<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Gerenciamento de Estoque</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
            
    <?php
        require_once '../Model/connect.php';            
        require_once '../Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();

        
    ?>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Relatórios
          <small class="pull-right">Data: <?php echo date('d/m/y') ;?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
       
        <address>
          <strong>Unidade Hospitalar de São José do Seridó</strong><br>
          R. Joaquim Lolo - Centro, <br>
          São José do Seridó - RN<br>
         
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Por
        <address>
          <strong><?php echo $_SESSION['nome'];?></strong><br>
        
          Email: <?php echo $_SESSION['usuario'];?>
        </address>
      </div>
       </section>

    <section>
      
        
    <div class=" box-primary">
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
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                    </div>
            </div>
    </div>
 <br/>
 
    
        
    <div class=" box-primary">
                              <div class="box box-success">

         <div class="box-header with-border">
                            <h3 class="box-title"> Entradas dos Produto</h3>
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
                                        <th></th>

                                    </tr>
                                </tfoot>
                            </table>
                    </div>
            </div>
    </div>
 
 <br/>
 
    
        
    <div class=" box-primary  ">
                              <div class="box box-warning">

         <div class="box-header with-border">
                            <h3 class="box-title"> Saidas por  Usuários</h3>
                        </div>
                                <div class="box-body">

   <table id="example1" class="table table-bordered table-striped table-responsive">
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
                                        <th></th>

                                    </tr>
                                </tfoot>
                            </table>
                    </div>
            </div>
    </div>
 
 
    
        
    <div class=" box-primary  ">
                              <div class="box box-danger">

         <div class="box-header with-border">
                            <h3 class="box-title">Produtos Abaixo do Estoque Minimo</h3>
                        </div>
                                <div class="box-body">

   <table id="example1" class="table table-bordered table-striped table-responsive">
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
    </div>
      </section>

  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
