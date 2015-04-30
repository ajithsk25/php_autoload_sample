<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Assessment\DataInsert;
use Nahk\PDO\SQL;

if (php_sapi_name() == "cli") { // In cli-mode
	// get parameters from terminal
	$hostname	= $argv[1];
	$username	= $argv[2];
	$password  	= $argv[3];
	$database	= $argv[4];
	$count		= $argv[5];
	
	if ($hostname && $username && $password && $database && $count) {
	
		$dbConn 			= new SQL($hostname, $database, $username, $password);
		$dataInsert 		= new DataInsert($dbConn);
		$dataInsert->count 	= $count;
		$dataInsert->insertData();
	} else {
		echo "\n Please enter the command in terminal with following format \n\n-\t php app.php <host> <username> <password> <database> <limit> \n";
	}
} else { // Not in cli-mode
    echo "\n Could not run in browser. \n Please enter the command in terminal with following format \n\n-\t php app.php <host> <username> <password> <database> <limit> \n";
}
