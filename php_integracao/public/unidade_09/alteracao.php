<?php require_once("../../conexao/conexao.php"); ?>
<?php

    if ( isset($_POST["nometransportadora"]) ) {
        $nome     = $_POST["nometransportadora"];
        $endereco = $_POST["endereco"];
        $cidade   = $_POST["cidade"];
        $telefone = $_POST["telefone"];
        $cnpj     = $_POST["cnpj"];
        $estado   = $_POST["estados"];
        $cep      = $_POST["cep"];
        $tID      = $_POST["transportadoraID"];
        
        $alterar  = "UPDATE transportadoras SET ";
        $alterar .= "nometransportadora = '{$nome}', ";
        $alterar .= "endereco = '{$endereco}', ";
        $alterar .= "cidade = '{$cidade}', ";
        $alterar .= "estadoID = {$estado}, ";
        $alterar .= "cep = '{$cep}', ";
        $alterar .= "cnpj = '{$cnpj}', ";
        $alterar .= "telefone = '{$telefone}' ";
        $alterar .= "WHERE transportadoraID = '{$tID}' ";
        
        $operacao_alterar = mysqli_query($conecta, $alterar);
        if (!$operacao_alterar) {
            die ("Erro na alteracao.");
        } else {
            header("location:listagem.php");
        }
    }

    // consulta ao banco
    $tr = "SELECT * FROM transportadoras ";
    if ( isset($_GET["codigo"]) ) {
        $id = $_GET["codigo"];
        $tr .= "WHERE transportadoraID = {$id} ";
    } else {
        $tr .= "WHERE transportadoraID = 1 ";
    }

    $con_transporatadora = mysqli_query($conecta, $tr);
    if (!$con_transporatadora) {
        die ("Erro."); 
    }

    $info_transportadoras = mysqli_fetch_assoc($con_transporatadora);

    //consulta aos estados
    $estados = "SELECT * FROM estados ";
    $lista_estados = mysqli_query($conecta, $estados);
    if (!$lista_estados) {
        die ("Erro."); 
    }

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="janela_formulario">
                <form action="alteracao.php" method="post">
                    <h2>Alteração de Transportadoras</h2>
                    <label for="nometransportadora">Nome transportadora</label>
                    <input type="text" value="<?php echo $info_transportadoras["nometransportadora"] ?>" name="nometransportadora" id="nometransportadora" value="">
                    
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone"
                        value="<?php echo $info_transportadoras["telefone"] ?>">
                    
                    <label for="endereco">Endereco</label>
                    <input type="text" name="endereco" id="endereco"
                           value="<?php echo $info_transportadoras["endereco"] ?>">
                    
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" 
                           value="<?php echo $info_transportadoras["cidade"] ?>">
                    
                    <label for="estados">Estados</label>
                    <select id="estados" name="estados">
                        <?php
                            $meu_estado = $info_transportadoras["estadoID"];
                            while ($linha = mysqli_fetch_assoc($lista_estados)) {
                                $estado_principal = $linha["estadoID"];
                                if ($meu_estado == $estado_principal) {
                        ?>
                            <option value="<?php echo $linha["estadoID"] ?>" selected>
                                <?php echo $linha["nome"] ?></option>
                        
                        <?php } else {   ?>
                            <option value="<?php echo $linha["estadoID"] ?>" selected>
                                <?php echo $linha["nome"] ?></option>
                        <?php
                                }
                            } ?>
                    </select>
                    
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep"
                           value="<?php echo $info_transportadoras["cep"] ?>">
                    
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj"
                           value="<?php echo $info_transportadoras["cnpj"] ?>">
                    
                    <input type="hidden" name="transportadoraID" value="<?php echo              $info_transportadoras["transportadoraID"] ?>">
                    
                    <input type="submit" name="Confirmar alteração">
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