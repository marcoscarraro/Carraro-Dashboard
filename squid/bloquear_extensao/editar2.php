<html>
<head>
<title>Aplicando edição</title>
<link href="../includes/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Expires" CONTENT="0">
<meta http-equiv="pragma" content="no-cache">
<script language="javascript" type="text/javascript"> 
window.setTimeout("window.close()", 680); 
function fecha() { 
window.close(); 
opener.location.href=opener.location.href; 
}
</script> 
</head>

<?php
//Desabilitar erros
error_reporting(0);
include_once('../includes/files.inc.php');
$arquivoTmp = "$ext_BloqueadasTmp";	
$arquivo = "$ext_Bloqueadas";

$num   = $_GET["num"];
$editar  = $_POST["editar"];
$arq   = fopen("$arquivo", "r");
$temp  = fopen("$arquivoTmp", "w");
$contador = 0;
while (! feof($arq)) {
$linha = fgets($arq, 200);
$contador++;
if ($contador == $num) {
$linha = $editar ."\n";
}
fwrite($temp, $linha);
}
fclose($arq);
fclose($temp);
unlink("$arquivo");
rename("$arquivoTmp", "$arquivo");
echo "<center>";
echo "<br>";
echo "<br>";
echo "<font size='5' face='Tahoma'><b>Aguarde, efetuando as devidas modificações</b>";
echo "<br>";
echo "<img src='../includes/load.gif' />";
echo "<body onunload='javascript:fecha()'> ";
echo "</center>";
?>
