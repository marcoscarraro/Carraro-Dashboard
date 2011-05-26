<html>
<head>
<title>Removendo Usuário</title>
<body bgcolor="#FFFFFF">
<center>
<br>
<br>
<font size="5" face="Tahoma"><b>Aguarde, removendo usuário selecionado</b>
<br>
<img src="../includes/load.gif" />
</center>

<?php
include_once('../includes/files.inc.php');
$arquivoTmp = "$userlivreTmp";	
$arquivo = "$userlivre";
$fileusersquid = "$usersquid";
$fileusersquidTmp = "$usersquidTmp";

	if (file_exists($arquivo)){
	$urlDel  = $_POST["remove_regra"];
	$arqOpen = fopen($arquivo, "r");
	$arqNewOpen = fopen($arquivoTmp,"a");
	$contLinhas = 0 ;
	while (!feof ($arqOpen)) {
	$contLinhas++;
	$lineArqFree = fgets($arqOpen, 4096);
	if ($contLinhas != $urlDel) {
	fwrite($arqNewOpen,$lineArqFree);
	}
	}
	fclose($arqOpen);
	fclose($arqNewOpen);
	exec("/bin/mv '$arquivoTmp' '$arquivo'");

//remove usuario e senha do arquivo criado com htpasswd
    $squiddel  = $_POST["remove_regra"];
    $arqOpen = fopen($fileusersquid, "r");
	 $arqNewOpen = fopen($fileusersquidTmp,"a");
    $contLinhas = 0 ;
    while (!feof ($arqOpen)) {
        $contLinhas++;
        $lineArqFree = fgets($arqOpen, 4096);
        if ($contLinhas != $squiddel) {
            fwrite($arqNewOpen,$lineArqFree);
         }
    }
    fclose($arqOpen);
    fclose($arqNewOpen);
    exec("/bin/mv '$fileusersquidTmp' '$fileusersquid'");
	echo '<meta http-equiv="refresh" content="1;url=index.php">';
}
else
{
   echo "O arquivo não existe.";
}
?>
</body>
</html>
