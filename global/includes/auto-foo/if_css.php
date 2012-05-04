<?php 
if ($loads == 0)
{
	echo html_comment('CSS files auto-loaded from: ' . $path, 'on');
} //$loads == 0
$loads++;
echo html_comment('css file load # ' . $loads);
echo "\n" . '<link rel="stylesheet" type="text/css" href="'.$path.$file.'" />';
echo information($url_inLoop); // returns HTML:comment
?>