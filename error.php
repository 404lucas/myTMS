<div class="mainContainer">
    <i class="fa-solid fa-times" style="font-size: 40px;"></i>
    <h1> Desculpe!</h1>
    <p>
        <?php echo $errorMsg; ?>
    </p>
    <button onclick="goBack()">Voltar</button>

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
        background: rgb(255, 255, 255);
        background: linear-gradient(-90deg, rgba(255, 255, 255, 1) 97%, rgba(255, 106, 0, 1) 97%);
        min-height: 100%;
        min-width: calc(100% - 20px);
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
</style>

<?php die; ?>