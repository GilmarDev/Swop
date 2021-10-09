
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>SWOP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script>

        $(document).ready(function() {

            function limpa_formulario_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
              
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");
                       

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                               
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulario_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulario_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulario_cep();
                }
            });
        });

    </script>
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
			<h1><a href="http://localhost/SWOP/index.php"><img src="images/swop_logo.png" width="200" alt="SWOP" /></a></h1>		</div>
	</div>
	<div id="menu-wrapper">
		<ul id="menu">
			<li><a href="index.php"><span>Homepage</span></a></li>
			<li><span>A Empresa</span>
				<ul>
					<li class="first"> <a href="telaQuemSomos.php">Quem somos</a> </li>
					<li> <a href="telaNossaMissao.php">Missão Visão Valores</a> </li>
				</ul>
			</li>
			<li class="current_page_item"><a href="telaTermoCadastro.php"><span>Cadastre-se</span></a></li>
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
                            
						<table width="877" border="0" align="center">
						   <tr>
						    <td width="150"><h3>E-mail*:</h3></td>
						    <td width="363"><input name="email" size="40" placeholder="Seu e-mail" autofocus=""></td>
					      </tr>
						  <tr>
						    <td><h3>Senha*:</h3></td>
						    <td><input name="senha" size="20" type="password" placeholder="Sua senha"></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Nome*:</h3></td>
						    <td width="363"><input name="nome" size="40" placeholder="Seu nome" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Tipo Logradouro*:</h3></td>
						    <td width="363">
							<select name="tipo_logradouro">
							<option value="Casa">Casa</option>
							<option value="Apartamento">Apartamento</option>
							<option value="Comercio">Comércio</option>
							<option value="Outros">Outros</option>
							</select>
							</td>
					      </tr>					  
						  <tr>
						    <td width="150"><h3>CEP*:</h3></td>
						    <td width="363"><input name="cep" type="text" id="cep" value="" size="10" maxlength="9" placeholder="00000-000" /></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Logradouro*:</h3></td>
						    <td width="363"><input name="logradouro" id="logradouro" size="50" placeholder="Seu edereço" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Número Residencial*:</h3></td>
						    <td width="363"><input name="numero_residencial" size="5" placeholder="Numero " autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Bairro*:</h3></td>
						    <td width="363"><input name="bairro" id="bairro" size="30" placeholder="Bairro" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Complemento*:</h3></td>
						    <td width="363"><input name="complemento" size="30" placeholder="Complemento Residencial" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Cidade*:</h3></td>
						    <td width="363"><input name="cidade" id="cidade" size="30" placeholder="Cidade" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Estado*:</h3></td>
						    <td width="363"><input name="estado" id="estado" size="10" placeholder="Estado" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Tipo Telefone1*:</h3></td>
						    <td width="363">
							<select name="tipo_telefone1">
							<option value="Casa">Residencial</option>
							<option value="Comercial">Comercial</option>
							<option value="Celular">Celular</option>
							</select>
							</td>
					      </tr>	
						  <tr>
						    <td width="150"><h3>Telefone1*:</h3></td>
						    <td width="363"><input name="telefone1" size="20" placeholder="(00)00000-0000" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"><h3>Tipo Telefone2*:</h3></td>
						    <td width="363">
							<select name="tipo_telefone2">
							<option value="Casa">Residencial</option>
							<option value="Comercial">Comercial</option>
							<option value="Celular">Celular</option>
							</select>
							</td>
					      </tr>	
						  <tr>
						    <td width="150"><h3>Telefone2*:</h3></td>
						    <td width="363"><input name="telefone2" size="20" placeholder="(00)00000-0000" autofocus=""></td>
					      </tr>
						  <tr>
						    <td width="150"></td>
						    <td width="363"></td>
					      </tr>
						  <tr>
						    <td width="150"></td>
						    <td width="363"></td>
					      </tr>
						  <tr>
						    <td width="150"></td>
						    <td width="363"></td>
					      </tr>
						  <tr>
						    <td width="150"></td>
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

                    