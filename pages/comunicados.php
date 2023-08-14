<div class="mainContent">
    <header>
        <div>
            <i class="fa-solid fa-comment"></i>
            <h1>
                Comunicados<span></span>
            </h1>
        </div>
    </header>

    <?php

    $errorMsg = "Você não tem permissão para usar esse recurso.";
    acesso::verifyAppliedAccess($_SESSION['id'], 8) ? null : include('error.php');

    if (isset($_POST['sendAnnouncementBtn'])) {
        notificator::sendAnnouncement($_SESSION['nome'], $_POST['title'], $_POST['content']);
        logFeeder::log($_SESSION['id'], 'Abertura de comunicado');
        echo frontend::alert('comment', 'success', 'Comunicado enviado!');
    }
    ?>


    <div class="contentBox hidden" style="background: #fff; flex-direction:column !important;">
        <div class="contentBoxHeader">
            <div class="contentBoxTitle"><i class="fa-solid fa-comment"></i>
                <h1>Adicionar comunicado<span></span></h1>
                <!--p>Adicione uma mensagem para todos os usuários do sistema verem.</p-->
            </div>
        </div>
        <div>
            <form class="announceForm" method="POST" name="sendAnnouncement">
                <i class="fa-solid fa-quote-left"></i>
                <div class="form-group"> 
                    <label for="inputNome">Título</label><br>
                    <input class="form-control" placeholder="Assunto" id="newNome" type="text" required name="title">
                </div>
                <div class=" form-group">
                    <label for="inputNome">Mensagem</label><br>
                    <textarea class="form-control" placeholder="Diga algo!" id="newEmail" type="text" required name="content"></textarea>
                </div>
                <button id="sendNewUser" type="submit" name="sendAnnouncementBtn" class="btn btn-secondary">Enviar</button>
                <i class="fa-solid fa-quote-right"></i>
            </form>
            <habib>
                
            </habib>
        </div>
    </div>
</div>