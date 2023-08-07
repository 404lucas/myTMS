<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "nexpress");

// Verificar erros na conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$userId = $_POST['session_id'];
$comunicadoId = $_POST['com_id'];
// Consulta para contar notificações não lidas
$sql = "INSERT INTO `tb_comunicado_readings`(`com_id`, `id_login`, `id_comunicado`) VALUES (NULL,'$userId','$comunicadoId')";
$result = $conn->query($sql);

$sql = "SELECT COUNT(*) AS total FROM `tb_comunicado_readings` WHERE `id_login` = '$userId' AND `id_comunicado` = '$comunicadoId'";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    if ($row == 0) {
        $sql = "SELECT COUNT(*) AS total FROM `tb_comunicado_readings` WHERE `id_login` = '$userId' AND `id_comunicado` = '$comunicadoId'";
        $result = $conn->query($sql);
        echo 'boa';
    }else{
        echo 'Já lido';
    }
}
$conn->close();
