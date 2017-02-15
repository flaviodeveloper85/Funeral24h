<?php

	session_start();

	$id_origem = $_POST['id_origem'];
	$id_login   = $_SESSION['id_login'];	
	$datahr 	= $_POST['datahr'];
	$nome   	= $_POST['nome'];
    $email_de   = $_POST['email_de'];
    $email_para = $_POST['email_para'];
    $telefone 	= $_POST['telefone'];
    $celular 	= $_POST['celular'];
	$assunto	= $_POST['assunto']; 
    $msg    	= $_POST['body-resp'][$id_origem];
    
	include('includes/conn.php');

	
	$query = "INSERT INTO tb_fale_conosco (id_login, datahr, nome, email_de, email_para, telefone, celular, assunto, msg, id_origem) values ('".$id_login."', now(),'".$nome."','".$email_de."','".$email_para."','".$telefone."','".$celular."','".$assunto."','".$msg."','".$id_origem."')";

	$result = $conn->query($query);


	if($result){
		echo "Mensagem enviada com Sucesso!";
	}
	else{
		echo "Erro ao enviar a mensagem. ".$conn->error();	
	}

?>