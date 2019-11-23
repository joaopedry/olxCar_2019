<?php
$_SG["conectaServidor"] = true;
$_SG["abreSessao"] = true;
$_SG["caseSentive"] = false;
$_SG["validaSempre"] = true;


$_SG["servidor"] = "localhost";
$_SG["banco"] = "webphp";
$_SG["usuario"] = "root";
$_SG["senha"] = "";
$_SG["paginaLogin"] = "login.php";
$_SG["tabela"] = "usuarios";
$_SG["link"] = mysqli_connect($_SG["servidor"], $_SG["usuario"], $_SG["senha"], $_SG["banco"]);

$_SG["link"]->set_charset("utf8");

	if($_SG["conectaServidor"] == true)
	{
		if(!$_SG["link"])
		{
			die("Erro ao conectar");
		}
	}
	if($_SG["abreSessao"] == true)
	{
		$tempoSessao = 600; //segundos
		session_start();
		if(isset($_SESSION['sessiontime']))
		{
			if($_SESSION['sessiontime'] < (time() - $tempoSessao))
			{
				session_unset();
			}
		}
		else
		{
			session_unset();
		}
		$_SESSION['sessiontime'] = time();
	}
	
	function validaUsuario($usuario, $senha){
		global $_SG;
		$cs = ($_SG["caseSentive"]) ? "BINARY" : "";	
		$Vusuario = addslashes($usuario);
		$Vsenha = addslashes($senha);
		$sql = "SELECT `cd_usuario`, `ds_usuario`, `id_tipo_usuario` FROM `".$_SG["tabela"]."` WHERE ".$cs." `ds_login` = '".$Vusuario."' AND ".$cs. " `ds_senha` = '".$Vsenha."' AND `id_status` != '0' LIMIT 1";
		$query = mysqli_query($_SG["link"], $sql);
		$result = mysqli_fetch_assoc($query);
		
		if(empty ($result))
		{
			return false;
		}
		else
		{
			$_SESSION["usuarioID"] = $result["cd_usuario"];
			$_SESSION["usuarioNome"] = $result["ds_usuario"];
			$_SESSION["usuarioTipo"] = $result["id_tipo_usuario"];
			if($_SG["validaSempre"] == true)
			{
				$SESSION["usuarioLogin"] = $usuario;
				$SESSION["usuarioSenha"] = $senha;
			}
			return true;
		}
	}

	function protegePagina()
	{
		global $_SG;
		if(!isset($_SESSION["usuarioID"]) OR !isset($_SESSION["usuarioNome"]))
		{
			expulsaVisitante();
		}
		else if(!isset($_SESSION["usuarioID"]) OR !isset($_SESSION["usuarioNome"]))
		{
			if($_SG["validaSempre"] == true)
			{
				if(!validaUsuario($SESSION["usuarioLogin"], $SESSION["usuarioSenha"]))
					expulsaVisitante();
			}	
		}
	}
	
	function expulsaVisitante()
	{
		global $_SG;
		unset($_SESSION["usuarioID"], $_SESSION["usuarioNome"], $SESSION["usuarioLogin"], $SESSION["usuarioSenha"]);
		header("location:". $_SG["paginaLogin"]);
		
	}

	function logar()
	{
		if(isset($_POST['logar']))
		{
			$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
			$senha = (isset($_POST['senha'])) ? $_POST['senha'] : "";
			if(validaUsuario($usuario, $senha) == true)
			{
				header("location: index.php");
			}else
			{
				echo '<script language="javascript">';
				echo 'alert("Usuario ou Senha Inválidos!")';
				echo '</script>';
			}
		}
	}
	
	function cadastrarUsuario()
	{
		global $_SG;
		if(isset($_POST['cadastrarUsuario']))
		{
			$nomeUsuario 		= $_POST['txtNome'];
			$emailUsuario 		= $_POST['txtEmail'];
			$nascUsuario 		= $_POST['txtDtNasc'];
			$cpfUsuario			= $_POST['txtCPF'];
			$telUsuario 		= $_POST['txtTelefone'];
			$estadoUsuario 		= $_POST['txtEstado'];
			$loginUsuario 		= $_POST['txtUsuario'];
			$senhaUsuario 		= $_POST['txtSenha'];
			$tipoUsuario 		= $_POST['txtTipoUsuario'];
			$statusUsuario		= $_POST['txtStatus'];
			$sqlCadastrarInsert = "INSERT INTO `usuarios` (cd_estado, ds_login, ds_senha, ds_usuario, dt_nasc, ds_email, ds_cpf, ds_telefone, id_tipo_usuario, id_status) VALUES (".$estadoUsuario.",'".$loginUsuario."','".$senhaUsuario."','".$nomeUsuario."','".$nascUsuario."','".$emailUsuario."','".$cpfUsuario."','".$telUsuario."','".$tipoUsuario."','".$statusUsuario."')";
			$sqlCadastrarSelect = "SELECT `ds_login` FROM `usuarios` WHERE `ds_login` = '".$loginUsuario."' LIMIT 1";
			
			$queryCadastrarSelect = mysqli_query($_SG["link"], $sqlCadastrarSelect);
			
			if(!mysqli_fetch_assoc($queryCadastrarSelect))
			{
				if (mysqli_query($_SG['link'], $sqlCadastrarInsert))
				{
					unset($_POST['cadastrar']);
					echo "Usuário cadastrado com sucesso!";
					?>
					<a href="login.php"><input type="button" name="login" value="Login" /></a>
					<?php
				} 
				else
				{
					echo "Erro ao cadastrar, por favor tente novamente mais tarde!";
				}
			}
			else 
			{
				unset($_POST['cadastrar']);
				echo "Este login já está em uso!";
			}
		}
	}

	function cadastrarAnuncio()
	{
		global $_SG;
		if(isset($_POST['cadastrarAnuncio']))
		{
			$marcaCarro 		= $_POST['marcaCarro'];
			$modeloCarro 		= $_POST['modeloCarro'];
			$corCarro 			= $_POST['corCarro'];
			$anoCarro 			= $_POST['anoCarro'];
			$descricaoAnuncio	= $_POST['descricaoAnuncio'];
			$tituloAnuncio		= $_POST['tituloAnuncio'];
			$precoCarro			= $_POST['precoCarro'];
			$codVendedor		= $_SESSION["usuarioID"];

			$sqlCadastrarAnuncio = "INSERT INTO `anuncios` (cd_usuario, cd_marca, ds_modelo, dt_ano, cd_cor, ds_anuncio, ds_preco, ds_descricao_anuncio) VALUES (".$codVendedor.",'".$marcaCarro."','".$modeloCarro."','".$anoCarro."','".$corCarro."','".$tituloAnuncio."','".$precoCarro."','".$descricaoAnuncio."')";
			
			if (mysqli_query($_SG['link'], $sqlCadastrarAnuncio))
			{
				unset($_POST['cadastrarAnuncio']);
				echo "Anúncio cadastrado com sucesso!";
				header("location: cadastraAnuncio.php");
			} 
			else
			{
				echo "Erro ao cadastrar, por favor tente novamente mais tarde!";
			}
		}
	}

	function atualizarAnuncio()
	{
		global $_SG;
		if(isset($_POST['atualizarAnuncio']))
		{
			$cdAnuncio 			= $_POST['cdAnuncio'];
			$marcaCarro 		= $_POST['marcaCarro'];
			$modeloCarro 		= $_POST['modeloCarro'];
			$corCarro 			= $_POST['corCarro'];
			$anoCarro 			= $_POST['anoCarro'];
			$descricaoAnuncio	= $_POST['descricaoAnuncio'];
			$tituloAnuncio		= $_POST['tituloAnuncio'];

			$sql_atualizar = "UPDATE `anuncios` SET ds_anuncio='".$tituloAnuncio."', cd_marca='".$marcaCarro."', ds_modelo='".$modeloCarro."', dt_ano='".$anoCarro."', cd_cor='".$corCarro."', ds_descricao_anuncio='".$descricaoAnuncio."' WHERE cd_anuncio = '".$cdAnuncio."'";
			actionQuery($_SG['link'], $sql_atualizar);
			unset($_POST['atualizarAnuncio']);
			header('location: exibeMeuAnuncio.php');
		}else
		{
			echo '<script language="javascript">';
			echo 'alert(Erro ao editar)';
			echo '</script>';
		}
	}

	function buscaAnuncio()
	{
		global $_SG;
		if(isset($_POST['buscaAnuncio']))
		{
			$nomeAnuncio = $_POST['nomeAnuncio'];
			$sqlBuscaAnuncioSelect = "SELECT * FROM anuncios
										INNER JOIN marcas
										ON anuncios.cd_marca = marcas.cd_marca
										INNER JOIN cores
										ON anuncios.cd_cor = cores.cd_cor
										INNER JOIN usuarios
										ON anuncios.cd_usuario = usuarios.cd_usuario		
										WHERE anuncios.ds_anuncio like '%".$nomeAnuncio."%'";
		}else
		{
			echo '<script language="javascript">';
			echo 'alert(Erro ao editar)';
			echo '</script>';
		}
	}
?>