<div class="mainContent">
    <header>
        <div>
            <i class="fa-solid fa-building"></i>
            <h1>
                Clientes<span></span>
            </h1>
        </div>
    </header>

    <?php $errorMsg = 'Você não tem permissão para acessar esse recurso.';
    acesso::verifyAppliedAccess($_SESSION['id'], 9) ? null : include('error.php'); ?>

    <div class="contentBox hidden" style="background: #fff;">
        <div class="contentBoxHeaderDivided">
            <div class="contentBoxTitle"><i class="fa-solid fa-building"></i>
                <h1>Cadastrar cliente<span></span></h1>
            </div>
        </div>

        <?php
        if (isset($_POST['saveClient'])) {

            $data = frontend::dateGetter();
            $cliente = new cliente(NULL, NULL, NULL, NULL, NULL, NULL, $_POST['cpf'], $_POST['cnpj'], $_POST['razaosocial'], $_POST['Fantasia'], $_POST['ie'], NULL, NULL, $_POST['pais'], $_POST['uf'], $_POST['cep'], $_POST['municipio'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'], NULL, $_POST['cmun'], NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $data, $data, NULL, $_POST['email'], $_POST['telefone']);
            cliente::insertClient($cliente);
            echo frontend::alert('check', 'success', '<b>Usuário cadastrado!</b>');
        }
        ?>

        <form class="formsContainer" method="POST">

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-paperclip"></i>Documentação</label>
                <?php
                frontend::inputingForm('', 'Razão Social', 'w100', 'razaosocial');
                frontend::inputingForm('', 'Fantasia', 'w100', 'Fantasia');
                frontend::inputingForm('', 'CPF', 'w25', 'cpf');
                frontend::inputingForm('', 'CNPJ', 'w25', 'cnpj');
                frontend::inputingForm('', 'IE', 'w50', 'ie');
                ?>
            </div>

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-building"></i>Localização</label>
                <?php
                frontend::inputingForm('', 'País', 'w25', 'pais');
                frontend::inputingForm('', 'UF', 'w25', 'uf');
                frontend::inputingForm('', 'CEP', 'w50', 'cep');
                frontend::inputingForm('', 'Município', 'w50', 'municipio');
                frontend::inputingForm('', 'Bairro', 'w50', 'bairro');
                frontend::inputingForm('', 'Logradouro', 'w50', 'logradouro');
                frontend::inputingForm('', 'Número', 'w25', 'numero');
                frontend::inputingForm('', 'Complemento', 'w25', 'complemento');
                frontend::inputingForm('', 'CMUN', 'w50', 'cmun');
                ?>
            </div>

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-phone"></i>Contato</label>
                <?php
                frontend::inputingForm('', 'E-mail', 'w100', 'email');
                frontend::inputingForm('', 'Telefone', 'w100', 'telefone');
                ?>
            </div>

            <!-- <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-check"></i>Operacional</label>
                <?php

                // $optionsRedespacho = array(array('title' => 'Não autorizado', 'value' => 0), array('title' => 'Autorizado', 'value' => 1));
                // frontend::selectForm('Redespacho', 'w50 conditional', $optionsRedespacho, 'value', 'title', '');

                // $optionsIsencaoICMS = array(array('title' => 'Não isento', 'value' => 0), array('title' => 'Isento', 'value' => 1));
                // frontend::selectForm('Isenção-Icms', 'w50 conditional', $optionsIsencaoICMS, 'value', 'title', '');

                // $optionsIsensaoCubagem = array(array('title' => 'Não isento', 'value' => 0), array('title' => 'Isento', 'value' => 1));
                // frontend::selectForm('Isenção-Cubagem', 'w50 conditional', $optionsIsensaoCubagem, 'value', 'title', '');

                // $optionsHerdeiro = array(array('title' => 'Não herdeiro', 'value' => 0), array('title' => 'Herdeiro', 'value' => 1));
                // frontend::selectForm('Herdeiro', 'w50 conditional', $optionsHerdeiro, 'value', 'title', '');
                ?>
            </div> -->

            <button class="btn btn-block btn-dark" id="saveClient" type="submit" name="saveClient">Cadastrar</button>
        </form>
    </div>
</div>
</div>