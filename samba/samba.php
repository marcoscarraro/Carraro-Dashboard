<?php
echo "<HTML>".
"<HEAD>".
"<link rel='stylesheet' href='../functions.css' type='text/css'>".
"</HEAD>".
"<BODY TOPMARGIN=30>";

$atualiza = shell_exec ('./samba');
echo "$atualiza";
?>
