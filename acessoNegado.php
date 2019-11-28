<html style="background: #ddd;">
    <head>
        <title>Acesso Negado</title>
        <link rel="stylesheet" type="text/css" href="template/stlyle.css">
    </head>
    
    <body>
        <div class="acessoNegado">
            <h1>Ixi Algo deu errado!</h1>
            <p>Acesso negado! Sua sessão foi desconectada ou você não é um usuario administrador!</p>
            <input type="button" class="form-control" value="Voltar" onClick="goBack()" />
        </div>
    </body>
</html>
<script>
    function goBack() {
        window.location.href = "index.php";
    }
</script>