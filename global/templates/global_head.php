<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<!-- enable HTML5 elements in IE7+8 --><!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo GLOBAL_CSS .DS. 'reset.css';?>" /> 

<!-- files from different vendor domain -->
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=family=Baumans|Josefin Sans|Poly|Sorts+Mill+Goudy|Linden+Hill|Audiowide|Jura:400,600,500|Iceland|Duru+Sans|Josefin+Sans:100|Rosario|Six+Caps' />

<?php echo '<title>' . $local_title . ' | ' . $page_title . '</title>'; // these variables are set in file calling this template ?>
<?php $mission = 'Lightwomb exists to nurture creativity.'; ?>

<?php // Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_WARNING);
$auto_load_array = array(
		GLOBAL_CSS_AutoLoadBin .DS. 'custom' .DS
	, 'css' .DS
	, 'css' .DS. 'custom' .DS
	,	GLOBAL_JS_AutoLoadBin .DS. 'vendor' .DS. 'head' .DS 
	, 'js' .DS. 'vendor' .DS. 'head' .DS
	);	
	
foreach ($auto_load_array as &$value) {
	auto_load_dir($value);
} //same as: for($i=0;$i<count($auto_load_array);$i++){	auto_load_dir($i);};
?>

</head>

<body>
<div id="wrap">  
	
	<header>
		<div id="welcome">
			Welcome to
		</div>		
		<a href='<?php echo PUBLIC_PAGES .DS. 'portfolio.php'; ?>'>Portfolio</a>
		<a href='<?php echo PUBLIC_PAGES .DS. 'services.php'; ?>'>Services</a>
		<a href='<?php echo PUBLIC_PAGES .DS. 'contact.php'; ?>'>Contact</a>
		<a href='<?php echo PUBLIC_PAGES .DS. 'about.php'; ?>'>About</a>
		<h1 class="lightwomb">
			Lightwomb
		</h1>
	</header>
	
	<nav id="main_links">
		<?php //include('content/main_links_content.php'); ?>			
	</nav>
	
	<div class="top_spacer_row"></div>
	
	<div class = 'absolutebanner'>
		<?php include(GLOBAL_DIR .DS. 'templates' .DS. 'global_site_map.php'); ?>
	</div>

	