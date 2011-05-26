<?php
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_NOTICE);
$ping_ip_addr = $_POST['ping_ip_addr'];
$ping_count   = $_POST['ping_count'];
if (get_magic_quotes_gpc())
    {
    $ping_ip_addr = stripslashes($ping_ip_addr);
    }
$ping_count_array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 25);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Testando Conectividade</title>
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
<p><label for="ping_ip_addr">IP address:</label><br />
<input class="input" name="ping_ip_addr" id="ping_ip_addr" type="text" value="<?php echo $_POST['submit'] == 'Ping' ? htmlentities($ping_ip_addr, ENT_QUOTES) : $_SERVER['REMOTE_ADDR'];; ?>" size="40" maxlength="15" /></p>
<p><label for="ping_count">Numero de Ping:</label><br />
<select name="ping_count" id="ping_count">
<?php
foreach ($ping_count_array as $ping_count_item)
    {
    echo '<option' . ($ping_count == $ping_count_item ? ' selected="selected"' : '') . '>' . $ping_count_item . '</option>' . "\n";
    }
?>
</select></p>
<p><input class="botao" type="submit" name="submit" value="Ping" /></p>
</form>
<p>Resultado</p>
<?php

if ($_POST['submit'] == 'Ping') // Form has been submitted.
    {
    echo '<div class="output">' . "\n";

    /**************************************************************************/

    // Check for spoofed form submission.

    $illegal = FALSE;

    if (strlen($ping_ip_addr) > 15)
        {
        $illegal = TRUE;
        }

    if (!in_array($ping_count, $ping_count_array))
        {
        $illegal = TRUE;
        }

    /**************************************************************************/

    if (!$illegal) // Form submission was not spoofed.
        {
        if (ereg('^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$', $ping_ip_addr)) // Acquired data contains no problems.
            {
            // Display result.

            echo '<pre>' . "\n" .
                 'ping -c ' . $ping_count . ' ' . $ping_ip_addr . "\n\n";

            system('ping -c ' . $ping_count . ' ' . $ping_ip_addr); // Ping IP address.

            echo '</pre>' . "\n" .
                 '<p>Operação Concluida.</p>' . "\n";
            }
        else // Acquired data contains problems!
            {
            echo '<p>Entre com um IP válido!</p>' . "\n";
            }
        }
    else // Form submission was spoofed!
        {
        echo '<p>Você não pode fazer isso.</p>' . "\n";
        }

    echo '</div>' . "\n";
    }

?>
<br>
<br>
<input class=botao type='button' align='center' name='Fecha' onClick='window.close()' value='Fechar Janela'>
</body>
</html>
