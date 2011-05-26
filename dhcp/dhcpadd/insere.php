<html>
<head>
<title> Cadastrando MAC x IP</title>
<body bgcolor="#FFFFFF">
<center>
<br>
<br>
<font size="5" face="Tahoma"><b>Aguarde, efetuando as devidas modificações</b>
<br>
<img src="../includes/styles/load.gif" />

<?php
include_once('../includes/files.inc.php');
$arquivoTmp = $macipTmp;	
$arquivo = $macip;

	if (file_exists($arquivo)){
	$urlFree= $_POST["ip"];

	$hostname= $_POST["hostname"];

	$mac= $_POST["mac"];

$string= "host " . $hostname . " { hardware ethernet " . $mac . "; fixed-address " . $urlFree .";}";

//Validacao IP
if (ereg('^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$', $_POST["ip"]))
            {
	$arqOpen  = fopen($arquivo, "a");
	$urlInser = "$string\n";
	fwrite($arqOpen, $urlInser);
	fclose ($arqOpen);
	exec("cat $arquivoTmp > $arquivo.bkp |cp $arquivoTmp /tmp |rm -f $arquivoTmp");
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
	echo '</head>';
            }
        else
            {
            echo '<br><br><br><br><br><font size="5" face="Tahoma"><b>Entre com um IP válido. PorFavor</b><br><br>
		<form> 
		<input type="button" value="Voltar" onClick="history.go(-1)"> 
		<form>';
            }
}
else
{
   echo "O arquivo não existe";
}
?>
</center>
</font>
</body>
</html>
