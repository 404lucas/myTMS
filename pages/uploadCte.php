<div class="mainContent">
    <header>
        <div>
            <i class="fa-solid fa-upload"></i>
            <h1>
                Uploads
            </h1>
        </div>
    </header>

    <?php $errorMsg = 'Você não tem permissão para acessar esse recurso.';
    acesso::verifyAppliedAccess($_SESSION['id'], 4) ? null : include('error.php');

    $pastaDestino = 'C:/xampp/htdocs/nexpress/cteBank/';
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
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
                } else {
                    echo frontend::alert('times', 'danger', 'Erro ao enviar arquivo');
                }
            } else {
                echo frontend::alert('exclamation', 'warning', 'Formato de arquivo inválido, são somente aceitos arquivos XML.');
            }
        }
        dataFeeder::sendXML();
    }

    ?>
    <div class="contentBox hidden" style="background: #fff;">
        <div class="contentBoxHeader">
            <div class="contentBoxTitle"><i class="fa-solid fa-upload"></i>
                <h1>Upload de CT-e</h1>
            </div>
        </div>
        <div>
            <form class="d-flex flex-column align-items-start" method="POST" enctype="multipart/form-data" accept="application/xml, text/xml">
                <span class="badge badge-pill">Só são aceitos arquivos .XML</span>
                <input type="file" name="file" id="arquivo" class="btn btn-outline-secondary btn-block"></input>
                <button class="btn btn-dark btn-block" type="submit" value="Enviar">Enviar</button>
            </form>
        </div>
    </div>
</div>