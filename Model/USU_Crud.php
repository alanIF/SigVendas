<?php
function logar($email, $senha) {
    $conn = F_conect();
    session_start();
    $result = mysqli_query($conn, "SELECT * FROM usuario WHERE email='" . $email . "' AND senha='" . $senha . "'");
    if (mysqli_num_rows($result) == 1) {
        // teste - certo

        while ($row = $result->fetch_assoc()) {
            $id_usuario = $row["id"];
            $admin=$row['tipo'];
            $nome=$row['nome'];
        }
        //fim teste
        $_SESSION['nome']=$nome;
        $_SESSION['usuario'] = $email;
        $_SESSION['idUSU'] = $id_usuario;
        $_SESSION['ativo'] = true;
        $_SESSION['permissao']=$admin;
        //______LOG
        include './Model/LOGS.php';
     
        if (NovoLog("Entrou no Sistema", $id_usuario) == TRUE) {
           header('Location:./view/home.php');

        }
    } else if (mysqli_num_rows($result) != 1) {
        $_SESSION['usuario'] = "";
        $_SESSION['ativo'] = false;
        Alert("Ops!", "Email e senha não correspondem", "danger");
    } else {
        $_SESSION['usuario'] = "";
        $_SESSION['ativo'] = false;
        Alert("Ops!", "Email e senha não correspondem", "danger");
    }
}

function sair() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    //______LOG
    include '../Model/LOGS.php';
    if (NovoLog("Saiu do Sistema", $_SESSION['idUSU'])) {
          $_SESSION = array();
          if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            }
            session_destroy();
            header('Location: ../index.php');
    }
    Alert("Ops!", "Erro ao sair do sistema, procure o suporte!", "danger");
}

function testLogado() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if ($_SESSION['usuario'] == false) {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: ../index.php');
    }
}

function cadastrar($nome, $email, $senha) {
    $conn = F_conect();
    $sql = "INSERT INTO usuario(nome, email, senha)
            VALUES('" . $nome . "','" . $email . "','" . $senha . "' )";
    if ($conn->query($sql) == TRUE) {
        Alert("Oba!", "Usuário cadastrado com sucesso", "success");
        echo "<a href='../index.php'> Voltar a tela de login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function editarUsu($nome, $email, $senha, $id) {
    $conn = F_conect();
    $sql = " UPDATE usuario SET  nome='" . $nome . "', email='" . $email . " ', senha='" .
            $senha . "' WHERE id= " . $id;

    if ($conn->query($sql) === TRUE) {
        Alert("Oba!", "Dados atualizados com sucesso", "success");
        $_SESSION['usuario'] = $email;
        $_SESSION['idUSU'] = $id;
        $_SESSION['ativo'] = true;
        
        echo "<a href='home.php'> Voltar a tela de login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirUsu($id) {

    $conn = F_conect();

    $sql = "DELETE FROM usuario WHERE id=" . $id;

    $conn->query($sql);

    $conn->close();
}
