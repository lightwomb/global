<?php
/*
fn_auto_load_dirTree.php ______________________
______________________________________
CREATED BY:__________________________

\\\\    \\\\  //\\  O///////_______
I\\\\    \\\\///\\\/M//////=======
\\G\\\\\\ \\\// \\//B/////_______
\\\H\\\\\\ \\\/ \\///////=======
\\\\T\\\\\\ \\\  \//////_______


This file contains various functions related to auto-loading links directories.

-	the most influential function being:	auto_load_dirTree($path){ }

*/

/* 
helper functions:
*/
function replace_newline($string)
{
	$strip_string    = $string;
	$stripped_string = $strip_string;
	return (string) str_replace(array(
		'..',
		'/',
		'../',
		'../../'
	), '', $stripped_string);
}

$stored = null;
function makeLink($folder_string, $f_string, $someClass)
{		
	$unorderedList = replace_newline($folder_string);
	if ($stored == $unorderedList) {
		echo "\n".'<ul>';
	} 
	else
	{
	$stored = $unorderedList;
	}
		
	$madeLink .= "\n" .'<li '.'class="' . $someClass . '">' . '<a ' . 'href="';
	$madeLink .= $folder_string . $f_string;
	$madeLink .= '" ';
	$madeLink .= '>';
	$madeLink .= replace_newline($f_string);
	$madeLink .= '</a>'.'</li>';
	
	if ($f_string != '..' && $f_string != '.')
	{
	return $madeLink;
	} 
	else
	{	
	}
}

function getFolderClass($dirClass)
{
	$f = replace_newline($dirClass);
	
	if ($f = SITE_ROOT) {
		return 'in_sub_dir';
	} else {
		return $f;
	}
	
}
// public static function arrayDiffEmulation($arrayFrom, $arrayAgainst)
// {
//     $arrayAgainst = array_flip($arrayAgainst);
//     
//     foreach ($arrayFrom as $key => $value) {
//         if(isset($arrayAgainst[$value])) {
//             unset($arrayFrom[$key]);
//         }
//     }
//     
//     return $arrayFrom;
// }


/*  
this next function uses the previously declared functions in this document: 
*/
function fn_auto_load_dirTree($folder)
{
	if ($d = opendir($folder)) {
		while (false !== ($f = readdir($d))) {
			$dName = $folder . $f;
			$fName = $f;
			
			if (is_dir($dName)) {
				echo makeLink($folder, $fName, getFolderClass($folder));}else{
				
				if (COMMENTS != '') {
					echo "\n" . '<!-- ' . $dName . ' -->'; // HTML Comment
				} else {
				}
			}
		}
		closedir($d);
	}
}

?>