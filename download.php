<?php 
if (isset($_GET['file'])) {
    $pastaDestino = 'C:/xampp/htdocs/nexpress/cteBank/';
    $nomeArquivo = $_GET['file'];
    $caminhoCompleto = $pastaDestino . $nomeArquivo;

    if (file_exists($caminhoCompleto)) {
        // Define o cabeçalho para forçar o download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($caminhoCompleto));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($caminhoCompleto));
        readfile($caminhoCompleto);
        exit;
    } else {
        die("O arquivo não existe.");
    }
} else {
    die("Arquivo não especificado.");
}

?>