<div class="mainContent">
    <header>
        <div>
            <i class="fa-solid fa-scroll"></i>
            <h1>
                Logs<span></span>
            </h1>
        </div>
    </header>

    <?php $errorMsg = 'Você não tem permissão para acessar esse recurso.';
    acesso::verifyAppliedAccess($_SESSION['id'], 6) ? null : include('error.php'); ?>


    <div class="contentBox hidden" style="background: #fff;">
        <div class="contentBoxHeader">
            <div class="contentBoxTitle"><i class="fa-solid fa-scroll fa-sharp"></i>
                <h1>Next Express - LOG<span></span></h1>
            </div>
        </div>
        <div class="d-flex flex-column">

            <div>
                <form method="POST">
                    <select name="type" class="control text-center">
                        <option value="action">Ação</option>
                        <option value="user">Usuário</option>
                    </select>
                    <input type="text" name="searchBar" class="form-control">
                    <br>
                    <button type="submit" name="submitFilter" class="form-control btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <hr>
            <div class="d-flex flex-column w-100 p-3 logsContainer">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>LOG</th>
                            <th>Autor</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($_POST['submitFilter'])) {
                        $whereClause = $_POST['searchBar'];
                        $type = isset($_POST['type']) ? $_POST['type'] : '';
                    }
                    $sql = logFeeder::logGetter($whereClause ?? '', $type ?? '');
                    foreach ($sql as $currentLog) { ?>
                        <tr>
                            <td>
                                <?php echo $currentLog['log_nome']; ?>
                            </td>
                            <td>
                                <?php echo $currentLog['lg_acao']; ?>
                            </td>
                            <td>
                                <?php
                                $data = new DateTime($currentLog['lg_data']);
                                $dataFormatada = $data->format("d/m/Y H:i");
                                echo $dataFormatada;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php echo !is_array($sql) || count($sql) === 0 ? frontend::alert('question', 'dark', '<b>Não há logs</b> corresponentes para a pesquisa.') : ''; ?>
            </div>
        </div>
    </div>
    </script>