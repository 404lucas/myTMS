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

    <link rel="icon" href="img/favicon.png" type="image/png">

    <title>Next Express - Interno</title>
</head>

<?php

require 'config.php';
//Declarando o usuário para uso posterior
?>

<body>
    <span style="height:190px; width:100px; display:flex; background:#ff6a00; position:fixed; bottom: 0; left: 0; border-radius: 0 50px 0 0 "></span>
    <span style="height:190px; width:100px; display:flex; background:#ececec; position:fixed; bottom: 10px; left: 10px; border-radius: 10px;"></span>

    <aside class="Closed">
        <div class="mainAsideContainerClosed">
            <div class="asideHeaderClosed">
                <img src="./img/logo.jpeg">
            </div>
            <div class="menusContainerClosed">
                <div style="height:70px;"></div>

                <?php
                frontend::MenuBtn(0, 'DashBoard', 'fa-gauge-high',  $_SESSION['id']);
                frontend::MenuBtn(1, 'Encomendas', 'fa-truck-fast', $_SESSION['id']);
                //frontend::MenuBtn(2, 'Financeiro', 'fa-wallet',  $_SESSION['id']);
                frontend::MenuBtn(3, 'Usuários', 'fa-user', $_SESSION['id']);
                frontend::MenuBtn(4, 'Clientes', 'fa-building',  $_SESSION['id']);
                frontend::MenuBtn(5, 'Uploads', 'fa-upload',  $_SESSION['id']);
                frontend::MenuBtn(6, 'Administração', 'fa-bars-progress',  $_SESSION['id']);
                frontend::MenuBtn(7, 'Download', 'fa-download', $_SESSION['id']);
                ?>

                <div style="height:100px;"></div>
                <button type="button" class="commsBtn" data-toggle="popover" data-trigger="focus" title="<?php echo notificator::getLastNotification()['com_title'] ?? 'Nenhum comunicado, por enquanto!'; ?>" data-content="<?php echo notificator::getLastNotification()['com_content'] ?? '' . notificator::getLastNotification()['com_autor'] ?? '' . ' - ' . notificator::getLastNotification()['com_data'] ?? ''; ?>"><span class="notificationSpan"></span><i id='notificationBell' class="fa-solid fa-bell"></i></button>
            </div>
        </div>
        <div class="footer">



            <div class="footerPic">

                <div class="dropdown">
                    <button class="btn dropdownGear dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user" style="font-size: 20px; color: #505050;"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?php echo INCLUDE_PATH_PAINEL ?>logout.php"> <i class="fa-solid fa-sign-out"></i> Logout</a>
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
                    <?php
                    frontend::MenuBtnMobile('DashBoard',  $_SESSION['id']);
                    frontend::MenuBtnMobile('Relatórios', $_SESSION['id']);
                    frontend::MenuBtnMobile('Financeiro', $_SESSION['id']);
                    frontend::MenuBtnMobile('Usuários', $_SESSION['id']);
                    frontend::MenuBtnMobile('Uploads', $_SESSION['id']);
                    frontend::MenuBtnMobile('Download', $_SESSION['id']);
                    ?>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>logout.php">Logout</a>
                </div>
            </div>
        </div>
        <input type="hidden" id="sessionId" value="<?php echo $_SESSION['id']; ?>"></input>
        <input type="hidden" id="comId" value="<?php echo notificator::getLastNotification()['com_id']; ?>"></input>
    </div>
    <script defer src="./js/app.js"></script>
    <div class="contentArea">
        <?php
        //Incluindo todas as páginas
        frontend::loadPage();
        ?>
    </div>

    <script>
        function verifyNotifications() {
            var session_id_getter = $('#sessionId').val();
            var com_id_getter = $('#comId').val();
            $.ajax({
                url: 'functions/verifyNotifications.php',
                method: 'POST',
                data: {
                    session_id: session_id_getter,
                    com_id: com_id_getter
                },
                success: function(data) {
                    if (data > 0) {
                        $('.notificationSpan').hide();
                        $('#notificationBell').css('animation', 'none');
                    }
                }
            });
        }

        function readNotifications() {
            var session_id_getter = $('#sessionId').val();
            var com_id_getter = $('#comId').val();
            $.ajax({
                url: 'functions/readNotifications.php',
                method: 'POST',
                data: {
                    session_id: session_id_getter,
                    com_id: com_id_getter
                },
                success: function(data) {
                    console.log(data);
                    verifyNotifications();
                }
            });
        }

        $('.commsBtn').blur(readNotifications);

        // Verificar notificações a cada X segundos (por exemplo, a cada 10 segundos)
        setInterval(verifyNotifications, 20000);
        // Chamar a função inicialmente
        verifyNotifications();
    </script>

</html>