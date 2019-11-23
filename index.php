<?php 
	include_once "connect.php";
	include_once "functions.php";
	protegePagina();
    buscaAnuncio();
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
    	<a class="logo" href="index.php">OLXCar</a>
        <p>Olá <?php echo $_SESSION["usuarioNome"] ?> </p>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <div class="titulo">
                <h1>Procurar Anúncio</h1>
            </div>
            <form class="form-adicionar" method="post" action="buscaAnuncios.php">
                <label>Pesquisar Anúncio</label>
                <input class="form-control" type="text" name="nomeAnuncio"><br>
                <input class="form-control" type="submit" name="buscaAnuncio" value="Buscar">
            </form>           
        </section>
    </body>
</html>
<script>
function ConfirmarAlteracao(){		if (confirm ("Deseja realmente excluir?"))		return true;	else		return false;}
</script>