<?php
$db_server = "localhost";
$db_user =	"root";
$db_pass = "root";
$db_name = "yes";
// Database Constants
defined('DB_SERVER') ? null : define("DB_SERVER", $db_server);
defined('DB_USER')   ? null : define("DB_USER"	, $db_user	);
defined('DB_PASS')   ? null : define("DB_PASS"	, $db_pass	);
defined('DB_NAME')   ? null : define("DB_NAME"	, $db_name	);
?>