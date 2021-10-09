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
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));


$sql = "select count(*) as total from swop.usuarios where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: usuarioExistente.php');
	exit;
}

$sql = "INSERT INTO swop.usuarios (email, senha, nome, tipo_logradouro, logradouro, numero_residencial, bairro, complemento, cidade, estado, cep, telefone) VALUES ('$email', '$senha', '$nome', '$tipo_logradouro', '$logradouro', '$numero_residencial', '$bairro', '$complemento', '$cidade', '$estado', '$cep', '$telefone)";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: index.php');
exit;
?>