<?php

session_start();
include("conexao.php");

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$categoria_servico_oferecido = mysqli_real_escape_string($conexao, trim($_POST['categoria_servico_oferecido']));
$servico_oferecido = mysqli_real_escape_string($conexao, trim($_POST['servico_oferecido']));

$mysqli = new mysqli('127.0.0.1', 'root', '', 'swop');

$sql2 = "select id_usuario from usuarios where email='".$_SESSION['email']."';";

$result = mysqli_query($conexao, $sql2);
$row = mysqli_fetch_assoc($result);

echo $row['id_usuario'];

// Recepción de los datos enviados mediante POST desde el JS   

$servico_oferecido = (isset($_POST['servico_oferecido'])) ? $_POST['servico_oferecido'] : '';
$categoria_servico_oferecido = (isset($_POST['categoria_servico_oferecido'])) ? $_POST['categoria_servico_oferecido'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_servico1 = (isset($_POST['id_servico1'])) ? $_POST['id_servico1'] : '';

switch($opcion){
    case 1: //alta

        $consulta = "INSERT INTO servico_oferecido (servico_oferecido, id_usuario, categoria_servico_oferecido, status_servico_oferecido) VALUES('$servico_oferecido', ".$row['id_usuario'].", '$categoria_servico_oferecido', '1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_servico1, servico_oferecido, categoria_servico_oferecido FROM servico_oferecido WHERE id_servico1='$id_servico1' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
		
case 2: //modificación
        $consulta = "UPDATE servico_oferecido SET servico_oferecido='$servico_oferecido', categoria_servico_oferecido='$categoria_servico_oferecido' WHERE id_servico1='$id_servico1' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_servico1, servico_oferecido, categoria_servico_oferecido FROM servico_oferecido WHERE id_servico1='$id_servico1' ";       
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
