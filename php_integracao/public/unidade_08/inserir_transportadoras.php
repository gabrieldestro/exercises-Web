<?php require_once("../../conexao/conexao.php"); ?>
<?php

    if( isset($_POST["nometransportadora"]) ) {
        $nome     = utf8_decode($_POST["nometransportadora"]);
        $endereco = utf8_decode($_POST["endereco"]);
        $telefone = utf8_decode($_POST["telefone"]);
        $cidade   = utf8_decode($_POST["cidade"]);
        $estado   = utf8_decode($_POST["estados"]);
        $cep      = utf8_decode($_POST["cep"]);
        $cnpj     = utf8_decode($_POST["cnpj"]);
        
        $inserir = "INSERT INTO transportadoras ";
        $inserir .= "(nometransportadora, endereco, telefone, cidade, estadoID, cep, cnpj) ";
        $inserir .= "values ";
        $inserir .= "('$nome', '$endereco', '$telefone', '$cidade', $estado, '$cep', '$cnpj')";
        
        $opcao_inserir = mysqli_query($conecta, $inserir);
        if (!$opcao_inserir) {
            die ("Erro na insercao.");
        }
    }
    
    $select = "SELECT estadoID, nome FROM estados";
    $lista_estados = mysqli_query($conecta, $select);
    if ( !$lista_estados ) {
        die ("Falha ao realizar a consulta.");
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/crud.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
                <div id="janela_formulario">
                    <form action="inserir_transportadoras.php" method="POST">
                        <input type="text" name="nometransportadora" placeholder="Nome da Transportadora">
                        <input type="text" name="endereco" placeholder="Endereço">
                        <input type="text" name="telefone" placeholder="Telefone">
                        <input type="text" name="cidade" placeholder="Cidade">
                        <select name="estados">
                            <?php while ($linha = mysqli_fetch_assoc($lista_estados)) { ?>
                            <option value="<?php echo $linha["estadoID"]; ?>">
                                <?php echo utf8_decode($linha["nome"]); ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="cep" placeholder="CEP">
                        <input type="text" name="cnpj" placeholder="CNPJ">
                        <input type="submit" name="enviar">
                    </form>
                </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>