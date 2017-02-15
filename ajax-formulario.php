<?php

$email_de_funeraria = "";
if(isset($_GET['p1'])){
	$res = explode("#", $_GET['p1']);
	echo "<pre>$res</pre>";

	//foreach ($res as $key => $value) {
	//}
	//$email_de_funeraria = $_GET['p1'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<style>
		label{
			text-align: left;	
		}
		
		#form-cadastro input{
			text-align: left;
		}

		#form-cadastro select{
			width: 100%;
		}

		.control-label{

			width:100%;
		}

		table{
			border:0px solid white;
		}

		form textarea{
			resize:none;
		}

		input #envia{
			top:10px;
		}
	</style>
	<link rel="stylesheet" href="http://funeral24h.com.br/css/style.css">
    <link rel="stylesheet" href="http://funeral24h.com.br/css/responsive.css">
	<script src="http://funeral24h.com.br/js/bootstrap.min.js"></script>
	<script src="http://funeral24h.com.br/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="http://funeral24h.com.br/js/jquery.maskedinput.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="http://funeral24h.com.br/js/jquery-1.11.1.min.js"><\/script>');</script>
	
</head>
<body>

<div id="wrapper">

	<header class="content-title">
		<h2 class="title">Fale Conosco</h2>
	</header>

	<p id="msg_sucesso" class="alert alert-success" style="display:none"></p>
	

	<div class="col-md-12">
		<div class="row">
		    <form id="form_contato" method="get">
				<div class="col-md-7 col-sm-12 col-xs-12"><div class="input-group">
					<span class="input-group-addon">
						<span class="input-icon input-icon-user"></span>
						    <span class="input-text">Nome&#42;</span>
						</span> 
						<input type="text" name="nome" id="nome" required class="form-control input-lg" obrigatorio="1" msg_erro="Nome"/>
						</div>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="input-icon input-icon-email_de"></span>
							<span class="input-text">E-mail&#42;</span>
							</span> 
							<input type="email_de" name="email_de" id="email_de" required class="form-control input-lg" obrigatorio="1" msg_erro="E-mail"/>
							
						</div>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="input-icon input-icon-subject"></span>
							<span class="input-text">Telefone&#42;</span>
							</span> 
							<input type="text" name="telefone" id="telefone" required class="form-control input-lg" obrigatorio="1" msg_erro="Assunto"/>
						</div>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="input-icon input-icon-subject"></span>
							<span class="input-text">Celular</span>
							</span> 
							<input type="text" name="celular" id="celular" required class="form-control input-lg" obrigatorio="1" msg_erro="Assunto"/>
							
						</div>
						<p class="item-desc">Preencha os campos obrigatórios *</p>
					    </div>
					    <div class="col-md-5">
					    	<div class="input-group">
							<span class="input-group-addon">
							<span class="input-icon input-icon-subject"></span>
							<span class="input-text">Assunto *</span>
							</span> 
							<input type="text" name="assunto" id="assunto" required class="form-control input-lg" obrigatorio="1" msg_erro="Assunto"/>
							
						</div>
							<div class="input-group textarea-container">
							<span class="input-group-addon">
							<span class="input-icon input-icon-message"></span>
							<span class="input-text">Sua Mensagem *</span>
							</span>
							<textarea name="mensagem" id="mensagem" class="form-control" cols="30" rows="6"  obrigatorio="1" msg_erro="Mensagem"></textarea>
						</div>
						<input type="hidden" name="id_fun" value="<?php echo $_GET['id_fun']; ?>" />
						<input type="button" id="envia" class="btn btn-custom-2" value="ENVIAR MENSAGEM"  onclick="valida_contato()">
				</div>
				
        	</form>
		</div>
	</div>

</div>

</body>

</html>

<script type="text/javascript">
    jQuery(function($){
    	$("#telefone").mask("(99) 9999-9999");
    	$("#celular").mask("(99) 9999-9999");
  
    	//pega o valor do campo email_de e coloca dentro de um campo hidden
    	var valoremail_de 	= $("#email_de").val();
    	var valor 		= $("#email_para").val(valoremail_de);
    	

    });

  
</script>


