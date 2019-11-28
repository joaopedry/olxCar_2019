<?php 
	include_once "../connect.php";
	include_once "../functions.php";
    protegePagina();
    protegePaginaADM();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once "template/header.php"; ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="js/jquerymask.js"></script>
        <title>Painel de Controle</title>
    </head>
    
    <body>
    <header>
        <a class="logo" href="index.php">OLXCar</a>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <div class="titulo">
                <h1>Cadastrar Usuário</h1>
            </div>
            	<div class="Cadastrotipo">
                    <form class="form-adicionar" method="post" action="cadastraUsuario.php">
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
                        <label>Tipo do Usuário</label>
                        <select class="form-control" name="txtTipoUsuario" required="required">
                            <option value="1">Padrão</option>
                            <option value="2">Administrador</option>
                        </select>
                        <label>Status</label>
                        <select class="form-control" name="txtStatus" required="required">
                            <option value="0">Inativo</option>
                            <option value="1">Ativo</option>
                        </select><br>
                        
                        <input class="form-control" type="submit" name="cadastrarUsuario" value="Cadastrar!" />
                        <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />
                    </form>
				</div>
        </section>
    </body>
</html>
<script>
    function goBack() {
        window.history.back();
    }
</script>