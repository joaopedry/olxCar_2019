﻿<?php 
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
        <a class="logo" href="index.php">OLXCar</a>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <div class="titulo">
                <h1>Cadastrar Estado</h1>
            </div>
            	<div class="Cadastrotipo">
                    <form class="form-adicionar" method="post" action="cadastraEstado.php">
                        <label>Nome do Estado</label>
                        <input class="form-control" type="text" name="txtEstado" required placeholder="Digite o Nome do Estado"><br>
                        <input class="form-control" type="submit" name="cadastrarEstado" value="Cadastrar!">
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