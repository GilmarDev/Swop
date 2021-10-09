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
<script type="text/javascript" src="jquery.dropotron-1.0.js"></script>

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
			<li><span>A Empresa</span>
				<ul>
					<li class="first"> <a href="telaQuemSomos.php">Quem somos</a> </li>
					<li> <a href="telaNossaMissao.php">Missão Visão Valores</a> </li>
				</ul>
			</li>
			<li><a href="telaTermoCadastro.php"><span>Cadastre-se</span></a></li>
			<li><a href="telaLogin.php"><span>login</span></a></li>
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
					<h2 class="title" align="center">Cadastro de Usuário</h2>
					<div class="entry">
	

                         <form action="cadastrar.php" method="POST">
                            
						<table width="377" border="0" align="center">
						  <tr>
						    <td width="204"><h3>E-mail:</h3></td>
						    <td width="363"><input name="email" name="text" size="40" class="input is-large" placeholder="Seu e-mail" autofocus=""></td>
					      </tr>
						  <tr>
						    <td><h3>Senha:</h3></td>
						    <td><input name="senha" size="20" class="input is-large" type="password" placeholder="Sua senha"></td>
					      </tr>
						  <tr>
						    <td width="204"><h3>Nome:</h3></td>
						    <td width="363"><input name="nome" name="text" size="40" class="input is-large" placeholder="Seu nome" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="204"><h3>Tipo Endereço:</h3></td>
						    <td width="363">
							<select name="tipoendereco">
							<option value="Casa">Casa</option>
							<option value="Apartamento">Apartamento</option>
							<option value="Comercio">Comércio</option>
							<option value="Outros">Outros</option>
							</select>
							</td>
					      </tr>
						  <tr>
						    <td width="204"><h3>Logradouro:</h3></td>
						    <td width="363"><input name="logradouro" name="text" size="40" class="input is-large" placeholder="Seu edereço" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="204"><h3>Número:</h3></td>
						    <td width="363"><input name="numeroresidencia" name="text" size="5" class="input is-large" placeholder="Número " autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="204"><h3>Bairro:</h3></td>
						    <td width="363"><input name="bairro" name="text" size="30" class="input is-large" placeholder="Bairro" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="204"><h3>Complemento:</h3></td>
						    <td width="363"><input name="complemento" name="text" size="30" class="input is-large" placeholder="Complemento Residência" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="204"><h3>Municipio:</h3></td>
						    <td width="363"><input name="municipio" name="text" size="30" class="input is-large" placeholder="Municipio" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="204"><h3>CEP:</h3></td>
						    <td width="363"><input name="cep" name="text" size="20" class="input is-large" placeholder="Seu CEP" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="204"><h3>Telefone:</h3></td>
						    <td width="363"><input name="telefone" name="text" size="20" class="input is-large" placeholder="Seu telefone" autofocus=""></td>
					      </tr>

						  <tr>
						    <td width="204"></td>
						    <td width="363"></td>
					      </tr>
						  <tr>
						    <td width="204"></td>
						    <td width="363"></td>
					      </tr>
						  <tr>
						    <td width="204"></td>
						    <td width="363"></td>
					      </tr>
						  <tr>
						    <td width="204"></td>
						    <td width="363"></td>
					      </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td><button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
          <input type= "reset" name = "limpar" value="Limpar" /></td>
					      </tr>
					  </table>
					 
                      </form>

					</div>
				</div>				
			</div>
		</div>
</div>

</body>
</html>

                    