<?php 
	include_once "connect.php";
	include_once "functions.php";
	protegePagina();
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
        <a class="logo" href="index.php">eat&play </a>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <div class="titulo">
                <h1>Cardápio</h1>
                <a href="adicionacardapio.php"><img title="Adicionar" src="img/btn_adicionar.png"></a>
            </div>
            <div class="Cadastrocardapio">
                <form class="form-adicionar" method="post" action="query.php" enctype="multipart/form-data">
                    <label>Título:</label>
                    <input class="form-control" type="text" name="name"/>
                    <label>Ícone:</label>
                    <select class="form-control" name="url_icon" placeholder="Arquivo" required>
                        <option value="">Selecione seu arquivo</option>
                            <?php
                            //Lista dos arquivos de uma pasta
                            foreach(new DirectoryIterator("img/")  as $fileInfo)
                            {
                                if($fileInfo->isDot()) continue;
                                $arqName = $fileInfo->getFilename();
                            ?>
                        <option><?php echo $arqName;?></option>   
                            <?php
                            }
                            ?>
                    </select>
                    <label>Cardápio:</label>
                    <select class="form-control" name="url_file" placeholder="Arquivo" required>
                        <option value="">Selecione seu arquivo</option>
                            <?php
                            //Lista dos arquivos de uma pasta
                            foreach(new DirectoryIterator("img/")  as $fileInfo)
                            {
                                if($fileInfo->isDot()) continue;
                                $arqName = $fileInfo->getFilename();
                            ?>
                        <option><?php echo $arqName;?></option>   
                            <?php
                            }
                            ?>
                    </select>
                    <input type="hidden" name="date" value="<?php echo date('Y/m/d H:i:s'); ?>" readonly value="1" /><br>
                    <input class="form-control" type="submit" name="criar_menu" value="Adicionar" />
                    <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />                           
                </form>
            </div>
        </section>
    </body>
</html>
<script>
    function ConfirmarAlteracao(){		if (confirm ("Deseja realmente excluir?"))		return true;	else		return false;}
    function goBack() {
    window.history.back();
    }
</script>
