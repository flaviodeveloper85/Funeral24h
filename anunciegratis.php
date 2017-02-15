<?php 

    session_start();     
    
    if(!isset($_SESSION['email']) && !isset($_SESSION['pass'])){
        session_destroy();
        echo "<script>location.href='http://funeral24h.com.br/login.html'</script>";
        
    }

    $email = $_SESSION['email'];
    

    include("includes/conn.php");

    //query catchs the client personal information
   /* $query = " select   a.*, b.*
                from    tb_funerarias a
            inner join  tb_login b 
                where   a.id_login = b.id_login ";
    $result = $conn->query($query);

    while($row = $result->fetch_assoc()){

        $identificador = $row["id_login"];
        $idEmpresa     = $row["id_empresa"];
        $nome          = $row["nome_empresa"];
        $endereco      = $row["logradouro"];
        $tel           = $row["telefone_empresa"];
        $bairro        = $row["bairro"];
        $uf            = $row["uf"];
        $cidade        = $row["cidade"];
        $transpAereo   = $row["transp_areo"];
        $transpInterm  = $row["transp_interm"];
        $planoFuneral  = $row["plano_funeral"];
        $atende24h     = $row["atende_24h"];
        $cep           = $row["cep"];
        $nomeResp      = $row["nome_resp"];
        $celResp       = $row["cel_resp"];
    }*/

   

