<?php 
    include_once 'conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $consulta = "SELECT * FROM usuario WHERE email = :email AND senha = :senha ";

    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    $stmt->execute();

    $registros = $stmt->rowCount();

    if ($registros == 1) {
            // echo 'OK VALIDADO';
            header('Location: restrita.php');
    } else {
            // echo 'NÂO VALIDADO';
            header('Location: index.php');
    }





?>