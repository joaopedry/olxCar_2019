<?php 
	include_once "connect.php";
	include_once "functions.php";
    protegePagina();
    cadastrarMeuAnuncio();
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
        <a class="logo" href="index.php">OLXCar </a>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <div class="titulo">
                <h1>Meus Anúncios</h1>
                <a href="adicionacadastraAnuncio.php"><img title="Adicionar" src="img/btn_adicionar.png"></a>
            </div>
            <div>
                <table class="ExibeForm">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Cor</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <?php
                    $sqlBuscaMeuAnuncioSelect = "SELECT * FROM anuncios
                                                    INNER JOIN marcas
                                                    ON anuncios.cd_marca = marcas.cd_marca
                                                    INNER JOIN cores
                                                    ON anuncios.cd_cor = cores.cd_cor
                                                    INNER JOIN usuarios
                                                    ON anuncios.cd_usuario = usuarios.cd_usuario		
                                                    WHERE anuncios.cd_usuario = '".$_SESSION['usuarioID']."'";
                    $resultMeuAnuncio = selecionar($_SG["link"], $sqlBuscaMeuAnuncioSelect);
                    if (mysqli_num_rows($resultMeuAnuncio)==0)
                    {
                        $sqlBuscaMeuAnuncioSelect = "SELECT * FROM anuncios
                                                    INNER JOIN cores
                                                    ON anuncios.cd_cor = cores.cd_cor
                                                    INNER JOIN usuarios
                                                    ON anuncios.cd_usuario = usuarios.cd_usuario		
                                                    WHERE anuncios.cd_usuario = '".$_SESSION['usuarioID']."'";	
                        $resultMeuAnuncio = selecionar($_SG["link"], $sqlBuscaMeuAnuncioSelect);
                        
                        if (mysqli_num_rows($resultMeuAnuncio)==0)
                        {
                            $sqlBuscaMeuAnuncioSelect = "SELECT * FROM anuncios
                                                    INNER JOIN marcas
                                                    ON anuncios.cd_marca = marcas.cd_marca
                                                    INNER JOIN usuarios
                                                    ON anuncios.cd_usuario = usuarios.cd_usuario		
                                                    WHERE anuncios.cd_usuario = '".$_SESSION['usuarioID']."'";
                            $resultMeuAnuncio = selecionar($_SG["link"], $sqlBuscaMeuAnuncioSelect);
                            
                            if (mysqli_num_rows($resultMeuAnuncio)==0)
                            {
                                $sqlBuscaMeuAnuncioSelect = "SELECT * FROM anuncios
                                                    INNER JOIN usuarios
                                                    ON anuncios.cd_usuario = usuarios.cd_usuario		
                                                    WHERE anuncios.cd_usuario = '".$_SESSION['usuarioID']."'";	
                                $resultMeuAnuncio = selecionar($_SG["link"], $sqlBuscaMeuAnuncioSelect);
                            }
                        }
                    }	
                    while($selecAnuncio = mysqli_fetch_assoc($resultMeuAnuncio)){
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $selecAnuncio['ds_anuncio']; ?></td>
                            <td><?php echo $selecAnuncio['ds_modelo']; ?></td>
                            <?php
                                if($selecAnuncio['cd_marca'] != null)
                                {
                            ?>
                                <td><?php echo $selecAnuncio['ds_marca']; ?></td>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <td>Informação Indisponível</td>
                            <?php
                                }
                            ?>
                            <?php
                                if($selecAnuncio['cd_cor'] != null)
                                {
                            ?>
                                <td><?php echo $selecAnuncio['ds_cor']; ?></td>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <td>Informação Indisponível</td>
                            <?php
                                }
                            ?>
                            <td>
                                <a class="btn btn-primary" href="editar.php?acao=AtualizarMeuAnuncio&id=<?php echo $selecAnuncio['cd_anuncio']; ?>">Editar</a>
                                <a onClick="return ConfirmarAlteracao()" class="btn btn-secondary" href="query.php?deletarMeuAnucio&id=<?php echo $selecAnuncio['cd_anuncio']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php }
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