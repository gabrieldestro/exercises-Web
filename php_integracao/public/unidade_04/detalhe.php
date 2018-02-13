<?php require_once("../../conexao/conexao.php"); ?>
<?php
    if (isset($_GET["codigo"])) {
        $produto_id = $_GET["codigo"];   
    } else {
        Header("Location: inicial.php");
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">
    </head>

    <body>
        <?php include("_incluir/topo.php"); ?>
        
        <main> 
            <?php echo $produto_id; ?>
        </main>

        <?php include("_incluir/rodape.php"); ?>
    </body>
</html>
<?php
    // Fechar conexao
    mysqli_close($conecta);
?>