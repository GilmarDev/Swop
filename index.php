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
			<h1><a href="http://localhost/SWOP/index.php"><img src="images/swop_logo.png" width="200" alt="SWOP" /></a></h1>		</div>
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
			<li><a href="telaTermoCadastro.php""><span>Cadastre-se</span></a></li>
			<li><a href="telaLogin.php"><span>login</span></a></li>
		</ul>
		<script type="text/javascript">
			$('#menu').dropotron();
		</script>
	</div>
	
	<div id="page">
		<div id="content">
			<div class="contentbg">
				<div id="slider">
					<div class="viewer">
						<div class="reel">
							<div id="gallery">
								<div class="slide"> <a href="images/1.png"><img src="images/1.png" width="600" height="300" alt="" /></a> </div>
								<div class="slide"> <a href="images/2.png"><img src="images/2.png" width="600" height="300" alt="" /></a> </div>
								<div class="slide"> <a href="images/3.png"><img src="images/3.png" width="600" height="300" alt="" /></a> </div>
								<div class="slide"> <a href="images/4.png"><img src="images/4.png" width="600" height="300" alt="" /></a> </div>							
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
				$('#slider').slidertron({
					viewerSelector: '.viewer',
					reelSelector: '.viewer .reel',
					slidesSelector: '.viewer .reel .slide',
					advanceDelay: 3000,
					speed: 'slow'
				});
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
					<h2 class="title">O Swop</h2>
					<div class="entry">
						<p>O Swop é uma plataforma online idealizada para a troca de serviços remotos. Aqui, você pode oferecer seus talentos e receber algum serviço escolhido. É uma oportunidade para aprender algo novo, adquirir experiência e conhecer pessoas – sem gastar nada por isso. <br><br>
Acreditamos que um projeto solidário pode ser a porta de entrada para o mercado de trabalho, afinal, a ideia surgiu em um momento de crise agravada pela pandemia da Covid-19. Todos precisamos nos adaptar aos serviços remotos, e o Swop dá espaço para todo tipo de serviço que possa ser realizado à distância, para que todos usufruam desta chave para o sucesso profissional.<br><br></p>
					</div>
				</div>
				<div class="post">
					<h2 class="title">Escambo 2.0</h2>
					
					<div class="entry">
						<p>Você já deve ter ouvido falar em “escambo”, que era a prática usada para obtenção de produtos e serviços antes da existência da moeda. Embora essa definição pareça distante de nós, a verdade é que trocas e concessões fazem parte da vida de quem busca ser razoável.
<br><br>A troca de serviços proposta pelo Swop é um modo de modernizar essa relação. O mercado de trabalho brasileiro tem sido cada vez mais rigoroso e restrito, de modo que muitos não têm experiência porque não tem emprego e não têm emprego porque não têm experiência. Seria interessante que os talentos dos jovens circulassem entre mais pessoas que acreditam em uma economia solidária, que não demanda dinheiro para acessar este tipo de troca!
<br><br></p>
					</div>
				</div>
				
			</div>
		</div>
		<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
					<li>
						<h2>Ofereça seus serviços</h2>
						<p>Compartilhe suas habilidades e pratique o que gosta. Assim, você ajuda alguém e ganha experiência de verdade! <br></p>
					</li>
					<li>
						<h2>Prestação de Serviços</h2>
						<p>Encontre o serviço que você precisa em nosso site sem pagar nada!<br></p>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<br><br><br><br><br><br><br><br><br><br><br><br>
					</li>
					
				</ul>
			</div>
		</div>
		<div style="clear: both;">&nbsp;</div>
	</div>
	
</div>

</body>
</html>
