<?php
	
	session_start();     
    
    if(!isset($_SESSION['email']) && !isset($_SESSION['pass'])){
        session_destroy();
        echo "<script>location.href='http://funeral24h.com.br/login.html'</script>";
        
    }

	//pega os valores dos campos e pega o arquivo (imagem) uploaded
    $email				=	$_SESSION['email'];

	$tituloAnuncio 		=	$_POST['titulo'];
	$descricaoAnuncio 	=	$_POST['descricao'];
	$telefone		 	=	$_POST['telefone'];
	$precoAnuncio 		=	$_POST['preco'];
	$cep				=	$_POST['cep'];
	$uf					=	$_POST['estado'];
	$cidade				=	$_POST['cidade'];

	
	// pega a img uploaded
	$file_tmp	= $_FILES['fotos']['tmp_name'];
	$file 		= $_FILES['fotos']['name'];

	// date to expire anuncio
    //$expira_anuncio = date("Y:m:d H:i:s", strtotime("+2 month"));

	//pega a extensao do arquivo e converte para minuscula
	$extensao = pathinfo($file, PATHINFO_EXTENSION);
	$extensao = strtolower($extensao);
	
	//cria um novo nome 'unico' para o arquivo uploaded e grava em uma session
	$novoNomeImg = uniqid(time()).".".$extensao;
	$_SESSION['uf'] = $uf;

	include("includes/conn.php");

	$selectIdUser = "SELECT id_login from tb_login where email = '$email'";

		$resultado = $conn->query($selectIdUser);
		$row = $resultado->fetch_assoc();

		$id_login = $row['id_login'];

	// criar pasta com id do anunciante
	@mkdir("agenciafuneraria/$uf/$id_login", 0777);
	@mkdir("agenciafuneraria/$uf/$id_login/anuncios", 0777);
	
	//chmod("images/uploads/", 0777);
	
	

	$gravaPathImg = "http://funeral24h.com.br/agenciafuneraria/$uf/$id_login/anuncios/".$novoNomeImg;

	// Query tb_cadastro
	$query_cadastro_anuncio = "INSERT INTO tb_anuncios (id_login,id_plano,titulo,descricao,telefone,preco,images,cep,uf,cidade,ativo,dt_init,dt_end)
	values('$id_login','4', '$tituloAnuncio','$descricaoAnuncio','$telefone','$precoAnuncio','$gravaPathImg','$cep','$uf','$cidade', '1', NOW(), '$expira_anuncio')";

	$conn->query($query_cadastro_anuncio);

	$destino = "agenciafuneraria/$uf/$id_login/anuncios/".$novoNomeImg;

	if(strstr(".jpeg;.jpg;.gif;.png", $extensao)){

		if(!move_uploaded_file($file_tmp, $destino)){
			echo "Ocorreu um erro enquanto carregava o arquivo.";
			exit();
		}

	}else{ echo 'Somente arquivos .jpeg, .jpg, .gif, .png <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />'; 
		   echo '<center><a href="http://funeral24h.com.br/anunciegratis.php" onclick="history.back();">Voltar</a></center>';
		exit();
	}
		
		echo "<script>location.href='http://www.funeral24h.com.br/painel.php'</script>";
		
	 
		
?>
	

	

	