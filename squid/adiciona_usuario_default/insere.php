<html>
<head>
<title> Inserindo novo usuário Default</title>
<body bgcolor="#FFFFFF">
<center>
<br>
<br>
<font size="5" face="Tahoma"><b>Aguarde, efetuando as devidas modificações</b>
<br>
<img src="../includes/load.gif" />

<?php
include_once('../includes/files.inc.php');
$arquivoTmp = "$userdefaultTmp";	
$arquivo = "$userdefault";
$fileusersquid = "$usersquid";

	if (file_exists($arquivo)){

//GRAVA NO ARQUIVO USUARIO COM SENHA CRIPROGRAFADA O QUAL O SQUID VAI LER
$usuario = $_POST["user"];
$passwd =  $_POST["senha"];
//GRAVA USUARIO NO ARQUIVO TEXT
$urlFree= $_POST["user"];
//Validacao NOME
if (preg_match("/^[a-z]+?$/i", $_POST["user"])) {
//GRAVA NO ARQUIVO USUARIO COM SENHA CRIPROGRAFADA O QUAL O SQUID VAI LER
$up = " $usuario $passwd";
$string = "/usr/bin/htpasswd -b" . " $fileusersquid $up";
exec("$string");

	$arqOpen  = fopen($arquivo, "a");
	$urlInser = "$urlFree\n";
	fwrite($arqOpen, $urlInser);
	fclose ($arqOpen);
	exec("cat $arquivoTmp > $arquivo.bkp |cp $arquivoTmp /tmp |rm -f $arquivoTmp");
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
	echo '</head>';
            }
        else
            {
            echo '<br><br><br><br><br><font size="5" face="Tahoma"><b>Entre com um nome válido. Por Favor</b><br><br>
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
