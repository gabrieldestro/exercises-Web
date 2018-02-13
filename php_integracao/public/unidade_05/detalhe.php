<?php require_once("../../conexao/conexao.php"); ?>
<?php
    if( isset($_GET["codigo"]) ) {
        $produto_id = $_GET["codigo"];
    } else {
        Header("Location: inicial.php");
    }

    //consulta ao banco de dados
    $consulta = "SELECT * FROM produtos WHERE produtoID = {$produto_id}";
    $detalhe = mysqli_query($conecta, $consulta);

    // testar erro
    if (!$detalhe) {
        die("Falha no banco de dados.");
    } else {
        $dados_detalhe = mysqli_fetch_assoc($detalhe);
        $produtoID = $dados_detalhe["produtoID"];
        $nomeproduto = $dados_detalhe["nomeproduto"];
        $descricao = $dados_detalhe["descricao"];
        $imagemgrande = $dados_detalhe["imagemgrande"];
    } 
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem">
                        <img src="<?php echo $imagemgrande ?>" >
                    </li>
                    <li>
                        <?php echo $nomeproduto ?>
                    </li>
                    <li>
                        <?php echo $descricao ?>
                    </li>
                </ul>
            </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>