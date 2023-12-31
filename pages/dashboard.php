<div class="mainContent hidden">
    <header>
        <div>
            <i class="fa-solid fa-gauge-high"></i>
            <h1>
                Olá, <o><?php echo $_SESSION['nome']; ?>.</o><span></span>
            </h1>
        </div>
    </header>

    <div class="mainContainer">
        <i class="fa-solid fa-gear" style="font-size: 40px;"></i>
        <h1> Em breve um sistema novo da Next Express.</h1>
        <img src="./img/logo.jpeg">
        <script>
            function goBack() {
                window.history.back();
            }
        </script>"
        <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Volume" data-trigger="focus" data-content="Aqui vai <br> algum tipo de conteúdo. Muito da hora, né?!"><i class="fa-solid fa-box"></i> #1</button>
    </div>

    <style>
        .mainContainer {
            border-radius: 20px;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #fff;
            min-height: 100%;
            min-width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .mainContainer i {
            color: #F06021;
            border-radius: 50%;
            padding: 10px;
            width: 70px;
            border: #F06021 4px solid;
            margin-bottom: 20px;
            text-align: center;
            animation-duration: 5s;
            animation-iteration-count: infinite;
            animation-name: flipIcon;
            animation-timing-function: ease-in-out;
        }

        .mainContainer h1 {
            font-weight: 700;
        }

        .mainContainer img {
            margin-top: 20px;
            height: 40px;
        }

        button {
            margin-top: 20px;
            background-color: #FFf;
            border: 2px solid #F06021;
            padding: 8px 30px;
            color: #F06021;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.2s;
        }

        button:hover {
            outline: none;
            cursor: pointer;
            background-color: #F06021;
            color: #fff;
            transition: 0.2s;
        }

        ::selection {
            color: #fff;
            background: var(--mainOrange);
        }

        @keyframes flipIcon {
            0% {}

            100% {
                transform: rotate(360deg);
            }
        }
    </style>