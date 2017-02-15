<?php
	//pega email que se encontra no hidden
	$email 		= $_POST['email'];
	 	

	if(isset($_POST['senha'])){

		if(trim($_POST['nova_senha']) == trim($_POST['confirmar_senha'])){

			include("includes/conn.php");

			$nova_senha = md5(md5($_POST['nova_senha']));
			$registrar_nova_senha = "UPDATE tb_login set password = '$nova_senha' where email = '$email'";
			$updatePass = $conn->query($registrar_nova_senha);
			
			if($updatePass){
			
				echo "Nova senha cadastrada com Sucesso!";
			
			}else{
				
				echo "Erro na tentativa de cadastrar nova senha.";
			}


		}else{

			echo "Senhas não iguais.";
		}
	}
?>