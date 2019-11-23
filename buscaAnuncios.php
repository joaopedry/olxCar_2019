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
    	<a class="logo" href="index.php">OLXCar</a>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <div class="titulo">
                <h1>Resultados</h1>
            </div>
            <table class="ExibeForm">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Cor</th>
                </tr>
            </thead>
            <?php
            if(isset($_POST['buscaAnuncio']))
            {
                $nomeAnuncio = $_POST['nomeAnuncio'];
                $sqlPesquisaAnuncioSelect = "SELECT * FROM anuncios
                                                INNER JOIN marcas
                                                ON anuncios.cd_marca = marcas.cd_marca
                                                INNER JOIN cores
                                                ON anuncios.cd_cor = cores.cd_cor
                                                INNER JOIN usuarios
                                                ON anuncios.cd_usuario = usuarios.cd_usuario		
                                                WHERE anuncios.ds_anuncio like '%".$nomeAnuncio."%' 
                                                OR marcas.ds_marca like '%".$nomeAnuncio."%' 
                                                OR anuncios.ds_preco like '%".$nomeAnuncio."%' 
                                                OR anuncios.ds_descricao_anuncio like '%".$nomeAnuncio."%' 
                                                OR cores.ds_cor like '%".$nomeAnuncio."%'";
                $resultAnuncio = selecionar($_SG["link"], $sqlPesquisaAnuncioSelect);		
                while($selecAnuncio = mysqli_fetch_assoc($resultAnuncio)){
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $selecAnuncio['ds_anuncio']; ?></td>
                            <td><?php echo $selecAnuncio['ds_modelo']; ?></td>
                            <td><?php echo $selecAnuncio['ds_marca']; ?></td>
                            <td><?php echo $selecAnuncio['ds_cor']; ?></td>
                            <td>
                                <input value="Exibir" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $selecAnuncio['cd_anuncio']; ?>"></input>
                            </td>
                        </tr>
                    </tbody>
                    <div class="modal fade" id="myModal<?php echo $selecAnuncio['cd_anuncio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel"><?php echo $selecAnuncio['ds_anuncio']; ?></h4>
                                </div>
                                <div class="modal-body">
                                    <p>Modelo: <?php echo $selecAnuncio['ds_modelo']; ?></p>
                                    <p>Marca: <?php echo $selecAnuncio['ds_marca']; ?></p>
                                    <p>Cor: <?php echo $selecAnuncio['ds_cor']; ?></p>
                                    <p>Ano: <?php echo $selecAnuncio['dt_ano']; ?></p>
                                    <p>Preço: <?php echo $selecAnuncio['ds_preco']; ?></p>
                                    <p>Nome Vendedor: <?php echo $selecAnuncio['ds_usuario']; ?></p>
                                    <p>Telefone: <?php echo $selecAnuncio['ds_telefone']; ?></p>
                                    <p>E-mail: <?php echo $selecAnuncio['ds_email']; ?></p>
                                    <p>Descrição: <?php echo $selecAnuncio['ds_descricao_anuncio']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>			
            <?php }
            ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            </table>    
        </section>
    </body>
</html>
<script>
function ConfirmarAlteracao(){		if (confirm ("Deseja realmente excluir?"))		return true;	else		return false;}
</script>