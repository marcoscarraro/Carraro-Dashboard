<?php

$arquivo= "/var/log/messages";

	function tail ( $file, $lines, $max_chunk_size = 4096 ) {

		// We actually want to look for +1 newline so we can get the whole first line
		$rows = $lines + 1;

		// Open up the file
		$fh = fopen( $file, 'r' );

		// Go to the end
		fseek( $fh, 0, SEEK_END );
		$position = ftell( $fh );

		$buffer = '';
		$found_newlines = 0;

		$break = false;
		while( ! $break ) {
			// If we are at the start then we are done.
			if( $position <= 0 ) { break; }

			// We can't seek past the 0 position obviously, so figure out a good chunk size
			$chunk_size = ( $max_chunk_size > $position ) ? $position : $max_chunk_size;

			// Okay, now seek there and read the chunk
			$position -= $chunk_size;
			fseek( $fh, $position );
			$chunk = fread( $fh, $chunk_size );

			// See if there are any newlines in this chunk, count them if there are
			if( false != strpos( $chunk, "\n" ) ) {
				if( substr( $chunk, -1 ) == "\n" ) { ++$found_newlines; }
				$found_newlines += count( explode( "\n", $chunk ) );
			}

			// Have we exceeded our desired rows?
			if( $found_newlines > $rows ) { $break = true; }

			// Prepend
			$buffer = $chunk . $buffer;
		}

		// Now extract only the lines we requested
		$buffer = explode( "\n", $buffer );
		return implode( "\n", array_slice( $buffer, count( $buffer ) - $lines ) );
	}

	$lines = ( isset( $_REQUEST['lines'] ) ) ? intval( $_REQUEST['lines'] ) : 10;

?>
<html>
<head>
<title>Visualizador de Logs</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Expires" CONTENT="0">
<meta http-equiv="pragma" content="no-cache">
</head>
<body>

<h1>Logs do arquivo /var/log/messages</h1>
<form method="GET" action="">
<b> Nr. Linhas: </b><input class="input" type="text" value="<?php echo $lines; ?>" name="lines" /> <input class="botao" type="submit" value="Iniciar" />
</form>
<h2>Resultado:</h2>

<table class="tabela">
<td class="data"><b>Data</b></td>
<td class="host"><b>Host</b></td>
<td class="log"><b>Resultado</b></td>
</table>

<table>
<td class="teste">
<pre>
<?php 
echo tail( $arquivo, $lines);
?>
</pre>
</td>
</table>

</body>
</html>
