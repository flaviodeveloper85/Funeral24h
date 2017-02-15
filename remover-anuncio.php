<?php
	echo "<meta charset='utf-8'>";

	session_start();     
    
    if(!isset($_SESSION['email']) && !isset($_SESSION['pass'])){
        session_destroy();
        echo "<script>location.href='http://funeral24h.com.br/login.html'</script>";
        
    }

    /* REMOVER ANUNCIO E SUAS DEPENDENCIAS */

    $imageAnuncio = $_SESSION['img_anuncio'];
    $uf 		  = $_SESSION['uf_anuncio'];
    $id_login	  = $_SESSION['id_login'];

	include("includes/conn.php");

	//get anuncios' id
	$id_anuncio = $_GET['idAnuncio'];

	// confere se id do cliente corresponde ao msm de fato
	$selectIdAnuncio = "SELECT id_anuncio from tb_anuncios where id_anuncio = '$id_anuncio' and id_login = '$id_login' ";
	$anuncio = $conn->query($selectIdAnuncio);
	$row = $anuncio->fetch_assoc();
	$anuncio  = $row['id_anuncio'];
	
	//condição de verificaçao para exclusao do perfil
	if($id_anuncio == $anuncio)
	{
		// exclui imagem da empresa funerário no server
		$pathImage = "agenciafuneraria/$uf/$id_login/$imageAnuncio";
		unlink($pathImage);

		
		$remove_conta = "DELETE from tb_anuncios where id_anuncio = '$id_anuncio' and id_login = '$id_login' ";
		$conn->query($remove_conta); 

		echo "<script>location.href='painel'</script>";
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







	include("includes/close.php");


?>