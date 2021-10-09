<?php
session_start();
include("conexao.php");

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$tipo_logradouro = mysqli_real_escape_string($conexao, trim($_POST['tipo_logradouro']));
$logradouro = mysqli_real_escape_string($conexao, trim($_POST['logradouro']));
$numero_residencial = mysqli_real_escape_string($conexao, trim($_POST['numero_residencial']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$complemento = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$tipo_telefone1 = mysqli_real_escape_string($conexao, trim($_POST['tipo_telefone1']));
$telefone1 = mysqli_real_escape_string($conexao, trim($_POST['telefone1']));
$tipo_telefone2 = mysqli_real_escape_string($conexao, trim($_POST['tipo_telefone2']));
$telefone2 = mysqli_real_escape_string($conexao, trim($_POST['telefone2']));

$sql = "select count(*) as total from swop.usuarios where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: usuarioExistente.php');
	exit;
}

$sql = "INSERT INTO `usuarios` (`nome`, `email`, `senha`, `tipo_logradouro`, `logradouro`, `numero`, `estado`, `cidade`, `bairro`, `cep`, `complemento`, `telefone`, `tipo_telefone`, `telefone2`, `tipo_telefone2`, `data_cadastro`, `status_usuario`) VALUES ('$nome', '$email', '$senha', '$tipo_logradouro', '$logradouro', '$numero_residencial', '$estado', '$cidade', '$bairro', '$cep', '$complemento', '$telefone1', '$tipo_telefone1', '$telefone2', '$tipo_telefone2', 'NOW()', '1')";


if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: index.php');
exit;
?>