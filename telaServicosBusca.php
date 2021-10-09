<?php

session_start();
include('verifica_login.php');

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT de.id_usuario2, sf.id_usuario, so.nome, so.email, so.cidade, so.estado, sf.id_servico1, de.id_servico2, sf.servico_oferecido, de.servico_desejado, sf.categoria_servico_oferecido 
FROM usuarios as so 
INNER JOIN servico_desejado as de on so.id_usuario = de.id_usuario2 
INNER JOIN servico_oferecido as sf on so.id_usuario = sf.id_usuario 
WHERE so.email<>'".$_SESSION['email']."' AND sf.status_servico_oferecido='1' AND de.status_servico_desejado='1' GROUP BY servico_oferecido";

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>SWOP</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="mainnnnn.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>SWOP</title>
<link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.slidertron-1.0.js"></script>
<script type="text/javascript" src="jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="jquery.poptrox-1.0.js"></script>
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
			<h1><a href="http://localhost/SWOP/index.php"><img src="images/swop_logo.png" width="200" alt="SWOP" /></a></h1>		</div>
	</div>
	<div id="menu-wrapper">
		<ul id="menu">
			<li><a href="index.php"><span>Homepage</span></a></li>
					<li><a href="telaServicosOferecidos.php"><span>Serviços a Ofertar</span></a></li>
					<li><a href="telaServicosDesejados.php"><span>Serviços Desejado</span></a></li>
			<li class="current_page_item"><a href="telaServicosBusca.php"><span>Buscar Escambo</span></a></li>
			<li><a href="telaServicosEscambo.php"><span>Meus Escambo</span></a></li>
		</ul>
		<script type="text/javascript">
			$('#menu').dropotron();
		</script>
	</div>
	<div id="pages">
		<div id="contents">
			
			</script>
				<script type="text/javascript">
				$('#gallery').poptrox({
					overlayColor: '#222222',
					overlayOpacity: 0.75,
					popupCloserBackgroundColor: '#560969',
					popupBackgroundColor: '#FFFFFF',
					popupTextColor: '#aaaaaa',
					popupPadding: 20
				});
			</script>
				<div class="post"><br><br>
  
    </div>    
    <br>  
				<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <td style="display:none;">Número do Serviço</th>
								<th>Nome</th>
                                <th>Serviço Oferecido</th>
                                <th>Área de atuação</th>  
								<th>Serviço de Troca</th>
								<th>Cidade</th>
								<th>Estado</th>
								<td style="display:none;"></th>
								<td style="display:none;"></th>
								<td style="display:none;"></th>
								<th>Ações</th>								
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td style="display:none;"><?php echo $dat['id_servico1'] ?></td>
								<td><?php echo $dat['nome'] ?></td>
                                <td><?php echo $dat['servico_oferecido'] ?></td>
                                <td><?php echo $dat['categoria_servico_oferecido'] ?></td>       
								<td><?php echo $dat['servico_desejado'] ?></td>
								<td><?php echo $dat['cidade'] ?></td>
								<td><?php echo $dat['estado'] ?></td>
								<td style="display:none;"><?php echo $dat['id_servico2'] ?></td>
								<td style="display:none;"><?php echo $dat['id_usuario'] ?></td>
								<td style="display:none;"><?php echo $dat['id_usuario2'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

        <!-- <form id = "" action="cadastrarServicoOferecido.php" method="post"> --> 
		       <!--   <form action="cadastrarServicoEscambo.php" target="_blank" method="POST">  --> 
		<form id="formPersonas"> 

            <div class="modal-body">
			
			 <div class="form-group">
                <label for="id_servico1" class="col-form-label"></label>
                <input type="hidden" class="form-control" name="id_servico1" id="id_servico1" value="<?php echo $dat['id_servico1'] ?>">
                </div>
				
				<div class="form-group">
                <label for="nome" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dat['nome'] ?>">
                </div>
				
                <div class="form-group">
                <label for="servico_oferecido" class="col-form-label">Serviço Oferecido:</label>
                <input type="text" class="form-control" name="servico_oferecido" id="servico_oferecido" value="<?php echo $dat['servico_oferecido'] ?>">
                </div>
				
                <div class="form-group">
                <label for="categoria_servico_oferecido" class="col-form-label">Área de atuação Serviço Oferecido:</label>
                <input type="text" class="form-control" name="categoria_servico_oferecido" id="categoria_servico_oferecido" value="<?php echo $dat['categoria_servico_oferecido'] ?>">
                </div>    

 <div class="form-group">
                <label for="servico_desejado" class="col-form-label">Serviço de Troca:</label>
                <input type="text" class="form-control" name="servico_desejado" id="servico_desejado" value="<?php echo $dat['servico_desejado'] ?>">
                </div> 

 <div class="form-group">
                <label for="cidade" class="col-form-label">Cidade:</label>
                <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $dat['cidade'] ?>">
                </div> 

 <div class="form-group">
                <label for="estado" class="col-form-label">Estado:</label>
                <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $dat['estado'] ?>">
                </div> 

 <div class="form-group">
                <label for="id_servico2" class="col-form-label"></label>
                <input type="hidden" class="form-control" name="id_servico2" id="id_servico2" value="<?php echo $dat['id_servico2'] ?>">
                </div> 
				
				 <div class="form-group">
                <label for="id_usuario" class="col-form-label"></label>
                <input type="hidden" class="form-control" name="id_usuario" id="id_usuario" value="<?php echo $dat['id_usuario'] ?>">
                </div> 
				
				 <div class="form-group">
                <label for="id_usuario2" class="col-form-label"></label>
                  <input type="hidden" class="form-control" name="id_usuario2" id="id_usuario2" value="<?php echo $dat['id_usuario2'] ?>">
                </div> 
				
				
                <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <input type="submit" id="btnGuardar" class="btn btn-dark" value="Guardar">
            </div>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="mainnnnn.js"></script>  
    
    
  </body>
</html>


                    