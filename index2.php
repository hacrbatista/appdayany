<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../css/cadastro.css">
		<script type="text/javascript" src="../js/script.js"></script>
		<title>Cadastro</title>
	</head>
	<body>
		<div class="topo">
			<img src="../img/logo1.png" />
			<div class="home" onclick="homeprod()">HOME</div>
		</div>
		<div class="corpo">
			<?php
				require 'config.php';
					if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
						$nome = addslashes($_POST['nome']);
						$email = addslashes($_POST['email']);
						$senha = md5(addslashes($_POST['senha']));
						$endereco = addslashes($_POST['endereco']);
						$bairro = addslashes($_POST['bairro']);
						$cidade = addslashes($_POST['cidade']);
						$estado = addslashes($_POST['estado']);
						$cep = addslashes($_POST['cep']);
						$sql = "INSERT INTO cadastro SET nome = '$nome', email = '$email', senha = '$senha', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep'";
						$pdo->query($sql);
						header("Location: site.html");		
					}
			?>
			<div class="tituloform">PREENCHA TODOS OS CAMPOS</div>
				<div class="formulario">
					<form method="POST">
						<div class="centra">
							Nome completo<br/>
								<input type="text" name="nome" class="nome" required/><br/><br/>
	
							E-mail<br/>
								<input type="email" name="email" class="email" required/><br/><br/>
						
							Senha<br/>
								<input type="password" name="senha" required/><br/><br/>
						
							Endereço com número<br/>
								<input type="text" name="endereço" required/><br/><br/>
							Bairro<br/>
								<input type="text" name="bairro" required/><br/><br/>
						
							Cidade<br/>
								<input type="text" name="cidade" required/><br/><br/>
					
							Estado<br/>
								<select name="estado" class="estado" required>
									<option selected ="" value=""> Selecione </option>
									<option value="AC"> Acre </option>
									<option value="AL"> Alagoas </option>
									<option value="AP"> Amapá </option>
									<option value="AM"> Amazonas </option>
									<option value="BA"> Bahia </option>
									<option value="CE"> Ceará </option>
									<option value="DF"> Distrito Federal </option>
									<option value="ES"> Espírito Santo </option>
									<option value="GO"> Goiás </option>
									<option value="MA"> Maranhão </option>
									<option value="MT"> Mato Grosso </option>
									<option value="MS"> Mato Grosso do Sul</option>
									<option value="MG"> Minas Gerais </option>
									<option value="PA"> Pará </option>
									<option value="PB"> Paraíba </option>
									<option value="PR"> Paraná </option>
									<option value="PE"> Pernambuco </option>
									<option value="PI"> Piauí </option>
									<option value="RJ"> Rio de Janeiro </option>
									<option value="RN"> Rio Grande do Norte </option>
									<option value="RS"> Rio Grande do Sul </option>
									<option value="RO"> Rondônia </option>
									<option value="RR"> Roraima </option>
									<option value="SC"> Santa Catarina </option>
									<option value="SP"> São Paulo </option>
									<option value="SE"> Sergipe </option>
									<option value="TO"> Tocantins </option>								
								</select><br/><br/>
							CEP<br/>
								<input type="text" class="cep" required/><br/><br/>
						</div>
								<input class="cadastrar" type="submit" value="Cadastrar" required/><br/><br/>
					</form>
				</div>
		</div>
		<div class="rodape">
			<div class="cont"> CONTATE-NOS </div>
		</div>
	</body>
</html>