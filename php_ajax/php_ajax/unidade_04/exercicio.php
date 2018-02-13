<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <button id="botao">Carregar</button>
        <div id="listagem"></div>
        
        <script src="jquery.js"></script>
        <script>
            //fazeno alternativamente com jQuery
            $('button#botao').click( function () {
                $('div#listagem').css("display","block");
                carregarDados();
            });
            
            function carregarDados () {
                $.ajax({
                    url:'_xml/produtos.xml'
                }).then(sucesso, falha);

                function sucesso (arquivo) {
                    //console.log($(arquivo).find('produto').find('nomeproduto').text());
                    var elemento; 
                    elemento = "<ul>";

                    $(arquivo).find('produto').each(function() {
                        var nome = $(this).find('nomeproduto').text();
                        elemento += "<li class='nome'>" + nome + "</li>";      
                    }); 

                    elemento += "</ul>";
                    $('#listagem').html(elemento);
                }

                function falha () {
                    console.log("Erro");
                }
            }
            
        </script>
    </body>
</html>