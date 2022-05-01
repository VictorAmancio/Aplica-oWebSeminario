<!DOCTYPE html>
<html>
    <head>
        <title>Aplicacao Web - V Seminário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            require_once 'restAPI.php';
            $banco = New restAPI;
            /*
            $nome = 'Victor';
            $email = 'victoramancio@gmailcom';
            $senha = 'senhazinha';
            $banco->inserirDados($nome, $email, $senha);
            */
            $tabela = $banco->selecionarDados();
            $print_r($tabela);
        ?>
    </body>
</html>


