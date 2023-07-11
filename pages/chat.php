<div class="mainContent" id="mainContent">
    <?php
    //Verificar se o ticket foi definido.
    if (!isset($_POST['ticketId'])) {
        $errorMsg = 'Você não tem permissão para acessar esse recurso.';
        frontend::handleErrors($errorMsg);
    }

    $ticketIDGerado = true;

    //Recuperando o id do ticket.
    $ticketId = (isset($_GET['ticketId']) ? $_GET['ticketId'] : $_POST['ticketId']);
    //Pegando dados do ticket para utilizar ao longo da página
    $requestTicket = ticket::requestSingleTicketLeftJoined($ticketId);

    //Verificando se a requisição teve sucesso
    if (!$requestTicket) {
        $errorMsg = 'Esse ticket não existe.';
        frontend::handleErrors($errorMsg);
    }

    //Instanciando ticket único da página, também dados adicionais a serem usados posteriormente
    $singleTicket = new ticket($requestTicket['tkt_id'], $requestTicket['tkt_id_nfe'], $requestTicket['tkt_id_autor'], $requestTicket['autor_nome'], $requestTicket['tkt_conteudo'], $requestTicket['tkt_destinatario'], $requestTicket['tkt_visualizador'], $requestTicket['tkt_arquivo'], $requestTicket['tkt_finalizado'], $requestTicket['tkt_id_finalizador'], $requestTicket['finalizador_nome'], $requestTicket['tkt_data_criacao']);
    $sessionId = $_SESSION['id'];
    $finalizado = ($singleTicket->getFinalizado() ? true : false);
    ?>
    <header class="dividedHeader">
        <h1><i class="fa-solid fa-ticket"></i>
            Ticket
        </h1>
        <div class="headerDescription">
            <p>
                "
                <?php echo $singleTicket->getConteudo(); ?>" <br> - <b>
                    <?php echo ($singleTicket->getNomeAutor() ? $singleTicket->getNomeAutor() : 'Destinatário'); ?>
                </b>
            <p>
        </div>
    </header>
    <div id="noMessageAlert" style="position:relative;top:110px;">
        <?php echo frontend::alert('comment', 'dark', 'Ainda não foi trocada nenhuma mensagem, <b>diga olá!</b>'); ?>
    </div>
    <div style="height: 120px;"></div>
    <ul id="messagesList">
        <!--<li class="+ class +">
            <div class="msgBubble">
                <span class="msgSender">
                </span>
                <span class="msgDatetime">
                </span>
            </div>
        </li>-->
    </ul>
    <div style="clear:both;"></div>
    <div style="height: 120px;"></div>
    <div id="spacingFinish" style="height: 50px;"></div>

    <div class="senderForm">

        <?php if ($singleTicket->getFinalizado()) { ?>
            <div id="finishedMessageAlert">
                <?php echo frontend::alert('comment-slash', 'success', 'Essa conversa foi finalizada por <b>' . $singleTicket->getNomeFinalizador() . '.</b>'); ?>
            </div>
        <?php } ?>

        <form method="POST" id="msgForm">

            <textarea name="msgContent" id="msgContent"
                placeholder=" <?php echo ($finalizado ? 'Essa conversa já foi finalizada.' : 'Escreva uma mensagem!'); ?>"
                <?php echo ($finalizado ? 'disabled' : ''); ?>></textarea>

            <button type="submit" name='sendMsg'
                class="<?php echo ($finalizado ? 'sendMsgBtnDisabled' : 'sendMsgBtn'); ?>"><i
                    class="fa-solid fa-paper-plane"></i></button>

            <input type="hidden" id="ticketId" value="<?php echo $ticketId; ?>"></input>

            <input type="hidden" id="sessionNome" value="<?php echo $sessionId; ?>"></input>

            <?php if (!$finalizado && $_SESSION['id'] != 1) { ?>
                <button type="button" class="btn btnFinish" data-toggle="modal" data-target="#modalExemplo">
                    <i class="fa-solid fa-comment-slash"></i>
                </button>
            <?php } ?>

        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade modalTicket" id="modalExemplo" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Finalizar a conversa?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Você não poderá reabrí-la depois disso.
                </div>
                <div class="modal-footer">
                    <form method="POST">
                        <input type="hidden" id="sessionNome" name='ticketId' value="<?php echo $_POST['ticketId']; ?>"></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" name='finishTicket'>Sim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_POST['finishTicket'])) {
    $singleTicket->finishTicket($singleTicket->getId(), $sessionId);
} ?>

<script>
    getMessages();

    //Scroll para baixo onLoad
    var n = $(document).height();
    $('html, body').animate({
        scrollTop: n
    }, 50);

    //Scroll para baixo onLoad
    $(document).ready(function () {
        // Rola a página até o final
        $('body', 'html').scrollTop($(document).height());
    });

    //Tecla enter envia mensagem
    $('#msgContent').keypress(function (e) {
        if (e.which == 13) {
            $('form#msgForm').submit();
            return false;
        }
    });

    //Tratamento de envio de mensagem
    $('#msgForm').submit(function (e) {
        //Requerir mensagens instataneamente quando o envio é feito
        getMessages();
        //Desabilitar comportamento padrão de formulário php
        e.preventDefault();
        //Recuperando dados do formulário
        var msg_content = $('#msgContent').val();
        var ticket_id = $('#ticketId').val();
        var session_nome = $('#sessionNome').val();

        //Enviando requisição ajax
        $.ajax({
            url: 'insertMessage.php',
            method: 'POST',
            dataType: 'json',
            data: {
                msg_content: msg_content,
                ticket_id: ticket_id,
                session_nome: session_nome
            }
        }).done(function (result) {
            $('#msgContent').val('');
            getMessages();
            //Descer tela para baixo
            var n = $(document).height();
            $('html, body').animate({
                scrollTop: n
            }, 50);
        });
    });

    function getMessages() {
        //Recuperando dados do formulário
        var ticket_id = $('#ticketId').val();
        var session_id = $('#sessionNome').val();
        var fromWho = '';
        var list = $('#messagesList');
        //Enviando requisição ajax
        $.ajax({
            url: 'getMessage.php',
            method: 'GET',
            dataType: 'json',
            data: {
                ticket_id: ticket_id
            }
        }).done(function (result) {
            //Limpando a UL com as mensagens para evitar duplicações
            list.html('');
            //Percorrendo as mensagens
            for (var i = 0; i < result.length; i++) {
                //Se o id do remetente for igual o id da sessão, o componente de mensagem terá frontend de remetente, e vice-versa
                if (result[i].msg_from == session_id) {
                    fromWho = 'me'; //"Remetente sou eu"
                } else {
                    fromWho = 'him'; //"Remetente não sou eu"
                }
                //Pulando mensagens indefinidas e vazias
                if (result[i].msg_content == undefined || result[i].msg_content == '') {
                    continue;
                }

                if (result.length === 0) {
                    $('#noMessageAlert').show(); // Exibe a div específica para chat vazio
                } else {
                    $('#noMessageAlert').hide(); // Oculta a div específica caso haja mensagens
                }
                //Por fim, adicionando a nova mensagem à lista (após limpá-la e verifica o tipo de mensagem acima)
                list.prepend('<li class="' + fromWho + '"><div class="msgBubble"><span class="msgSender">' + result[
                    i].log_nome + '</span> ' + result[i].msg_content + ' <span class="msgDatetime">' +
                    result[i].msg_data_criacao + '</span></div></li>');
            }
        });
    }

    //Recuperando mensagens a cada 700ms
    setInterval(getMessages, 700);
</script>