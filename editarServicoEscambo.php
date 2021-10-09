<?php

session_start();
include("conexao.php");
include('verifica_login.php');

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id_escambo_swop = mysqli_real_escape_string($conexao, trim($_POST['id_escambo_swop']));
$servico_oferecido = mysqli_real_escape_string($conexao, trim($_POST['servico_oferecido']));
$data_entrega_servico1 = mysqli_real_escape_string($conexao, trim($_POST['data_entrega_servico1']));
$servico_desejado = mysqli_real_escape_string($conexao, trim($_POST['servico_desejado']));
$data_entrega_servico2 = mysqli_real_escape_string($conexao, trim($_POST['data_entrega_servico2']));
$feedback_servico1 = mysqli_real_escape_string($conexao, trim($_POST['feedback_servico1']));
$nota_servico_prestado = mysqli_real_escape_string($conexao, trim($_POST['nota_servico_prestado']));
$id_servico1 = mysqli_real_escape_string($conexao, trim($_POST['id_servico1']));
$id_servico2 = mysqli_real_escape_string($conexao, trim($_POST['id_servico2']));
$id_usuario1 = mysqli_real_escape_string($conexao, trim($_POST['id_usuario1']));
$id_usuario2 = mysqli_real_escape_string($conexao, trim($_POST['id_usuario2']));

$mysqli = new mysqli('127.0.0.1', 'root', '', 'swop');

$sql2 = "select id_usuario from usuarios where email='".$_SESSION['email']."';";

$result = mysqli_query($conexao, $sql2);
$row = mysqli_fetch_assoc($result);

echo $row['id_usuario'];

/*$stmt = $mysqli->prepare($sql2);

$stmt->execute();

$resultado = $stmt->get_result();*/


$sql ="UPDATE tb_escambo_swop SET data_entrega_servico1='$data_entrega_servico1', data_entrega_servico2='$data_entrega_servico2', feedback_servico1='$feedback_servico1', nota_servico_prestado='$nota_servico_prestado' WHERE id_escambo_swop='$id_escambo_swop' ";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: painel.php');
exit;
?>