<?php
error_reporting(E_ALL);
include_once("sqstat.class.php");
$squidclass=new squidstat();
if(is_file("config.inc.php")) {
	include_once "config.inc.php";
	if(!isset($_GET["config"])) $config=0;
	else $config=(int)$_GET["config"];

	if(!isset($squidhost[$config]) || !isset($squidport[$config])) {
		$squidclass->errno=4;
		$squidclass->errstr="Erro de configuração.".
		'Porfavor altere o  $squidhost['.$config.']/$squidport['.$config.']';
		$squidclass->showError();
		exit(4);
	}
	for($i=0;$i<count($squidhost);$i++){
		$configs[$i]=$squidhost[$i].':'.$squidport[$i];
	}
	@$squidhost=$squidhost[$config];
	@$squidport=$squidport[$config];
	@$cachemgr_passwd=$cachemgr_passwd[$config];
	@$resolveip=$resolveip[$config]; 
	@$hosts_file=$hosts_file[$config];
	if(isset($group_by[$config])) $group_by=$group_by[$config];
	else $group_by="ip";
	if(isset($group_by[$config]) && !preg_match('/^(host|username)$/',$group_by)) {
		$squidclass->errno=4;
		$squidclass->errstr="Erro de configuração.<br>".
		'"group_by" can be only "username" or "host"';
		$squidclass->showError();
		exit(4);
	}
	
}
else{
	$squidclass->errno=4;
	$squidclass->errstr="Arquivo de configuração Não encontrado.".
	"Porfavor renomear o arquivo <tt>config.inc.php.defauts</tt> para <tt>config.inc.php</tt> e assim altere as configurações.";
	$squidclass->showError();
	exit(4);
}


// loading hosts file
$hosts_array=array();
if(isset($hosts_file)){
	if(is_file($hosts_file)){
		$handle = @fopen($hosts_file, "r");
		if ($handle) {
			while (!feof($handle)) {
				$buffer = fgets($handle, 4096);
				unset($matches);
				if(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})[ \t]+(.+)$/i',$buffer,$matches)){
					$hosts_array[$matches[1]]=$matches[2];
				}
			}
			fclose($handle);
		}
		else {
			$squidclass->errno=4;
			$squidclass->errstr="Hosts file not found.".
			"Cant read <tt>'$hosts_file'</tt>.";
			$squidclass->showError();
			exit(4);
		}
	}
	else {
		$squidclass->errno=4;
		$squidclass->errstr="Hosts file not found.".
		"Cant read <tt>'$hosts_file'</tt>.";
		$squidclass->showError();
		exit(4);
		
	}
}
if(!$squidclass->connect($squidhost,$squidport)) {
	$squidclass->showError();
	exit(1);
}
$data=$squidclass->makeQuery($cachemgr_passwd);
if($data==false){
	$squidclass->showError();
	exit(2);
}

// print_r($data);
if(!isset($use_js)) $use_js=true;
echo $squidclass->makeHtmlReport($data,$resolveip,$hosts_array,$use_js);


?>
