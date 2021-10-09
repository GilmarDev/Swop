	<?php
session_start();
include("conexao.php");

$id_servico1 = mysqli_real_escape_string($conexao, trim($_POST['id_servico1']));
$id_usuario = mysqli_real_escape_string($conexao, trim($_POST['id_usuario']));
$id_servico2 = mysqli_real_escape_string($conexao, trim($_POST['id_servico2']));
$id_usuario2 = mysqli_real_escape_string($conexao, trim($_POST['id_usuario2']));


$mysqli = new mysqli('127.0.0.1', 'root', '', 'swop');

$sql2 = "select id_usuario from usuarios where email='".$_SESSION['email']."';";

$result = mysqli_query($conexao, $sql2);
$row = mysqli_fetch_assoc($result);

echo $row['id_usuario'];

//$stmt = $mysqli->prepare($sql2);

//$stmt->execute();

//$resultado = $stmt->get_result();


$sql = "INSERT INTO swop.tb_escambo_swop (id_usuario1, id_servico1, id_usuario2, id_servico2, data_cadastro_site, status_escambo_swop) VALUES (".$row['id_usuario'].", '$id_servico1','$id_usuario2', '$id_servico2', now(), '1')";
//mysqli_query($conexao, $sql);


if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: telaServicosOferecidos.php');
exit;
?>