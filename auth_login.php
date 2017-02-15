<?php
	
	
	include_once("includes/conn.php");

	$login 		= $_POST['email'];
	$password 	= md5(md5($_POST['senha']));

	$consultaLogin = "SELECT id_login, email, password from tb_login where email = '$login' and password = '$password'";

	$result = $conn->query($consultaLogin);
	$consulta = $result->num_rows;

	$row = $result->fetch_assoc();
	$idLogin = $row['id_login'];

	if($consulta > 0){

		session_start();

		$_SESSION['id_login']  = $idLogin;
		$_SESSION['email'] 	   = $login;
		$_SESSION['pass']  	   = $password;		

		 echo "<script>window.location='painel'</script>";
		 

	}else{

		echo "Email ou senha incorretos";
	}
?>