<?php 
	include_once "../connect.php";
	include_once "../functions.php";
    protegePagina();
    cadastrarMarca();
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
                <h1>Marcas</h1>
                <a href="adicionacadastraMarca.php"><img title="Adicionar" src="img/btn_adicionar.png"></a>
            </div>
                <table class="ExibeForm">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Marca</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $sql_select = "SELECT * FROM `marcas` ";
                        $marca = selecionar($_SG["link"], $sql_select);
                        while($selecMarca = mysqli_fetch_assoc($marca)){?>
                        <tr>
                            <td><?php echo $selecMarca['cd_marca']; ?></td>
                            <td><?php echo $selecMarca['ds_marca']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="editar.php?acao=AtualizarMarca&id=<?php echo $selecMarca['cd_marca']; ?>">Editar</a>
                                <a onClick="return ConfirmarAlteracao()" class="btn btn-secondary" href="query.php?deletarMarca&id=<?php echo $selecMarca['cd_marca']; ?>">Excluir</a>
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
function ConfirmarAlteracao(){		if (confirm ("Deseja realmente excluir?\nCaso esta marca esteja em uso em algum anuncio, você pode perder a informação!"))		return true;	else		return false;}
</script>