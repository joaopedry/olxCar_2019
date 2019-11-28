<?php
	include_once "connect.php";
	include_once "functions.php";
	cadastrarUsuario();
?>
<html>
<head>
	<?php include_once "template/header.php"; ?>
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
	<script src="js/jquerymask.js"></script>
	<title>Login</title>
</head>

<body>
	<div class="loginFundo">
		<div class="logar">
			<h2>Cadastro de Usuário</h2>
			<form  id="login" method="post" action="cadastrarUsuario.php">
				<label>Nome</label>
				<input class="form-control" required="required" type="text" name="txtNome" maxlength="50" />
				<label>E-mail</label>
				<input class="form-control" required="required" type="email" name="txtEmail" maxlength="50"/>
				<label>Data Nascimento</label>
				<input class="form-control" required="required" type="date" name="txtDtNasc" max="<?php echo date('Y-m-d'); ?>"/>
				<label>CPF</label>
				<input class="form-control" required="required" type="cpf" name="txtCPF" id="txtCPF" maxlength="14" id="cpf" placeholder="###.###.###-##" onkeyup="mascara('###.###.###-##',this,event,true)" pattern=".{14,}" required title="CPF Incorreto!"/>
				<label>Celular</label>
				<input class="form-control" type="text" name="txtTelefone" required="required" id="telefone" placeholder="(##) #####-####" onkeyup="mascara('(##) #####-####',this,event,true)" maxlength="15" pattern=".{15,}" required title="Telefone Incorreto!"/>
				<label>Estado</label>
				<select class="form-control" name="txtEstado" required="required">
					<option value="">Selecione:</option>
					<?php
					$sql_estado = "	SELECT *  
									FROM `estados`;";			
					$resultEstado = selecionar($_SG["link"], $sql_estado);		
					while($selecEstado = mysqli_fetch_assoc($resultEstado)){ ?>
					<option value="<?php echo $selecEstado['cd_estado']; ?>"><?php echo $selecEstado['ds_estado'];?></option>
					<?php } ?>
				</select>
				<label>Login</label>
				<input class="form-control" required="required" type="text" name="txtUsuario" pattern=".{4,}" required title="Minimo 4 caracteres!"/>
				<label>Senha</label>
				<input class="form-control" required="required" type="password" name="txtSenha" pattern=".{6,}" required title="Minimo 6 caracteres!"/>
				<input type="hidden" name="txtTipoUsuario" value="1" />
				<input type="hidden" name="txtStatus" value="1" /><br>
				<input class="form-control" type="submit" name="cadastrarUsuario" value="Cadastrar!" />
				<input type="button" class="form-control" value="Voltar" onClick="goBack()" />
			</form>
		</div>
    </div>
</body>
</html>
<script>
    function goBack() {
        window.location.href = "index.php";
    }
</script>
