<?php
 
	ini_set("display_errors", 1);
	ini_set("log_errors", 1);
	ini_set("error_log", dirname(__FILE__) . "/error_log.txt");
	error_reporting(E_ALL);

	session_start();

	//$id_login = $_SESSION['id_login'];
	$id_fun = $_SESSION['id_fun'];
	// hora
	$nome 		= $_POST["nome"];
	$email_de 	= $_POST["email_de"];
	$email_para	= $_POST["email_para"];
	$telefone	= $_POST["telefone"];
	$celular	= $_POST["celular"];
	$assunto    = $_POST["assunto"];
	$mensagem 	= $_POST["mensagem"];

	
	/*
	echo "nome:".$nome."<br>";
	echo "de:".$email_de."<br>";
	echo "para:".$email_para."<br>";
	echo "tel:".$telefone."<br>";
	echo "cel:".$celular."<br>";
	echo "assunto:".$assunto."<br>";
	echo "msg:".$mensagem."<br>";
	exit;
	*/



	include("../includes/conn.php");
	
	/*$msg = "";
	$msg .= "<a href='http://funeral24h.com.br'><img src='http://www.funeral24h.com.br/images/logo.jpg' style='float:left'/></a><br>";
	$msg .= "<table cellpadding='5' border='1' style='width:70%;text-align:left;font-size:13px;border:solid 1px #ccc;font-family:arial'>";
	$msg .= "<tr>";
	$msg .= "<th colspan='2' style='font-size:15px;text-align:center;background-color: #efefef;border-bottom: dotted 1px #ccc;'>Mensagem do Formulário de Contato - Fale conosco</th></tr>";
	$msg .= "<tr><td style='font-size:15px'>Nome</td><td style='font-size:15px'>$nome</td></tr>";
	$msg .= "<tr><td style='font-size:15px'>De:</td><td style='font-size:15px'>$email_de</td></tr>";
	$msg .= "<tr><td style='font-size:15px'>Para:</td><td style='font-size:15px'>$email_para</td></tr>";
	$msg .= "<tr><td style='font-size:15px'>Telefone</td><td style='font-size:15px'>$telefone</td></tr>";
	$msg .= "<tr><td style='font-size:15px'>Celular</td><td style='font-size:15px'>$celular</td></tr>";
	$msg .= "<tr><td style='font-size:15px'>Assunto</td><td style='font-size:15px'>$assunto</td></tr>";
	$msg .= "<tr><td colspan='2' style='font-size:15px'>$mensagem</td></tr>";
	$msg .= "</table>";
	$msg .= "<br/><br/>"; */


	// grava a mensagem
	$query = "INSERT INTO tb_fale_conosco (id_login, datahr, nome, email_de, email_para, telefone, celular, assunto, msg) values ('".$id_fun."', now(),'".$nome."','".$email_de."','".$email_para."','".$telefone."','".$celular."','".$assunto."','".$mensagem."')";

	$conn->query($query);
	


	/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/
	 
	 
	include '/home/floriculturapert/phpmailer/class.phpmailer.php';

	// e-mail fale conosco	
	/*$mail = new PHPMailer();
	$mail->SetLanguage("br");
	$mail->IsMail();
	$mail->IsHTML(true);
	$mail->From = "******"; // $email_de; 
	$mail->FromName = $nome;
	$mail->Host = "******";        
	$mail->Mailer = "smtp";                 
	$mail->AddAddress($email_para);      
	$mail->AddBCC("******", "******");
	$mail->Subject = $assunto;    
	$mail->Body = $msg;
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