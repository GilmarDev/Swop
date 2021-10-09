<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$servico_oferecido = (isset($_POST['servico_oferecido'])) ? $_POST['servico_oferecido'] : '';
$categoria_servico_oferecido = (isset($_POST['categoria_servico_oferecido'])) ? $_POST['categoria_servico_oferecido'] : '';
$nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$cidade = (isset($_POST['cidade'])) ? $_POST['cidade'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_servico1 = (isset($_POST['id_servico1'])) ? $_POST['id_servico1'] : '';

switch($opcion){
    case 1: //alta
	
        $consulta = "INSERT INTO servico_oferecido (servico_oferecido, categoria_servico_oferecido) VALUES('$servico_oferecido', '$categoria_servico_oferecido') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_servico1, servico_oferecido, categoria_servico_oferecido FROM servico_oferecido ORDER BY id_servico1 DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
		
    case 2: //modificación
        $consulta = "INSERT INTO (nome, email, cidade, estado, telefone, id_servico1, servico_oferecido, categoria_servico_oferecido FROM usuarios as so INNER JOIN telefone as os INNER JOIN servico_oferecido as of on so.id_usuario = os.id_usuario and so.id_usuario = of.id_usuario WHERE id_servico1='$id_servico1'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
		$consulta = "SELECT nome, email, cidade, estado, telefone, id_servico1, servico_oferecido, categoria_servico_oferecido FROM usuarios as so INNER JOIN telefone as os INNER JOIN servico_oferecido as of on so.id_usuario = os.id_usuario and so.id_usuario = of.id_usuario WHERE email='".$_SESSION['email']."'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
      
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
