<?php
    //Passo 1 - abrir conexao
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);
    //Passo 2 - testar conexao
    if (mysqli_connect_errno()) {
        die("Conexão falhou " . mysqli_connect_errno());
    }
?>