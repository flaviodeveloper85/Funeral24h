<?php
		

	include_once('includes/conn.php');

	// requet fields
	$email					= trim($_POST['email']);
	$senha                  = trim($_POST['senha']);
	$repeti_senha           = trim($_POST['repeti-senha']);
	
	$nome_resp		       	= trim($_POST['nome-responsavel']);
	$cel_resp    			= trim($_POST['celular-responsavel']);

	$nome_empresa           = trim($_POST['nome-empresa']);
	
	$telefone               = trim($_POST['telefone']);
	$tp_particular          = trim($_POST['tp_particular']);
	$transAereo             = trim($_POST['tp_aereo']);
	$transInterm            = trim($_POST['tp_intermunicipal']);
	$planFuneral            = trim($_POST['pl_funeral']);
	$atende24h              = trim($_POST['atende_24h']);
	
	$logradouro             = trim($_POST['logradouro']);
	$numero	                = trim($_POST['numero-logradouro']);
	$complemento            = trim($_POST['complemento-logradouro']);
	$bairro                 = trim($_POST['bairro']);
	$uf                     = trim($_POST['estado']);
	$cidade                 = trim($_POST['cidade']);
	$cep                    = trim($_POST['cep']);

	

	// pega a img uploaded
	$file_tmp	= $_FILES['image']['tmp_name'];
	$file 		= $_FILES['image']['name'];
	

	//pega a extensao do arquivo e converte para minuscula
	$extensao = pathinfo($file, PATHINFO_EXTENSION);
	$extensao = strtolower($extensao);
	


	//cria um novo nome 'unico' para o arquivo uploaded
	$novoNomeImg = uniqid(time()).".".$extensao;


	// loop na pasta, quando não tem o mesmo nome no banco apaga
	/*while listaArquivosDaPasta.eof(
		nome	= listaArquivosDaPasta["img"];
		query = "select 1 from tb_anuncios where nomeIMa = nome";
		result = conn-> query;
		if (result = 0){
			delete da pasta
		}
	)
*/



	$erro = 0;
	$msg_erro = "Corrija os seguintes erros:<br/>";
	
	if($senha != $repeti_senha){ 
		$msg_erro .= "- As senhas não conferem";
		$erro = 1;
	}
	
	$query = "SELECT * from tb_login where email = '$email'";
	$consulta = $conn->query($query);
	$rows = $consulta->num_rows;
	if($rows > 0){
		$msg_erro .= '- Email já registrado em nosso sistema, <a href="javascript:history.back(-1);">realize o login</a>';
		$erro = 1;
	}

	
	
	if($erro == 0){
		
		session_start();

		//Query tb_login
		$query_login = "INSERT INTO tb_login (email,password) values ('$email', md5(md5('$senha')))";

		
		//echo $query_user."<br/>";
		//echo $query_login."<br/>";
		
		
		$result2 = $conn->query($query_login);
		
		$_SESSION['email'] = $email;
		$_SESSION['pass'] = $senha;
		//$_SESSION['id_user'] = $id_user;

		$selectIdUser = "SELECT id_login from tb_login where email = '$email'";

		$resultado = $conn->query($selectIdUser);
		$row = $resultado->fetch_assoc();

		$id_login_user = $row['id_login'];
		$_SESSION['id_login'] = $id_login_user;

		// criar pasta com id do anunciante
		mkdir("agenciafuneraria/$uf/".$id_login_user, 0777);
		//chmod("images/uploads/", 0777);

		$gravaPathImg = "http://funeral24h.com.br/agenciafuneraria/$uf/$id_login_user/".$novoNomeImg;

		// Query tb_cadastro
		$query_cadastro = "INSERT INTO tb_funerarias (id_login,nome_empresa,telefone_empresa,logradouro,numero,complemento,cep,bairro,cidade,uf,img_logo,tp_particular,transpAereo,transpIntermunicipal,planoFuneral,atende24hs,cad_status,nome_resp,cel_resp) values (last_insert_id(), '$nome_empresa','$telefone','$logradouro','$numero','$complemento','$cep','$bairro','$cidade','$uf','$gravaPathImg','$tp_particular','$transAereo','$transInterm','$planFuneral','$atende24h','1','$nome_resp','$cel_resp')";

		$conn->query($query_cadastro);

		$destino = "agenciafuneraria/$uf/$id_login_user/".$novoNomeImg;

		if(strstr(".jpeg;.jpg;.gif;.png", $extensao)){

		if(!move_uploaded_file($file_tmp, $destino)){
			echo "Ocorreu um erro enquanto carregava o arquivo.";
			exit();
		}

	}else{ echo 'Somente arquivos .jpeg, .jpg, .gif, .png <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />'; 
		   echo '<center><a href="http://funeral24h.com.br/anunciegratis.php" onclick="history.back();">Voltar</a></center>';
		exit();
	}
		
		echo "<script>location.href='http://www.funeral24h.com.br/painel'</script>";
		
	}else
	{
		echo $msg_erro;
	}
	
	//include_once('includes/close.php');

?>