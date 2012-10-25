<?php

if($argc > 1) {
	$files = array_slice($argv, 1);
} else {
	$files = array();
	$dh = opendir('.');
	while($file = readdir($dh)) {
		if($file[0] !== '.' && $file !== 'combine_php.php' && strlen($file) > 4 && substr($file, -4) === '.php') {
			$files[] = $file;
		}
	}
}

if(!empty($files)) {
	$combined = '<?php' . "\n";
	foreach($files as $file) {
		if(file_exists($file)) {
			if($file_contents = file_get_contents($file)) {
				$matches = array();
				preg_match('/<\?php\s*(.+)/si', $file_contents, $matches);
				if(count($matches) >= 2) {
					$combined .= "\n" . trim($matches[1]) . "\n";
				} else {
					die('Unable to parse PHP content in file "' . $file . '".' . "\n");
				}
			} else {
				die('Unable to get contents of file "' . $file . '".' . "\n");
			}
		}
	}
	if(file_put_contents('combined.php', $combined)) {
		echo 'Combined PHP written to "combined.php".' . "\n";
	} else {
		die('Unable to write combined PHP to "combined.php".' . "\n");
	}
}
