<?php

session_start();
include("conexao.php");

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$categoria_servico_desejado = mysqli_real_escape_string($conexao, trim($_POST['categoria_servico_desejado']));
$servico_desejado = mysqli_real_escape_string($conexao, trim($_POST['servico_desejado']));

$mysqli = new mysqli('127.0.0.1', 'root', '', 'swop');

$sql2 = "select id_usuario from usuarios where email='".$_SESSION['email']."';";

$result = mysqli_query($conexao, $sql2);
$row = mysqli_fetch_assoc($result);

echo $row['id_usuario'];

// Recepción de los datos enviados mediante POST desde el JS   

$servico_desejado = (isset($_POST['servico_desejado'])) ? $_POST['servico_desejado'] : '';
$categoria_servico_desejado = (isset($_POST['categoria_servico_desejado'])) ? $_POST['categoria_servico_desejado'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_servico2 = (isset($_POST['id_servico2'])) ? $_POST['id_servico2'] : '';

switch($opcion){
    case 1: //alta

        $consulta = "INSERT INTO servico_desejado (servico_desejado, id_usuario, id_usuario2, categoria_servico_desejado, status_servico_desejado) VALUES('$servico_desejado', ".$row['id_usuario'].", ".$row['id_usuario'].", '$categoria_servico_desejado', '1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_servico2, servico_desejado, categoria_servico_desejado FROM servico_desejado WHERE id_servico2='$id_servico2' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
		
case 2: //modificación
        $consulta = "UPDATE servico_desejado SET servico_desejado='$servico_desejado', categoria_servico_desejado='$categoria_servico_desejado' WHERE id_servico2='$id_servico2' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_servico2, servico_desejado, categoria_servico_desejado FROM servico_desejado WHERE id_servico2='$id_servico2' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;             
    case 3://baja
        $consulta = "UPDATE servico_desejado SET status_servico_desejado='0' WHERE id_servico2='$id_servico2' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  

        $consulta = "SELECT id_servico2, servico_desejado, categoria_servico_desejado FROM servico_desejado WHERE id_servico2='$id_servico2' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);		
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
