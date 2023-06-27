<?php
        include("conecta.php");

        $Id_produto = $_POST["Id_produto"];
        $login = $_POST["login"];

        // Lê o conteúdo do arquivo de imagem e armazena na variável $imagem
		$imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);
		
		$comando = $pdo->prepare("INSERT INTO carrinho('Id_produto,login,imagem') VALUES(':Id_produto,:login,:imagem')");
        $comando->bindParam(":Id_produto", $Id_produto);
        $comando->bindParam(":login", $login);
        $comando->bindParam(":imagem", $imagem, PDO::PARAM_LOB);
		$resultado = $comando->execute();



        
        // As linhas abaixo você usará sempre que quiser mostrar a imagem

        $comando = $pdo->prepare("SELECT * FROM carrinho");
		$resultado = $comando->execute();
        while( $linhas = $comando->fetch() )
        {
            $dados_imagem = $linhas["imagem"];
            $i = base64_encode($dados_imagem);

            $Id_produto =  $linhas["Id_produto"];
            $login =  $linhas["login"];

            echo("PRODUTO: $Id_produto Login: $login  <br>");
            echo(" <img src='data:image/jpeg;base64,$i' width='100px'> <br> <br> ");
        }

       // este arquivo é php, fazer um select na tabela carrinho, codigo login

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carrinho.css">
    <link rel="shortcut icon" href="imagens/icone-da-pagina.png" type="image/x-icon">
    <title>Smiling</title>
   

</head>
<body>
    
    <header>
    </nav>
   <center>
       <a href="index.html"><img src="imagens/smlAGRvaiP.png" width="200px"></a>
   </center> 
</header>

<div class="tudo">    

    
    <div class="img"> </div>
    
    
    <div class="np"> </div> 

    <div class="nada"> </div>
</div>
</body>
</html> 


