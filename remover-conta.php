<?php
	echo "<meta charset='utf-8'>";

	session_start();     
    
    if(!isset($_SESSION['email']) && !isset($_SESSION['pass'])){
        session_destroy();
        echo "<script>location.href='http://funeral24h.com.br/login.html'</script>";
        
    }

    /* REMOVER ANUNCIO E SUAS DEPENDENCIAS */

    $email_client = $_SESSION['email'];
    $imageEmpresa = $_SESSION['img_empresa'];
    $imageAnuncio = $_SESSION['img_anuncio'];
    $ufEmpresa	  = $_SESSION['uf'];

	include("includes/conn.php");

	//get anuncios' id
	$id_login = $_GET['id_login'];
	
	// confere se id do cliente corresponde ao msm de fato
	$selectLoginClient = "SELECT id_login from tb_login where email ='$email_client'";
	$client = $conn->query($selectLoginClient);
	$row = $client->fetch_assoc();
	$clientId = $row['id_login'];
	
	// exclui imagens do anuncio correspondente a conta (diretorio anuncio ja incluso atraves de funçao)
	$dirAnuncio = "agenciafuneraria/$ufEmpresa/$id_login/anuncios";

	$imgAnuncio = "agenciafuneraria/$ufEmpresa/$id_login/$imageAnuncio";

	//condição de verificaçao para exclusao do perfil
	if($id_login == $clientId)
	{
		//Se nao existir a pasta anuncios deleta foto da empresa e perfil
		if(!file_exists($dirAnuncio))
		{
			// exclui imagem da empresa funerária no server (diretorio anuncio ja incluso atraves de funçao)
			$pathImage = "agenciafuneraria/$ufEmpresa/$imageEmpresa";
			unlink($pathImage);

			// exclui tdo path correspondente a conta (id_login)
			$dir = "agenciafuneraria/$ufEmpresa/$id_login";
			rmdir($dir) or die("Erro ao excluir pasta");

			$remove_conta = "DELETE from tb_funerarias, tb_login using tb_funerarias, tb_login where tb_login.id_login = '$id_login' and tb_funerarias.id_login =  '$id_login'";
			$conn->query($remove_conta); 

			// destroi as sessoes
			session_destroy();
			session_unset();

			echo "<script>location.href='http://funeral24h.com.br'</script>";
			
		}
		
	
		// loop para deletar as imagens dos anuncios  	
		$AnuncioDeleted = dir($dirAnuncio);
		
		while($delete = $AnuncioDeleted->read())
		{
			$fileDeleted =  "agenciafuneraria/$ufEmpresa/$id_login/anuncios/".$delete;
			unlink($fileDeleted);
		}

		$remove_anuncios = "DELETE from tb_anuncios where id_login = '$id_login' ";
		$conn->query($remove_anuncios); 

		rmdir($dirAnuncio) or die("Erro ao excluir pasta*");

		$remove_conta = "DELETE from tb_funerarias, tb_login using tb_funerarias, tb_login where tb_login.id_login = '$id_login' and tb_funerarias.id_login =  '$id_login'";
		$conn->query($remove_conta); 

		// exclui imagem da empresa funerária no server (diretorio anuncio ja incluso atraves de funçao)
		$pathImage = "agenciafuneraria/$ufEmpresa/$imageEmpresa";
		unlink($pathImage);

		// exclui tdo path correspondente a conta (id_login)
		$dir = "agenciafuneraria/$ufEmpresa/$id_login";
		rmdir($dir) or die("Erro ao excluir pasta");

		// destroi as sessoes
		session_destroy();
		session_unset();

		echo "<script>location.href='http://funeral24h.com.br'</script>";
	}
	else
	{
		$_SESSION['count_threat'] = $_SESSION['count_threat'] + 1;
		if($_SESSION['count_threat'] >= 3)
		{
			echo "Verificamos que você esta violando as politicas de segurança do <strong>Funeral24h.com.br</strong>, você pode ser penalizado por isso.";
			exit();

		}
		
		echo "<script>location.href='http://funeral24h.com.br'</script>";
		
	}
	
	

	include("includes/close.php");


?>