<?php
    require_once("../../conexao/conexao.php");
?>

<?php
    //Passo 3 - pesquisa no banco
    $consulta_categorias = "SELECT * from categorias";
    $categorias = mysqli_query($conecta, $consulta_categorias);
    if (!$categorias) {
        die ("Falha na consulta ao banco.");
    } else {
        echo "Consulta realizada.";
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
    </head>

    <body>
        <?php
            // pega resultado linha a linha da consulta
        /*    while ($registro = mysqli_fetch_assoc($categorias) ) {
                print_r($registro);
                echo "</br>";
            } */
        ?>
        
        <ul>
        <!-- passo 4: listar -->
        <!-- pega resultado linha a linha da consulta -->
        <?php while ($registro = mysqli_fetch_assoc($categorias) ) { ?>
            <li><?php echo $registro["nomecategoria"] ?></li>
        <?php } ?>
        </ul>
        <?php
            // listar dados
            mysqli_free_result($categorias);
        ?>
    </body>
</html>

<?php
    //Passo 6 - fecha conexao
    $conecta = mysqli_close($conecta);
?>