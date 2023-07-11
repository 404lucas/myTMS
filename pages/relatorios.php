<div class="mainContent">
    <header>
        <h1><i class="fa-solid fa-chart-line"></i>
            Relatórios
        </h1>
    </header>

    <div class="contentBox hidden" style='background: #fff;'>
        <div class="contentBoxHeader">
            <h1 class="contentBoxTitle"><i class="fa-solid fa-chart-line"></i> Relatórios de entrega</h1>
        </div>
        <!--<div class="identLabel"><label><i class="fa-solid fa-filter"></i>Filtros</label></div>-->
        <form method="post" id="formRelatorio">

            <?php $currentFilter = new filter(); ?>

            <!--TO DO: ADICIONAR FILTRAGEM GERAL-->

            <div class="form-row">
                <div class="form-group">
                    <label>Situação da encomenda</label>
                    <select class="form-control" name="situacao" id="mainOptions">
                        <option disabled selected value="Em andamento">Selecione...</option>
                        <!--BASEADO EM STATUS GERAL-->
                        <option value="Em andamento">Em andamento</option>
                        <option value="Finalizadas">Finalizadas</option>
                        <option value="Todas">Todas</option>
                        <option disabled></option>
                        <!--BASEADO EM TICKETS - DESTINATARIO-->
                        <option value="Remetente">Ocorrências Remetente</option>
                        <option value="Destinatário">Ocorrências Destinatário</option>
                        <option value="SAC">Ocorrências SAC</option>
                        <option value="SOP">Ocorrências SOP</option>
                        <option value="SAT">Ocorrências SAT</option>
                        <option value="NC">Ocorrências NC</option>
                        <option value="Adm Bases">Ocorrências Adm Bases</option>
                        <option disabled></option>
                        <!--BASEADO EM STATUS-->
                        <option value="Enviado para sinistro">Enviado para sinistro</option>
                        <option value="Devolução Solicitada">Devolução Solicitada</option>
                        <option disabled></option>
                        <!--BASEADO EM DESCONHECIDO-->
                        <!--option value="Comprovantes solicitados">Comprovantes solicitados</option>
                        <option value="Comprovantes disponibilizados">Comprovantes disponibilizados</option>
                        <option value="Acareações Solicitadas">Acareações Solicitadas</option>
                        <option value="Acareações Disponibilizadas">Acareações Disponibilizadas</option-->
                    </select>
                </div>


                <div class="form-group">
                    <label>Cliente</label>
                    <select class="form-control" name="cliente">
                        <option disabled selected>Selecione...</option>
                        <?php
                        #Selecionando os clientes
                        $currentFilter->getFilter('cli_dado_razao', 'cli_id', 'tb_cliente', '');
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Atendente</label>
                    <select class="form-control" name="atendente">
                        <option disabled selected>Selecione...</option>
                        <?php
                        #Selecionando os logins
                        $currentFilter->getFilter('log_nome', 'log_id', 'tb_login', 'WHERE log_id != 1');
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Executivo</label>
                    <select disabled class="form-control" name="executivo">
                        <option disabled selected>Selecione...</option>
                        <?php
                        #Selecionando os logins - DESABILITADO: REQUER ATUALIZAÇÃO NO BANCO
                        $currentFilter->getFilter('log_nome', 'log_id', 'tb_login', 'WHERE log_id != 1');
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Grupo/Tomador</label>
                    <select class="form-control" name="todo">
                        <option>Selecione...</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Base/Parceiro</label>
                    <select class="form-control" name="parceiro">
                        <option disabled selected>Selecione...</option>
                        <?php
                        #Selecionando os parceiros
                        $currentFilter->getFilter('parc_fantasia', 'parc_id', 'tb_parceiro', '');
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Arquivos Recebidos</label>
                    <select class="form-control" name="recebidos">
                        <option>Todos os arquivos</option>
                        <option>Somente processados</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Data Inicial</label>
                    <input type="date" class="form-control yellowBg" name="dataInicial">
                </div>
                <div class="form-group">
                    <label>Data Final </label>
                    <input type="date" class="form-control yellowBg" name="dataFinal">
                </div>
                <div class="form-group">
                    <label>Ordenar</label>
                    <select class="form-control yellowBg" name="order" id>
                        <option value="id">ID do Envio</option>
                        <option value="cte">CT-e</option>
                        <option value="nfe">NF-e</option>
                        <option value="remetente">Remetente</option>
                        <option value="destinatario">Destinatário</option>
                        <option value="dataProcessamento">Data Processamento</option>
                        <option value="previsao">Previsão de Entrega</option>
                        <option value="cidade">Cidade</option>
                        <option value="uf">UF</option>
                        <option value="dataStatus">Data Status</option>
                        <option value="descStatus">Descrição Status</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Direção</label>
                    <select class="form-control yellowBg" name="direction">
                        <option value="asc">Crescente</option>
                        <option value="desc">Decrescente</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Atual</label>
                    <select class="form-control" name="status">
                        <option selected disabled>Selecione...</option>
                        <?php
                        $currentFilter->getFilter('stt_nome', 'stt_id', 'tb_status', '');
                        ?>
                    </select>
                </div>
                <button class="btn btn-block btn-dark" type="submit" name="submit"><i class="fa-solid fa-plus"></i> Gerar Relatório</button>
            </div>
        </form>
        </form>
        <form id="hiddenForm" method="post">
            <input type="hidden" id="hiddenQueryInput"></input>
        </form>
    </div>
    <div class="contentBox" style="background-color: #fff; margin-top: 40px;">
        <?php

        if (isset($_POST['submit'])) {
            $currentFilter = new filter;

            isset($_POST['situacao']) && $_POST['situacao'] === 'Em andamento' ? $currentFilter->addWhere("stt_finalizador != 1") : NULL;
            isset($_POST['situacao']) && $_POST['situacao'] === 'Finalizadas' ? $currentFilter->addWhere("stt_finalizador = 1") : NULL;
            isset($_POST['situacao']) && $_POST['situacao'] === 'Todas' ? NULL : NULL;

            isset($_POST['situacao'])
                && $_POST['situacao'] === 'Remetente'
                || $_POST['situacao'] === 'Destinatário'
                || $_POST['situacao'] === 'SAC'
                || $_POST['situacao'] === 'SOP'
                || $_POST['situacao'] === 'SAT'
                || $_POST['situacao'] === 'NC'
                || $_POST['situacao'] === 'Adm Bases'
                ? $currentFilter->addWhere("tkt_destinatario = " . $_POST['situacao']) : NULL;

            isset($_POST['situacao']) && $_POST['situacao'] == 'Enviado para sinistro' ? $currentFilter->addWhere("stt_nome LIKE '%devolução%'") : NULL;
            isset($_POST['situacao']) && $_POST['situacao'] == 'Devolução Solicitada' ? $currentFilter->addWhere("stt_nome LIKE '%enviado%' AND stt_nome LIKE '%sinistro%'") : NULL;


            //Para mais informação sobre a função de filtragem, acesse a classe `filters` 
            isset($_POST['cliente']) ? $currentFilter->addWhere("nfe_id_cliente = " . $_POST['cliente']) : NULL;
            //Cliente
            isset($_POST['cliente']) ? $currentFilter->addWhere("nfe_id_cliente = " . $_POST['cliente']) : NULL;
            //Atendente
            isset($_POST['atendente']) ? $currentFilter->addWhere("log_id = " . $_POST['atendente']) : NULL;
            //Executivo
            isset($_POST['executivo']) ? $currentFilter->addWhere("nfe_id_executivo = " . $_POST['executivo']) : NULL;
            //Parceiro
            isset($_POST['parceiro']) ? $currentFilter->addWhere("nfe_id_parceiro = " . $_POST['parceiro']) : NULL;
            //Cliente
            isset($_POST['dataInicial']) && $_POST['dataInicial'] != '' && $_POST['dataInicial'] != "1969-12-31 21:00:00" ? $currentFilter->addWhere("nfe_criacao >= " . $_POST['dataInicial']) : NULL;

            isset($_POST['dataFinal']) && $_POST['dataFinal'] != '' && $_POST['dataFinal'] != "1969-12-31 21:00:00"  ? $currentFilter->addWhere("nfe_criacao >= " . $_POST['dataFinal']) : NULL;
            //Cliente
            isset($_POST['status']) ? $currentFilter->addWhere("stta_id_status = " . $_POST['status']) : NULL;

            $order = $_POST['order'] ?? 'nfe_id';
            $direction = $_POST['direction'] ?? 'DESC';

            switch ($order) {
                case 'cte':
                    $column = 'nfe_CTe';
                    break;
                case 'nfe':
                    $column = 'nfe_id';
                    break;
                case 'remetente':
                    $column = 'cli_dado_fantasia';
                    break;
                case 'destinatario':
                    $column = 'nfe_dest_razao ';
                    break;
                case 'dataProcessamento':
                    $column = 'nfe_data_alteracao';
                    break;
                case 'previsao':
                    $column = 'nfe_entrega_previsao';
                    break;
                case 'cidade':
                    $column = 'nfe_dest_cidade';
                    break;
                case 'uf':
                    $column = 'nfe_dest_uf';
                    break;
                case 'dataStatus':
                    $column = 'stta_data_alteracao';
                    break;
                case 'descStatus':
                    $column = 'stt_descricao';
                    break;
                default:
                    $column = 'nfe_id';
                    break;
            }

            $orderBy = "ORDER BY {$column} {$direction}";
            $whereQuery = $currentFilter->getWhereClause();
        }


        //Paginação simples utilizando componentes bootstrap, funciona com condições
        $limitQuery = '';
        $itensPorPagina = 10;
        $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $offset = ($paginaAtual - 1) * $itensPorPagina;

        // Consulta para obter os itens da página atual
        $limitQuery = "LIMIT $itensPorPagina OFFSET $offset";

        // Executar a consulta SQL

        // Consulta para obter o número total de itens
        $resultadoTotal = nfe::defaultFunction("SELECT COUNT(*) as total FROM `tb_nfe`");
        // Executar a consulta SQLTotal

        $totalItens = $resultadoTotal;
        $totalPaginas = ceil($totalItens / $itensPorPagina);

        echo "<ul class='pagination'>";

        if ($paginaAtual > 1) {
            echo "<li class='page-item'>";
            echo "<a class='page-link' href='?url=relatorios&pagina=" . ($paginaAtual - 1) . "'>&laquo; Anterior</a>";
            echo "</li>";
        }

        $mostrarPontosInicio = false;
        $mostrarPontosFim = false;

        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaAtual) {
                echo "<li class='page-item active'>";
            } else {
                echo "<li class='page-item'>";
            }

            // Exibir até 4 páginas antes e depois da página atual
            if ($i >= ($paginaAtual - 2) && $i <= ($paginaAtual + 2)) {
                echo "<a class='page-link' href='?url=relatorios&pagina=$i'>$i</a>";
            }

            // Mostrar os três pontos no início
            if ($i == 1 && $paginaAtual > 4) {
                echo "<li class='page-item disabled'><a class='page-link'>...</a></li>";
                $mostrarPontosInicio = true;
            }

            // Mostrar os três pontos no final
            if ($i == $totalPaginas && $paginaAtual < ($totalPaginas - 3)) {
                echo "<li class='page-item disabled'><a class='page-link'>...</a></li>";
                $mostrarPontosFim = true;
            }

            // Exibir até 4 páginas antes dos três pontos no início
            if ($i > 1 && $i < ($paginaAtual - 2) && !$mostrarPontosInicio) {
                echo "<li class='page-item disabled'><a class='page-link'>...</a></li>";
                $mostrarPontosInicio = true;
            }

            // Exibir até 4 páginas após os três pontos no final
            if ($i > ($paginaAtual + 2) && $i < $totalPaginas && !$mostrarPontosFim) {
                echo "<li class='page-item disabled'><a class='page-link'>...</a></li>";
                $mostrarPontosFim = true;
            }

            echo "</li>";
        }

        if ($paginaAtual < $totalPaginas) {
            echo "<li class='page-item'>";
            echo "<a class='page-link' href='?url=relatorios&pagina=" . ($paginaAtual + 1) . "'>Próximo &raquo;</a>";
            echo "</li>";
        }

        echo "</ul>";

        //Requisição principal de notas fiscais, tendo ou não filtros - query de limite desabilitada
        $resultados = nfe::getListJoined('', $orderBy ?? '', $whereQuery ?? '');

        ?>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>CTE</th>
                    <th>ID</th>
                    <th>Destinatário</th>
                    <th>Data do arquivo</th>
                    <th>Previsão de entrega</th>
                    <th>Cidade</th>
                    <th>Status</th>
                    <th>Status - descrição</th>
                    <th>Última atualização</th>
                    <th>Mais</th>
                </tr>
            </thead>

            <?php
            if (isset($resultados)) foreach ($resultados as $key => $value) {

                //Instanciando nova NFE.    
                $currentNfe = new nfe(
                    $value['nfe_id'],
                    $value['nfe_ativa'],
                    $value['nfe_id_cliente'],
                    $value['nfe_id_volume'],
                    $value['nfe_id_fornecedor'],
                    $value['nfe_id_parceiro'],
                    $value['nfe_id_servico'],
                    $value['nfe_serial_pedido'],
                    $value['nfe_serial_codigo'],
                    $value['nfe_serial_serie'],
                    $value['nfe_serial_verProc'],
                    $value['nfe_serial_nnf'],
                    $value['nfe_serial_data_protocolo'],
                    $value['nfe_serial_emissor_protocolo'],
                    $value['nfe_doc_awb'],
                    $value['nfe_doc_gris'],
                    $value['nfe_doc_seguro'],
                    $value['nfe_doc_CFOP'],
                    $value['nfe_doc_justificativa'],
                    $value['nfe_doc_sigla_tabela'],
                    $value['nfe_doc_declaracao'],
                    $value['nfe_doc_icsm'],
                    $value['nfe_doc_rodo_courier'],
                    $value['nfe_dest_razao'],
                    $value['nfe_dest_fantasia'],
                    $value['nfe_dest_cpl'],
                    $value['nfe_dest_cpf'],
                    $value['nfe_dest_cnpj'],
                    $value['nfe_dest_uf'],
                    $value['nfe_dest_cidade'],
                    $value['nfe_dest_bairro'],
                    $value['nfe_dest_logradouro'],
                    $value['nfe_dest_complemento'],
                    $value['nfe_dest_p_referencia'],
                    $value['nfe_dest_numero'],
                    $value['nfe_CTe'],
                    $value['nfe_CTe_chave'],
                    $value['nfe_CTe_cCT'],
                    $value['nfe_CTe_origem'],
                    $value['nfe_entrega_data'],
                    $value['nfe_entrega_previsao'],
                    $value['nfe_entrega_prazo'],
                    $value['nfe_entrega_monitorar'],
                    $value['nfe_total_BC'],
                    $value['nfe_total_ICMS'],
                    $value['nfe_total_produto'],
                    $value['nfe_total_seguro'],
                    $value['nfe_total_desconto'],
                    $value['nfe_total_PIS'],
                    $value['nfe_total_COFINS'],
                    $value['nfe_total_NF'],
                    $value['nfe_arquivo_XML'],
                    $value['nfe_complementar'],
                    $value['nfe_data_criacao'],
                    $value['nfe_data_alteracao'],
                    $value['cli_dado_razao'],
                    $value['cli_dado_cnpj'],
                    $value['cli_dado_ie'],
                    $value['cli_dado_fantasia'],
                    $value['cli_end_cep'],
                    $value['cli_end_municipio'],
                    $value['cli_end_logradouro'],
                    $value['cli_end_numero'],
                    $value['cli_end_complemento'],
                    $value['cli_end_bairro'],
                    $value['vol_item'],
                    $value['forn_fantasia'],
                    $value['parc_fantasia'],
                    $value['serv_nome'],
                    $value['log_nome'],
                    $value['log_nome'],
                    $value['stt_descricao'],
                    $value['stta_data_alteracao'],
                    $value['stt_cor'],
                    $value['stt_nome'],
                    $value['stt_finalizador'],
                    $value['tkt_destinatario'],
                );

            ?>

                <div class="modal fade" id="modal<?php echo $currentNfe->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modalTicket">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <div class="tableContainerHeader">
                                        <h1><i class="fa-solid fa-ticket"></i>Novo Ticket ID#
                                            <?php echo $currentNfe->getId(); ?>
                                        </h1>
                                    </div>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="form-group ticketModal">
                                        <label>Enviar para</label>
                                        <select class="form-control" name="destinatario" id="mainOptions">
                                            <option disabled>Selecione...</option>
                                            <option value="Remetente">Enviar ao remetente</option>
                                            <option value="SAC">Enviar ao SAC</option>
                                            <option value="SOP">Enviar ao SOP</option>
                                            <option value="SAT">Enviar ao SAT</option>
                                            <option value="NC">Enviar à NC</option>
                                            <option value="ADM">Enviar à adm bases</option>
                                            <option value="Sinistro">Enviar para sinistro</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Visualizadores</label>
                                        <select class="form-control" name="visualizador" id="mainOptions">
                                            <option disabled>Selecione...</option>
                                            <option value="dlogeremetente">Dlog e remetente</option>
                                            <option value="dlogremetenteedestinatario">Dlog, remetente e destinatário
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Conteúdo do Ticket</label>
                                        <textarea name="conteudo" class="form-control" required></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviarTicket<?php echo $currentNfe->getId(); ?>" class="btn btn-warning">

                                <?php if (isset($_POST['enviarTicket' . $currentNfe->getId()])) {
                                    $currentTicket = new ticket(NULL, $currentNfe->getId(), $_SESSION['id'], NULL, $_POST['conteudo'], $_POST['destinatario'], $_POST['visualizador'], 'blob', 0, NULL, NULL, NULL);
                                    $currentTicket->sendTicket($currentTicket);
                                } ?>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!--Modal para atualizar Tracking-->
                <div class="modal fade" id="modalTracking<?php echo $currentNfe->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modalTicket">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <div class="tableContainerHeader">
                                        <h1><i class="fa-solid fa-truck-fast"></i>Atualizando status da encomenda ID#
                                            <?php echo $currentNfe->getId(); ?>
                                        </h1>
                                    </div>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="form-group ticketModal">
                                        <label>Status geral</label>
                                        <select class="form-control" name="stt" required id="mainOptions">
                                            <option selected disabled>Selecione</option>
                                            <?php
                                            $types = status::requestStatusTypes();
                                            foreach ($types as $value) { ?>
                                                <option style="background-color: <?php echo $value['stt_cor']; ?>;" value="<?php echo $value['stt_id']; ?>"><?php echo $value['stt_nome']; ?>
                                                </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Data retroativa</label>
                                        <label style="margin: 1px 0; color: #999; font-size: 15px; font-weight: 400 !important;">Caso
                                            inexistente, não preencher campo.</label>
                                        <input class="form-control" type="datetime-local" name="statusDate"></input>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <input type="submit" name="enviarStatus<?php echo $currentNfe->getId(); ?>" class="btn btn-warning">

                                <?php if (isset($_POST['enviarStatus' . $currentNfe->getId()])) {
                                    //Envio dos dados para a atualização de status
                                    $currentStatusApply = new statusApply(($_POST['stt'] ?? 820), $currentNfe->getId(), ($_POST['statusDate'] ?? NULL));
                                    $currentStatusApply->sendStatus($currentStatusApply);
                                } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tabela principal para exibição de dados da NFE-->
                <!--Parte principal-->
                <tr>

                    <td>
                        <?php echo $currentNfe->getCte(); ?>
                    </td>
                    <td>
                        <?php echo $currentNfe->getId(); ?>
                    </td>
                    <td>
                        <?php echo $currentNfe->getDestRazao(); ?>
                    </td>
                    <td>
                        <?php echo $currentNfe->getDataCriacao(); ?>
                    </td>
                    <td>
                        <?php echo $currentNfe->getEntregaPrevisao(); ?>
                    </td>
                    <td>
                        <?php echo $currentNfe->getDestCidade(); ?>
                    </td>
                    <td bgcolor="<?php echo $currentNfe->getSttCor(); ?>">
                        <?php echo $currentNfe->getSttNome() ?? 'Sem status definido.'; ?>
                    </td>
                    <td>
                        <?php echo $currentNfe->getSttDescricao(); ?>
                    </td>
                    <td>
                        <?php echo $currentNfe->getSttaDataAlteracao(); ?>
                    </td>
                    <td>
                        <?php echo '<button class="btn btn-dark" id="btn" onclick="toggleNFEContent(\'' . $key . '\')"><i class="fa-solid fa-chevron-down"></i></button>'; ?>
                        <div id="<?php echo $key; ?>" style="min-height: 100px; margin-left: 20px; border-radius: 0 50px 20px 20px; background-color: #ececec; width: calc(inherit - 100px) !important; position: absolute; left: 0; border:#DEE2E6 1px solid; display: none; align-self: center; padding: 30px 0; margin-top: 13px;">

                            <!--Menu da nota, todos os dados exiibidos-->
                            <div class="mainTableMenuContainer" id="mainTableMenuContainer">
                                <div class="tableContainerHeader">
                                    <h1><i class="fa-solid fa-truck-fast"></i>Encomenda #
                                        <?php echo $currentNfe->getId(); ?>
                                    </h1>
                                </div>
                                <div class="formsContainer">

                                    <!--Collapse do Ticket-->
                                    <div class="accordionsContainer">
                                        <div class="accordion w50" style="background-color:#fff !important;" id="accordionTicket<?php echo $currentNfe->getId(); ?>">
                                            <div class="card" style="border: none !important;">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link w100 accordionBtn" type="button" data-toggle="collapse" data-target="#collapseTicket<?php echo $currentNfe->getId(); ?>" aria-expanded="false" aria-controls="collapseOn">
                                                        <label class="formTitle accordionLabel"><i class="fa-solid fa-ticket"></i>Tickets</label>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseTicket<?php echo $currentNfe->getId(); ?>" class="collapse" aria-labelledby="headingOne" aria-expanded="false" data-parent="#accordionTracking<?php echo $currentNfe->getId(); ?>">
                                                <div class="card-body">
                                                    <h1 class="btn btn-outline-dark w100" data-toggle="modal" data-target="#modal<?php echo $currentNfe->getId(); ?>">
                                                        <i class="fa-solid fa-plus"></i>
                                                        Adicionar ticket
                                                    </h1>
                                                    <?php

                                                    //Requisitando todos os tickets				
                                                    $tickets = ticket::requestTicketsLeftJoined($currentNfe->getId(), '');
                                                    if ($tickets) {
                                                        foreach ($tickets as $key => $value) {
                                                            //Antes de instanciar, conferindo se há autor/finalizador para o ticket, caso não, autor é o destinatário
                                                            if (!isset($value['autor_nome']) && !isset($value['finalizador_nome'])) {
                                                                $value['autor_nome'] = 'Destinatário';
                                                                $value['finalizador_nome'] = '';
                                                            }
                                                            $currentTicket = new ticket($value['tkt_id'], $value['tkt_id_nfe'], $value['tkt_id_autor'], $value['autor_nome'], $value['tkt_conteudo'], $value['tkt_destinatario'], $value['tkt_visualizador'], $value['tkt_arquivo'], $value['tkt_finalizado'], $value['tkt_id_finalizador'], $value['finalizador_nome'], $value['tkt_data_criacao']);

                                                            echo frontend::ticketSingle($currentTicket, true);
                                                    ?>

                                                    <?php }
                                                    } else {
                                                        //Array $tickets é falsa não há tickets para a encomenda.
                                                        echo frontend::alert('ticket', 'dark', 'Ainda <b>não há nenhum ticket</b> para essa encomenda.');
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>


                                        <!--Collapse do Tracking-->
                                        <div class="accordion w50" style="background-color:#fff !important;" id="accordionTracking<?php echo $currentNfe->getId(); ?>">
                                            <div class="card" style="border: none !important;">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link w100 accordionBtn" type="button" data-toggle="collapse" data-target="#collapseTracking<?php echo $currentNfe->getId(); ?>" aria-expanded="false" aria-controls="collapseOn">
                                                        <label class="formTitle accordionLabel"><i class="fa-solid fa-truck-fast"></i>Tracking</label>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseTracking<?php echo $currentNfe->getId(); ?>" class="collapse collapseTracking" aria-labelledby="headingOne" data-parent="#accordionTracking<?php echo $currentNfe->getId(); ?>" aria-expanded="false">
                                                <div class="card-body">
                                                    <h1 class="btn btn-outline-dark w100" data-toggle="modal" data-target="#modalTracking<?php echo $currentNfe->getId(); ?>">
                                                        <i class="fa-solid fa-plus"></i>
                                                        Atualizar rastreamento
                                                    </h1>
                                                    <?php

                                                    //Requerindo todos os status para a NFE atual
                                                    $statuses = status::requestStatus($currentNfe->getId());
                                                    if ($statuses) {
                                                        //Verificando se há algum status na lista que seja finalizador. Identifica se a encomenda foi ou não finalizada.
                                                        $finished = status::verifyFinished($currentNfe->getId());

                                                        //Tratando no caso de finalização ou falta dela.
                                                        echo $finished ? frontend::alert('check', 'success', 'Encomenda <b>finalizada!</b>') : frontend::alert('truck-fast', 'dark', 'Entrega em <b>andamento.</b>'); ?>
                                                        <section class="step-wizard">

                                                            <!--FUNÇÕES VERIFYSTEP verificam em qual estágio a ultima atualização de status se encontra-->
                                                            <!--Caso o passo seja correspondente ao item, será mostrada a classe de passo atual-->
                                                            <ul class="step-wizard-list">
                                                                <li class="step-wizard-item <?php status::verifyStep($currentNfe->getId(), 1); ?>">
                                                                    <span class="progress-count">1</span>
                                                                    <span class="progress-label">Conferido
                                                                <li class="step-wizard-item <?php status::verifyStep($currentNfe->getId(), 2); ?>">
                                                                    <span class="progress-count">2</span>
                                                                    <span class="progress-label">Rasterizar</span>
                                                                </li>
                                                                <li class="step-wizard-item <?php status::verifyStep($currentNfe->getId(), 3); ?>">
                                                                    <span class="progress-count">3</span>
                                                                    <span class="progress-label">Roteirizar</span>
                                                                </li>
                                                                <li class="step-wizard-item <?php status::verifyStep($currentNfe->getId(), 4); ?>">
                                                                    <span class="progress-count">4</span>
                                                                    <span class="progress-label">Entregar</span>
                                                                </li>
                                                            </ul>
                                                        </section>
                                                        <!--Tabela com todos os status-->
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr class="thead-dark">
                                                                    <th>Tipo</th>
                                                                    <th>Descrição</th>
                                                                    <th>Descrição Popular</th>
                                                                    <th>Data</th>
                                                                </tr>
                                                            </thead>
                                                            <?php
                                                            foreach ($statuses as $value) {
                                                                //Instanciando objeto status
                                                                $currentStatus = new status(
                                                                    $value['stta_id'],
                                                                    $value['stta_id_nfe'],
                                                                    $value['stta_id_status'],
                                                                    $value['stt_id'],
                                                                    $value['stt_nome'],
                                                                    $value['stt_descricao'],
                                                                    $value['stt_cor'],
                                                                    $value['stt_ocorrencia'],
                                                                    $value['stt_hidden_popular'],
                                                                    $value['stt_descricao_popular'],
                                                                    $value['stt_finalizador'],
                                                                    $value['stt_mobile'],
                                                                    $value['stt_step'],
                                                                    $value['stta_data_alteracao'],
                                                                    $value['stt_data_criacao'],
                                                                );
                                                            ?>
                                                                <!--Mostrando dados do status em tabela-->
                                                                <tr>
                                                                    <td style="background-color: <?php echo $currentStatus->getCor(); ?>;">
                                                                        <?php echo $currentStatus->getNome(); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $currentStatus->getDescricao(); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $currentStatus->getDescricaoPopular(); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $currentStatus->getDataAlteracao(); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </table>
                                                    <?php
                                                    } else {
                                                        //Array $statuses é falsa, não há status para a encomenda. Tratando:
                                                        echo frontend::alert('truck', 'dark', 'Ainda não há <b>nenhum status</b> sobre essa encomenda.');
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Todos os dados a serem mostrados da nota fiscal-->

                                    <div style="height: 2px; background-color: #ccc; width: 95%;"></div>

                                    <form class="formContainer">

                                        <label class="formTitle"><i class="fa-solid fa-user"></i>Remetente</label>

                                        <?php frontend::readingForm($key, 'ID', 'w33', 'idcliente', $currentNfe->getIdCliente()); ?>
                                        <?php frontend::readingForm($key, 'CNPJ', 'w33', 'cnpj', $currentNfe->getCliCNPJ()); ?>
                                        <?php frontend::readingForm($key, 'Inscrição Estadual', 'w33', 'ie', $currentNfe->getCliIE()); ?>
                                        <?php frontend::readingForm($key, 'Nome Fantasia', 'w33', 'fantasia', $currentNfe->getCliFantasia()); ?>
                                        <?php frontend::readingForm($key, 'CEP', 'w33', 'cep', $currentNfe->getCliCEP()); ?>
                                        <?php frontend::readingForm($key, 'Cidade', 'w33', 'ie', $currentNfe->getCliMunicipio()); ?>

                                    </form>

                                    <form class="formContainer">

                                        <label class="formTitle"><i class="fa-solid fa-truck"></i>Entrega</label>

                                        <?php frontend::readingForm($key, 'Data', 'w50', 'data', $currentNfe->getEntregaData()); ?>
                                        <?php frontend::readingForm($key, 'Previsão', 'w50', 'previsao', $currentNfe->getEntregaPrevisao()); ?>
                                        <?php frontend::readingForm($key, 'Prazo', 'w50', 'prazo', $currentNfe->getEntregaPrazo()); ?>
                                        <?php frontend::readingForm($key, 'Monitorar', 'w50', 'monitorar', $currentNfe->getEntregaMonitorar()); ?>

                                    </form>


                                    <form class="formContainer">

                                        <label class="formTitle"><i class="fa-solid fa-user"></i>Destinatário</label>

                                        <?php frontend::readingForm($key, 'Nome do destinatário', 'w33', 'razaoSocial', $currentNfe->getCliRazao()); ?>
                                        <?php frontend::readingForm($key, 'CPL', 'w33', 'CPL', $currentNfe->getCte()); ?>
                                        <?php frontend::readingForm($key, 'CPF', 'w33', 'CPF', $currentNfe->getDestCPF()); ?>
                                        <?php frontend::readingForm($key, 'CNPJ', 'w33', 'CNPJ', $currentNfe->getDestCNPJ()); ?>
                                        <?php frontend::readingForm($key, 'UF', 'w33', 'UF', $currentNfe->getDestUF()); ?>
                                        <?php frontend::readingForm($key, 'Cidade', 'w33', 'Cidade', $currentNfe->getDestCidade()); ?>
                                        <?php frontend::readingForm($key, 'Bairro', 'w33', 'Bairro', $currentNfe->getDestBairro()); ?>
                                        <?php frontend::readingForm($key, 'Logradouro', 'w50', 'Logradouro', $currentNfe->getDestLogradouro()); ?>
                                        <?php frontend::readingForm($key, 'Complemento', 'w33', 'Complemento', $currentNfe->getDestComplemento()); ?>
                                        <?php frontend::readingForm($key, 'P. de referência', 'w100', 'referência', $currentNfe->getDestPReferencia()); ?>

                                    </form>


                                    <form class="formContainer">

                                        <label class="formTitle"><i class="fa-solid fa-paperclip"></i>Documentação</label>

                                        <?php frontend::readingForm($key, 'Sigla da tabela', 'w25', 'siglaTabela', $currentNfe->getDocSiglaTabela()); ?>
                                        <?php frontend::readingForm($key, 'AWB', 'w25', 'AWB', $currentNfe->getDocAWB()); ?>
                                        <?php frontend::readingForm($key, 'Gris', 'w25', 'Gris', $currentNfe->getDocGris()); ?>
                                        <?php frontend::readingForm($key, 'Seguro', 'w25', 'Seguro', $currentNfe->getDocSeguro()); ?>
                                        <?php frontend::readingForm($key, 'CFOP', 'w33', 'CFOP', $currentNfe->getDocCFOP()); ?>
                                        <?php frontend::readingForm($key, 'Justificativa', 'w33', 'Justificativa', $currentNfe->getDocJustificativa()); ?>
                                        <?php frontend::readingForm($key, 'Declaração', 'w33', 'Declaração', $currentNfe->getDocDeclaracao()); ?>
                                        <?php frontend::readingForm($key, 'ICSM', 'w33', 'ICSM', $currentNfe->getDocICSM()); ?>
                                        <?php frontend::readingForm($key, 'Rodo Courier', 'w33', 'RodoCourier', $currentNfe->getDocRodoCourier()); ?>

                                        <?php frontend::readingForm($key, 'CTe', 'w33', 'CTe', $currentNfe->getCte()); ?>
                                        <?php frontend::readingForm($key, 'Chave do CTe DLog', 'w33', 'Chave', $currentNfe->getCteChave()); ?>
                                        <?php frontend::readingForm($key, 'cCT', 'w33', 'cCT', $currentNfe->getCtecct()); ?>
                                        <?php frontend::readingForm($key, 'Origem', 'w33', 'Origem', $currentNfe->getCteOrigem()); ?>

                                        <?php frontend::readingForm($key, 'Pedido', 'w33', 'serialpedido', $currentNfe->getSerialPedido()); ?>
                                        <?php frontend::readingForm($key, 'Código', 'w33', 'serialcodigo', $currentNfe->getSerialCodigo()); ?>
                                        <?php frontend::readingForm($key, 'Série', 'w33', 'serialserie', $currentNfe->getSerialSerie()); ?>
                                        <?php frontend::readingForm($key, 'VerProc', 'w33', 'serialverproc', $currentNfe->getSerialVerProc()); ?>
                                        <?php frontend::readingForm($key, 'NNF', 'w33', 'serialnnf', $currentNfe->getSerialNNF()); ?>
                                        <?php frontend::readingForm($key, 'Data do Protocolo', 'w33', 'serialdataprotocolo', $currentNfe->getSerialDataProtocolo()); ?>
                                        <?php frontend::readingForm($key, 'Emissor do Protocolo', 'w33', 'serialemissor', $currentNfe->getSerialEmissorProtocolo()); ?>

                                    </form>

                                    <form class="formContainer">

                                        <label class="formTitle"><i class="fa-solid fa-user-tag"></i>Operadores</label>

                                        <?php frontend::readingForm($key, 'Operador atendente', '100', 'operadornome', $currentNfe->getOperadorNome()); ?>
                                        <?php frontend::readingForm($key, 'Comercial', '100', 'operadornome', $currentNfe->getExecutivoNome()); ?>

                                    </form>

                                    <form class="formContainer">

                                        <label class="formTitle"><i class="fa-solid fa-calendar"></i>Datas</label>

                                        <?php frontend::readingForm($key, 'Data de criação', 'w33', 'criacao', $currentNfe->getDataCriacao()); ?>
                                        <?php frontend::readingForm($key, 'Data de alteração', 'w33', 'alteracao', $currentNfe->getDataAlteracao()); ?>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }
            //} 
            ?>
        </table>

    </div>
</div>


</div>