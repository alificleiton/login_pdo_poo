<?php

    require_once "Usuario.php";
    $objUsuario = new Usuario();
    session_start();
    if($_SESSION["autenticado"] == "SIM"){
        $objUsuario->funcionarioLogado($_SESSION['id']);
    }else{
        header("location: login.php?login=erro2");
    }

    if(isset($_GET['sair']) == "SIM"){
        $objUsuario->sairFuncionario();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACS CURSOS ONLINE</title>

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        .card-home{
            padding: 30px 0 0 0;
            width:100%;
            margin:0 auto;
        }
    </style>

</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a link="navbar-brand" href="#">
            ACS CURSOS ONLINE
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="?sair=SIM"> SAIR</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="card-home">
                <div class="card">
                    <div class="card-header">
                        SEJA BEM VINDO <?=$_SESSION['nome'];?>
                    </div>
                    <div class="card-body">
                        PARABÉNS VOCÊ ENTROU NO CAMPO ADMIN
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
</body>
</html>