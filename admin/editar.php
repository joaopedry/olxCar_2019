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
        <title>Painel de Controle</title>
    </head>
    
    <body>
    <header>
        <a class="logo" href="index.php">OLXCar </a>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <div class="titulo">
                <h1>Editar Informações</h1>
            </div>
            <div class="FormEdita">
                <?php 
                 if((isset($_GET["acao"])) AND ($_GET["acao"] == "AtualizarAnuncio") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT *
                                    FROM `anuncios`
                                    JOIN `marcas` on anuncios.cd_marca = marcas.cd_marca
                                    JOIN `cores` on anuncios.cd_cor = cores.cd_cor 
                                    WHERE cd_anuncio=".$_GET['id']." LIMIT 1";

                    $anuncio = selecionar($_SG["link"], $sql_select);
                    while($selecAnuncio = mysqli_fetch_assoc($anuncio)){?>
                        <form class="form-adicionar" method="post" action="editar.php" enctype="multipart/form-data">
                            <label>Título do Anúncio</label>
                            <input class="form-control" type="text" name="tituloAnuncio" required placeholder="Digite o Título do Anúncio" value="<?php echo $selecAnuncio['ds_anuncio']; ?>">
                            <label>Marca do carro</label>
                            <select class="form-control" name="marcaCarro" required>
                                <option value="<?php echo $selecAnuncio['cd_marca']; ?>"><?php echo $selecAnuncio['ds_marca'];?></option>
                                <?php 
                                    $sql_marca = "	SELECT *  
                                                    FROM `marcas`
                                                    WHERE cd_marca != ".$selecAnuncio['cd_marca'].";";			
                                    $resultMarca = selecionar($_SG["link"], $sql_marca);		
                                    while($selecMarca = mysqli_fetch_assoc($resultMarca)){ 
                                ?>
                                <option value="<?php echo $selecMarca['cd_marca']; ?>"><?php echo $selecMarca['ds_marca'];?></option>
                                <?php } ?>
                            </select>
                            <label>Modelo do carro</label>
                            <input class="form-control" type="text" name="modeloCarro" placeholder="Digite o Modelo do Carro" value="<?php echo $selecAnuncio['ds_modelo']; ?>">
                            <label>Cor do carro</label>	
                            <select class="form-control" name="corCarro">
                                <option value="<?php echo $selecAnuncio['cd_cor']; ?>"><?php echo $selecAnuncio['ds_cor'];?></option>
                                <?php
                                    $sql_cor = "	SELECT *  
                                                    FROM `cores`
                                                    WHERE cd_cor != ".$selecAnuncio['cd_cor'].";";		
                                    $resultCor = selecionar($_SG["link"], $sql_cor);		
                                    while($selecCor = mysqli_fetch_assoc($resultCor)){
                                ?>
                                <option value="<?php echo $selecCor['cd_cor']; ?>"><?php echo $selecCor['ds_cor'];?></option>
                                <?php } ?>
                            </select>
                            <label>Ano do carro</label>
                            <input class="form-control" type="text" placeholder="YYYY" pattern="([0-9]{4})" maxlength="4" name="anoCarro" value="<?php echo $selecAnuncio['dt_ano']; ?>">
                            <label>Preço do carro</label>
                            <input class="form-control" type="text" placeholder="Preço" maxlength="20" name="precoCarro" value="<?php echo $selecAnuncio['ds_preco']; ?>">
                            <label>Descrição do Anúncio</label>
                            <textarea class="form-control" type="text" name="descricaoAnuncio"><?php echo $selecAnuncio['ds_descricao_anuncio']; ?></textarea>
                            <input type="hidden" name="cdAnuncio" value="<?php echo $selecAnuncio['cd_anuncio']; ?>" /><br />
                            <input class="form-control" type="submit" name="atualizarAnuncio" value="Editar!">
                            <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />  
                        </form>
                    <?php }?>
                 <?php }?>

                 <?php 
                 if((isset($_GET["acao"])) AND ($_GET["acao"] == "AtualizarUsuario") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT *
                                    FROM `usuarios`
                                    JOIN `estados` on usuarios.cd_estado = estados.cd_estado
                                    WHERE cd_usuario=".$_GET['id']." LIMIT 1";

                    $usuario = selecionar($_SG["link"], $sql_select);
                    while($selecUsuario = mysqli_fetch_assoc($usuario)){
                        ?>
                        <form class="form-adicionar" method="post" action="editar.php">
                            <label>Nome</label>
                            <input class="form-control" required="required" type="text" name="txtNome" maxlength="50" value="<?php echo $selecUsuario['ds_usuario']; ?>" />
                            <label>E-mail</label>
                            <input class="form-control" required="required" type="email" name="txtEmail" maxlength="50"  value="<?php echo $selecUsuario['ds_email']; ?>" />
                            <label>Data Nascimento</label>
                            <input class="form-control" required="required" type="date" name="txtDtNasc" max="<?php echo date('Y-m-d'); ?>"  value="<?php echo $selecUsuario['dt_nasc']; ?>" />
                            <label>CPF</label>
                            <input class="form-control" required="required" type="cpf" name="txtCPF" id="txtCPF" maxlength="14"  value="<?php echo $selecUsuario['ds_cpf']; ?>" />
                            <label>Telefone</label>
                            <input class="form-control" type="text" name="txtTelefone" required="required" value="<?php echo $selecUsuario['ds_telefone']; ?>" />
                            <label>Estado</label>
                            <select class="form-control" name="txtEstado" required="required" value="<?php echo $selecUsuario['ds_usuario']; ?>" >
                                <option value="<?php echo $selecUsuario['cd_estado']; ?>"><?php echo $selecUsuario['ds_estado']; ?></option>
                                <?php
                                    $sql_estado = "	SELECT *  
                                                    FROM `estados`
                                                    WHERE cd_estado != ".$selecUsuario['cd_estado'].";";		
                                    $resultEstado = selecionar($_SG["link"], $sql_estado);		
                                    while($selecEstado = mysqli_fetch_assoc($resultEstado)){
                                ?>
                                <option value="<?php echo $selecEstado['cd_estado']; ?>"><?php echo $selecEstado['ds_estado'];?></option>
                                <?php } ?>
                            </select>
                            <label>Login</label>
                            <input class="form-control" required="required" type="text" name="txtUsuario" value="<?php echo $selecUsuario['ds_login']; ?>" />
                            <label>Senha</label>
                            <input class="form-control" required="required" type="password" name="txtSenha" value="<?php echo $selecUsuario['ds_senha']; ?>" />
                            <label>Tipo do Usuário</label>
                            <select class="form-control" name="txtTipoUsuario" required="required">
                                <?php
                                    if($selecUsuario['id_tipo_usuario'] == "1")
                                    {
                                        ?>
                                            <option value="1">Padrão</option>
                                            <option value="2">Administrador</option>
                                        <?php
                                    }
                                    else if($selecUsuario['id_tipo_usuario'] == "2")
                                    {
                                        ?>
                                            <option value="2">Administrador</option>
                                            <option value="1">Padrão</option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <label>Status</label>
                            <select class="form-control" name="txtStatus" required="required">
                                <?php
                                    if($selecUsuario['id_status'] == "1")
                                    {
                                        ?>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        <?php
                                    }
                                    else if($selecUsuario['id_status'] == "0")
                                    {
                                        ?>
                                            <option value="0">Inativo</option>
                                            <option value="1">Ativo</option>
                                        <?php
                                    }
                                ?>
                            </select><br>
                            <input type="hidden" name="cdUsuario" value="<?php echo $selecUsuario['cd_usuario']; ?>" /><br />
                            <input class="form-control" type="submit" name="atualizarUsuario" value="Editar!" />
                            <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />
                        </form>
                    <?php }?>
                 <?php }?>

                 <?php 
                 if((isset($_GET["acao"])) AND ($_GET["acao"] == "AtualizarEstado") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT *
                                    FROM `estados`
                                    WHERE cd_estado=".$_GET['id']." LIMIT 1";

                    $estado = selecionar($_SG["link"], $sql_select);
                    while($selecEstado = mysqli_fetch_assoc($estado)){
                        ?>
                        <form class="form-adicionar" method="post" action="editar.php">
                            <label>Estado</label>
                            <input class="form-control" required="required" type="text" name="txtEstado" maxlength="50" value="<?php echo $selecEstado['ds_estado']; ?>" />                            
                            <input type="hidden" name="cdEstado" value="<?php echo $selecEstado['cd_estado']; ?>" /><br />
                            <input class="form-control" type="submit" name="atualizarEstado" value="Editar!" />
                            <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />
                        </form>
                    <?php }?>
                 <?php }?>

                 <?php 
                 if((isset($_GET["acao"])) AND ($_GET["acao"] == "AtualizarMarca") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT *
                                    FROM `marcas`
                                    WHERE cd_marca=".$_GET['id']." LIMIT 1";

                    $marca = selecionar($_SG["link"], $sql_select);
                    while($selecMarca = mysqli_fetch_assoc($marca)){
                        ?>
                        <form class="form-adicionar" method="post" action="editar.php">
                            <label>Marca</label>
                            <input class="form-control" required="required" type="text" name="txtMarca" maxlength="50" value="<?php echo $selecMarca['ds_marca']; ?>" />                            
                            <input type="hidden" name="cdMarca" value="<?php echo $selecMarca['cd_marca']; ?>" /><br />
                            <input class="form-control" type="submit" name="atualizarMarca" value="Editar!" />
                            <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />
                        </form>
                    <?php }?>
                 <?php }?>

                 <?php 
                 if((isset($_GET["acao"])) AND ($_GET["acao"] == "AtualizarCor") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT *
                                    FROM `cores`
                                    WHERE cd_cor=".$_GET['id']." LIMIT 1";

                    $cor = selecionar($_SG["link"], $sql_select);
                    while($selecCor = mysqli_fetch_assoc($cor)){
                        ?>
                        <form class="form-adicionar" method="post" action="editar.php">
                            <label>Cor</label>
                            <input class="form-control" required="required" type="text" name="txtCor" maxlength="50" value="<?php echo $selecCor['ds_cor']; ?>" />                            
                            <input type="hidden" name="cdCor" value="<?php echo $selecCor['cd_cor']; ?>" /><br />
                            <input class="form-control" type="submit" name="atualizarCor" value="Editar!" />
                            <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />
                        </form>
                    <?php }?>
                 <?php }?>
			</div>
        </section>
    </body>
</html>

<?php
if(isset($_POST['atualizarAnuncio']))
{
    $sql_atualizarAnuncio = "UPDATE `anuncios` SET ds_anuncio='".$_POST['tituloAnuncio']."', cd_marca='".$_POST['marcaCarro']."', ds_modelo='".$_POST['modeloCarro']."', dt_ano='".$_POST['anoCarro']."', cd_cor='".$_POST['corCarro']."', ds_descricao_anuncio='".$_POST['descricaoAnuncio']."', ds_preco='".$_POST['precoCarro']."' WHERE cd_anuncio = '".$_POST['cdAnuncio']."'";
	actionQuery($_SG['link'], $sql_atualizarAnuncio);
	unset($_POST['atualizarAnuncio']);
	header('location: cadastraAnuncio.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}

if(isset($_POST['atualizarUsuario']))
{
	$sql_atualizarUsuario = "UPDATE `usuarios` SET ds_usuario='".$_POST['txtNome']."', ds_email='".$_POST['txtEmail']."', dt_nasc='".$_POST['txtDtNasc']."', ds_cpf='".$_POST['txtCPF']."', ds_telefone='".$_POST['txtTelefone']."', cd_estado='".$_POST['txtEstado']."', ds_login='".$_POST['txtUsuario']."', ds_senha='".$_POST['txtSenha']."', id_tipo_usuario='".$_POST['txtTipoUsuario']."', id_status='".$_POST['txtStatus']."'  WHERE `cd_usuario` = '".$_POST['cdUsuario']."'";
    actionQuery($_SG['link'], $sql_atualizarUsuario);
	unset($_POST['atualizarUsuario']);
	header('location: cadastraUsuario.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}

if(isset($_POST['atualizarEstado']))
{
	$sql_atualizarEstado = "UPDATE `estados` SET ds_estado='".$_POST['txtEstado']."' WHERE `cd_estado` = '".$_POST['cdEstado']."'";
    actionQuery($_SG['link'], $sql_atualizarEstado);
	unset($_POST['atualizarEstado']);
	header('location: cadastraEstado.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}

if(isset($_POST['atualizarMarca']))
{
	$sql_atualizarMarca = "UPDATE `marcas` SET ds_marca='".$_POST['txtMarca']."' WHERE `cd_marca` = '".$_POST['cdMarca']."'";
    actionQuery($_SG['link'], $sql_atualizarMarca);
	unset($_POST['atualizarMarca']);
	header('location: cadastraMarca.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}

if(isset($_POST['atualizarCor']))
{
	$sql_atualizarCor = "UPDATE `cores` SET ds_cor='".$_POST['txtCor']."' WHERE `cd_cor` = '".$_POST['cdCor']."'";
    actionQuery($_SG['link'], $sql_atualizarCor);
	unset($_POST['atualizarCor']);
	header('location: cadastraCor.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}
?>
<script>
    function goBack()
    {
        window.history.back();
    }
</script>