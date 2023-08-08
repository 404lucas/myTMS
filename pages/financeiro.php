<div class="mainContent">
    <header>
        <h1><i class="fa-solid fa-dollar-sign"></i>
            <?php echo 'Financeiro'; ?>
        </h1>
    </header>

    <?php
    ?>

<div class="mainContainer">
        <i class="fa-solid fa-gear" style="font-size: 40px;"></i>
        <h1> Página em desenvolvimento.</h1>
        <img src="./img/logo.jpeg">
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </div>

    <style>
        .mainContainer {
            -webkit-box-shadow: -1px 4px 6px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: -1px 4px 6px 0px rgba(0, 0, 0, 0.15);
    box-shadow: -1px 4px 6px 0px rgba(0, 0, 0, 0.15);
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

    <!--div class="contentBox hidden">

        <div class="metricBox w3">
            <div class="metricHeader">
                <i class="fa-solid fa-dollar-sign"></i>Exemplo de estatística
            </div>
            <div class="metricData">
                57,00
            </div>
        </div>

        <div class="metricBox w25">
            <div class="metricHeader">
                <i class="fa-solid fa-dollar-sign"></i>Exemplo de estatística
            </div>
            <div class="metricData">
                57,00
            </div>
        </div>

        <div class="metricBox w25">
            <div class="metricHeader">
                <i class="fa-solid fa-dollar-sign"></i>Exemplo de estatística
            </div>
            <div class="metricData">
                57,00
            </div>
        </div>

        <div class="metricBox w50">
            <div class="metricHeader">
                <i class="fa-solid fa-dollar-sign"></i>Exemplo de estatística
            </div>
            <div class="metricData">
                57,00
            </div>
        </div>

        <div class="metricBox w50">
            <div class="metricHeader">
                <i class="fa-solid fa-dollar-sign"></i>Exemplo de estatística
            </div>
            <div class="metricData">
                57,00
            </div>
        </div>

        <div class="metricBox w100">
            <div class="metricHeader">
                <i class="fa-solid fa-dollar-sign"></i>Exemplo de estatística
            </div>
            <div class="metricData">
                57,00
            </div>
        </div>

    </div>
</div>