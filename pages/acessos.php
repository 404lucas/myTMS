<div class="mainContent">
    <header>
        <div>
            <i class="fa-solid fa-address-card"></i>
            <h1>
                Acessos<span></span>
            </h1>
        </div>
    </header>

    <?php $errorMsg = 'Você não tem permissão para acessar esse recurso.';
    acesso::verifyAppliedAccess($_SESSION['id'], 3) ? null : include('error.php'); ?>

    <div class="contentBox hidden" style="background: #fff;">
        <div class="contentBoxHeader">
            <div class="contentBoxTitle"><i class="fa-solid fa-user"></i>
                <h1>Usuário<span></span></h1>
            </div>
        </div>
        <div class="userForm">
            <form method="GET">
                <input type="hidden" name="url" value="acessos">
                <div class="form-group align-center">
                    <label for="mainOptions" class="align-center">Usuário</label>
                    <select id="mainOptions" class="form-control" name="userID" required>
                        <option disabled selected>Selecione</option>
                        <?php
                        $users = user::requestALLusers();
                        foreach ($users as $value) {
                            $selected = isset($_GET['userID']) && $_GET['userID'] == $value['log_id'] ? 'selected' : '';
                            $clienteVinculado = $value['cli_dado_fantasia'] ?? 'Sem cliente vinculado';
                            echo "<option value='{$value['log_id']}' $selected>{$value['log_nome']} - $clienteVinculado</option>";
                        }
                        ?>
                    </select>
                </div>
                <button style="margin-top: 20px;" type="submit" name="upUser" class="btn btn-secondary btn-block btn-outline">Buscar</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_GET['userID']) || isset($_GET['upUser'])) {
        $selectedUserID = isset($_GET['userID']) ? $_GET['userID'] : null;

        if (isset($_POST['upAcess'])) {
            $currentId = $selectedUserID;
            if (isset($_POST["checkbox"]) && is_array($_POST["checkbox"])) {
                logFeeder::log($_SESSION['id'], 'Adição de acesso ao usuário ID ' . $currentId);
                acesso::applyAcesses($currentId, $_POST["checkbox"], false);
            } elseif (!isset($_POST['checkbox'])) {
                logFeeder::log($_SESSION['id'], 'Adição de acesso ' . $_POST["checkbox"] . ' ao usuário ID ' . $currentId);
                acesso::applyAcesses($currentId, NULL, true);
            }
        }
    ?>

        <div class="contentBox hidden" style='background: #fff;'>
            <div class="contentBoxHeader">
                <div class="contentBoxTitle"><i class="fa-solid fa-hand"></i>
                    <h1>Acessos do usuário<span></span></h1>
                </div>
            </div>

            <div class="form-group">
                <label for="preDefSelect" style="align-self:center;">Predefinições:</label></br>
                <select class="form-control" style="max-width: 50%;" id="preDefSelect">
                    <option selected disabled>Selecione</option>
                    <option value="1">Cliente</option>
                    <option value="2">Financeiro</option>
                </select>
            </div>

            <div class="accessList">
                <form method="POST">
                    <?php

                    $acesses = acesso::getAcesses();
                    foreach ($acesses as $value) {
                        $currentAcess = new acesso(
                            $value['acs_id'],
                            $value['acs_nome'],
                            $value['acs_descricao'],
                            $value['acs_menu'],
                            $value['acs_perfil'],
                            $value['acs_to_cliente'],
                        );

                        $isAcessApplied = $currentAcess::verifyAppliedAccess($selectedUserID, $currentAcess->getId());
                    ?>
                        <div class="accessSingle" for="chck<?php echo $currentAcess->getId(); ?>">
                            <div class="form-check">
                                <input class="form-check-input perfil<?php echo $currentAcess->getPerfil(); ?>" type="checkbox" name="checkbox[]" id="chck<?php echo $currentAcess->getId(); ?>" value="<?php echo $currentAcess->getId(); ?>" <?php echo $isAcessApplied ? 'checked' : ''; ?>>
                            </div>
                            <h1><?php echo $currentAcess->getNome(); ?></h1>
                            <p><?php echo $currentAcess->getDesc(); ?></p>
                            <?php echo $currentAcess->getToCliente() ? '<span></span>' : ''; ?>
                        </div>
                    <?php } ?>
                    <input type="submit" name="upAcess" class="btn btn-outline-dark btn-block" value="Atualizar">
                </form>
            </div>
        </div>

    <?php } ?>

</div>
</div>
</div>
<script>
    function selecionarCheckboxesPorPerfil() {
        /*
        PERFIS:
        CLIENTE - 1
        FINANCEIRO - 2
        */
        var perfilSelecionado = $("#preDefSelect").val();
        $(".form-check-input").prop("checked", false);
        $(".perfil" + perfilSelecionado).prop("checked", true);

    }

    // Adiciona um evento ao <select> para chamar a função quando o valor for alterado
    $("#preDefSelect").on("change", selecionarCheckboxesPorPerfil);

    // Chamando a função inicialmente para selecionar as checkboxes de acordo com a opção padrão selecionada (Selecione)
</script>