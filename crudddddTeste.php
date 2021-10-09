<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id_servico1 = (isset($_POST['id_servico1'])) ? $_POST['id_servico1'] : '';
$id_usuario1 = (isset($_POST['id_usuario1'])) ? $_POST['id_usuario1'] : '';
$id_servico2 = (isset($_POST['id_servico2'])) ? $_POST['id_servico2'] : '';
$id_usuario2 = (isset($_POST['id_usuario2'])) ? $_POST['id_usuario2'] : '';
$data_entrega_servico1 = (isset($_POST['data_entrega_servico1'])) ? $_POST['data_entrega_servico1'] : '';
$data_entrega_servico2 = (isset($_POST['data_entrega_servico2'])) ? $_POST['data_entrega_servico2'] : '';
$feedback_servico1 = (isset($_POST['feedback_servico1'])) ? $_POST['feedback_servico1'] : '';
$nota_servico_prestado = (isset($_POST['nota_servico_prestado'])) ? $_POST['nota_servico_prestado'] : '';
$nota_usuario = (isset($_POST['nota_usuario'])) ? $_POST['nota_usuario'] : '';
$feedback_servico2 = (isset($_POST['feedback_servico2'])) ? $_POST['feedback_servico2'] : '';
$data_cadastro_site = (isset($_POST['data_cadastro_site'])) ? $_POST['data_cadastro_site'] : '';
$status_escambo_swop = (isset($_POST['status_escambo_swop'])) ? $_POST['status_escambo_swop'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: //alta
	
        $consulta = "INSERT INTO servico_desejado (servico_desejado, categoria_servico_desejado) VALUES('$servico_desejado', '$categoria_servico_desejado')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_servico2, servico_desejado, categoria_servico_desejado FROM servico_desejado ORDER BY id_servico2 DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
		
    case 2: //modificación
		$consulta = "INSERT INTO tb_escambo_swop	(id_servico1, id_usuario1, id_servico2, id_usuario2, data_entrega_servico1, data_entrega_servico2, feedback_servico1, nota_servico_prestado, nota_usuario, feedback_servico2, data_cadastro_site, status_escambo_swop
    VALUES('$id_servico1', '$id_usuario1', '$id_servico2', '$id_usuario2', '$data_entrega_servico1', '$data_entrega_servico2', '$feedback_servico1,' '$nota_servico_prestado', '$nota_usuario', '$feedback_servico2', '$data_cadastro_site', '$status_escambo_swop')";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_servico2, servico_desejado, categoria_servico_desejado FROM servico_desejado WHERE id_servico2='$id_servico2' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM servico_desejado WHERE id_servico2='$id_servico2' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
