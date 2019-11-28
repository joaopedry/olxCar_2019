<?php include_once "connect.php";
	logar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once "template/header.php"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
    <div class="loginFundo">
        <div class="logar" style="height:40%;">
            <h2>Acesso OLXCar</h2>
            <form id="login" method="post" action="login.php">
                <label>Usuario</label>
                <input class="form-control" required="required" type="text" name="usuario" />
                <label>Senha</label>
                <input class="form-control" required="required" type="password" name="senha" />
                <input class="form-control" type="submit" name="logar" value="Acessar" />
                <input type="button" class="form-control" value="Cadastre-se!" onclick="location.href='/teste/cadastrarUsuario.php'" />
            </form>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    function redirect()
    {
        var url = "cadastrarUsuario.php";
        window.location(url);
    }
</script>