<?php
	
	session_start();

	if(!isset($_SESSION['email']) && !isset($_SESSION['pass'])){
        session_destroy();
        echo "<script>location.href='http://funeral24h.com.br/login.html'</script>";
        
    }

	include("includes/conn.php");

	
	//catch the form fields
	$nome_empresa     = $_POST['nome_empresa'];
    $tel_empresa      = $_POST['tel_empresa'];
    $logradouro       = $_POST['logradouro_empresa'];
    $cep_empresa      = $_POST['cep_empresa'];
    $bairro_empresa   = $_POST['bairro_empresa'];
    $uf_empresa       = $_POST['uf_empresa'];
    $cidade_empresa   = $_POST['cidade_empresa'];
    $nome_resp        = $_POST['nome_resp'];
    $cel_resp         = $_POST['cel_resp'];
    
    //identifier
    $identifier = $_SESSION['id_login'];
   
	$atualizar_cadastro = "UPDATE tb_funerarias set nome_empresa='$nome_empresa', telefone_empresa='$tel_empresa', logradouro='$logradouro', cep='$cep_empresa', bairro='$bairro_empresa', uf='$uf_empresa', cidade='$cidade_empresa', nome_resp='$nome_resp', cel_resp='$cel_resp' where id_login='$identifier'";

	$update = $conn->query($atualizar_cadastro);

	if($update){
		echo "Dados atualizados com Sucesso!";
	}
	else{

		echo "Erro ao atualizar os dados";
	}

	include("includes/close.php");


?>