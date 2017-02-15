<?php 

    session_start();     
    
    if(!isset($_SESSION['email']) && !isset($_SESSION['pass'])){
        session_destroy();
        echo "<script>location.href='http://funeral24h.com.br/login.html'</script>";
        
    }



    # recover tb_login's id_login
    $id_login = $_SESSION['id_login'];


    include("includes/conn.php");

    ## check whether initial date greater than $expira_anuncio variable
    $catch_anuncios = "SELECT id_anuncio,dt_end from tb_anuncios where id_login = '$id_login'";
    $anuncio = $conn->query($catch_anuncios);
    
    $date_now = strtotime(date("Y:m:d H:i:s"));

    while($row = $anuncio->fetch_assoc()){
        
        $id_anuncio     = $row['id_anuncio'];
        $dt_end_anuncio = strtotime($row['dt_end']); 

        if($date_now > $dt_end_anuncio)
        {
            $expired = true;
            $status_expired = "UPDATE tb_anuncios set ativo = '0' where id_anuncio = '$id_anuncio'";
            $conn->query($status_expired);
            $_SESSION['expired'] = true;

        } 
    }
    
    // IMPORTANT! no auxilio para verificar usuario para exclusao de conta.
    $email = $_SESSION['email'];
    
?>
<!DOCTYPE html>
<!-- Marcação de microdados adicionada pelo Assistente de marcação para dados estruturados do Google. -->
<!--[if IE 8]><html class="ie8"><![endif]--><!--[if IE 9]><html class="ie9"><![endif]--><!--[if !IE]><!-->
<html>
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="pt-br, en-US, es" />
    
	<title>Funeral24h, Painel de Anuncios</title>
	<meta name="description" content="COROAS DE FLORES 40% DESC. (11) 2615-7248">
	<meta name="keywords" content="Floricultura, coroa de flores, homenagem funebre, vila alpina, arrajos, decoração de casamento"/>
	<meta name="msvalidate.01" content="650A4BB7BF70760F0868F22EFFC18DBE" />
	<link rel="canonical" href="index.php" />
	
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Funeral24H - Informações funeral, transporte, urnas" />
	<meta property="og:description" content="Informações funeral, transporte, urnas" />
	<meta property="og:url" content="http://funeral24h.com.br/index.html" />
	<meta property="og:site_name" content="Funeral 24 horas" />
	<meta property="og:image" content="http://funeral24h.com.br/images/logo.jpg" />

	<meta name="siteinfo" content="/robots.txt" />
	<meta name="revisit-after" content="1 day" />
	<meta name="robots" content="index,follow" />
	<meta name="googlebot" content="index,follow" />
	<meta name="distribution" content="Global" />
	<meta name="author" content="elcio lima dos santos" />
	<meta name="copyright" content="www.funeral24h.com.br" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic%7CPT+Gudea:400,700,400italic%7CPT+Oswald:400,700,300" rel="stylesheet" id="googlefont"/>
    <style id="custom-style">
		@import 'css/bootstrap.min.css';
		@import 'css/font-awesome.min.css';
		@import 'css/prettyPhoto.css';
		@import 'css/colpick.css';
		@import 'css/owl.carousel.css';
		@import 'css/revslider.css';
		@import 'css/style.css';
		@import 'css/responsive.css';

        .msg-list{
            font-size:12px;
            color:#000;
            border-top:solid 1px #e5e5e5;
            white-space: nowrap;
            padding:5px;
        }
        .lido{
            background-color: #f4f4f4;
        }
        .naolido{
            font-weight: bold;
            background-color: #fff;
        }
        .selecionado{
            background-color: #ffffcc;
        }

        .ui-dialog { 
            width: 400px!important; 
            font-size: 12px !important;

        }

        .dialog.confirm.ui-dialog-content.ui-widget-content{
            text-align: center !important;
        }

	</style>	
    
    <link rel="stylesheet" href="/css/alertify.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" />
    <link rel="icon" type="image/png" href="images/icons/icon.png"/>
    <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-icon-72x72.png"/>
    <link rel="stylesheet" href="/css/confirm-delete.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-form.js"></script>
	<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js" style="padding: 0px; margin: 0px;"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>');</script>
    <!--[if lt IE 9]><script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script><![endif]-->
    <style id="custom-style">
    </style>
    <style>
        #submenu ul{
            list-style-type: none;
            margin-bottom: 30px;
            font-weight: bold;


        }
        #submenu ul li{
            display: inline;
            margin-right: 70px;
        }

        .container-anuncio{

            width: 850px;
            height: 130px;
            padding: 5px;
            margin-bottom: 10px;
            
            

        }

       
        .anuncio{
            float: left;
            width: 155px;
            height: 100px;
            margin-right: 33px;

            
            
            
        }

        .anuncio a{
            
            position: relative;
            top:5px;
        }

        .anuncio img{
            max-width:100px;
            max-height:90px;
            width: auto;
            height: auto;
        }

    
        #meus_anuncios .second{
            width:340px ;
            
        }

        #meus_anuncios .third{
            padding-top: 15px;
            
        }
        .head{
            margin-right: 150px;
        }
        .head-third{
            margin-left: 425px;
        }
    </style>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-78634394-1', 'auto');
		ga('send', 'pageview');
    </script>
    <script src="http://funeral24h.com.br/js/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="/js/alertify.min.js"></script>
