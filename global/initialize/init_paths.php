/*
initialize_paths.php _________________

CREATED BY:

\\\\    \\\\  //\\  O///////_______
I\\\\    \\\\///\\\/M//////=======
\\G\\\\\\ \\\// \\//B/////_______
\\\H\\\\\\ \\\/ \\///////=======
\\\\T\\\\\\ \\\  \//////_______


The purpose of this file is to INSTANTIATE PATHS
By doing so, we provide an easy way to work in different development environments:
-	Sets Global Paths for Entire site
-	Sets Local Paths that can be initialized from anywhere

*/
echo 'I am initializing!';
$title_global = 'Lightwomb';
defined('GLOBAL_TITLE') ? null : define('GLOBAL_TITLE', $title_global);

defined('GLOBAL_DIR') 			? null : define('GLOBAL_DIR',			SITE_ROOT .DS. 'global');
defined('GLOBAL_INCLUDES') 		? null : define('GLOBAL_INCLUDES',		GLOBAL_DIR .DS. 'includes');
defined('GLOBAL_INIT') 			? null : define('GLOBAL_INIT',			GLOBAL_DIR .DS. 'initialize');
defined('GLOBAL_DB_misc') 		? null : define('GLOBAL_DB_misc',		GLOBAL_INCLUDES .DS. 'database-misc');
defined('GLOBAL_auto_foo') 		? null : define('GLOBAL_auto_foo',		GLOBAL_INCLUDES .DS. 'auto-foo');

defined('LIB_PATH') 			? null : define('LIB_PATH',				GLOBAL_DIR .DS. 'misc');

defined('GLOBAL_JS') 			? null : define('GLOBAL_JS', 			GLOBAL_DIR .DS. 'js');
defined('GLOBAL_JS_AutoLoadBin') 	? null : define('GLOBAL_JS_AutoLoadBin',	GLOBAL_JS .DS. 'auto-load-bin');

defined('GLOBAL_JS_vendor') 	? null : define('GLOBAL_JS_vendor', 	GLOBAL_JS .DS. 'auto-load-bin' .DS. 'vendor');
defined('GLOBAL_JS_custom') 	? null : define('GLOBAL_JS_custom', 	GLOBAL_JS .DS. 'auto-load-bin' .DS. 'custom');

defined('GLOBAL_CSS') 								? null : define('GLOBAL_CSS',								GLOBAL_DIR .DS. 'css');
defined('GLOBAL_CSS_AutoLoadBin') 	? null : define('GLOBAL_CSS_AutoLoadBin',	GLOBAL_CSS .DS. 'auto-load-bin');

defined('GLOBAL_CSS_vendor') 	? null : define('GLOBAL_CSS_vendor', 	GLOBAL_CSS .DS. 'auto-load-bin' .DS. 'vendor');
defined('GLOBAL_CSS_custom') 	? null : define('GLOBAL_CSS_custom', 	GLOBAL_CSS .DS. 'auto-load-bin' .DS. 'custom');

defined('GLOBAL_PDE_custom') 	? null : define('GLOBAL_PDE_custom', 	GLOBAL_DIR .DS. 'pde');

defined('PUBLIC_PAGES') 	? null : define('PUBLIC_PAGES', 	SITE_ROOT .DS. '~');