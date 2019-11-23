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
                <h1>Músicas</h1>
                <a href="adicionacadastramusica.php"><img title="Adicionar" src="img/btn_adicionar.png"></a>
            </div>
            <div>
                <table class="ExibeForm">
                    <thead>
                        <tr>
                            <th>Arquivo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        foreach(new DirectoryIterator("media/")  as $fileInfo)
                        {
                            if($fileInfo->isDot()) continue;
                            $arqName = $fileInfo->getFilename();
                        ?>
                        <tr>
                            <td><?php echo $arqName;?></td>
    
                            <td>
                                <a onClick="return ConfirmarAlteracao()" class="btn btn-secondary" href="query.php?deletarArquivo=<?php echo $arqName;?>">Excluir</a>
                            </td>
                        </tr> 
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
       	</section>
    </body>
</html>
<script>
function ConfirmarAlteracao(){		if (confirm ("Deseja realmente excluir?"))		return true;	else		return false;}
</script>