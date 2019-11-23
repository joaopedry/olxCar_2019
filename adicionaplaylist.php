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
                <h1>Nova Mídia</h1>
            </div>
            <form class="form-adicionar" action="query.php" method="post">
                <label>Título:</label>
                <input class="form-control" type="text" name="title" placeholder="Título"  required="required" />
                <label>Arquivo:</label>
                <select class="form-control" name="url_file" placeholder="Arquivo" required>
                    <option value="">Selecione seu arquivo</option>
                    <?php
                    //Lista dos arquivos de uma pasta
                    foreach(new DirectoryIterator("media/")  as $fileInfo)
                    {
                        if($fileInfo->isDot()) continue;
                        $arqName = $fileInfo->getFilename();
                    ?>
                    <option><?php echo $arqName;?></option>   
                    <?php
                    }
                    ?>
                </select>
                <label>Tipo:</label>
                <select class="form-control" name="type">
                	<option value="audio">Áudio</option>
                    <option value="video">Vídeo</option>
                </select>
                <label>Posição:</label>
                <input class="form-control" type="number" min="1" max="255" name="seq" value="255"/><br>
                <input class="form-control" class="btnCriar"  type="submit" name="criar" value="Adicionar" />
                <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />
            </form>           
        </section>
    </body>
</html>

<script>
    function goBack() {
    window.history.back();
    }
</script>