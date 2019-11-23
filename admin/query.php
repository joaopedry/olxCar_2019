<?php
	include_once "../connect.php";
	include_once "../functions.php";
/*cadastraAnuncio.php*/

if(isset($_GET['deletarAnuncio']))
{
	$id = $_GET['id'];
	$sql_deletar = "DELETE FROM `anuncios` WHERE `cd_anuncio` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_GET['deletarAnuncio']);
	header('location: cadastraAnuncio.php');
}

/*cadastraUsuario.php*/

if(isset($_GET['deletarUsuario']))
{
	$id = $_GET['id'];
	$sql_deletar = "DELETE FROM `usuarios` WHERE `cd_usuario` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_GET['deletarUsuario']);
	header('location: cadastraUsuario.php');
}

/*cadastraEstado.php*/

if(isset($_GET['deletarEstado']))
{
	$id = $_GET['id'];
	$sql_deletar = "DELETE FROM `estados` WHERE `cd_estado` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_GET['deletarEstado']);
	header('location: cadastraEstado.php');
}

/*cadastraMarca.php*/

if(isset($_GET['deletarMarca']))
{
	$id = $_GET['id'];
	$sql_deletar = "DELETE FROM `marcas` WHERE `cd_marca` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_GET['deletarMarca']);
	header('location: cadastraMarca.php');
}

/*cadastraCor.php*/

if(isset($_GET['deletarCor']))
{
	$id = $_GET['id'];
	$sql_deletar = "DELETE FROM `cores` WHERE `cd_cor` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_GET['deletarCor']);
	header('location: cadastraCor.php');
}

?>