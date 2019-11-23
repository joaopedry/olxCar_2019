<?php
	include_once "connect.php";
	include_once "functions.php";
/*meusAnuncios.php*/
if(isset($_GET['deletarMeuAnucio']))
{
	$id = $_GET['id'];
	$sql_deletar = "DELETE FROM `anuncios` WHERE `cd_anuncio` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_GET['deletarMeuAnucio']);
	header('location: meusAnuncios.php');
}
?>