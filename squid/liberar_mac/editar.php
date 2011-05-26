<html>
<head>
<title>Editar regra</title>
<link href="../includes/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Expires" CONTENT="0">
<meta http-equiv="pragma" content="no-cache">
</head>

<?php
//Desabilita erros
include_once('../includes/files.inc.php');
$arquivoTmp = "$macTmp";	
$arquivo = "$mac";

error_reporting(0);
$num = $_GET["num"];
$contador = 0;
$arq = fopen("$arquivo", "r");
while (! feof($arq)) {
$linha = fgetcsv($arq, 200, "\n");
$contador++;
if ($contador == $num) {
$id = $linha[0];
$editar = $linha[1];
break;
}
}
fclose($arq);
?>

<?
echo '<p class="editar">Regra antiga:' . $id . '</p>';
?> 
<center>
<form method="post" action="editar2.php?num=<?php echo $num; ?>">
<tr>
<td><label for ="editar" class="text">Nova Regra</label>
</td>
<td>
<input class="input2" type="text" name="editar" size=30 id="editar" value="<?php echo $id, $editar?>"/>
</td>   
</tr>
<tr>
<td colspan=2>
<input type="submit" value="Alterar"/>
</td>
</tr>      
</form> 
<form> 
<input type="button" value="Fechar" onClick="window.close()"> 
</form>
</center>
</body>
</html>    
