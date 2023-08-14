<div class="mainContent">
    <header>
        <div>
            <i class="fa-solid fa-user"></i>
            <h1>
                Gerenciar usuários<span></span>
            </h1>
        </div>
    </header>

    <?php $errorMsg = 'Você não tem permissão para acessar esse recurso.';
    acesso::verifyAppliedAccess($_SESSION['id'], 3) ? null : include('error.php'); ?>

    <div class="contentBox hidden" style="background: #fff; flex-direction:column !important;">
        <div class="contentBoxHeader">
            <div class="contentBoxTitle"><i class="fa-solid fa-user"></i>
                <h1>Usuários<span></span></h1>
            </div>
        </div>
        <div class="form-group">
            <form method="GET" id="userForm">
                <input type="hidden" name="url" value="usuarios">
                <label>Usuário já existente</label>
                <select id="userSelection" class="form-control" name="userID" required>
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
            </form>
        </div>
        <?php if (isset($_GET['userID'])) {

            $user = user::requestSingleUser($_GET['userID']);
            $currentUser = new user(
                $user['log_id'],
                $user['log_nome'],
                $user['log_senha'],
                $user['log_email'],
                $user['cli_dado_cnpj'],
                $user['cli_dado_fantasia']
            );

            if (isset($_POST['sendEdition'])) {
                $updatedUser = new user(
                    $user['log_id'],
                    $_POST['nome'],
                    $_POST['email'],
                    $_POST['cnpj'] ?? '',
                    $_POST['org'] ?? '',
                    $_POST['senha']
                );
                if (user::verifyExistingCPNJ($_POST['cnpj'])) {
                    user::updateUser($updatedUser);
                    frontend::alert('check', 'success', 'Dados atualizados');
                } elseif ($_POST['cnpj'] == '') {
                    user::updateUser($updatedUser);
                } else {
                    frontend::alert('times', 'danger', 'Esse CNPJ não está registrado no sistema. Escolha um existente ou cadastre um novo cliente.');
                }
            }

            if (isset($_POST['sendNewUser'])) {
                $newUser = new user(
                    NULL,
                    $_POST['newNome'],
                    $_POST['newSenha'],
                    $_POST['newEmail'],
                    $_POST['newCnpj'] ?? '',
                    NULL
                );
                user::insertUser($newUser);
                frontend::alert('check', 'success', 'Usuário cadastrado');
            }
        ?>
            <div class="userBox">
                <div class="userWrapper">
                    <h2>Editar usuário</h2>

                    <div class="userPic">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <button id="btnEditUser" class="btn btn-outline-dark"><i class="fa-solid fa-pen-to-square"></i></button>
                    <form method="POST" name="editUser">
                        <div class="userData">
                            <div class="form-group">
                                <label for="inputNome">Nome</label><br>
                                <input class="form-control" placeholder="Nome" id="inputNome" type="text" name="nome" value="<?php echo $currentUser->getNome(); ?>" disabled value="">
                            </div>
                            <div class="form-group">
                                <label for="inputNome">E-mail</label><br>
                                <input class="form-control" placeholder="E-mail" id="inputEmail" type="text" name="email" value="<?php echo $currentUser->getEmail(); ?>" disabled value="">
                            </div>
                            <div class="form-group">
                                <label for="inputNome">Senha</label><br>
                                <input class="form-control " placeholder="Senha" id="inputSenha" type="password" name="senha" value="<?php echo $currentUser->getSenha(); ?>" disabled value="">
                            </div>
                            <div class="form-group">
                                <label for="inputNome">CNPJ da organização</label><br>
                                <input class="form-control" placeholder="CNPJ da organização" id="inputCnpj" name="cnpj" value="<?php echo $currentUser->getCnpjCliente() ?? ''; ?>" type="text" disabled value="">
                            </div>
                            <div class="form-group">
                                <label for="inputNome">Organização</label><br>
                                <input class="form-control" placeholder="Organização" id="inputOrg" type="text" name="org" value="<?php echo $currentUser->getFantasiaCliente() ?? ''; ?>" disabled value="">
                            </div>

                            <button id="sendEdition" type="submit" name="sendEdition" class="d-none btn btn-secondary">Atualizar</button>
                    </form>
                </div>
            </div>
    </div>

<?php } ?>

<div class="newUserContainer">
    <button id="newUserRevealer" class="btn btn-outline-dark btn-block">Novo usuário</button>

    <div class="userBox d-none" id="newUserBox">
        <div class="userWrapper">
            <h2>Novo usuário</h2>
            <div class="userPic">
                <i class="fa-solid fa-user"></i>
            </div>
            <form method="POST" name="editUser">
                <div class="userData">
                    <div class="form-group">
                        <label for="newNome">Nome</label><br>
                        <input class="form-control" placeholder="Nome" id="newNome" type="text" required name="newNome">
                    </div>
                    <div class=" form-group">
                        <label for="newEmail">E-mail</label><br>
                        <input class="form-control" placeholder="E-mail" id="newEmail" type="text" required name="newEmail">
                    </div>
                    <div class="form-group input-group">
                        <label for="newSenha">Senha</label><br>
                        <div class="input-group">
                            <input class="form-control" placeholder="Senha" id="newSenha" type="text" minlength="8" required name="newSenha" aria-label="gerarSenhaBtn" aria-describedby="gerarSenhaBtn">
                            <div class="input-group-append">
                                <button name="customFilter" class="btn btn-secondary" type="submit" id="gerarSenhaBtn"><i class="fa-solid fa-key"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNome">CNPJ da organização</label><br>
                        <input class="form-control" placeholder="CNPJ da organização" id="newCnpj" minlength="11" name="newCnpj" type="text">
                    </div>

                    <button id="sendNewUser" type="submit" name="sendNewUser" class="btn btn-secondary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#userSelection').on('change', function() {
            $('#userForm').submit();
        });

        $('#newUserRevealer').on('click', function() {
            $('#newUserBox').hasClass('d-none') ? $('#newUserBox').removeClass('d-none') : $('#newUserBox')
                .addClass('d-none');
        });

        $('#btnEditUser').click(function() {
            if ($('input[type="text"]').attr('disabled')) {
                ($('input[type="text"]').removeAttr('disabled')).hide().fadeIn('slow');
                ($('input[placeholder="Organização"]').attr('disabled', true));
                ($('#sendEdition').removeClass('d-none')).hide().fadeIn('slow');
            } else {
                ($('#editUserBtn').addClass('d-none')).hide().fadeIn('slow');
                ($('input[type="text"]').attr('disabled', true)).hide().fadeIn('slow');
            }

            if ($('input[type="password"]').attr('disabled')) {
                ($('input[type="password"]').removeAttr('disabled')).hide().fadeIn('normal');
            } else {
                ($('input[type="password"]').attr('disabled', true)).hide().fadeIn('slow');
            }
        });

        $('#gerarSenhaBtn').click(function() {
            var caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*-_';
            var tamanho = 8;
            var senha = '';

            for (var i = 0; i < tamanho; i++) {
                senha += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
            }

            $('#newSenha').val(senha);
        });
    });
</script>