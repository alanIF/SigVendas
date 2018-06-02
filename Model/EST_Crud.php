
<?php

function listar() {
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
            }else if($row['estoque_minimo']==$estoque){
                echo"<tr class='warning'>";
            }else{
                echo"<tr>";

            }
            echo"<td>" . $row['descricao'] . "</td>";
            echo"<td>".$estoque."</td>";
            echo"<td>" . $row['estoque_minimo'] . "</td></tr>";

           
        }
    }
    $conn->close();
}

function listarEstoque() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from produto ");
    $estoque="<link href='../dist/css/prova.css' rel='stylesheet' />";
$estoque.='
                           
                     
                            <table id="customers">
                                <thead>
                                    <tr>
                                         <th>Produto</th>
                                         <th>Estoque Disponível</th>
                                        <th>Estoque Minimo</th>
                                    </tr>
                                </thead>
                                <tbody>';
    
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
            $estoque_g=$total_entrada-$total_saida;
          if($row['estoque_minimo']>=$estoque_g){
                 $estoque.="<tr id='danger'>";
            }else if($row['estoque_minimo']==$estoque_g){
              $estoque.="<tr id='warning'>";
            }else{
               $estoque.= "<tr>";

            }
             $estoque.="<td>" . $row['descricao'] . "</td>";
             $estoque.="<td>".$estoque_g."</td>";
          $estoque.="<td>" . $row['estoque_minimo'] . "</td></tr>";

           
        }
    }
    $conn->close();
    $estoque.=' </tbody>
                              
                            </table>
 ';
    return $estoque;
}