</head>
<body>

        <div id="wrapper">
        <header id="header" class="header6">
            <div id="header-top">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="header-top-left">
                            </div>
                            
                            <div class="header-top-right">

                                <ul id="top-links" class="clearfix">

                                    
                                    
                                    <li>
                                        <a href="whatsapp://send?text=http://funeral24h.com.br/" data-action="share/whatsapp/share" title="Share via Whatsapp">
                                            
                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                            <span class=""> conectado: <strong><?php echo $_SESSION['email']; ?></strong></span>
                                                
                                                
                                                <span>

                                                
                                            </span>
                                            
                                        </a>
                                    </li>
                                    <li>
                                        <span>
                                        <?php if(isset($_SESSION['email'])) echo "<a href='sair.php'><i class='fa fa-undo' aria-hidden='true'></i> sair</a>"; ?>
                                        </span>
                                    </li>

                                </ul>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div id="inner-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 logo-container">
                            <h1 class="logo clearfix">
                                <span>Coroas de Flores - LIGUE: 11 2615-7248 - Faturamos para empresa, Boleto para 15 dias.</span> <a href="http://funeral24h.com.br/" title="Serviços Funerários"><img src="/images/logo.jpg" alt="funeral 24h"></a>
                            </h1>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 header-inner-right">
                            <div class="header-inner-right-wrapper clearfix">
                                
                                <div class="header-box contact-phones pull-right clearfix">
                                    
                                    <ul>
                                        <li>Emitimos nota fiscal NFe</li>
                                        <li><img alt="Velório 24 hs - Serviço Funerário - LIGUE 11 xxxx-xxxx"  src="/images/formas-de-pagamento2.png" style="height:58px;width:171px"></li>
                                    </ul>
                                </div>
                                

                                <div class="header-box contact-phones pull-right clearfix" style="padding-top:22px;">
                                    <!-- 
                                    <ul class="pull-left">
                                        <li style="margin-top:10px;font-size:14px;">Televendas 24h:</li>
                                        <li style="line-height:22px;font-size:22px;color:#000;"><span style="font-size:16px;">11</span> 4106-6772</li>
                                        <li style="line-height:22px;font-size:22px;"><span style="font-size:16px;">11</span> xxxx-xxxx</li> 
                                        <li style="line-height:22px;font-size:22px;color:#000;"><span style="font-size:16px;">11</span> xxxx-xxxx</li>
                                    </ul>
                                    -->
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-nav-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 clearfix">

                                <nav id="main-nav">
                                    <div id="responsive-nav">
                                        <div id="responsive-nav-button">Menu<span id="responsive-nav-button-icon"></span></div>
                                        <div class="responsive-telphone">(11) xxxx-xxxx</div>
                                    </div>
                                    <div class="menu-table">

                                        <ul class="menu clearfix">
                                            <li><a href="http://funeral24h.com.br/agenciafuneraria.html">AGÊNCIA FUNERÁRIA</a></li>
                                            <li><a href="http://funeral24h.com.br/coroadeflores.html">COROA DE FLORES</a></li>
                                            <li><a href="http://funeral24h.com.br/classificados.html">CLASSIFICADOS</a></li>
											<li><a href="http://funeral24h.com.br/servicosuteis.html">SERVIÇOS ÚLTEIS</a></li>
											<li><a href="http://funeral24h.com.br/anunciegratis">ANÚNCIE GRÁTIS</a></li>
                                            <li><a href="http://funeral24h.com.br/login.html">FAZER LOGIN</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
            <?php

                    $select_empresa = "SELECT nome_empresa from tb_funerarias where id_login = '$id_login'";
                    $select = $conn->query($select_empresa);
                    $row = $select->fetch_assoc();
                    $empresa = $row['nome_empresa'];


            ?>
        <section id="content">

            <div id="breadcrumb-container">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="http://funeral24h.com.br/">Home</a></li>
                        <li class="active">Painel Administrativo (<?php echo $empresa; ?>)</li>
                        
                    </ul>
                </div>
            </div>					

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-8 col-xs-12 main-content">

                                <div class="category-item-container">
                                    <div class="row">
									       
				                        <div class="container-tab">
    										<ul class="nav nav-tabs" role="tablist">
                                                <li class="active" id="meusanuncios"><a data-toggle="tab" href="#meus_anuncios" ><strong><i class="fa fa-calendar-o" aria-hidden="true"></i> Meus Anúncios</strong></a></li>
                                                <li><a data-toggle="tab" href="#cadastro"><strong><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Cadastro</strong></a></li>
                                                <li><a data-toggle="tab" href="#mensagens"><strong><i class="fa fa-envelope" aria-hidden="true"></i> Mensagens</strong></a></li>
                                                
                                                
                                            </ul>
                                            <spa id="loading" style="text-align:center;z-index:999;position:fixed;right:580px;top:240px;padding:5px;">
                                                         <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><br />
                                                         carregando...
                                                     </spa>
                                            <div class="tab-content"  style="padding-top: 20px;">

                                                <div id="meus_anuncios" class="tab-pane active">

                                                       
                                                        <nav id="submenu">
                                                        <?php
                                                            
                                                            $countAnuncios = "SELECT COUNT(ativo) as counter from tb_anuncios where id_login = '$id_login'";

                                                            $contador = $conn->query($countAnuncios);
                                                            $row = $contador->fetch_assoc();
                                                            $anun_publicado = $row['counter'];

                                                            $countExp = "SELECT COUNT(ativo) as expir from tb_anuncios where id_login = '$id_login'and ativo = '0'";

                                                            $contador2 = $conn->query($countExp);
                                                            $row = $contador2->fetch_assoc();
                                                            $anun_expir = $row['expir']; 


                                                        ?>
                                                            <ul>
                                                                <li>Publicado (<?php echo $anun_publicado; ?>)</li>
                                                                <li>Ativação Pendente (0)</li>
                                                                <li>Expirado (<?php echo $anun_expir; ?>)</li>
                                                                <li>Status</li>
                                                                <li><button><a href="anunciegratis#anuncie" style="text-align:center"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Novo anúncio</a></button></li>
                                                                <li>
                                                                    <button>
                                                                    <a id="trigger_del_conta" title="Excluir conta <?php echo $empresa; ?> irá também excluir anúncios publicados. Você tem certeza?" class="deletarConta" data-type="esta conta" href="remover-conta.php?id_login=<?php echo $id_login; ?>"><i class="fa fa-user-times" aria-hidden="true"></i> Excluir conta</a></button>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                        <?php
                                                        

                                                        $query_select = "SELECT * from tb_anuncios where id_login = '$id_login' order by id_anuncio desc";

                                                        $select = $conn->query($query_select);
                                                        $verificar = $select->num_rows;

                                                        if($verificar > 0){

                                                            while($row = $select->fetch_assoc()){

                                                                $id_anuncio = $row['id_anuncio'];
                                                                $titulo     = $row['titulo'];
                                                                $descricao  = $row['descricao'];
                                                                $telefone   = $row['telefone'];
                                                                $preco      = $row['preco'];
                                                                $uf         = $row['uf'];
                                                                $cidade     = $row['cidade'];
                                                                $cep        = $row['cep'];
                                                                $id_login   = $row['id_login'];
                                                                $img        = $row['images'];
                                                                $ativo      = $row['ativo'];

                                                                //pega o path da imagem a partir de /anuncios
                                                                $img_path = strstr($img,'anuncios');

                                                                $expired = false;

                                                                //registra uf e imagem path para futuras exclusoes
                                                                $_SESSION['uf_anuncio'] = $uf;
                                                                $_SESSION['img_anuncio'] = $img_path;

                                                        
                                                    ?> 
                                                    
                                                        <div class="container-anuncio" style="color:<?php if($date_now > $dt_end_anuncio){echo "silver"; $expired = true;}  ?>">
                                                            <div class="anuncio" style="padding:2px;border-radius:4px 4px;box-shadow:3px 3px 15px black">
                                                                <img style="width:160px;height:150px" src="<?php echo "agenciafuneraria/$uf/$id_login/$img_path"; ?>"/>
                                                                
                                                            </div>

                                                            <div class="anuncio second" style="line-height:27px">
                                                                <strong><?php echo $titulo; ?></strong> <br />
                                                                <strong>R$ <?php echo $preco; ?></strong> | <?php echo $descricao; ?><br />
                                                                <span style="display:<?php if($expired)echo "none"; ?>"><a href="" data-toggle="modal" data-target=".editar-anuncio<?php echo $id_anuncio; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar anúncio |</a>
                                                                    
                                                                    </span>
                                                                    <span style="display:<?php if($expired)echo "none"; ?>"><a href="planos.php#breadcrumb-container"><i class="fa fa-flag-o" aria-hidden="true"></i> Mudar de plano</a></span>
                                                                    
                                                                    <span style="display:<?php if($expired) echo "none"; ?>;position:relative;left:230px">
                                                                    
                                                                    <a style="color:red;font-size:14px" title="Tem certeza que deseja remover este anúncio" href="remover-anuncio.php?idAnuncio=<?php echo $id_anuncio;?>" id="remover_anuncio" class="deleteAnuncio" data-type="este anúncio">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Remover</a></span>
                                                                    
                                                                    <?php if($expired) echo "<div style='color:#e55353'>Período gratis expirou. <a style='top:0px' href='planos.php#breadcrumb-container'>Assine um plano</a></div>"; ?>
                                                                
                                                            </div>

                                                            <span class="anuncio third" style="width:50px;display:<?php if($expired) echo "none";?>;top:50px;font-weight:bold;font-size:12px;position:relative;color:green">
                                                                        <?php if($ativo == '1') echo '<i class="fa fa-bolt" aria-hidden="true"></i> ativo'; ?></span>
                                                        </div>    
                                                            
                                                        

                                                        <div class="modal fade editar-anuncio<?php echo $id_anuncio; ?>" role="dialog" aria-labelledby="myLargeModalLabel">
                                                          <div class="modal-dialog" >
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                      <h4 class="modal-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar anúncio</h4>
                                                                </div>  
                                                            
                                                            <div class="modal-body">
                                                            <form class="form-group" action="" method="POST" id="editar_anuncio" enctype="multipart/form-data">
                                                                <div class="row">
                                                                      <div class="col-md-6">
                                                                      <br />
                                                                        <label>Titulo</label><br />
                                                                        <input type="text" id="titulo-editar" required msg_erro="Titulo" name="titulo-editar" class="form-control input-md" obrigatorio="1" value="<?php echo $titulo; ?>" /><br />
                                                                        <label>Descrição</label><br />
                                                                        <input type="text" required id="descricao-editar" name="descricao-editar" class="form-control input-md" msg_erro="Descrição" obrigatorio="1" value="<?php echo $descricao; ?>" /><br />
                                                                        <label>Telefone</label><br />
                                                                        <input type="text" required id="tel-editar" name="tel-editar" obrigatorio="1" msg_erro="Telefone" class="form-control input-md" value="<?php echo $telefone; ?>" /><br />
                                                                        <label>Preço</label><br />
                                                                        <input type="text" required obrigatorio="1" msg_erro="Preço" id="preco-editar" name="preco-editar" class="form-control input-md" value="<?php echo $preco; ?>" />
                                                                      </div>
                                                                      <div class="col-md-6">
                                                                          <br />
                                                                          <label>CEP</label><br />
                                                                        <input type="text" required obrigatorio="1" msg_erro="Cep" id="cep-editar" name="cep-editar" class="form-control input-md" value="<?php echo $cep; ?>" /><br />
                                                                        <label>Estado</label><br />
                                                                        <input type="text" required obrigatorio="1" msg_erro="Estado" id="estado-editar" name="estado-editar" class="form-control input-md" value="<?php echo $uf; ?>" /><br />
                                                                        <label>Cidade</label><br />
                                                                        <input type="text" id="cidade-editar" name="cidade-editar" required obrigatorio="1" msg_erro="Cidade" class="form-control input-md" value="<?php echo $cidade; ?>" /><br />
                                                                        
                                                                        <button type="button" id="atualizar_anuncio" style="float:right;position:relative;top:25px" class="btn btn-custom-2"><i class="fa fa-check-circle" aria-hidden="true"></i> ATUALIZAR ANÚNCIO</button><br /><br /><br />
                                                                        <div style="float:right;font-size:13px;margin:10px;display:none" class="alert alert-success" id="msg-return" role="alert"></div>
                                                                      </div>
                                                                  </div>
                                                              
                                                              </div>
                                                            </form>
                                                            </div>
                                                          </div>
                                                        </div>
                                                          
                                                    <?php } 
                                                                 }else{
                                                        echo "<div>Você no momento não tem anuncios publicados, 
                                                            <a href='anunciegratis#anuncie'>clique aqui e anuncie gratis</a>
                                                            </div><hr>";
                                                        } 

                                                            
                                                            $select_cadastro = "SELECT * from tb_funerarias where id_login = '$id_login'";

                                                            //echo $select_cadastro;
                                                            //exit;

                                                            $consulta = $conn->query($select_cadastro);

                                                            while ($row = $consulta->fetch_assoc()) {

                                                                $nome_empresa     = $row['nome_empresa'];
                                                                $tel_empresa      = $row['telefone_empresa'];
                                                                $logradouro       = $row['logradouro'];
                                                                $cep_empresa      = $row['cep'];
                                                                $bairro_empresa   = $row['bairro'];
                                                                $uf_empresa       = $row['uf'];
                                                                $cidade_empresa   = $row['cidade'];
                                                                $nome_resp        = $row['nome_resp'];
                                                                $cel_resp         = $row['cel_resp'];
                                                                $img_empresa      = $row['img_logo'];

                                                            }
                                                                $img_path_empresa = strstr($img_empresa, $id_login);

                                                                // registra uf para futuras exclusão;
                                                                $_SESSION['uf'] = $uf_empresa;
                                                                $_SESSION['img_empresa'] = $img_path_empresa;


                                                        ?>
                                                </div>
                                              
                                                <div id="cadastro" class="tab-pane fade">
                                                    
                                                    <div class="row">
                                                        
                                                        <form method="POST" id="update-cadastro">
                                                            <div class="col-md-6">
                                                                <label>Nome da Empresa</label><br />
                                                                <input type="text" name="nome_empresa" id="nome_empresa"class="form-control input-md" value="<?php echo $nome_empresa; ?>"/>
                                                                <br />
                                                                <label>Telefone</label><br />
                                                                <input type="text" name="tel_empresa" id="tel_empresa" class="form-control input-md" value="<?php echo $tel_empresa; ?>"/>
                                                                <br />
                                                                <label>Logradouro</label><br />
                                                                <input type="text" id="logradouro_empresa" name="logradouro_empresa" class="form-control input-md" value="<?php echo $logradouro; ?>"/>
                                                                <br />
                                                                <label>CEP</label><br />
                                                                <input type="text" name="cep_empresa" id="cep_empresa"class="form-control input-md" value="<?php echo $cep_empresa; ?>"/>
                                                                <br />
                                                                <label>Bairro</label><br />
                                                                <input type="text" name="bairro_empresa" id="bairro_empresa"class="form-control input-md" value="<?php echo $bairro_empresa; ?>"/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Cidade</label><br />
                                                                <input type="text" id="cidade_empresa" name="cidade_empresa" class="form-control input-md" value="<?php echo $cidade_empresa; ?>"/>
                                                                <br />
                                                                <label>Estado</label><br />
                                                                <input type="text" id="uf_empresa" name="uf_empresa" class="form-control input-md" value="<?php echo $uf_empresa; ?>"/>
                                                                <br />
                                                                <label>Nome do Responsável</label><br />
                                                                <input type="text" id="nome_resp" name="nome_resp" class="form-control input-md" value="<?php echo $nome_resp; ?>"/>
                                                                <br />
                                                                <label>Celular Responsavel</label><br />
                                                                <input type="text" name="cel_resp" id="cel_resp" class="form-control input-md" value="<?php echo $cel_resp; ?>"/>
                                                                <br /><br />
                                                                <input type="hidden" name="identifier" value="<?php echo $id_user; ?>">
                                                                <button type="button" id="atualizar_cadastro" onclick="update_cadastro()" class="btn btn-custom-2">
                                                                    
                                                                    <i class="fa fa-check-circle" aria-hidden="true"></i> ATUALIZAR CADASTRO
                                                                </button>
                                                                <div id="msg-update" class="alert alert-success" role="alert" style="display:none; text-align:left">
                                                                    
                                                                </div>
                                                            </div>  
                                                        </form>

                                                    </div>
                                                   
                                                </div>

                                                <div id="mensagens" class="tab-pane fade">
                                                    
                                                    <div class="row">
                                                         
                                                        <div class="col-md-12" id="main-msg">
                                                            
                                                            <?php


                                                                 


                                                               $selectMsg = "SELECT * from tb_fale_conosco where id_login='$id_login' order by id desc";

                                                                $result = $conn->query($selectMsg);
                                                                
                                                                while($row = $result->fetch_assoc()){

                                                                    $id         = $row['id'];
                                                                    $nome       = $row['nome'];
                                                                    $email      = $row['email_de'];
                                                                    $telefone   = $row['telefone'];
                                                                    $msg        = $row['msg'];
                                                                    $assunto    = $row['assunto'];
                                                                    $datahr     = date("d-m-Y", strtotime($row['datahr']));
                                                                    $hr         = strftime( '%H:%M:%S', strtotime($row['datahr']) ) 
                                                                                                   

                                                                    
                                                             ?>
                                                             <div class="container-msg" style="overflow:auto;width:600px;height:auto;border-bottom:2px dotted silver;margin-bottom:10px">
                                                                 <ul>
                                                                    <li>
                                                                        <strong><p style="color:#84bb26">
                                                                            
                                                                            <?php echo strtoupper($nome); ?>
                                                                                <i class="fa fa-comments-o fa-2x" aria-hidden="true"></i>
                                                                            </p></strong>
                                                                        <p style="font-size:13px;line-height:2px;color:silver"><?php echo $datahr." ".$hr; ?>
                                                                            
                                                                        </p><br />
                                                                        <ul>
                                                                            <li>
                                                                                <i style="color:#84bb26" class="fa fa-quote-left fa-2x fa-pull-left fa-border" aria-hidden="true"></i>
                                                                                <p style="text-align:justify"><?php echo $msg; ?></p>
                                                                            </li>
                                                                        </ul>
                                                                        <p style="font-size:13px;text-align:right;color:silver"><?php echo $email." ".$telefone; ?></p>
                                                                    </li>
                                                                </ul>     
                                                             </div>
                                                            <?php

                                                                } // fim loop while
                                                            ?>
                                                            
                                                        </div>
                                                        
                                                    </div>        
                                                    
                                                <div id="fotos" class="tab-pane fade">
                                                    
                                                    <div class="row">
                                                        
                                                        
                                                    </div>
                                                   
                                                </div>

                                                
                                            </div> 
                                        </div> <!-- end div container-tab -->
                                    

                        </div>
                                </div>

								<div style="clear:all">
									<p>&nbsp;<p>
									<p>&nbsp;<p>
								</div>
								
							</div>
                        </div>

                    </div>
                </div>

            </div>
        </section>


        <section id="content">
            <div class="container">
                <div class="row">


                    <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                        <div class="widget">

                            <div class="widget subscribe">
                                <span><h3>SEJA O PRIMEIRO A CONHECER</h3>
                                <p>Cadastre seu e-mail e receba nossas promoções, novidades e muito mais.</p>
                                <form action="#" id="subscribe-form">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="subscribe-email" placeholder="Cadastre seu e-mail"/>
                                    </div>
                                    <input type="submit" value="Cadastrar" class="btn btn-custom"/>
                                </span></form>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                        <div class="widget">

                            <div class="widget testimonials">
                                <h3>Testemunhos</h3>
                                <div class="testimonials-slider flexslider sidebarslider">
                                    <ul class="testimonials-list clearfix">
                                        <li>
                                            <div class="testimonial-details">
                                                <header>Eu recomendo!</header>
                                                Fui super bem atendida, não tive problema nenhum..
                                            </div>
                                            <figure class="clearfix">
                                                <img src="/images/testimonials/anna.jpg" alt="Entrega Imediata" width="75" height="75">
                                                <figcaption>
                                                    <a href="#">Ana Falconi</a>
                                                    <span>06.08.2015</span>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <div class="testimonial-details">
                                                <header>Excêlente Atendimento!</header>
                                                Meus parabéns, minha encomenda chegou perfeita
                                            </div>
                                            <figure class="clearfix">
                                                <img src="/images/testimonials/jake.jpg" alt="Floricultura Online" width="75" height="75">
                                                <figcaption>
                                                    <a href="#">Glaúcio Barbosa</a>
                                                    <span>17.05.2015</span>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                        <div class="widget">


                            <div class="widget latest-posts">
                                <h3>POSTS RECENTES</h3>
                                <div class="latest-posts-slider flexslider sidebarslider">
                                    <ul class="latest-posts-list clearfix">
                                        <li>
                                            <a href="single.html">
                                                <figure class="latest-posts-media-container">
                                                    <img class="img-responsive" src="/images/blog/post1-small.jpg" alt="Floricultura online" width="270" heigth="120"/>
                                                </figure>
                                            </a>
                                            <h4><a href="single.html">Envie coroa de Flores no dia dos finados</a></h4>
                                            <p>
                                                Realizamos entregas de coroa de flores nos cemitérios de São Paulo no dia de Finados.
                                            </p>
                                            <div class="latest-posts-meta-container clearfix">
                                                <div class="pull-left"><a href="#">Leia Mais...</a></div>
                                                <div class="pull-right">12.05.2013</div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="single.html">
                                                <figure class="latest-posts-media-container">
                                                    <img class="img-responsive" src="/images/blog/post2-small.jpg" alt="Floricultura online" width="270" heigth="120"/>
                                                </figure>
                                            </a>
                                            <h4><a href="single.html">Homenagem Póstuma com até 50% desc</a></h4>
                                            <p>* Desconto progressivo: ganhe até 50% de desconto na compra de 2 ou mais condolências.</p>

                                            <div class="latest-posts-meta-container clearfix">
                                                <div class="pull-left">
                                                    <a href="#">Leia Mais...</a>
                                                </div>
                                                <div class="pull-right">10.05.2013</div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="single.html">
                                                <figure class="latest-posts-media-container"><img class="img-responsive" src="/images/blog/post3-small.jpg" alt="Floricultura online" width="270" heigth="120"/></figure>
                                            </a>

                                            <h4><a href="#">Condolências com até -50% desc</a></h4>

                                            <p>* Desconto progressivo: ganhe até 50% de desconto na compra de 2 ou mais condolências.</p>

                                            <div class="latest-posts-meta-container clearfix">
                                                <div class="pull-left"><a href="#">Leia Mais...</a></div>
                                                <div class="pull-right">01.09.2015</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 sidebar">

                        <div class="widget">

                            <div class="widget banner-slider-container">
                                <div class="banner-slider flexslider">
                                    <ul class="banner-slider-list clearfix">
                                        <li><a href="http://funeral24h.com.br/coroadeflores.html"><img src="http://funeral24h.com.br/images/banner1.jpg" alt="Banner 1" width="270" heigth="400"/></a></li>
                                        <li><a href="http://funeral24h.com.br/coroadeflores.html"><img src="http://funeral24h.com.br/images/banner2.jpg" alt="Banner 2" width="270" heigth="400"/></a></li>
                                        <li><a href="http://funeral24h.com.br/coroadeflores.html"><img src="http://funeral24h.com.br/images/banner3.jpg" alt="Banner 3" width="270" heigth="400"/></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
				
            </div>
        </section>

        <footer id="footer">

            <div id="twitterfeed-container">
                <div class="container">
                    <div class="row">
                        <div class="twitterfeed col-md-12">
                            <p class="loading">As coroas de flores têm o objetivo simbolico de "coroar" a pessoa falecida, é uma forma de homenageá-la por ter cumprido sua missão, assim como enfeitar o velório.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div id="inner-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12 widget">
                            <h3>Mapa do Site</h3>
                            <ul class="links">
								<li><a href="http://funeral24h.com.br/agenciafuneraria.html">Agência Funerária</a></li>
								<li><a href="http://funeral24h.com.br/coroadeflores.html">Coroa de Flores</a></li>
								<li><a href="http://funeral24h.com.br/classificados.html">classificados</a></li>
								<li><a href="http://funeral24h.com.br/login.html">FAZER LOGIN</a></li>
								<li><a href="http://funeral24h.com.br/contato.html">Contato</a></li>
                            </ul>
							
							<h3>Precisa de Coroa?</h3>
                            <ul class="links">
								<li><a href="http://funeral24h.com.br/coroa-de-flores.html">Coroa de Flores</a></li>
								<li><a href="sugestoes-de-frase.html">Sugestões de Frases</a></li>
								<li><a href="formas-de-pagamento.html">Formas de Pagamento</a></li>
								<li><a href="duvidas-frequentes.html">Dúvidas Frequentes</a></li>
                            </ul>
                        </div>
						
						<div class="col-md-3 col-sm-4 col-xs-12 widget">
							<h3>Locais de Entrega</h3>
                            <ul class="links">
								<li><a href="#1">link 1</a></li>
								<li><a href="#2">link 2</a></li>
                            </ul>
                        </div>
						
                        <div class="clearfix visible-sm"></div>
                    </div>

                </div>

            </div>


            <div id="footer-bottom">

                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12 footer-social-links-container">

                            <ul class="social-links clearfix">
                                <li><a href="https://www.facebook.com/funeral24h" target="_blank" class="social-icon icon-facebook"></a></li>
                                <li><a href="https://plus.google.com/+funeral24hBrCoroaDeFlores/videos" target="_blank" class="social-icon icon-twitter"></a></li>
                                <li><a href="#" class="social-icon icon-rss"></a></li>
                                <li><a href="#" class="social-icon icon-delicious"></a></li>
                                <li><a href="#" class="social-icon icon-linkedin"></a></li>
                                <li><a href="#" class="social-icon icon-flickr"></a></li>
                                <li><a href="#" class="social-icon icon-skype"></a></li>
                                <li><a href="http://funeral24h.com.br/contato.html" target="_blank" class="social-icon icon-email"></a></li>
                            </ul>

                        </div>

                        <div class="col-md-5 col-sm-5 col-xs-12 footer-text-container">
                            <p>© 2016 Funeral 24 horas | CNPJ: 15.371.501/0001-51.</p>
							<p>Todos os direitos reservados.</p>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

    </div><a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a>
    <script src="/js/bootstrap.min.js"></script>
    
    <script src="/js/smoothscroll.js"></script>
    <script src="/js/jquery.debouncedresize.js"></script>
    <script src="/js/retina.min.js"></script>
    <script src="/js/jquery.placeholder.js"></script>
    <script src="/js/jquery.hoverIntent.min.js"></script>
    <script src="/js/twitter/jquery.tweet.min.js"></script>
    <script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jflickrfeed.min.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/jquery.themepunch.tools.min.js"></script>
    <script src="/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/js/colpick.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/jquery.easy-confirm-dialog.js"></script>
    <script src="/js/confirm-delete.js"></script>
    <script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
    <script>$(function () { jQuery("#slider-rev").revolution({ delay: 5e3, startwidth: 870, startheight: 520, onHoverStop: "true", hideThumbs: 250, navigationHAlign: "center", navigationVAlign: "bottom", navigationHOffset: 0, navigationVOffset: 15, soloArrowLeftHalign: "left", soloArrowLeftValign: "center", soloArrowLeftHOffset: 0, soloArrowLeftVOffset: 0, soloArrowRightHalign: "right", soloArrowRightValign: "center", soloArrowRightHOffset: 0, soloArrowRightVOffset: 0, touchenabled: "on", stopAtSlide: -1, stopAfterLoops: -1, dottedOverlay: "none", fullWidth: "on", spinned: "spinner4", shadow: 0, hideTimerBar: "on" }); var o = function () { var o = $(window).width(); if (767 >= o && $("#slider-rev-container").length) { var e = $("#slider-rev").height(); console.log(e), $(".slider-position").css("padding-top", e), $(".main-content").css("position", "static") } else $(".slider-position").css("padding-top", 0), $(".main-content").css("position", "relative") }; o(), $.event.special.debouncedresize ? $(window).on("debouncedresize", function () { o() }) : $(window).on("resize", function () { o() }) });$(document).ready(function(){ f_carregarAjax2("div_footer","tudo","index"); });

      
       //remover anuncio
        /*$('a#remover_anuncio').click(function(){
            
               var valueConfirm = confirm("Tem certeza que deseja remover este anúncio?");
                
                if(!valueConfirm){
                   return false;
                }
            
        }); */
            
        
            
       
        </script>
