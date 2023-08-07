<?php 

require 'vendor/autoload.php';

// Crie um novo objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Defina o título do documento
$pdf->SetTitle('CT-e id');

// Adicione uma página
$pdf->AddPage();

// Escreva o conteúdo do PDF
$pdf->SetFont('times', 'B', 20);
$pdf->Cell(0, 10, 'CT-e', 0, 1, 'C');

// Defina o nome do arquivo de saída (opcional)
$nome_arquivo = 'exemplo.pdf';

// Gere o PDF no navegador para visualização
$pdf->Output($nome_arquivo, 'I');


?>