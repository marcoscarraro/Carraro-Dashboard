<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="includes/style.css">
	<title>DHCP - History</title>

</script>
<br>
<table>
<tr class="table_title2">
<td><b>Opções</b></td>
</tr>
</table>

<table>
<tr class="opcao">
<td>
<br>
<script Language="JavaScript">
function Ping() {
	window.open( "ping.php", "Ping", "status = 1, height = 400, width = 300, resizable = 0, toolbar = no, menubar=no, location = no, left=50, top=100, resizable=yes, scrollbars=yes, directories=no, status=no")
}
function Nmap() {
	window.open( "nmap.php", "Portas Abertas", "status = 1, height = 400, width = 300, resizable = 0, toolbar = no, menubar=no, location = no, left=50, top=100, resizable=yes, scrollbars=yes, directories=no, status=no")
}
</script>
<center>
<input class="botao" type='button' onClick='Ping()' value='Teste Ping'>
<input class="botao" type='button' onClick='Nmap()' value='Portas Abertas'>
</center>
</td>
</tr>
</table>

<br>
<br>
<br>
<?php
require_once("includes/files.inc.php");

{
if (file_exists($dhcpd_leases_file) && is_readable($dhcpd_leases_file))
{
$open_file = fopen($dhcpd_leases_file, "r") or die("O Dhcp History não tem privilegios de leitura do arquivo.");
if ($open_file)
{
			?>
			<table>
			<tr class="table_title">
			<td><b>IP do Host</b></td>
			<td><b>Ingressou na Rede</b></td>
			<td><b>Estado</b></td>
			<td><b>MAC do Host</b></td>
			<td><b>Nome do Host</b></td>
			</tr>
			<?php
			$row_number = 1;
			$row_array = array();
			$row_array = initialize_array($row_array);
			while (!feof($open_file))
			{
				$read_line = fgets($open_file, 4096);
				if (substr($read_line, 0, 1) != "#") //Verifica comentário, se existir não mostra
				{
					$tok = strtok($read_line, " ");
					if ($tok == "lease")
					{
						$css_num = $row_number % 2;
						$row_number++;
						$row_array[0] = "<tr class='row".$css_num."'><td>" . strtok(" ") . "</td>\n";
					}			
					else if ($tok == "starts")
					{
						$row_array[1] = "<td>" . intToDay(strtok(" "));
						$row_array[1] = $row_array[1]." - " . strtok(" ") . " ";
						$time = strtok(" ");
						$time = str_replace(";", "", $time);
						$row_array[1] = $row_array[1].$time . "</td>\n";
					}
					else if ($tok == "binding")
					{
						
						$row_array[2] = "<td>";
						$row_array[2] = $row_array[2]. strtok(" ") . " ";
						$active = strtok(" ");
						$active = str_replace(";", "", $active);
						$row_array[2] = $row_array[2].$active . "</td>\n";
												

					}
					else if ($tok == "hardware")
					{
						$row_array[3] = "<td>" . strtok(" ") . " - ";
						$MAC = strtok(" ");
						$MAC = strtoupper(str_replace(";", "", $MAC));
						$row_array[3] = $row_array[3].$MAC . "</td>\n";
					}
					else if ($tok == "client-hostname")
					{
						$hostname = strtok(" ");
						$replace = array("\"", ";");
						$hostname = str_replace($replace, "", $hostname);
						$row_array[4] = "<td>" . $hostname . "</td>\n";
					}
					
					else if ($tok == "}\n")
					{
						$row_array[4] = $row_array[4]."</tr>";
						print_array($row_array);
						$row_array = initialize_array($row_array);
					}
					
				}
			}
			fclose($open_file);
			?>
			</table>
			<?php
		}
	}
	else
	{
		echo "<p class='error'>O Dhcp History não tem privilegios de leitura do arquivo, ou o arquivo não existe.</p>";
	}
}

function intToDay($integer)
{
	if ($integer == 0)
		return "Domingo";
	else if ($integer == 1)
		return "Segunda-Feira";
	else if ($integer == 2)
		return "Terça-Feira";
	else if ($integer == 3)
		return "Quarta-Feira";
	else if ($integer == 4)
		return "Quinta-Feira";
	else if ($integer == 5)
		return "Sexta-Feira";
	else
		return "Sabado";
}

function initialize_array($row_array)
{
	for ($i = 1; $i < 5; $i++)
		$row_array[$i] = "<td>-</td>";

	return $row_array;
}

function print_array($row_array)
{
	for ($i = 0; $i < 5; $i++)
		echo $row_array[$i];
}
?>
