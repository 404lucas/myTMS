<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style/trackingStyle.css">

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

    <title>Next Express - Cadastro</title>
</head>

<body>

    <?php
    //Incluindo configurações básicas do site
    include 'config.php';
    ?>

    <div class="mainBox">

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_nuxkbxue.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player> </lottie-player>

        <div class="formContainer">
            <h1>Gostaria de ser <o>cadastrado(a)?</o>
            </h1>
            <label>Insira seus dados abaixo para que nossa equipe os insira em nosso sistema.</label>
            <div class="interactContainer" id="interactContainer">
                <button class="btnSendRegister" id="sendDataBtn" style="top: 0;">
                    <i class="fa-solid fa-arrow-down"></i>
                    Enviar dados
                </button>
            </div>
            <form method="POST" class="registerForm" id="registerForm" style="display: none; flex-direction: column;">
                <div class="formGroup">
                    <label>Nome do usuário</label>
                    <input type="text" maxlength="100" name="nome" required pattern="[a-zA-Z\s]+" class="registerFormInput">
                    </input>
                </div>
                <div class="formGroup">
                    <label>CNPJ da organização</label>
                    <input type="text" maxlength="11" name="cnpj" pattern="\d{11}" required class="registerFormInput">
                    </input>
                </div>
                <div class="formGroup">
                    <label>Telefone para contato</label>
                    <input type="text" maxlength="11" name="telefone" pattern="\d{11}" required class="registerFormInput">
                    </input>
                </div>
                <div class="formGroup">
                    <label>E-mail</label>
                    <input type="email" maxlength="100" name="email" required class="registerFormInput">
                    </input>
                </div>
                <textarea placeholder="Alguma observação a fazer?" name="obs" class="registerMsgBox"></textarea>
                <button class="btnSendRegister" type="submit" name="sendData">
                    <i class="fa-solid fa-envelope"></i>
                    Enviar
                </button>
            </form>

            <?php
            if (isset($_POST['sendData'])) {
                loginServer::sendRegisterData($_POST['nome'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'], $_POST['obs']);
                mailer::sendRegisterEmail($_POST['nome'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'], $_POST['obs']);
            } ?>
        </div>
        <div class="imgContainer">
            <img src="./img/logo.jpeg" style="margin-bottom:40px;">
        </div>
    </div>
    <script>
        $('#sendDataBtn').click(function() {
            $('#interactContainer').slideToggle();
            setTimeout(function() {
                $('#sendDataBtn').css('display', 'none');
                $('#interactContainer').append($('#registerForm'));
                $('#registerForm').css('display', 'flex');
                $('#interactContainer').slideToggle(1000);
            }, 500);
        });
    </script>
</body>

</html>