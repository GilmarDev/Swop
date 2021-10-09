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
			<h1><a href="http://localhost/SWOP/index.php"><img src="images/logo-transparente.png" width="200" height="200" alt="SWOP" /></a></h1>
			</div>
		</div>
	</div>
	<div id="menu-wrapper">
		<ul id="menu">
			<li class="current_page_item"><a href="index.php"><span>Homepage</span></a></li>
			<li><span>A Empresa</span>
				<ul>
					<li class="first"> <a href="telaQuemSomos.php">Quem somos</a> </li>
					<li> <a href="telaNossaMissao.php">Missão Visão Valores</a> </li>
				</ul>
			</li>
			<li><a href="telaTermoCadastro.php"><span>Cadastre-se</span></a></li>
            <li><a href="telaServicosBusca.php"><span>Buscar Serviços</span></a></li>
			<li><a href="telaServicosOferecidos.php"><span>Oferecer Serviços</span></a></li>
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
include('conexao.php');



$email = mysqli_real_escape_string($conexao, $_POST['email']);


$query = "select senha from usuarios where email = '{$email}'";

$result = mysqli_query($conexao, $query);

$info = mysqli_fetch_assoc($result);

$row = mysqli_num_rows($result);




if($row == 1) {
	$email_bd = mysqli_fetch_assoc($result);

	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $result;
    $remetente = "robisantosgol@hotmail.com";
	
  
   
                $corpo_email  = "Ola, o procedimento de recuperar dados, foi efetuado com sucesso !\n..";
				$corpo_email .= "Seu email = ".$email."\n.. ";
                $corpo_email .= "Senha de acesso = ".$email_bd."\n..";
                $corpo_email .= "Nao responda esse email, e-Mail automatizado";     
			
				
                @mail($email,"Recuperacao de Senha",$corpo_email,$remetente);
                 
                echo "<div align=center><font size=10 face=Verdana, Arial, Helvetica, sans-serif>Sua senha foi enviada com sucesso para o email: $email.  $email_bd </font></div>";
     
                }else{
                    echo "<div align=center><font size=10 face=Verdana, Arial, Helvetica, sans-serif>Seu login ou email está incorreto.</font></div>";
                     }

  
?>


<br><br><br>
<h2 class="title" align="center"><a href="logout.php">Logout</a></h2>
					
					<div class="entry">
	


					</div>
				</div>				
			</div>
		</div>
</div>

</body>
</html>

                    