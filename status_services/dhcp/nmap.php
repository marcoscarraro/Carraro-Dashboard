<?php
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_NOTICE);
$ip_addr = $_POST['ip_addr'];


?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Portas Abertas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="firstbase" />
<link rel="stylesheet" type="text/css" href="includes/style.css">
<style type="text/css">
body
    {
    margin: 0;
    padding: 10px;
    background-color: #ffffff;
    }
div.output
    {
    margin: 0;
    padding: 10px;
    background-color: #eeeeee;
    border-style: solid;
    border-width: 1px;
    border-color: #000000;
    }
</style>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<p><label for="ip_addr">IP address:</label><br />
<input class="input" name="ip_addr" id="ip_addr" type="text" value="<?php echo $_POST['submit'] == 'Scan' ? htmlentities($ip_addr, ENT_QUOTES) : $_SERVER['REMOTE_ADDR'];; ?>" size="40" maxlength="15" /></p>

<p><input class="botao" type="submit" name="submit" value="Scan" /></p>
</form>
<p>Resultado</p>
<?php

if ($_POST['submit'] == 'Scan')
    {
    echo '<div class="output">' . "\n";

    /**************************************************************************/

    // Check for spoofed form submission.


        if (ereg('^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$', $ip_addr))
            {
            echo '<pre>' . "\n" .
                 '/usr/bin/nmap -sS ' . $ip_addr . "\n\n";

            system('sudo /usr/bin/nmap -sS ' . $ip_addr);

            echo '</pre>' . "\n" .
                 '<p>Operação Concluida.</p>' . "\n";
            }
        else
            {
            echo '<p>Entre com um IP válido!</p>' . "\n";
            }
        }
        echo '</div>' . "\n";
    
?>
<br>
<br>
<input class=botao type='button' align='center' name='Fecha' onClick='window.close()' value='Fechar Janela'>
</body>
</html>
