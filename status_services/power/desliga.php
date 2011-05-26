<html>
<head>
<title>Desligando</title>
<body bgcolor="#FFFFFF">
<script language="javascript" type="text/javascript"> 
window.setTimeout("window.close()", 10000); 
</script> 
<center>
<br>
<br>
<font size="3" face="Tahoma"><b>Aguarde, desligando sistema, só sera possível iniciar o sistema novamente, se você religar o servidor fisicamente.</b>
<br>
<br>
<img src="load.gif" />

<?php
system('sudo /sbin/halt');
?>
</center>
</font>
</body>
</html>
