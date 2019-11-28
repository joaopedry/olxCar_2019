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
        <script src="js/maskMoney.js" type="text/javascript"></script>
        <title>Painel de Controle</title>
    </head>
    
    <body>
    <header>
        <a class="logo" href="index.php">OLXCar </a>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <div class="titulo">
                <h1>Editar Informações</h1>
            </div>
            <div class="FormEdita">
                <?php 
                 if((isset($_GET["acao"])) AND ($_GET["acao"] == "AtualizarMeuAnuncio") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT *
                                    FROM `anuncios`
                                    JOIN `marcas` on anuncios.cd_marca = marcas.cd_marca
                                    JOIN `cores` on anuncios.cd_cor = cores.cd_cor 
                                    WHERE cd_anuncio=".$_GET['id']." LIMIT 1";

                    $anuncio = selecionar($_SG["link"], $sql_select);
                    //Verifica se algum registro FK foi apagado
                    if (mysqli_num_rows($anuncio)==0)
                    {
                        $sql_select = "SELECT *
                                        FROM `anuncios`
                                        JOIN `marcas` on anuncios.cd_marca = marcas.cd_marca
                                        WHERE cd_anuncio=".$_GET['id']." LIMIT 1";	
                        $anuncio = selecionar($_SG["link"], $sql_select);
                        
                        if (mysqli_num_rows($anuncio)==0)
                        {
                            $sql_select = "SELECT *
                                            FROM `anuncios`
                                            JOIN `cores` on anuncios.cd_cor = cores.cd_cor 
                                            WHERE cd_anuncio=".$_GET['id']." LIMIT 1";	
                            $anuncio = selecionar($_SG["link"], $sql_select);
                            
                            if (mysqli_num_rows($anuncio)==0)
                            {
                                $sql_select = "SELECT *
                                                FROM `anuncios`
                                                WHERE cd_anuncio=".$_GET['id']." LIMIT 1";	
                                $anuncio = selecionar($_SG["link"], $sql_select);
                            }
                        }
                    }
                    while($selecAnuncio = mysqli_fetch_assoc($anuncio)){?>
                        <form class="form-adicionar" method="post" action="editar.php" enctype="multipart/form-data">
                            <label>Título do Anúncio</label>
                            <input class="form-control" type="text" name="tituloAnuncio" required placeholder="Digite o Título do Anúncio" value="<?php echo $selecAnuncio['ds_anuncio']; ?>">
                            <label>Marca do carro</label>
                            <select class="form-control" name="marcaCarro" required>
                            <?php
                                if($selecAnuncio['cd_marca'] != null)
                                {
                            ?>
                                <option value="<?php echo $selecAnuncio['cd_marca']; ?>"><?php echo $selecAnuncio['ds_marca'];?></option>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <option value="">Selecione:</option>
                            <?php
                                }
                            ?>
                                <?php 
                                    $sql_marca = "	SELECT *  
                                                    FROM `marcas`
                                                    WHERE cd_marca != ".$selecAnuncio['cd_marca'].";";			
                                    $resultMarca = selecionar($_SG["link"], $sql_marca);
                                    if (mysqli_num_rows($resultMarca)==0)
                                    {
                                        $sql_marca = "SELECT *  
                                                    FROM `marcas`;";		
                                    $resultMarca = selecionar($_SG["link"], $sql_marca);	
                                    }			
                                    while($selecMarca = mysqli_fetch_assoc($resultMarca)){ 
                                ?>
                                <option value="<?php echo $selecMarca['cd_marca']; ?>"><?php echo $selecMarca['ds_marca'];?></option>
                                <?php } ?>
                            </select>
                            <label>Modelo do carro</label>
                            <input class="form-control" type="text" name="modeloCarro" placeholder="Digite o Modelo do Carro" value="<?php echo $selecAnuncio['ds_modelo']; ?>" required="required">
                            <label>Cor do carro</label>	
                            <select class="form-control" name="corCarro" required="required">
                            <?php
                                if($selecAnuncio['cd_cor'] != null)
                                {
                            ?>
                                <option value="<?php echo $selecAnuncio['cd_cor']; ?>"><?php echo $selecAnuncio['ds_cor'];?></option>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <option value="">Selecione:</option>
                            <?php
                                }
                            ?>
                                <?php
                                    $sql_cor = "	SELECT *  
                                                    FROM `cores`
                                                    WHERE cd_cor != ".$selecAnuncio['cd_cor'].";";		
                                    $resultCor = selecionar($_SG["link"], $sql_cor);	
                                    if (mysqli_num_rows($resultCor)==0)
                                    {
                                        $sql_cor = "SELECT *  
                                                    FROM `cores`;";		
                                        $resultCor = selecionar($_SG["link"], $sql_cor);	
                                    }	
                                    while($selecCor = mysqli_fetch_assoc($resultCor)){
                                ?>
                                <option value="<?php echo $selecCor['cd_cor']; ?>"><?php echo $selecCor['ds_cor'];?></option>
                                <?php } ?>
                            </select>
                            <label>Ano do carro</label>
                            <input class="form-control" type="text" placeholder="YYYY" pattern=".{4,}" required title="Digite o ano corretamente" maxlength="4" name="anoCarro" value="<?php echo $selecAnuncio['dt_ano']; ?>">
                            <label>Preço do carro</label>
                            <input class="form-control" type="text" placeholder="Preço" pattern=".{5,15}" required title="Digite o preço corretamente" name="precoCarro" value="<?php echo $selecAnuncio['ds_preco']; ?>" onKeyPress="return(moeda(this,'.',',',event))" required>
                            <label>Descrição do Anúncio</label>
                            <textarea class="form-control" type="text" name="descricaoAnuncio"><?php echo $selecAnuncio['ds_descricao_anuncio']; ?></textarea>
                            <input type="hidden" name="cdAnuncio" value="<?php echo $selecAnuncio['cd_anuncio']; ?>" /><br />
                            <input class="form-control" type="submit" name="atualizarMeuAnuncio" value="Editar!">
                            <input type="button" class="form-control" value="Cancelar" onClick="goBack()" />  
                        </form>
                    <?php }?>
                 <?php }?>
			</div>
        </section>
    </body>
</html>

<?php
if(isset($_POST['atualizarMeuAnuncio']))
{
    $sql_atualizarMeuAnuncio = "UPDATE `anuncios` SET ds_anuncio='".$_POST['tituloAnuncio']."', cd_marca='".$_POST['marcaCarro']."', ds_modelo='".$_POST['modeloCarro']."', dt_ano='".$_POST['anoCarro']."', cd_cor='".$_POST['corCarro']."', ds_descricao_anuncio='".$_POST['descricaoAnuncio']."', ds_preco='".$_POST['precoCarro']."' WHERE cd_anuncio = '".$_POST['cdAnuncio']."'";
	actionQuery($_SG['link'], $sql_atualizarMeuAnuncio);
	unset($_POST['atualizarMeuAnuncio']);
	header('location: meusAnuncios.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}

?>
<script>
    function goBack()
    {
        window.history.back();
    }
</script>