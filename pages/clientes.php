<div class="mainContent">
    <header>
        <div>
            <i class="fa-solid fa-building"></i>
            <h1>
                Clientes
            </h1>
        </div>
    </header>

    <?php $errorMsg = 'Você não tem permissão para acessar esse recurso.';
    acesso::verifyAppliedAccess($_SESSION['id'], 9) ? null : include('error.php'); ?>

    <div class="contentBox hidden" style="background: #fff;">
        <div class="contentBoxHeaderDivided">
            <div class="contentBoxTitle"><i class="fa-solid fa-building"></i>
                <h1>Cliente</h1>
            </div>
            <form class="form-group w25" method="GET" id="preExistingClient" name="preExistingClient">
                <label for="selectClient">Buscar</label>
                <input type="hidden" value="clientes" name="url"></input>
                <select class="form-control mb-3" name="selectClient" id="selectClient">
                    <option selected disabled>Selecione</option>

                    <?php
                    $clientNames = cliente::getAllClientNames();
                    foreach ($clientNames as $value) {
                        echo "<option value={$value['cli_dado_cnpj']}>{$value['cli_dado_fantasia']}</option>";
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
    </div>


    <?php
    if (isset($_GET['selectClient']) || isset($_GET['cnpjClient'])) {
        $CNPJ = isset($_GET['selectClient']) ? $_GET['selectClient'] : $_GET['cnpjClient'];
        $currentCliente = cliente::getSingleClient($CNPJ);

        if (isset($_POST['saveClientChanges'])) {
            cliente::conditionedUpdate($currentCliente->getCnpj(), $_POST['razaosocial'], $_POST['Fantasia'], $_POST['cpf'], $_POST['CNPJ'], $_POST['ie'], $_POST['pais'], $_POST['UF'], $_POST['cep'], $_POST['municipio'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'], $_POST['cmun']);
            logFeeder::log($_SESSION['id'], "Atualização do cliente ID{$currentCliente->getId()}");
        }
    }
    ?>

    <div class="contentBox hidden" style="background: #fff;">
        <div class="contentBoxHeaderDivided">
            <div class="contentBoxTitle"><i class="fa-solid fa-user"></i>
                <h1>Dados do cliente</h1>
            </div>
            <div>
                <?php echo acesso::verifyAppliedAccess($_SESSION['id'], 10) ? '<button class="btn btn-outline-dark" id="btnEditClient"><i class="fa-solid fa-pencil"></i></button>' : ''; ?>
            </div>
        </div>

        <form class="formsContainer" method="POST">

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-paperclip"></i> Documentação</label>
                <?php
                frontend::readingForm('', 'Razão Social', 'w100', 'razaosocial', isset($currentCliente) ? $currentCliente->getRazao() : '');
                frontend::readingForm('', 'Fantasia', 'w100', 'Fantasia', isset($currentCliente) ?  $currentCliente->getFantasia() : '');
                frontend::readingForm('', 'CPF', 'w25', 'cpf', isset($currentCliente) ? $currentCliente->getCpf() : '');
                frontend::readingForm('', 'CNPJ', 'w25', 'CNPJ', isset($currentCliente) ? $currentCliente->getCnpj() : '');
                frontend::readingForm('', 'IE', 'w50', 'ie', isset($currentCliente) ? $currentCliente->getIe() : '');
                ?>
            </div>

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-building"></i>Localização</label>
                <?php
                frontend::readingForm('', 'País', 'w25', 'pais', isset($currentCliente) ? $currentCliente->getPais() : '');
                frontend::readingForm('', 'UF', 'w25', 'UF', isset($currentCliente) ? $currentCliente->getUf() : '');
                frontend::readingForm('', 'CEP', 'w50', 'cep', isset($currentCliente) ? $currentCliente->getCep() : '');
                frontend::readingForm('', 'Município', 'w50', 'municipio', isset($currentCliente) ? $currentCliente->getMunicipio() : '');
                frontend::readingForm('', 'Bairro', 'w50', 'bairro', isset($currentCliente) ? $currentCliente->getBairro() : '');
                frontend::readingForm('', 'Logradouro', 'w50', 'logradouro', isset($currentCliente) ? $currentCliente->getLogradouro() : '');
                frontend::readingForm('', 'Número', 'w25', 'numero', isset($currentCliente) ? $currentCliente->getNumero() : '');
                frontend::readingForm('', 'Complemento', 'w25', 'complemento', isset($currentCliente) ? $currentCliente->getComplemento() : '');
                frontend::readingForm('', 'CMUN', 'w50', 'cmun', isset($currentCliente) ? $currentCliente->getCodMun() : '');
                ?>
            </div>

            <div class="formContainer">
                <label class="formTitle"><i class="fa-solid fa-calendar"></i>Datas</label>
                <?php
                echo "<b>Criação:</b> {$currentCliente->getDataCriacao()}";
                echo "<b>Última alteração:</b> {$currentCliente->getDataAlteracao()}";
                ?>

            </div>

            <?php echo acesso::verifyAppliedAccess($_SESSION['id'], 10) ? '<button class="btn btn-block btn-dark d-none" id="saveClientChanges" type="submit" name="saveClientChanges">Salvar e atualizar</button>' : null; ?>
        </form>
    </div>
</div>
</div>
<script>
    $("#selectClient").on("change", function() {
        $('#preExistingClient').submit();
    });

    $('#btnEditClient').click(function() {
        if ($('input[type="text"]').attr('readonly')) {
            ($('input[type="text"]').removeAttr('readonly')).hide().fadeIn('slow');
        } else {
            ($('input[type="text"]').attr('readonly', true)).hide().fadeIn('slow');
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