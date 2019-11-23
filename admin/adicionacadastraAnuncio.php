<?php 
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
                <h1>Cadastrar Anúncio</h1>
            </div>
            	<div class="Cadastrotipo">
                    <form class="form-adicionar" method="post" action="cadastraAnuncio.php">
                        <label>Título do Anúncio</label>
                        <input class="form-control" type="text" name="tituloAnuncio" required placeholder="Digite o Título do Anúncio">
                        <label>Marca do carro</label>
                        <select class="form-control" name="marcaCarro" required>
                            <option value="">Selecione:</option>
                            <?php 
                            $sql_marca = "	SELECT *  
                                            FROM `marcas`;";			
                            $resultMarca = selecionar($_SG["link"], $sql_marca);		
                            while($selecMarca = mysqli_fetch_assoc($resultMarca)){ ?>
                            <option value="<?php echo $selecMarca['cd_marca']; ?>"><?php echo $selecMarca['ds_marca'];?></option>
                            <?php } ?>
                        </select>
                        <label>Modelo do carro</label>
                        <input class="form-control" type="text" name="modeloCarro" placeholder="Digite o Modelo do Carro">
                        <label>Cor do carro</label>	
                        <select class="form-control" name="corCarro">
                            <option value="">Selecione:</option>
                            <?php
                            $sql_cor = "	SELECT *  
                                            FROM `cores`;";			
                            $resultCor = selecionar($_SG["link"], $sql_cor);		
                            while($selecCor = mysqli_fetch_assoc($resultCor)){ ?>
                            <option value="<?php echo $selecCor['cd_cor']; ?>"><?php echo $selecCor['ds_cor'];?></option>
                            <?php } ?>
                        </select>
                        <label>Ano do carro</label>
                        <input class="form-control" type="text" placeholder="YYYY" pattern="([0-9]{4})" maxlength="4" name="anoCarro">
                        <label>Preço do carro</label>
                        <input class="form-control" type="text" placeholder="Preço" maxlength="20" name="precoCarro">
                        <label>Descrição do Anúncio</label>
                        <textarea class="form-control" type="text" name="descricaoAnuncio"></textarea><br>
                        <input class="form-control" type="submit" name="cadastrarAnuncio" value="Cadastrar!">
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