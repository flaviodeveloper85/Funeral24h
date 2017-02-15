<?php

	
	session_start();

	if(!isset($_SESSION['email']) && !isset($_SESSION['pass'])){
        session_destroy();
        echo "<script>location.href='http://funeral24h.com.br/login.html'</script>";
        
    }

	include("includes/conn.php");

	
	//catch the form fields
	$titulo_anuncio   = $_POST['titulo-editar'];
    $descricao_anuncio= $_POST['descricao-editar'];
    $tel_anuncio      = $_POST['tel-editar'];
    $preco_anuncio    = $_POST['preco-editar'];
    $cep_anuncio      = $_POST['cep-editar'];
    $uf_anuncio       = $_POST['estado-editar'];
    $cidade_anuncio   = $_POST['cidade-editar'];
    
    //identifier
    $identifier = $_SESSION['id_login'];
   
	$atualizar_anuncio = "UPDATE tb_anuncios set titulo='$titulo_anuncio', descricao='$descricao_anuncio', telefone='$tel_anuncio', preco='$preco_anuncio', cep='$cep_anuncio', uf='$uf_anuncio', cidade='$cidade_anuncio' where id_login='$identifier'";

	$update = $conn->query($atualizar_anuncio);

	if($update){
		echo "Dados atualizados com Sucesso!";
	}
	else{

		echo "Erro ao atualizar os dados";
	}

	include("includes/close.php");


?>