?>
<!DOCTYPE html>
<!-- Marcação de microdados adicionada pelo Assistente de marcação para dados estruturados do Google. -->
<!--[if IE 8]><html class="ie8"><![endif]--><!--[if IE 9]><html class="ie9"><![endif]--><!--[if !IE]><!-->
<html>
<!--<![endif]-->
<head>
    <meta charset="utf-8"/><meta http-equiv="content-language" content="pt-br, en-US, es" />
    
	<title>Funeral24h, LIGUE: 11 xxxx-xxxx</title>
	<meta name="description" content="COROAS DE FLORES 40% DESC. (11) 2615-7248">
	<meta name="keywords" content="Floricultura, coroa de flores, homenagem funebre, vila alpina, arrajos, decoração de casamento"/>
	<meta name="msvalidate.01" content="650A4BB7BF70760F0868F22EFFC18DBE" />
	<link rel="canonical" href="index.php" />
	
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Funeral24h - Informações funeral, transporte, urnas" />
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
		@import '/css/bootstrap.min.css';
		@import '/css/font-awesome.min.css';
		@import '/css/prettyPhoto.css';
		@import '/css/colpick.css';
		@import '/css/owl.carousel.css';
		@import '/css/revslider.css';
		@import '/css/style.css';
		@import '/css/responsive.css';
	</style>	
    <link rel="icon" type="image/png" href="images/icons/icon.png"/>
    <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-icon-72x72.png"/>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js" style="padding: 0px; margin: 0px;"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>');</script>
    <!--[if lt IE 9]><script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script><![endif]-->
    <style id="custom-style">
    </style>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-78634394-1', 'auto');
		ga('send', 'pageview');
    </script>
    <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
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
                                        <a href="painel.php#meusanuncios">
                                        <i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
                                        <span class="hide-for-xs"> Painel Administrativo</span>
                                       </a>
                                    </li>

                                    <li>
                                        <a href="whatsapp://send?text=http://funeral24h.com.br/" data-action="share/whatsapp/share" title="Share via Whatsapp">
                                            <span class="top-icon header-box-icon-whatsap"></span>
                                            <span class="hide-for-xs">conectado: <strong><?php echo $_SESSION['email']; ?></strong></span>
                                            <span style="float:right; color:#fff"><a href="sair.php"><i class='fa fa-undo' aria-hidden='true'></i> sair</a></span>
                                        </a>
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
                                <span>Coroas de Flores - LIGUE: 11 2615-7248 - Faturamos para empresa, Boleto para 15 dias.</span> <a href="http://funeral24h.com.br/" title="Serviços Funerários"><img src="/images/logo.jpg" alt="funeral24h"></a>
                            </h1>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 header-inner-right">
                            <div class="header-inner-right-wrapper clearfix">
                                
                                <div class="header-box contact-phones pull-right clearfix">
                                    <span class="header-box-icon header-box-icon-confianca"></span>
                                    <ul>
                                        <li>Emitimos nota fiscal NFe</li>
                                        <li><img alt="Velório 24 hs - Serviço Funerário - LIGUE 11 xxxx-xxxx"  src="/images/formas-de-pagamento2.png" style="height:58px;width:171px"></li>
                                    </ul>
                                </div>
                                

                                <div class="header-box contact-phones pull-right clearfix" style="padding-top:22px;">
                                    <span class="header-box-icon header-box-icon-earphones"></span>
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
											<li><a href="http://funeral24h.com.br/anunciegratis.php">ANÚNCIE GRÁTIS</a></li>
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
            
        <section id="content">

            <div id="breadcrumb-container">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="http://funeral24h.com.br/">Home</a></li>
                        <li class="active" id="anuncie">Anuncie Gratis</li>
                        
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
									
				
										<header class="content-title">
											<h2 class="title">Anúncie Grátis</h2>
										</header>
										
                                    <form id="form-anuncio" method="POST" action="ajax-anuncios2.php" enctype="multipart/form-data">
										<div class="row">
                                            <div class="col-md-6">
                                                <h2>Informações do Anúncio</h2>
                                                    
                                                    <label>Título *</label><br/>
                                                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Informe um título" size="80"/>
                                                    <br>
                                                    <label>Descrição *</label><br/>
                                                    <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Informe uma descrição do anúncio" size="80"/>
                                                    <br>

                                                    <label>Telefone *</label><br/>
                                                    <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Informe um numero de telefone" size="80"/>
                                                    <br>

                                                    <label>Preço *</label><br/>
                                                    <input type="text" name="preco" id="preco" class="form-control" placeholder="R$ 0000,00" size="80"/>
                                                    <br>    
                                                    
                                                
                                                    

                                            </div>
                                            <div class="col-md-6">
                                                <br /><br />
                                                <label>CEP *</label><br/>
                                                    <input type="text" name="cep" id="cep" class="form-control" />
                                                    <br>
                                                    <label>Estado *</label><br/>
                                                    <select name="estado" id="estado" class="form-control">
                                                        <option value="00">Selecione um estado</option>
                                                    </select>
                                                    <br>
                                                    <label>Cidade *</label><br/>
                                                    <select name="cidade" id="cidade" class="form-control">
                                                        <option value="01">Selecione uma cidade</option>
                                                    </select>
                                                     <br />
                                                     <label>Adicione foto</label><br/>
                                                     <span id="loading" style="text-align:center;z-index:999;position:fixed;right:580px;top:240px;padding:5px;">
                                                         <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><br />
                                                         carregando...
                                                     </span>
                                                    <input type="file" name="fotos" id="fotos" class="form-control"/>

                                                    <div id="msg-alert" class="alert alert-danger" role="alert" style="display:none">
                                                          <span class="glyphicon glyphicon-envelope">

                                                          <span class="sr-only"></span>

                                                    </div>
                                                <p>Campos Obrigatórios *</p>
                                                <br />
                                                <input type="hidden" name="id_login" value="<?php echo $_SESSION['email']; ?>">
                                                
                                                <input type="button" class="btn btn-custom-2" id="publicar" style="float:right" value="PUBLICAR ANÚNCIO" />
                                                <br /><br />
                                                <div id="msg-anuncio" class="alert alert-success" role="alert" style="display:none; text-align:left">
                                            </div>
                                            

                                        </div>
                                        
                                    </form>

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
                                        <li><a href="http://funeral24h.com.br/coroadeflores.html"><img src="/images/banner1.jpg" alt="Banner 1" width="270" heigth="400"/></a></li>
                                        <li><a href="http://funeral24h.com.br/coroadeflores.html"><img src="/images/banner2.jpg" alt="Banner 2" width="270" heigth="400"/></a></li>
                                        <li><a href="http://funeral24h.com.br/coroadeflores.html"><img src="/images/banner3.jpg" alt="Banner 3" width="270" heigth="400"/></a></li>
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
                            <p>© 2016 Velório 24 horas | CNPJ: 15.371.501/0001-51.</p>
							<p>Todos os direitos reservados.</p>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

    </div><a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.debouncedresize.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="/js/jquery.placeholder.js"></script>
    <script src="/js/jquery.hoverIntent.min.js"></script>
    <script src="/js/twitter/jquery.tweet.min.js"></script>
    <script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jflickrfeed.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.themepunch.tools.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/colpick.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-form.js"></script>
    <script>$(function () { jQuery("#slider-rev").revolution({ delay: 5e3, startwidth: 870, startheight: 520, onHoverStop: "true", hideThumbs: 250, navigationHAlign: "center", navigationVAlign: "bottom", navigationHOffset: 0, navigationVOffset: 15, soloArrowLeftHalign: "left", soloArrowLeftValign: "center", soloArrowLeftHOffset: 0, soloArrowLeftVOffset: 0, soloArrowRightHalign: "right", soloArrowRightValign: "center", soloArrowRightHOffset: 0, soloArrowRightVOffset: 0, touchenabled: "on", stopAtSlide: -1, stopAfterLoops: -1, dottedOverlay: "none", fullWidth: "on", spinned: "spinner4", shadow: 0, hideTimerBar: "on" }); var o = function () { var o = $(window).width(); if (767 >= o && $("#slider-rev-container").length) { var e = $("#slider-rev").height(); console.log(e), $(".slider-position").css("padding-top", e), $(".main-content").css("position", "static") } else $(".slider-position").css("padding-top", 0), $(".main-content").css("position", "relative") }; o(), $.event.special.debouncedresize ? $(window).on("debouncedresize", function () { o() }) : $(window).on("resize", function () { o() }) });$(document).ready(function(){ f_carregarAjax2("div_footer","tudo","index"); });

            
       
        </script>
