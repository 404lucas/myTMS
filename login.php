<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!--bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <!--bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/6d424ce658.js" crossorigin="anonymous"></script>

    <!--stylesheet CSS-->
    <link rel="stylesheet" href="./style/loginStyle.css">

    <!--Google Fonts BEBAS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <!--Google Fonts Roboto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <title>NextExpress - Entrar</title>
</head>

<body>
    <div id="mainContainer" class="hidden">
        <div id="formContainer">
            <img src="./img/logo.jpeg" class="logo">
            <label id="titleLabel">
                <bl>BEM-</bl><br>VINDO(A)
            </label>
            <form method="post">
                <input class="textInput" type="text" name="email" placeholder="Email" required></input>
                <input class="textInput" type="password" name="senha" placeholder="Senha" required></input>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1"
                        style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 0;">
                        Lembrar de mim
                    </label>
                </div>
                <button class="submitInput" type="submit" value="Entrar" name="submitUser">
                    <h5>Entrar</h5> <i class="fa-solid fa-chevron-right"></i>
                </button>
                <a href="<?php echo INCLUDE_PATH_PAINEL . 'cadastro.php' ?>">Solicitar cadastro</a>

                <?php isset($_POST['submitUser']) ? loginServer::authenticate($_POST['email'], $_POST['senha']) : NULL; ?>

            </form>
        </div>
        <div id="illustrationContainer">

            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_hutlkiuf.json" background="transparent"
                speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
        </div>
    </div>
</body>
<script defer src="./js/app.js"></script>

</html>