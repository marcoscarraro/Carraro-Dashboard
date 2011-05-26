<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
function check_port($port) {
    $conn = @fsockopen("127.0.0.1", $port, $errno, $errstr, 0.2);
    if ($conn) {
        fclose($conn);
        return true;
    }
}

function server_report() {
    $report = array();
    $svcs = array(
	'20'=>'FTP-DATA',
	'21'=>'FTP',
	'22'=>'SSH',
	'23'=>'telnet',
	'25'=>'SMTP',
	'43'=> 'whois',
	'53'=>'dns',
	'80'=>'HTTP',
	'110'=>'POP3',
	'143'=>'IMAP',
	'3306'=>'MySQL',

				  
				  );
    foreach ($svcs as $port=>$service) {
        $report[$service] = check_port($port);
    }
    return $report;
}

$report = server_report();

$online='<img style="float:left;margin-left:8px; margin-top:1px;" width="16" height="16" src="img/online.png">';
$offline='<img style="float:left;margin-left:8px; margin-top:1px;" width="16" height="16" src="img/offline.png">';
?>
<style type="text/css">
.texto {
font-family: Verdana, Geneva, sans-serif;
font-size: 12px;
font-style: normal;
border: 1px solid #000;
border-collapse: collapse;
}

td{
border-bottom: 1px solid black;
border-left: 1px solid black;
width: 100px;
}

p {
font-family: Verdana, Geneva, sans-serif;
font-size: 15px;
font-style: normal;
border-collapse: collapse;
}

.titulo2{
font-weight: bold;
font-size: 12px;
}
</style>
<br>
<br>
<center>
<table class="texto">
<p class='titulo'>Status dos serviços instalados no servidor.</p>
    <tr>
        <td class='titulo2'>Serviço</td>
        <td class='titulo2'>Status</td>
    </tr>
    <tr>
        <td>FTP-DATA</td>
        <td><?php echo $report['FTP-DATA'] ? "$online"  : "$offline" ; ?></td>
    </tr>
    <tr>
        <td>FTP</td>
        <td><?php echo $report['FTP'] ? "$online" : "$offline"; ?></td>
    </tr>
    <tr>
        <td>SSH</td>
        <td><?php echo $report['SSH'] ? "$online" : "$offline"; ?></td>
    </tr>
    <tr>
        <td>TELNET</td>
        <td><?php echo $report['telnet'] ? "$online" : "$offline"; ?></td>
    </tr>
    <tr>
        <td>SMTP</td>
        <td><?php echo $report['SMTP'] ? "$online" : "$offline"; ?></td>
    </tr>
    <tr>
        <td>WHOIS</td>
        <td><?php echo $report['whois'] ? "$online" : "$offline"; ?></td>
    </tr>
    <tr>
        <td>DNS</td>
        <td><?php echo $report['dns'] ? "$online" : "$offline"; ?></td>
    </tr>
    <tr>
        <td>HTTP</td>
        <td><?php echo $report['HTTP'] ? "$online" : "$offline"; ?></td>
    </tr>
    <tr>
        <td>POP</td>
        <td><?php echo $report['POP3'] ? "$online" : "$offline"; ?></td>
    </tr>
    <tr>
        <td>IMAP</td>
        <td><?php echo $report['IMAP'] ? "$online" : "$offline"; ?></td>
    </tr>
        <tr>
        <td>MYSQL</td>
        <td><?php echo $report['MySQL'] ? "$online" : "$offline"; ?></td>
    </tr>
</table>
