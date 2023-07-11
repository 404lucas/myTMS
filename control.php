<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./style/controlStyle.css">
    <link rel="stylesheet" href="./style/pagesStyle.css">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <!--bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fonte poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/6d424ce658.js" crossorigin="anonymous"></script>


    <title>Next Express - Interno</title>
</head>

<?php

//Declarando o usuário para uso posterior
if (class_exists('user')) {
    $currentUser = new user($_SESSION['id'], $_SESSION['id_departamento'], $_SESSION['nome'], $_SESSION['email']);
} else {
    //Caso não haja sessão nenhuma, recarregar a página e voltar para o login
    header('Location: https://'.INCLUDE_PATH_PAINEL.'?url=dashboard');
}

//Logout simples - destruir sessão
if (isset($_GET['logout'])) {
    loginServer::logout();
}


?>

<body>
    <aside class="Closed">
        <div class="mainAsideContainerClosed">
            <div class="asideHeaderClosed">
                <img src="./img/logo.jpeg">
            </div>
            <div class="menusContainerClosed">
                <div style="height:70px;"></div>

                <?php frontend::MenuBtn(0, 'Relatórios', 'fa-chart-line', 'relatorios'); ?>
                <?php frontend::MenuBtn(1, 'DashBoard', 'fa-gauge-high', 'dashboard'); ?>
                <?php frontend::MenuBtn(2, 'Financeiro', 'fa-wallet', 'financeiro'); ?>
                <?php frontend::MenuBtn(3, 'Upload', 'fa-upload', ''); ?>
                <?php frontend::MenuBtn(4, 'Download', 'fa-download', ''); ?>

                <div style="height:100px;"></div>
            </div>
        </div>
        <div class="footer">
            <div class="footerPic">

                <div class="dropdown">
                    <button class="btn dropdownGear dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user" style="font-size: 20px; color: #505050;"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"> <i class="fa-solid fa-sign-out"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </aside>
	<!--Nav apenas para mobile-->
    <div class="navMobile">
        <div class="navMobileContainer">
            <div class="navMobileHeader">
                <img src="./img/logo.jpeg">
            </div>
            <button class="btn headerCollapseBtn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            </p>
            <div class="collapse mobileNavList" id="collapseExample">
                <div class="mobileNavList">
                    <a href="<?php echo INCLUDE_PATH_PAINEL . '?url=relatorios';?>">Relatórios</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script defer src="./js/app.js"></script>
    <div class="contentArea">
        <?php
		
		//Incluindo todas as páginas
        frontend::loadPage();

        ?>
    </div>

</html>