<?php

	$email 		= $_POST['email'];
	$acao 		= $_POST['acao'];


	include_once("includes/conn.php");

	$consultaEmail = "SELECT * from tb_login where email = '$email'";

	// check whether email exist in bd
	$result = $conn->query($consultaEmail);
	$consulta = $result->num_rows;

	$pass_hashed = base64_encode($email);
	$data_expira_hash = date('Y:m:d H:i:s', strtotime('+1 day'));


		if($consulta > 0){

			$insert_hash = "INSERT INTO tb_hash_password (hash,data) values ('".$pass_hashed."','".$data_expira_hash."')";

			$result = $conn->query($insert_hash);

			$msg = "<img src='http://Funeral24h.com.br/images/logo.jpg' /><hr /><br /><br />
			<h3>Verificamos que você deseja recuperar a senha em nosso sistema, por favor se nao requisitou, desconsidere essa mensagem. Caso contrario, <a style='text-decoration:none' href='http://funeral24h.com.br/nova_senha.php?hash=$pass_hashed'>clique aqui para cadastrar nova senha.</a></h3>
			";

			
			include '/home/floriculturapert/phpmailer/class.phpmailer.php';

			// e-mail fale conosco	
			$mail = new PHPMailer();
			$mail->SetLanguage("br");
			$mail->CharSet = "UTF-8";
			$mail->IsMail();
			$mail->IsHTML(true);
			$mail->From = "*****"; // $email_de; 
			$mail->FromName = "Funeral 24H";
			$mail->Host = "*****";        
			$mail->Mailer = "smtp";                 
			$mail->AddAddress($email);      
			//$mail->AddBCC("elcioinfo@gmail.com", "Elcio Lima");
			$mail->Subject = "Cadastro nova senha";    
			$mail->Body = $msg;
			$mail->SMTPAuth = "true";
			$mail->Username = "*****";
			$mail->Password = "*****";

			if(!$mail->Send()){ 
				$mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
				//$mensagemRetorno = 0;
			}else{

				$mensagemRetorno = "Email enviado com sucesso!";		
				//$mensagemRetorno = 1;
			}
			
			echo $mensagemRetorno;

		}else{

			echo "Email não existe em nosso sistema.";
		}

	
?>