<?php

/*

initialize_misc.php ____________________
	- dependent on initialize_paths.php

CREATED BY:

\\\\    \\\\  //\\  O///////_______
I\\\\    \\\\///\\\/M//////=======
\\G\\\\\\ \\\// \\//B/////_______
\\\H\\\\\\ \\\/ \\///////=======
\\\\T\\\\\\ \\\  \//////_______
	
	
The purpose of this file is to:
- INSTANTIATE FUNCTIONS 
	that will be used to do various things such as:
	-	automatically LOAD all files inside of specifically chosen directories
	-	LOAD misc. functions that may not yet be documented here
			-	such misc. files should be DOCUMENTED as "newer"
				within their source comments 
- INSTANTIATE CLASSES
- LOAD FILES THAT CONFIGURE DATABASE(S)
			
*/

/*
____ADMIN____
	The fn that controls whether comments are shown only checks whether or not it is empty
		- meaning 'on' could say 'off' or 'alsdhfjh' or '3h@d9!' or etc...
*/
defined('COMMENTS') ? null : define('COMMENTS', ''); // any variable but '' turns on HTML source comments:

require_once(GLOBAL_DB_misc.DS.'config.php');

require_once(GLOBAL_INCLUDES.DS.'functions/functions.php');

require_once(GLOBAL_INCLUDES.DS.'php-classes'.DS.'session.php');

require_once(GLOBAL_INCLUDES.DS.'php-classes'.DS.'database.php');
require_once(GLOBAL_INCLUDES.DS.'php-classes'.DS.'database_object.php');
require_once(GLOBAL_INCLUDES.DS.'php-classes'.DS.'pagination.php');

require_once(GLOBAL_INCLUDES.DS.'php-classes'.DS.'user.php');
require_once(GLOBAL_INCLUDES.DS.'php-classes'.DS.'photograph.php');
require_once(GLOBAL_INCLUDES.DS.'php-classes'.DS.'comment.php');

require_once(GLOBAL_INCLUDES.DS.'php-classes'.DS.'person.php');
//$person = new Person( "Joe" );
//echo $person->name;

 
require_once(GLOBAL_auto_foo.DS.'fn_auto_load.php');
require_once(GLOBAL_auto_foo.DS.'fn_auto_load_dirTree.php'); 

// if (SITE_ROOT === '.'){
// 	auto_load_dir('global_includes/'.'custom/');
// } else if (SITE_ROOT === './..' ) {
// 	auto_load_dir(SITE_ROOT.DS.'global_includes/custom/');
// } else { echo 'add another level';}

?>