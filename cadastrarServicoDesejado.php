<?php
session_start();
include("conexao.php");

$categoria_servico_oferecido = mysqli_real_escape_string($conexao, trim($_POST['categoria_servico_oferecido']));
$servico_oferecido = mysqli_real_escape_string($conexao, trim($_POST['servico_oferecido']));


$mysqli = new mysqli('127.0.0.1', 'root', '', 'swop');

$sql2 = "select id_usuario from usuarios where email='".$_SESSION['email']."';";

$result = mysqli_query($conexao, $sql2);
$row = mysqli_fetch_assoc($result);

echo $row['id_usuario'];

/*$stmt = $mysqli->prepare($sql2);

$stmt->execute();

$resultado = $stmt->get_result();*/


$sql = "INSERT INTO swop.servico_oferecido (servico_oferecido, id_usuario, categoria_servico_oferecido, status_servico_oferecido)
VALUES ('$servico_oferecido', '".$row['id_usuario']."', '$categoria_servico_oferecido', '1')";



if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: painel.php');
exit;
?>