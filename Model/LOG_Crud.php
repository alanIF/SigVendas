
<?php

function listar() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select l.acao acao,l.data_i data,u.nome usuario from logs l,usuario u where l.id_usuario=u.id order by (l.id) DESC");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
           
         echo "<tr><td>".$row['acao']."</td>" ;  
         echo "<td>".$row['usuario']."</td>" ;  
         echo "<td>".$row['data']."</td></tr>" ;  
           
        }
    }
    $conn->close();
}

