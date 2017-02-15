<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
ini_set("display_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", dirname(__FILE__) . "/error_log.txt");
error_reporting(E_ALL);

include("includes/conn.php");
include("includes/functions.php");

$transAereo = ""; 
$transpAera ="";
$planoFuneral ="";
$atende24hs = "";
$tpMunicipal = "";
$tpParticular ="";
$uf = "";

if(isset($_REQUEST["transAereo"])){$transAereo = $_REQUEST["transAereo"];}
if(isset($_REQUEST["planoFuneral"])){$planoFuneral = $_REQUEST["planoFuneral"];}
if(isset($_REQUEST["atende24hs"])){$atende24hs = $_REQUEST["atende24hs"];}
if(isset($_REQUEST["tpMunicipal"])){$tpMunicipal = $_REQUEST["tpMunicipal"];}
if(isset($_REQUEST["tpParticular"])){$tpParticular = $_REQUEST["tpParticular"];}
if(isset($_REQUEST["uf"])){ $uf = $_REQUEST["uf"]; }


$sql_where = "";

if($transAereo != ""){
     $sql_where .= " and transAereo = 1 ";
}}
if($planoFuneral != ""){
     $sql_where .= " and planoFuneral = 1 ";
}
if($atende24hs != ""){
     $sql_where .= " and atende24hs = 1 ";
}
if($tpMunicipal != ""){
     $sql_where .= " and tp_particular = 'M' ";
}
if($tpParticular != ""){
     $sql_where .= " and tp_particular = 'P' ";
}
if($uf != ""){
     $sql_where .= " and uf in ('".str_replace(",","','", $ufs)."') or '$ufs' = '' ";
}

$sql = "SELECT * FROM tb_funerarias ";
if($sql_where != ""){
	 $sql .= " where cad_status = 1 ". $sql_where;
}

echo $sql;
exit;

$result = $conn->query($sql);


// loop
if ($result->num_rows > 0) {
	// output data of each row
	$total = 0;
	while($row = $result->fetch_assoc()) {
		//$ativo = $row["st_funeraria"] == 1 ? "ativo" : "desativado";
		
		$nome 		= $row["nome"];
		$logradouro = $row["logradouro"];
		$numero 	= $row["numero"];
		$complemento= $row["complemento"];
		$cep 		= $row["cep"];
		$bairro 	= $row["bairro"];
		$uf		 	= $row["uf"];
		$logo 		= $row["img_logo"];
		$cidade		= $row["cidade"];
		$link		= 'redirect("http://funeral24h.com.br/agenciafuneraria/SP/servicofunerariocemiterioaraca/servicofunerariocemiterioaraca.html")'; // $row["link"];
		$pag	 	= $row['path'];


		echo "<a href='http://funeral24h.com.br/agenciafuneraria/$uf/$pag'><div class='li-cemiterio search'>
				<figure>
					<img src='$logo' class='thumbnail img-responsive' style='width:242px; height: 140px !important; overflow:hidden'>
				</figure>
				<h5>$nome</h5>
				<ul>
				<li logradouro='$logradouro' numero='$numero' complemento='$complemento'>Endereço: $logradouro, $numero $complemento</li>
				<li cep='$cep'>CEP: $cep</li>
				<li bairro='$bairro'>Bairro: $bairro</li>
				<li cidade='$cidade'>Cidade: $cidade</li>
				<li estado='$uf'>Estado: $uf</li>
				</ul>
			</div></a>";

	}
} else {
	
	echo "<p class='alert alert-warning'>Erro: Nenhum resultado encontrado.</p>";
}


include("includes/close.php");
?>
</body>
</html>