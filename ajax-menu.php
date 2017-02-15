<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
ini_set("display_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", dirname(__FILE__) . "/error_log.txt");
error_reporting(E_ALL);

include("includes/conn.php");
include("includes/functions.php");

$uf = "";
if(isset($_REQUEST["uf"])){
	$uf = $_REQUEST["uf"];
}
?>
<form name="menu-lateral">
	<table class="table" cellspacing="0">
	<tbody class="descProgressivo">
	<tr>
		<td style="font-size:24px;background-color: #7bae23;color: #fff;">
			Filtros
		</td>
	</tr>						
	<tr>
		<td>
			<h4 class="title_block">Serviço Oferecido</h4>
			<div style="text-align:left">
				<label for="transpAereo"><input type="checkbox" class="ckServico" id="transpAereo" value="transpAereo"> Transporte Aéreo</label><br/>
				<label for="transpIntermunicipal"><input type="checkbox" class="ckServico" id="transpIntermunicipal" value="transpIntermunicipal"> Transporte Intermunicipal</label><br/>
				<label for="planoFuneral"><input type="checkbox" class="ckServico" id="planoFuneral" value="planoFuneral"> Plano Funeral</label><br/>
				<label for="atende24hs"><input type="checkbox" class="ckServico" id="atende24hs" value="atende24hs"> Atendimento 24hs</label><br/>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<h4 class="title_block">Tipo de Agência</h4>
			<div style="text-align:left">
				<label for="tpMunicipal"><input type="radio" name="tp_particular" class="ckTpAgencia" id="tpMunicipal" value="M"> Municipal</label><br/>
				<label for="tpParticular"><input type="radio" name="tp_particular" class="ckTpAgencia" id="tpParticular" value="P"> Particular</label><br/>
				<label for="tpIndiferente"><input type="radio" name="tp_particular" class="ckTpAgencia" id="tpIndiferente" value="I" checked="checked"> Indiferente</label>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<h4 class="title_block">Estados</h4>
			<div style="text-align:left; height:150px;overflow-x:auto">
				<label for="ufAC"><input type="checkbox" class="ckUf" id="ufAC" value="AC"> Acre</label><br/>
				<label for="ufAL"><input type="checkbox" class="ckUf" id="ufAL" value="AL"> Alagoas</label><br/>
				<label for="ufAP"><input type="checkbox" class="ckUf" id="ufAP" value="AP"> Amapá</label><br/>
				<label for="ufAM"><input type="checkbox" class="ckUf" id="ufAM" value="AM"> Amazonas</label><br/>
				<label for="ufBA"><input type="checkbox" class="ckUf" id="ufBA" value="BA"> Bahia</label><br/>
				<label for="ufCE"><input type="checkbox" class="ckUf" id="ufCE" value="CE"> Ceará</label><br/>
				<label for="ufDF"><input type="checkbox" class="ckUf" id="ufDF" value="DF"> Distrito Federal</label><br/>
				<label for="ufES"><input type="checkbox" class="ckUf" id="ufES" value="ES"> Espirito Santo</label><br/>
				<label for="ufGO"><input type="checkbox" class="ckUf" id="ufGO" value="GO"> Goiás</label><br/>
				<label for="ufMA"><input type="checkbox" class="ckUf" id="ufMA" value="MA"> Maranhão</label><br/>
				<label for="ufMT"><input type="checkbox" class="ckUf" id="ufMT" value="MT"> Mato Grosso</label><br/>
				<label for="ufMS"><input type="checkbox" class="ckUf" id="ufMS" value="MS"> Mato Grosso do Sul</label><br/>
				<label for="ufMG"><input type="checkbox" class="ckUf" id="ufMG" value="MG"> Minas Gerais</label><br/>
				<label for="ufPA"><input type="checkbox" class="ckUf" id="ufPA" value="PA"> Pará</label><br/>
				<label for="ufPB"><input type="checkbox" class="ckUf" id="ufPB" value="PB"> Paraíba</label><br/>
				<label for="ufPR"><input type="checkbox" class="ckUf" id="ufPR" value="PR"> Paraná</label><br/>
				<label for="ufPE"><input type="checkbox" class="ckUf" id="ufPE" value="PE"> Pernambuco</label><br/>
				<label for="ufPI"><input type="checkbox" class="ckUf" id="ufPI" value="PI"> Piauí</label><br/>
				<label for="ufRJ"><input type="checkbox" class="ckUf" id="ufRJ" value="RJ"> Rio de Janeiro</label><br/>
				<label for="ufRN"><input type="checkbox" class="ckUf" id="ufRN" value="RN"> Rio Grande do Norte</label><br/>
				<label for="ufRS"><input type="checkbox" class="ckUf" id="ufRS" value="RS"> Rio Grande do Sul</label><br/>
				<label for="ufRO"><input type="checkbox" class="ckUf" id="ufRO" value="RO"> Rondônia</label><br/>
				<label for="ufRR"><input type="checkbox" class="ckUf" id="ufRR" value="RR"> Roraima</label><br/>
				<label for="ufSC"><input type="checkbox" class="ckUf" id="ufSC" value="SC"> Santa Catarina</label><br/>
				<label for="ufSP"><input type="checkbox" class="ckUf" id="ufSP" value="SP"> São Paulo</label><br/>
				<label for="ufSE"><input type="checkbox" class="ckUf" id="ufSE" value="SE"> Sergipe</label><br/>
				<label for="ufTO"><input type="checkbox" class="ckUf" id="ufTO" value="TO"> Tocantins</label>
			</div>
		</td>
	</tr>
	</table>
</form>

<?php
include("includes/close.php");
?>

<script>

$(document).ready(function(){ 
	$("input:radio[class=ckTpAgencia], input:checkbox[class=ckServico], input:checkbox[class=ckUf]").change(function(){
		ajaxChangeCheckBox("list-funerarias", "ckTpAgencia");
	});  
});
</script>

</body>
</html>

