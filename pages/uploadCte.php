<div class="mainContent">
    <header>
        <h1><i class="fa-solid fa-upload"></i>
            Uploads
        </h1>
    </header>

    <?php acesso::verifyAppliedAccess($_SESSION['id'], 4) ? null : die('Você não tem permissão para acessar este recurso.'); ?>
    <?php
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $pastaDestino = 'C:/xampp/htdocs/nexpress/cteBank/';
        $nomeArquivo = $_FILES["file"]["name"];
        $caminhoCompleto = $pastaDestino . $nomeArquivo;

        if (file_exists($caminhoCompleto)) {
            echo frontend::alert('exclamation', 'warning', "O arquivo <b>'$nomeArquivo'</b> já existe no diretório.");
        } else {
            // Verifica se é um arquivo XML
            if ($_FILES["file"]["type"] === "application/xml" || $_FILES["file"]["type"] === "text/xml") {
                // Move o arquivo para a pasta de destino
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $caminhoCompleto)) {
                    // Arquivo enviado com sucesso
                    echo frontend::alert('check', 'success', 'XML enviado!');
                    // Chama a função para enviar o XML ao banco de dados
                    dataFeeder::sendXML();
                } else {
                    echo frontend::alert('times', 'danger', 'Erro ao enviar arquivo');
                }
            } else {
                echo frontend::alert('exclamation', 'warning', 'Formato de arquivo inválido, são somente aceitos arquivos XML.');
            }
        }
        dataFeeder::sendXML();
    } else {
        echo frontend::alert('times', 'danger', 'Erro:' . $_FILES["file"]["error"]);
    }

    ?>
    <div class="contentBox hidden" style="background: #fff;">
        <div class="contentBoxHeader">
            <h1 class="contentBoxTitle"><i class="fa-solid fa-upload"></i>Upload de CT-e</h1>
        </div>
        <div>
            <form method="POST" enctype="multipart/form-data" accept="application/xml, text/xml">
                <input type="file" name="file" id="arquivo"></input>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</div>