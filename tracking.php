<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style/trackingStyle.css">

    <?php

    if (isset($_GET['chat'])) {
    ?>

        <link rel="stylesheet" href="./style/pagesStyle.css">

    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <!--bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fonte poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/6d424ce658.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/favicon.png" type="image/png">


    <title>Next Express - Rastreamento</title>
</head>

<body>

    <?php

    //Incluindo configurações básicas do site
    include 'config.php';

    //Por padrão, o cpf inicialmente é dado como falso
    $cpfExists = false;

    //Função desativada de chat, url GET
    if (isset($_GET['chat']) && $_GET['chat'] == true) {
        include 'pages/chat.php';
    } else {
        //Se o CPF foi enviado por formulario, registrar valor e puxar notas fiscais do destinatário correspondente
        if (isset($_GET['submitCPF'])) {
            $cpf = $_GET['cpf'];
            $trackingList = nfe::getListJoined('', '', 'WHERE `nfe_dest_cpf` = ' . $cpf);
            //Se houverem dados correspoondentes à busca:
            if ($trackingList) {
                $cpfExists = true;
            } else {
                //Não há dados correspondentes
                echo '<br>' . frontend::alert('times', 'danger', 'Esse CPF não tem nenhuma encomenda agendada.');
            }
        }
        if ($cpfExists) {
            //CPF existe! Se houver sessão em andamento, destruir e começar uma nova.
            session_destroy();
            session_start();
            $_SESSION['nome'] = 'Destinatário';
            $_SESSION['id'] = 1; ?>

            <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

            <div class="mainContainer">
                <div class="mainWrapper">
                    <div class="myOrdersHeader">
                        <div class="leftSideHeader">
                            <img src="img/logo.jpeg">
                            <h1 class="meus">Meus</h1>
                            <h1 class="pedidos">pedidos</h1>
                        </div>
                        <div class="rightSideHeader">
                            <img src="img/vanDaNext.png">
                        </div>
                    </div>
                    <div class="mainDataWrapper">
                        <div class="mainDataContainer">
                            <div class="stripePartition">
                                <div class="stripe">
                                    <i class="fa-solid fa-truck"></i>
                                </div>
                            </div>
                            <div class="dataPartition">
                                <div class="dataPartitionHeader">
                                    <span></span>
                                    <h5 class="textPresentation">Olá, <or><?php echo nfe::getDestNomeSingleForTracking($cpf) . '!'; //Pegar somente o nome do destinatário para identificação na página 
                                                                            ?></or>
                                    </h5>
                                </div>

                                <div class="accordionsContainer">

                                    <?php

                                    //Instanciando NFEs
                                    foreach ($trackingList as $value) {
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

                                        <!--Modal para cadastro de Ticket-->
                                        <div class="modal fade" id="modal<?php echo $currentNfe->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            <div class="tableContainerHeader">
                                                                <h1><i class="fa-solid fa-ticket"></i> Fale conosco!
                                                                </h1>
                                                            </div>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Abra um ticket e descreva a sua situação para que o nosso setor de
                                                            atendimento possa te
                                                            ajudar o mais
                                                            rápido possível.</p>
                                                        <form method="post">
                                                            <div class="form-group">
                                                                <label>Ocorrência</label>
                                                                <textarea name="conteudo" class="form-control" required placeholder="O que está acontecendo?"></textarea>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                        <input type="hidden" name="cpf" value="<?php echo $currentNfe->getDestCPF(); ?>">
                                                        <input type="submit" value="Enviar" name="enviarTicket<?php echo $currentNfe->getId(); ?>" class="btn btn-warning">
                                                        </form>
                                                        <?php if (isset($_POST['enviarTicket' . $currentNfe->getId()])) {
                                                            //Enviando tickets de acordo com a nota fiscal
                                                            $currentTicket = new ticket(NULL, $currentNfe->getId(), NULL, 'Destinatário', $_POST['conteudo'], 'SAC', 'dlogremetenteedestinatario', 'blob', 0, 1, NULL, NULL);
                                                            $currentTicket->sendTicketDestinatario($currentTicket);
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Collapse geral para visualização de entrega/ticket-->
                                        <div class="accordion" id="accordionOne<?php echo $currentNfe->getId(); ?>">
                                            <div class="card cardBtn">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btnForCard" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $currentNfe->getId(); ?>" aria-expanded="false" aria-controls="collapseOn">
                                                            <i class="fa-solid fa-box"></i>Pedido
                                                            <?php echo $currentNfe->getId(); ?>
                                                        </button>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div id="collapseOne<?php echo $currentNfe->getId(); ?>" class="collapse" aria-labelledby="headingOne" aria-expanded="false" data-parent="#accordionOne<?php echo $currentNfe->getId(); ?>">
                                                <div class="card-body">
                                                    <div class="mainAccordionCollapse">
                                                        <div style="display: flex; flex-direction: column; align-items:center; width:100%">
                                                            <div class="subAccordionContainer">
                                                                <div class="subAccordionHeader">
                                                                    <i class="fa-solid fa-truck-fast"></i>
                                                                    <h1 class="subAccordionTitle">Rastreamento</h1>
                                                                </div>
                                                            </div>
                                                            <div class="trackingContainer">
                                                                <?php
                                                                //Requerindo status da nota
                                                                $statuses = status::requestStatus($currentNfe->getId());
                                                                $hidden = status::verifyHidden($currentNfe->getId());
                                                                if ($statuses && !$hidden) {
                                                                    $finished = status::verifyFinished($currentNfe->getId());
                                                                ?>

                                                                    <div class="trackingContainerMainHeader">
                                                                        <img src="./img/nextExpressLogoWhite.png">
                                                                        <div class="trackingContainerSubHeader">
                                                                            <h1>RASTREMENTO</h1>
                                                                            <H5>passo a passo</H5>
                                                                        </div>

                                                                        <section class="step-wizard">

                                                                            <!--FUNÇÕES VERIFYSTEP verificam em qual estágio a ultima atualização de status se encontra-->
                                                                            <!--Caso o passo seja correspondente ao item, será mostrada a classe de passo atual-->
                                                                            <ul class="step-wizard-list">
                                                                                <li class="step-wizard-item <?php status::verifyStep($currentNfe->getId(), 1); ?>">
                                                                                    <span class="progress-count ">1</span>
                                                                                    <span class="progress-label">Conferido</span>
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
                                                                    </div>


                                                                    <?php /*Caso entrega esteja finalizada, mostrar sucesso, senão, mostrar em andamento*/ echo $finished ? frontend::alertCustom('check', 'success', 'Entrega finalizada!') : frontend::alertCustom('truck', 'grey', 'Entrega em andamento'); ?>

                                                                    <div class="trackingDataList">
                                                                        <?php
                                                                        //Instanciando novos status
                                                                        foreach ($statuses as $value) {
                                                                            $currentStatus = new status(
                                                                                $value['stta_id'],
                                                                                $value['stta_id_nfe'],
                                                                                $value['stta_id_status'],
                                                                                $value['stta_autor'],
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
                                                                                $value['stt_data_criacao']
                                                                            );
                                                                            //Se status não for escondido - mostrar em view
                                                                            if ($currentStatus->getHiddenPopular()) {
                                                                        ?>
                                                                                <div class="trackingDataSingle">
                                                                                    <span></span>
                                                                                    <h5> <?php echo $currentStatus->getDescricaoPopular(); ?>
                                                                                    </h5>
                                                                                    <h6><?php echo $currentStatus->getDataAlteracao(); ?></h6>
                                                                                </div>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <div class="peopleDataContainer">
                                                                        <div class="peopleDataBox">
                                                                            <!--Dados do remetente-->
                                                                            <div class="peopleDataHeader">
                                                                                <h1><i class="fa-solid fa-paper-plane"></i>Remetente
                                                                                </h1>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Remetente</label>
                                                                                <h5><?php echo $currentNfe->getCliFantasia(); ?></h5>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Endereço</label>
                                                                                <h5><?php echo $currentNfe->getClilogradouro() . ', ' . $currentNfe->getCliNumero(); ?></h5>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Complemento</label>
                                                                                <h5><?php echo $currentNfe->getCliComplemento() ?? 'Sem complemento'; ?></h5>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Bairro</label>
                                                                                <h5><?php echo $currentNfe->getCliBairro(); ?></h5>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Município</label>
                                                                                <h5><?php echo $currentNfe->getCliMunicipio(); ?></h5>
                                                                            </div>
                                                                        </div>

                                                                        <i class="fa-solid fa-chevron-right"></i>

                                                                        <div class="peopleDataBox">
                                                                            <!--Dados do destinatário-->
                                                                            <div class="peopleDataHeader">
                                                                                <h1><i class="fa-solid fa-user"></i>Destinatário</h1>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Remetente</label>
                                                                                <h5><?php echo $currentNfe->getDestRazao(); ?></h5>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Endereço</label>
                                                                                <h5><?php echo $currentNfe->getDestLogradouro() . ', ' . $currentNfe->getDestLogradouro(); ?></h5>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Complemento</label>
                                                                                <h5><?php echo $currentNfe->getDestComplemento() ?? 'Sem complemento'; ?></h5>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Bairro</label>
                                                                                <h5><?php echo $currentNfe->getDestBairro(); ?></h5>
                                                                            </div>
                                                                            <div class="dataGetterContainer">
                                                                                <label>Município</label>
                                                                                <h5><?php echo $currentNfe->getDestCidade(); ?></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>

                                                            <div class="previewContainer">
                                                                <h1>Previsão de entrega:</h1>
                                                                <h2> <?php echo $currentNfe->getEntregaPrevisao(); ?></h2>
                                                            </div>

                                                        <?php } else {
                                                                    echo frontend::alertCustom('quote-right', 'grey', 'Ainda não há informações sobre essa entrega, aguarde.');
                                                                } ?>
                                                        </div>
                                                    </div>
                                                    <div class="mainAccordionCollapse" style="position: relative; top:-250px;">
                                                        <div style="display: flex; flex-direction: column; align-items:center; width:100%">
                                                            <div class="subAccordionContainer">
                                                                <div class="subAccordionHeader">
                                                                    <i class="fa-solid fa-ticket"></i>
                                                                    <h1 class="subAccordionTitle">Tickets</h1>
                                                                </div>
                                                            </div>
                                                            <div class="trackingContainer">
                                                                <button class="btnAddTicket" data-toggle="modal" data-target="#modal<?php echo $currentNfe->getId(); ?>">
                                                                    <i class="fa-solid fa-headset"></i>
                                                                    Fale conosco!
                                                                </button>
                                                                <div class="ticketList">
                                                                    <?php
                                                                    //Buscando todos os tickets visualizáveis pelo destinatário
                                                                    $tickets = ticket::requestTicketsLeftJoined($currentNfe->getId(), 'AND tkt_visualizador = "dlogremetenteedestinatario"');
                                                                    if ($tickets) {
                                                                        //Caso haja
                                                                        foreach ($tickets as $key => $value) {
                                                                            //Caso não haja nome de autor nem finalizado, objeto ticket tem como autor o destinatário
                                                                            if (!isset($value['autor_nome']) && !isset($value['finalizador_nome'])) {
                                                                                $value['autor_nome'] = 'Destinatário';
                                                                                $value['finalizador_nome'] = '';
                                                                            }
                                                                            //Instanciando tickets
                                                                            $currentTicket = new ticket($value['tkt_id'], $value['tkt_id_nfe'], $value['tkt_id_autor'], $value['autor_nome'], $value['tkt_conteudo'], $value['tkt_destinatario'], $value['tkt_visualizador'], $value['tkt_arquivo'], $value['tkt_finalizado'], $value['tkt_id_finalizador'], $value['finalizador_nome'], $value['tkt_data_criacao']);
                                                                    ?>
                                                                            <div class="ticketSingle">
                                                                                <div class="ticketHeader">
                                                                                    <h1><i class="fa-solid fa-ticket"></i>de: <?php echo $currentTicket->getNomeAutor(); ?></h1>
                                                                                </div>
                                                                                <div class="ticketContent">
                                                                                    <p><?php echo $currentTicket->getConteudo(); ?></p>
                                                                                </div>
                                                                                <div class="ticketFooter">
                                                                                    <p><?php echo $currentTicket->getDataCriacao(); ?></p>
                                                                                </div>
                                                                            </div>
                                                                    <?php
                                                                        }
                                                                    } else {
                                                                        echo frontend::alertCustom('box', 'grey', 'Ainda <b>não há nenhum ticket</b> para essa encomenda, se desejar, fale conosco!.');
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


            <?php } else { //TELA DE INSERÇÃO 
            ?>

                <div class="mainBox">

                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_tehr5kh8.json" background="transparent" speed="1" style="width: 230px; height: 230px;" loop autoplay>
                    </lottie-player>

                    <div class="formContainer">
                        <h1>Bem-<o>vindo(a)!</o>
                        </h1>
                        <label>Insira seu CPF</label>
                        <form method="GET" class="cpfForm">
                            <input type="text" placeholder="00000000000" maxlength="11" name="cpf" pattern="\d{11}}" required class="mainTextContainer"></input>
                            <button type="submit" class="submitCPFButton" name="submitCPF">Rastrear</button>
                        </form>
                    </div>
                    <div class="imgContainer">
                        <img src="./img/logo.jpeg">
                    </div>
                </div>
        <?php }
    }
        ?>
</body>

</html>