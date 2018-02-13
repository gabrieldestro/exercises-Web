<?php
    function enviarMensagem ($dados) {
        // dados do formulario
        $nome_usuario     = $dados['nome'];
        $email_usuario    = $dados['email'];
        $mensagem_usuario = $dados['mensagem'];
        
        // criar variaveis de envio
        $destino   = "destrogabriel470@gmail.com";
        $remetente = "destrogabriel470@gmail.com";
        $assunto   = "Mensagem do site";
        
        // montar o corpo da mensagem
        $mensagem = "O usuario " . $nome_usuario . " enviou uma mensagem." . "</br>";
        $mensagem .= "email do usuario: " . $email_usuario . "</br>";
        $mensagem .= "mensagem: " . "</br>";
        $mensagem .= $mensagem_usuario;
         
        return mail($destino, $assunto, $mensagem, $remetente);
    }
?>