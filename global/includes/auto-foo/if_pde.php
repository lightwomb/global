<?php
/*
This file is used by:
fn_auto_load.php

When auto-loading directory of .pde files:

	<canvas> tag must be echoed after the directory is 
	looped through in fn_auto_load.php

	this is because the list of files must be placed into 
	only 1 HTML <canvas...etc.> tag inside of the
	data-processing-sources attribute 

EXAMPLE: **file names must be separated by a space** 
i.e. <canvas id="whateverid" data-processing-sources=" example.pde example2.pde example3.pde (etc...)" />
*/

if ($loads == 0)
{
	echo "\n" . ' <!-- PDE files auto-loaded from: "' . $path . '" (VIA PHP FUNCTION) -->'; // HTML:comment
	echo "\n" . '<!-- concatenates to string each time through loop but...'; // HTML:comment
	echo "\n" . '...does not echo <canvas> tag until loop is over -->'; // HTML:comment	
	
	// these next values are echoed in another .php file
	$canvas_tag_start = "\n" .'<canvas id="pde_canvas_comp" data-processing-sources=" ';
	$canvas_tag_close = ' "/></canvas>';	
}
$loads++;
$loads_pde .= "\n".$path.$file." ";
?>