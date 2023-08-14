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
                <h1>Cliente<span></span></h1>
            </div>
            <form class="form-group w25" method="GET" id="preExistingClient" name="preExistingClient">
                <input type="hidden" value="clientes" name="url"></input>
                <label for='selectBuscar'>Buscar</label>
                <select class='form-control mb-3' name='selectBuscar' id='selectBuscar'>
                    <option selected disabled>Selecione</option>
                    <?php
                    $options = cliente::getAllClientNames();
                    foreach ($options as $option) {
                        echo "<option value='{$option['cli_dado_cnpj']}'>{$option['cli_dado_fantasia']}</option>";
                    }
                    ?>
                </select>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar por CNPJ" name="cnpjClient" id="cnpjClient" aria-describedby="button-addon2"></input>
                    <div class="input-group-append">
                        <button type="submit" name="enviarCNPJ" id="button-addon2" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if (isset($_GET['selectBuscar']) || isset($_GET['cnpjClient'])) {
            $CNPJ = isset($_GET['selectBuscar']) ? $_GET['selectBuscar'] : $_GET['cnpjClient'];
            $currentCliente = cliente::getSingleClient($CNPJ);

            if (isset($_POST['saveClientChanges'])) {
                cliente::conditionedUpdate($currentCliente->getCnpj(), $_POST['razaosocial'], $_POST['Fantasia'], $_POST['cpf'], $_POST['CNPJ'], $_POST['ie'], $_POST['pais'], $_POST['UF'], $_POST['cep'], $_POST['municipio'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'], $_POST['cmun'], 0, 0, 0, 0, $_POST['email'], $_POST['telefone']);
                logFeeder::log($_SESSION['id'], "Atualização do cliente ID{$currentCliente->getId()}");
                echo frontend::alert('check', 'success', '<b>Usuário atualizado.</b>');
            }
        ?>

    </div>

    <div class="contentBox hidden" style="background: #fff;">
        <div class="contentBoxHeaderDivided">
            <div class="contentBoxTitle"><i class="fa-solid fa-user"></i>
                <h1>Dados do cliente<span></span></h1>
            </div>
            <div>
                <?php echo acesso::verifyAppliedAccess($_SESSION['id'], 10) ? '<button class="btn btn-outline-dark" id="btnEditClient"><i class="fa-solid fa-pencil"></i></button>' : ''; ?>
            </div>
        </div>

        <form class="formsContainer" method="POST">

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-paperclip"></i> Documentação</label>
                <?php
                frontend::readingForm('', 'Razão Social', 'w100', 'razaosocial', 'alterable', isset($currentCliente) ? $currentCliente->getRazao() : '');
                frontend::readingForm('', 'Fantasia', 'w100', 'Fantasia', 'alterable', isset($currentCliente) ?  $currentCliente->getFantasia() : '');
                frontend::readingForm('', 'CPF', 'w25', 'cpf', 'alterable', isset($currentCliente) ? $currentCliente->getCpf() : '');
                frontend::readingForm('', 'CNPJ', 'w25', 'CNPJ', 'alterable', isset($currentCliente) ? $currentCliente->getCnpj() : '');
                frontend::readingForm('', 'IE', 'w50', 'ie', 'alterable', isset($currentCliente) ? $currentCliente->getIe() : '');
                ?>
            </div>

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-building"></i>Localização</label>
                <?php
                frontend::readingForm('', 'País', 'w25', 'pais', 'alterable', isset($currentCliente) ? $currentCliente->getPais() : '');
                frontend::readingForm('', 'UF', 'w25', 'UF', 'alterable', isset($currentCliente) ? $currentCliente->getUf() : '');
                frontend::readingForm('', 'CEP', 'w50', 'cep', 'alterable', isset($currentCliente) ? $currentCliente->getCep() : '');
                frontend::readingForm('', 'Município', 'w50', 'municipio', 'alterable', isset($currentCliente) ? $currentCliente->getMunicipio() : '');
                frontend::readingForm('', 'Bairro', 'w50', 'bairro', 'alterable', isset($currentCliente) ? $currentCliente->getBairro() : '');
                frontend::readingForm('', 'Logradouro', 'w50', 'logradouro', 'alterable', isset($currentCliente) ? $currentCliente->getLogradouro() : '');
                frontend::readingForm('', 'Número', 'w25', 'numero', 'alterable', isset($currentCliente) ? $currentCliente->getNumero() : '');
                frontend::readingForm('', 'Complemento', 'w25', 'complemento', 'alterable', isset($currentCliente) ? $currentCliente->getComplemento() : '');
                frontend::readingForm('', 'CMUN', 'w50', 'cmun', 'alterable', isset($currentCliente) ? $currentCliente->getCodMun() : '');
                ?>
            </div>

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-phone"></i>Contato</label>
                <?php
                frontend::readingForm('', 'E-mail', 'w100', 'email', 'alterable', isset($currentCliente) ? $currentCliente->getContatoEmail() : '');
                frontend::readingForm('', 'Telefone', 'w100', 'telefone', 'alterable', isset($currentCliente) ? $currentCliente->getContatoTelefone() : '');
                ?>
            </div>

                <?php
                // $optionsRedespacho = array(array('title' => 'Autorizado', 'value' => 1), array('title' => 'Não autorizado', 'value' => 0));
                // frontend::selectForm('Redespacho', 'w50 conditional', $optionsRedespacho, 'value', 'title', $currentCliente->getRedespacho());
                ?>

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-calendar"></i>Datas</label>
                <?php
                frontend::readingForm('', 'Data de criação', 'w50', 'criacao', '', isset($currentCliente) ? frontend::formatDate($currentCliente->getDataCriacao()) : '');
                frontend::readingForm('', 'Data de alteração', 'w50', 'alteracao', '', isset($currentCliente) ? frontend::formatDate($currentCliente->getDataAlteracao()) : '');
                ?>

            </div>

            <?php echo acesso::verifyAppliedAccess($_SESSION['id'], 10) ? '<button class="btn btn-block btn-dark d-none" type="submit" name="saveClientChanges" id="saveClientChanges">Salvar</button>' : null; ?>
        </form>
    </div>

<?php } ?>
</div>
</div>
<script>
    $("#selectBuscar").on("change", function() {
        $('#preExistingClient').submit();
    });

    $('#btnEditClient').click(function() {
        if ($('.alterable').attr('readonly')) {
            ($('.alterable').removeAttr('readonly')).hide().fadeIn('slow');
        } else {
            ($('.alterable').attr('readonly', true)).hide().fadeIn('slow');
        }

        if ($('#saveClientChanges').hasClass('d-none')) {
            $('#saveClientChanges').removeClass('d-none');
        }

        if ($('#btnEditClient').hasClass('btn-outline-dark')) {
            $('#btnEditClient').removeClass('btn-outline-dark');
            $('#btnEditClient').addClass('btn-dark');
        } else {
            $('#btnEditClient').addClass('btn-outline-dark');
            $('#btnEditClient').removeClass('btn-dark');
        }

    });
</script>