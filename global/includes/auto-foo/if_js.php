<?php
/*
This file is used by:
fn_auto_load.php
*/
if ($loads == 0)
{
	echo html_comment('*** JAVASCRIPT files auto-loaded *** from: ' . $path, 'on');
}
$loads++;
echo html_comment('js file load # ' . $loads);
echo "\n" . '<script type="text/javascript" src="'.$path.$file.'">'."</script>";
echo information($url_inLoop); // returns HTML:comment
?>