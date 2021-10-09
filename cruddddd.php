<?php

session_start();
include("conexao.php");

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$id_servico1 = mysqli_real_escape_string($conexao, trim($_POST['id_servico1']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$servico_oferecido = mysqli_real_escape_string($conexao, trim($_POST['servico_oferecido']));
$categoria_servico_oferecido = mysqli_real_escape_string($conexao, trim($_POST['categoria_servico_oferecido']));
$servico_desejado = mysqli_real_escape_string($conexao, trim($_POST['servico_desejado']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$id_servico2 = mysqli_real_escape_string($conexao, trim($_POST['id_servico2']));
$id_usuario = mysqli_real_escape_string($conexao, trim($_POST['id_usuario']));
$id_usuario2 = mysqli_real_escape_string($conexao, trim($_POST['id_usuario2']));

$mysqli = new mysqli('127.0.0.1', 'root', '', 'swop');

$sql2 = "select id_usuario from usuarios where email='".$_SESSION['email']."';";

$result = mysqli_query($conexao, $sql2);
$row = mysqli_fetch_assoc($result);

echo $row['id_usuario'];

// Recepción de los datos enviados mediante POST desde el JS   
$id_servico1 = (isset($_POST['id_servico1'])) ? $_POST['id_servico1'] : '';
$nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$servico_oferecido = (isset($_POST['servico_oferecido'])) ? $_POST['servico_oferecido'] : '';
$categoria_servico_oferecido = (isset($_POST['categoria_servico_oferecido'])) ? $_POST['categoria_servico_oferecido'] : '';
$servico_desejado = (isset($_POST['servico_desejado'])) ? $_POST['servico_desejado'] : '';
$cidade = (isset($_POST['cidade'])) ? $_POST['cidade'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
$id_servico2 = (isset($_POST['id_servico2'])) ? $_POST['id_servico2'] : '';
$id_usuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';
$id_usuario2 = (isset($_POST['id_usuario2'])) ? $_POST['id_usuario2'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1: //alta

        $consulta = "INSERT INTO servico_oferecido (servico_oferecido, id_usuario, categoria_servico_oferecido, status_servico_oferecido) VALUES('$servico_oferecido', ".$row['id_usuario'].", '$categoria_servico_oferecido', '1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_servico1, id_servico2, servico_oferecido, categoria_servico_oferecido FROM servico_oferecido WHERE id_servico1='$id_servico1' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
		
case 2: //modificación
        $consulta = "INSERT INTO tb_escambo_swop (id_servico1, id_servico2, id_usuario1, id_usuario2, data_cadastro_site, status_escambo_swop) VALUES ('$id_servico1', '$id_servico2', ".$row['id_usuario'].", '$id_usuario2', now(), '1') ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT de.id_usuario2, sf.id_usuario, so.nome, so.email, so.cidade, so.estado, os.telefone, sf.id_servico1, de.id_servico2, sf.servico_oferecido, de.servico_desejado, sf.categoria_servico_oferecido 
FROM usuarios as so 
INNER JOIN telefone as os 
INNER JOIN servico_desejado as de on so.id_usuario = os.id_usuario and so.id_usuario <> de.id_usuario2
INNER JOIN servico_oferecido as sf on so.id_usuario = os.id_usuario and so.id_usuario = sf.id_usuario WHERE so.email<>'".$_SESSION['email']."' AND sf.status_servico_oferecido='1' AND de.status_servico_desejado='1' GROUP BY servico_oferecido";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;             
    case 3://baja
        $consulta = "UPDATE servico_oferecido SET status_servico_oferecido='0' WHERE id_servico1='$id_servico1' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  

        $consulta = "SELECT id_servico1, servico_oferecido, categoria_servico_oferecido FROM servico_oferecido WHERE id_servico1='$id_servico1' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);		
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
