<?php require_once("../../conexao/conexao.php"); ?>
<?php
    // consulta ao banco de dados
    $consulta = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
    $consulta .= "FROM produtos";
    $resultado = mysqli_query($conecta, $consulta);
    if (!$resultado) {
        die ("Erro: " . $resultado);
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
            <div id="listagem_produtos">
                <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                <ul>
                    <li><?php echo $linha["nomeproduto"] ?></li>
                    <li>Tempo de Entrega: <?php echo $linha["tempoentrega"] ?></li>
                    <li>Preço unitário: <?php echo $linha["precounitario"] ?></li>
                    <li>
                        <a href="detalhe.php?codigo=<?php echo $linha['produtoID']?>">
                        <img src="<?php echo $linha["imagempequena"] ?>">
                        </a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </main>

        <?php include("_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>