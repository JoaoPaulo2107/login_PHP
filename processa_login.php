<?php
    session_start();
    include_once 'conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // echo "Email ==> $email <br>";
    // echo "Senha ==> $senha <br>";

        $consulta = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";

        $stmt = $pdo->prepare($consulta);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        
        $stmt->execute();

        $registros = $stmt->rowCount();
        // echo "Registros encontrados ==> $registros";

        // obtem resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // var_dump($resultado);

        if($registros == 1){
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['nome'] = $resultado['nome'];
            $_SESSION['email'] = $resultado['email'];
        header('Location: restrita.php');
        // echo "achei o cara" ; 
        }

        else{
        header('Location: index.php');
        // echo "não encontrei" ; 
        }

 ?>