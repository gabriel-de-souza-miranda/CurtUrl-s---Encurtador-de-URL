<!doctype html>
<html lang="pt-br">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <title><?php echo $titulo ?></title>

    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,500;1,400&display=swap" rel="stylesheet">


</head>

<body>

    <!--MENU-->


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-bottom: 0px; padding-top: 0px;">
        <ul class="navbar-nav">
            <li class="nav-item">

                <a href="
                    <?php 
                        if ($logado == 0):
                            echo base_url("/");
                        else:
                            echo base_url("user/index_login");
                        endif;
                    ?>">
                    <img src="<?php echo base_url() ?>/assets/imagens/logo_novo.png" style="width: 200px; height: 60px;" />
                </a>

            </li>
        </ul>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        
        <?php if ($logado == 0): ?>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="<?php echo base_url("site/login") ?>">
                    <button type="button" class="btn btn-outline-info" style="color:white;">Login</button>
                </a>

                <a href="<?php echo base_url("site/cadastro") ?>">
                    <button type="button" class="btn btn-outline-info" style="color:white;">Cadastrar-se</button>
                </a>
            </li>
        </ul>

        <?php else: ?>
        
        <div class="dropdown">
            <button class="btn-sm  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                <?php $nome = $_SESSION['nome']; ?>

                <a class="navbar-brand" style="font-size:15px"><?php echo $nome ?></a>


            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo base_url("historicourls/hist") ?>">Historico de URL's</a>
                <a class="dropdown-item" href="#" onClick="abreModal()">Alterar Dados do perfil</a>
                <a class="dropdown-item" href="<?php echo base_url("auth/logout") ?>">Sair</a>
            </div>
        </div>
        <?php endif; ?>


    </nav>

    <script>
        function abreModal() {
            $("#mymodal").modal({
                show: true
            });
        }
    </script>

<script>
        function abreModal2() {
            $('#mymodal').modal('toggle');
            window.location.href = "http://localhost/curt-urls/public/user/new_senha";
            
        }
    </script> 




    <!--MENU

    <div class="text-center">
        <a class="navbar-brand top" href="<?php echo base_url("site/index") ?>">
            <img src="<?php echo base_url() ?>/assets/imagens/encurt.png" width="200" height="80" alt="100"/>
        </a>
    </div>
-->