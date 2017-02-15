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

$sql = "SELECT * FROM tb_funerarias ";
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
		$complemeto	= $row["complemento"];
		$cep 		= $row["cep"];
		$bairro 	= $row["bairro"];
		$uf		 	= $row["uf"];
		$logo 		= $row["logo"];
		$cidade		= $row["cidade"];
		
		echo "<div class='li-cemiterio search' onclick='redirect();'>
				<figure>
					<img src='$logo' class='thumbnail img-responsive' style='width:242px; height: 140px !important; overflow:hidden'>
				</figure>
				<h5>$nome</h5>
				<ul>
				<li logradouro='Avenida Itaberaba' numero='250'>Endereço: $logradouro, $numero</li>
				<li cep='02734000'>CEP: $cep</li>
				<li bairro='Nossa Senhora do O'>Bairro: $bairro</li>
				<li cidade='Sao Paulo'>Cidade: $cidade</li>
				<li estado='SP'>Estado: $uf</li>
				</ul>
			</div>";
		
		
	}
} else {
	echo "<div class='li-cemiterio search'>Nenhum resultado encontrado.</div>";
}


include("includes/close.php");
?>
</body>
</html>