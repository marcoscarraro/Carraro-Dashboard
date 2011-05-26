<html>
<head>
<title>PowerOff</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Expires" CONTENT="0">
<meta http-equiv="pragma" content="no-cache">
</head>
<body> 

<script Language="JavaScript">
	function Desliga() {
	window.open( "desliga.php", "Desligando", "status = 1, height = 300, width = 300, resizable = 0" )
}

	function Reinicia() {
	window.open( "reinicia.php", "Reiniciando", "status = 1, height = 300, width = 300, resizable = 0" )
}
</script>

<?php
echo "<center>";
	echo "<form name='insere' method='post'>";
	echo "<p class='cuidado'>ATENÇÃO</p>";
	echo "<p class='titulo'>Use estas opções com muito cuidado, pois sua rede ira ficar parada por alguns instantes, ou até o religamento do servidor.</p>";
	echo "<input class='botao' type='button' onClick='Desliga()' value='Desligar'>";
	echo "<input class='botao' type='button' onClick='Reinicia()' value='Reiniciar'>";
	echo  "</form>";
?>
</body>
</html>
