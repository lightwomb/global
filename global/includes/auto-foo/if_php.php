<?php
if ($loads == 0) // Alert that we have begun
{
	echo "\n" . '<!-- PHP -->'; // HTML:comment
	echo "\n" . '<!--' . ' require_once() files auto-loaded from: "' . $path . '" -->'; // HTML:comment				
	echo "\n" . '<!-- begin looping through directory -->'; // HTML:comment
}
$loads++;
echo "\n" . "<!-- .php file load # " . $loads . " -->"; // HTML:comment
echo "\n" . '<!-- '.$path.$file.' -->';
require_once($path.$file);
//echo information($url_inLoop); // returns HTML:comment
?>