</body>
</html>
<script>
    
    $(document).ready(function(){
        
        $("#telefone").mask("(99)9999-9999"); 
        $("#cep").mask("99999-999"); 
        

       /* $("#publicar").click(function(){
            $("form[id='form-anuncio']").submit();
        });*/

        $("#publicar").click(function(){

            var titulo           =   document.getElementById("titulo").value;
            var descricao        =   document.getElementById("descricao").value;
            var preco            =   document.getElementById("preco").value;
            var telefone         =   document.getElementById("telefone").value;
            var cep              =   document.getElementById("cep").value;
            var estado           =   document.getElementById("estado").value;
            var cidade           =   document.getElementById("cidade").value;
            

            var erro = 0;
            var msg = "";

            if(titulo == ""){msg += "- Titulo\n";erro = 1;}
            if(descricao == ""){msg += "- Descrição\n";erro = 1;}
            if(telefone == ""){msg += "- Telefone\n";erro = 1;}
            if(preco == ""){msg += "- Preço\n";erro = 1;}
            if(cep == ""){msg += "- CEP\n";erro = 1;}
            if(estado == ""){msg += "- Estado\n";erro = 1;}
            if(cidade == ""){msg += "- Cidade\n";erro = 1;}
               
        //expressao regular para um email valido
        /*var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var emailaddressVal = email_solicitante;
            if(!emailReg.test(emailaddressVal)) {
                alert("E-mail inválido");
                exit; */
        

            if(erro != 1){

                $("form[id='form-anuncio']").submit();
            }else{

                alert("Verifique os seguintes campos:\n\n"+msg);

                
            } 

            

        }); 

        setTimeout(function(){
            $("#loading").fadeOut();
        }, 1500);


    });   
</script>
<script type="text/javascript">
window.onload = function() {
new dgCidadesEstados(document.getElementById('estado'), document.getElementById('cidade'), true);
}
</script>