</body>
</html>
<script>
    
    $(document).ready(function(){
        $("#cep_empresa").mask("99999-999"); 
        $("#tel_empresa").mask("(99)9999-9999");
        $("#cel_resp").mask("(99)9999-9999"); 
        $("#tel-editar").mask("(99)9999-9999"); 
        $("#cep-editar").mask("99999-999"); 

        

    });

</script>
<script>
    f_openCorpo = function(id){

        var msg_ok = $('#container-msg'+id).hasClass('lido');
        
        if(msg_ok){

            $('#responde-msg'+id).fadeIn();
            $('#field-msg'+id).prop('disabled',true);
            $('#field-msg'+id).css('background','white');
            $('#bt-enviar'+id).hide();
        }else{
            
            $("#corpo-msg"+id).fadeIn();    
        }

    }

    function f_showCE(){
    
       $('.window').fadeOut();

        
        
    }

    function f_respondeMessages(id){
        $("#responde-msg"+id).fadeIn();
        $("#corpo-msg"+id).fadeOut();
    }

   

/*    function f_envia_msg(id){
        
        var campo_msg = document.getElementById("field-msg"+id).value;
        if(campo_msg == ""){
            alert("Por favor insira sua mensagem.");
        }
        else{

            var form_resp = $('#form-resp'+id);

            $.post("ajax-msg-resposta.php", $(form_resp).serialize())
            .done(function(data){
                $("#notify-success").css('z-index','9999');
                $("#notify-success").fadeIn();
                $("#notify-success").html(data);
                $("#field-msg"+id).val('');
                $("#notify-success").fadeOut(6000);
                $('.window').hide();


            });
        }

    } */

    
         $("#atualizar_anuncio").click(function(){
            
            
           $("#editar_anuncio").ajaxSubmit({
                url: "ajax-update-anuncios.php",
                type: "POST",
                success: function(data){
                    $("#msg-return").fadeIn();
                    $("#msg-return").html(data);
                    
                    
                }
            }); 
         });


        $( document ).ready( function( )
        {
            //$( '.deleteAnuncio' ).bootstrap_confirm_delete( );

            //$( '.deletarConta' ).bootstrap_confirm_delete( );
        } );

        //script para aparecer loading de carregamento
        setTimeout(function(){
            $("#loading").fadeOut(); 
        },1500);

       
       // Excluir perfil da conta
       $(".deletarConta").easyconfirm(function(){
            alert("Conta excluida!");
            return true;
       });

       // Remover anúncios
       $(".deleteAnuncio").easyconfirm(function(){
            alert("Anúncio removido!");
            return true;
       });     

        
   
</script>
