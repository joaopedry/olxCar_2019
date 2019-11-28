<?php 
	include_once "../connect.php";
	include_once "../functions.php";
    protegePagina();
    cadastrarUsuario();
    protegePaginaADM();
    if(isset($_GET['erro']))
    {
        $id=$_GET['id'];
        if($id == 1)
        {
            echo '<script language="javascript">';
            echo 'alert("Usuário está vinculado a um Estado ou Anúncio, favor verificar!!")';
            echo '</script>';
        }
    }
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
                <h1>Usuários</h1>
                <a href="adicionacadastraUsuario.php"><img title="Adicionar" src="img/btn_adicionar.png"></a>
            </div>
                <table class="ExibeForm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>CPF</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $sql_select = "SELECT * FROM `usuarios` ";
                        $usuario = selecionar($_SG["link"], $sql_select);
                        while($selecUsuario = mysqli_fetch_assoc($usuario)){?>
                        <tr>
                            <td><?php echo $selecUsuario['ds_usuario']; ?></td>
                            <td><?php echo $selecUsuario['ds_login']; ?></td>
                            <td><?php echo $selecUsuario['ds_cpf']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="editar.php?acao=AtualizarUsuario&id=<?php echo $selecUsuario['cd_usuario']; ?>">Editar</a>
                                <a onClick="return ConfirmarAlteracao()" class="btn btn-secondary" href="query.php?deletarUsuario&id=<?php echo $selecUsuario['cd_usuario']; ?>">Excluir</a>
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