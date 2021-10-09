<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
			<h1><a href="http://localhost/SWOP/index.php"><img src="images/swop_logo.png" width="200" alt="SWOP" /></a></h1>				
			</div>
		</div>
	</div>
	<div id="menu-wrapper">
		<ul id="menu">
			<li class="current_page_item"><a href="index.php"><span>Homepage</span></a></li>
					<li><a href="telaServicosOferecidos.php"><span>Serviços a Ofertar</span></a></li>
					<li><a href="telaServicosDesejados.php"><span>Serviços Desejado</span></a></li>
			<li><a href="telaServicosBusca.php"><span>Buscar Escambo</span></a></li>
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
				<div class="post">
				
				<?php
session_start();
include('verifica_login.php');
?>

<h2 class="title" align="center">Olá, <?php echo $_SESSION['email'];?> use os botões na barra de menu para acessar o que deseja</h2><br><br><br>
<h2 class="title" align="center"><a href="logout.php">Logout</a></h2>
					
					<div class="entry">
	


					</div>
				</div>				
			</div>
		</div>
</div>

</body>
</html>

                    