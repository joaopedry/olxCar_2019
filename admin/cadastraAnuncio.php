<?php 
	include_once "../connect.php";
	include_once "../functions.php";
    protegePagina();
    cadastrarAnuncio();
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
                <h1>Anúncios</h1>
                <a href="adicionacadastraAnuncio.php"><img title="Adicionar" src="img/btn_adicionar.png"></a>
            </div>
                <table class="ExibeForm">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Modelo</th>
                            <th>Preço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $sql_select = "SELECT * FROM `anuncios` ";
                        $anuncio = selecionar($_SG["link"], $sql_select);
                        while($selecAnuncio = mysqli_fetch_assoc($anuncio)){?>
                        <tr>
                            <td><?php echo $selecAnuncio['ds_anuncio']; ?></td>
                            <td><?php echo $selecAnuncio['ds_modelo']; ?></td>
                            <td><?php echo $selecAnuncio['ds_preco']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="editar.php?acao=AtualizarAnuncio&id=<?php echo $selecAnuncio['cd_anuncio']; ?>">Editar</a>
                                <a onClick="return ConfirmarAlteracao()" class="btn btn-secondary" href="query.php?deletarAnuncio&id=<?php echo $selecAnuncio['cd_anuncio']; ?>">Excluir</a>
                            </td>
                        </tr>
                        <?php 
                        }?>
                    </tbody>
                </table>
        </section>
    </body>
</html>
<script>
function ConfirmarAlteracao(){		if (confirm ("Deseja realmente excluir?"))		return true;	else		return false;}
</script>