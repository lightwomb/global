<?php
/*
fn_auto_load.php ______________________
______________________________________
CREATED BY:__________________________

\\\\    \\\\  //\\  O///////_______
I\\\\    \\\\///\\\/M//////=======
\\G\\\\\\ \\\// \\//B/////_______
\\\H\\\\\\ \\\/ \\///////=======
\\\\T\\\\\\ \\\  \//////_______


This file contains various functions related to auto-loading directories.

-	the most influential function being:	auto_load_dir($path){ }

*/

/* 
helper functions:
*/
function getExtension($str)
{
	$i = strrpos($str, ".");
	if (!$i)
	{
		return "";
	} //!$i
	$l   = strlen($str) - $i;
	$ext = substr($str, $i + 1, $l);
	return $ext;
}

function information($url)
{
	$path_parts = pathinfo($url);
	$dirname_   = $path_parts['dirname'];
	$basename_  = $path_parts['basename'];
	$extension_ = $path_parts['extension'];
	$filename_  = $path_parts['filename'];
	// begin HTML comment string	
	$infoString .= "filename: " . $filename_;
	$infoString .= " | dirname: " . $dirname_;
	$infoString .= " | basename: " . $basename_;
	$infoString .= " | extension: " . $extension_;
	echo html_comment($infoString);
}

function html_comment($commentString, $override) {
	$newComment = "\n".'<!-- ' .$commentString. ' -->';
	if($override != null) {
		return $newComment;
	} 
	elseif($override==='off') {
		return '';
	} 
	elseif ($override==='on') {
		return $newComment;
	}
}

/*  
this next function uses the previously declared functions in this document: 
*/
function auto_load_dir($path)
{
	//$newPath = $path.DS;
	static $count_called;
	
	if ($handle = opendir($path))
	{
		$counter = 0; // declare new counter each time function is called
		$loads   = 0;
		while (false !== ($file = readdir($handle)))
		{
			$url_inLoop = $path .DS. $file; // declare new url as soon as $file is declared
			$counter++;
			if ($counter === 1) { 
				echo "\n" . html_comment('begin auto loading on counter '.$counter);
			}
			if ($file === '.DS_Store') // filter out .DS_Store file (if there is one)
			{
				echo "\n" . html_comment('counter '.$counter);	
				$note = ' *IGNORE* ' . $file; // HTML:comment	
				echo "\n" . html_comment('note '.$note);
			} //$file === ".DS_Store"
			else
			// determine what kind of file it is, then perform specific action(s) accordingly:
			{
				$extension_of_file = getExtension($file);
				// begin ifs on file extension...
				if ($extension_of_file == "css") // if CSS	
				{
					include(GLOBAL_auto_foo .DS. 'if_css.php');
				} //$extension_of_file == "css"
				elseif ($extension_of_file == "js") // if JS
				{
					include(GLOBAL_auto_foo .DS. 'if_js.php');
				} //$extension_of_file == "js"
				elseif ($extension_of_file == "php") // if JS
				{
					include(GLOBAL_auto_foo .DS. 'if_php.php');
				}
				elseif ($extension_of_file == "pde") // if PDE
				{
					include(GLOBAL_auto_foo .DS. 'if_pde.php');
				}
				// ...end of ifs on file extension
			}
		} //false !== ($file = readdir($handle))
		closedir($handle);
	} //$handle = opendir($path)
	
	$numLoaded = $counter - 2; // - 2 fix for ./ and ../
	
	// various closing actions...
	if ($extension_of_file == "css") // if CSS	
	{
		echo html_comment($numLoaded . ' .css file(s) loaded');
	}
	elseif ($extension_of_file == "js") // if JS
	{
		echo html_comment($numLoaded . ' .js file(s) loaded');
	}
	elseif ($extension_of_file == "php") // if php
	{
		echo html_comment($numLoaded . ' .php file(s) required');
	}
	elseif ($extension_of_file == "pde") // if PDE
	{
		echo $canvas_tag_start . $loads_pde . $canvas_tag_close;
		echo html_comment($numLoaded . ' .pde file(s) loaded');
	} // ...end of various closing actions
	
	
	if ($count_called != null && $count_called = $numLoaded)
	{
		if ($count_called < 0)
		{
			echo html_comment(' ***ALERT*** auto-load function called. . . . No Directory named '. $path);
		}
		else if ($count_called > 0)
		{
			echo html_comment('end of main function . . . times ran = ' . $count_called);
		}
	}
	else
	{	
		if ($path != 'includes/custom/') 
		{
			//echo "\n" . "<!-- ***ALERT*** auto-load function called. . . . 0 Files in '".$path."' (though Directory does exist) " . " -->" . "\n" . "\n";
		}
	}
	
	$count_called++;
	
}

?>