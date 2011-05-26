<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Área de Administração do Servidor</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
</head>
<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
<h1 id="sidebar-title"><a href="#">Server Admin</a></h1>
<!-- Logo (221px wide) -->
<a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>


<div id="profile-links">
Bem Vindo ao Servidor: <? $host='http://'.$_SERVER['SERVER_NAME'].'/'; echo ($host); ?>. 
<br>
Para suporte: <a href="mailto:marcos.g.carraro@gmail.com?subject=[Painel]Cliente_">e-mail.</a>
<br>
<? 
$data = date ("j/m/Y");
$hora = date ("H:i:s"); 
echo ("Data: $data"); 
echo "<br>";
echo ("Hora: $hora"); 
$ipa = $_SERVER['REMOTE_ADDR'];	
echo "<br>";			
echo ("Seu IP: $ipa");
?>


</div>        
<ul id="main-nav">  <!-- MENU -->
<li>
<a href="index.php" target="frame" class="nav-top-item no-submenu current" > <!-- Add the class "no-submenu" to menu items with no sub menu -->
Status
</a>       
</li>
				
<li> 
<a href="#" class="nav-top-item" > <!-- Add the class "current" to current menu item -->
Proxy
</a>
<ul>
<li><a href="squid/bloquear_mac/index.php" target="frame">Bloquear - MAC address</a></li>
<li><a href="squid/liberar_mac/index.php" target="frame">Liberar - MAC address</a></li>
<li><a href="squid/mac_default/index.php" target="frame">MAC address - Default</a></li>
<li><a href="squid/bloquear_ip/index.php" target="frame">Bloquear - IP</a></li>
<li><a href="squid/liberar_ip/index.php" target="frame">Liberar - IP</a></li>
<li><a href="squid/ip_default/index.php" target="frame">IP - Default</a></li>
<li><a href="squid/adiciona_usuario/index.php" target="frame">Adicionar - Usuário Liberado</a></li>
<li><a href="squid/adiciona_usuario_bloqueado/index.php" target="frame">Adicionar - Usuário Bloqueado</a></li>
<li><a href="squid/adiciona_usuario_default/index.php" target="frame">Adicionar - Usuário Default</a></li>
<li><a href="squid/bloquear_expressao/index.php" target="frame">Bloquear - Expressões</a></li>
<li><a href="squid/liberar_expressao/index.php" target="frame">Liberar - Expressões</a></li>
<li><a href="squid/bloquear_dominio/index.php" target="frame">Bloquear - Domínio</a></li>
<li><a href="squid/liberar_dominio/index.php" target="frame">Liberar - Domínio</a></li>
<li><a href="squid/dominio_ssenha/index.php" target="frame">Domínio Sem Senha</a></li>
<li><a href="squid/bloquear_extensao/index.php" target="frame">Bloquear - Extensão</a></li>
<li><a href="squid/script/limpa.php" target="frame">Limpar Cache</a></li>
<li><a href="squid/script/reinicia.php" target="frame">Reiniciar Serviço</a></li>
<li><a href="squid/log/index.php" target="frame">Trafego em Tempo Real</a></li>
<li><a href="squid/sarg/" target="frame">Relátorio</a></li>
</ul>
</li>
				
<li>
<a href="#" class="nav-top-item">
Rede
</a>
<ul>
<li><a href="dhcp/index.php" target="frame">Scan</a></li>
<li><a href="dhcp/dhcpadd/index.php" target="frame">Amarrar IP</a></li>
<li><a href="status_services/index.php" target="frame">Serviços</a></li>
</ul>
</li>    
		
<li>
<a href="#" class="nav-top-item">
Servidor
</a>
<ul>
<li><a href="hardware/index.php" target="frame">Status do Sistema</a></li>
<li><a href="log/log_messages.php" target="frame">Log 'messages'</a></li>
<li><a href="log/log_firewall.php" target="frame">Log 'firewall'</a></li>
<li><a href="power/index.php" target="frame">Desligar/Reiniciar</a></li>
</ul>
</li>      
				
</ul> <!-- FIM MENU -->
</div></div> <!-- End #sidebar -->
		
		<div id="main-content">
			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- INICIO FRAME PARA EXIBIR SITES | TITULO DO FRAME-->

<iframe id=frame name=frame src="hardware/index.php" SCROLLING=AUTO>
</iframe>

					</div> <!-- FINAL DA TABELA -->		


<!-- RODAPE -->
<div id="footer">
<small> <!-- Remove this notice or replace it with whatever you want -->
&#169; Copyright 2011 | Powered by Marcos Carraro
</small>
</div>
</div>
</div></body>
</html>
