<?php
 
	ini_set("display_errors", 1);
	ini_set("log_errors", 1);
	ini_set("error_log", dirname(__FILE__) . "/error_log.txt");
	error_reporting(E_ALL);

	session_start();

	$id_login = $_SESSION['id_login'];
	// hora
	$nome 		= $_POST["nome"];
	$email_de 	= $_POST["email_de"];
	$email_para	= $_POST["email_para"];
	$telefone	= $_POST["telefone"];
	$celular	= $_POST["celular"];
	$assunto    = $_POST["assunto"];
	$mensagem 	= $_POST["mensagem"];

	include("../includes/conn.php");
	
	$msg = "";
	$msg .= "<a href='http://funeral24h.com.br'><img src='http://www.funeral24h.com.br/images/logo.jpg' style='float:left'/></a><br>";
	$msg .= "<table cellpadding='5' border='1' style='width:70%;text-align:left;font-size:13px;border:solid 1px #ccc;font-family:arial'>";
	$msg .= "<tr>";
	$msg .= "<th colspan='2' style='font-size:15px;text-align:center;background-color: #efefef;border-bottom: dotted 1px #ccc;'>Mensagem do Formulário de Contato - Fale conosco</th></tr>";
	$msg .= "<tr><td style='font-size:15px'>Nome</td><td style='font-size:15px'><?php echo $nome;?></td></tr>";
	$msg .= "<tr><td style='font-size:15px'>De:</td><td style='font-size:15px'><?php echo $email_de;?></td></tr>";
	$msg .= "<tr><td style='font-size:15px'>Para:</td><td style='font-size:15px'><?php echo $email_para;?></td></tr>";
	$msg .= "<tr><td style='font-size:15px'>Telefone</td><td style='font-size:15px'><?php echo $telefone;?></td></tr>";
	$msg .= "<tr><td style='font-size:15px'>Celular</td><td style='font-size:15px'><?php echo $celular;?></td></tr>";
	$msg .= "<tr><td style='font-size:15px'>Assunto</td><td style='font-size:15px'><?php echo $assunto;?></td></tr>";
	$msg .= "<tr><td colspan='2' style='font-size:15px'><?php echo $mensagem;?></td></tr>";
	$msg .= "</table>";
	$msg .= "<br/><br/>";


	// grava a mensagem
	$query = "INSERT INTO tb_fale_conosco (id_login, datahr, nome, email_de, email_para, telefone, celular, assunto, msg) values ('".$id_login."', now(),'".$nome."','".$email_de."','".$email_para."','".$telefone."','".$celular."','".$assunto."','".$mensagem."')";

	$conn->query($query);
	


	/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/
	 
	 
	include '/home/floriculturapert/phpmailer/class.phpmailer.php';

	// e-mail fale conosco	
	$mail = new PHPMailer();
	$mail->SetLanguage("br");
	$mail->IsMail();
	$mail->IsHTML(true);
	$mail->From = "******";
	$mail->FromName = $nome;
	$mail->Host = "******";        
	$mail->Mailer = "smtp";                 
	$mail->AddAddress($email_para);      
	$mail->AddBCC("******", "******");
	$mail->Subject = $assunto;    
	$mail->Body = $message;
	$mail->SMTPAuth = "true";
	$mail->Username = "******";
	$mail->Password = "******";

	if(!$mail->Send()){ 
		$mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
		//$mensagemRetorno = 0;
	}else{
		$mensagemRetorno = 'E-mail enviado com sucesso!';		
		//$mensagemRetorno = 1;
	}
	
	echo $mensagemRetorno;

	

/*
	// Resposta automática para remetente
	$query = "SELECT nome_empresa from tb_funerarias where id_login = '$id_login'";
	$result = $conn->query($query);
	while($row = $result->fetch_assoc()){
		$nomeEmpresa = $row['nome_empresa']; 
	}

	$msg_automatica = "<a href='http://funeral24h.com.br'><img src='http://www.funeral24h.com.br/images/logo.jpg' style='float:left'/></a><br>";
	$msg_automatica .= "<table cellpadding='5' border='0' style='width:70%;text-align:left;font-size:13px;border:solid 1px #ccc;font-family:arial'>";
	$msg_automatica .= "<tr>";
	$msg_automatica .= "	<th colspan='2' style='font-size:15px;text-align:center;background-color: #efefef;border-bottom: dotted 1px #ccc;'>Obrigado por entrar em contato conosco!</th>";
	$msg_automatica .= "</tr>";
	$msg_automatica .= "<tr>";
	$msg_automatica .= "<td style='font-size:15px;text-align:center;'>Recebemos sua mensagem e iremos responder o mais breve possivel. Atenciosamente $nomeEmpresa.</td>";
	$msg_automatica .= "</tr>";
	$msg_automatica .= "</table>";
	$msg_automatica .= "<br/><br/>";
	
	//echo $messageRemetente;


	// Email resposta automática
	$mail2 = new PHPMailer();
	$mail2->SetLanguage("br");
	$mail2->IsMail();
	$mail2->IsHTML(true);
	$mail2->From = "envio-de-email@postclick.com.br";
	$mail2->FromName = "Funeral 24h";
	$mail2->Host = "postclick.com.br";        
	$mail2->Mailer = "smtp";                 
	$mail2->AddAddress($email_de);      
	//$mail2->AddBCC("elcioinfo@gmail.com", "Elcio Lima");
	$mail2->Subject = "Resposta automática";    
	$mail2->Body = $msg_automatica;
	$mail2->SMTPAuth = "true";
	$mail2->Username = "envio-de-email@postclick.com.br";
	$mail2->Password = "env878xxx";

	if(!$mail2->Send()){ 
		$mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
		//$mensagemRetorno = 0;
	}else{
		$mensagemRetorno = 'E-mail enviado com sucesso!';		
		//$mensagemRetorno = 1;
	}
	
	echo $mensagemRetorno;
*/
	
	include("../includes/close.php");
?>