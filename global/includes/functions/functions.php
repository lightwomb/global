<?php

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

// function __autoload($class_name) {
// 	$class_name = strtolower($class_name);
//   $path = LIB_PATH.DS."{$class_name}.php";
//   if(file_exists($path)) {
//     require_once($path);
//   } else {
// 		die("The file {$class_name}.php could not be found.");
// 	}
// }

function include_layout_template($template="") {
	include(SITE_ROOT.DS.'layouts'.DS.$template);
}

function log_action($action, $message="") {
	$logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
	$new = file_exists($logfile) ? false : true;
  if($handle = fopen($logfile, 'a')) { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n";
    fwrite($handle, $content);
    fclose($handle);
    if($new) { chmod($logfile, 0755); }
  } else {
    echo "Could not open log file for writing.";
  }
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

function curPageURL() { 
    $currentURL = basename($_SERVER["PHP_SELF"]); 
    $i = 0; 
    foreach($_GET as $key => $value) { 
        $i++; 
        if($i == 1) { $currentURL .= "?"; } 
        else { $currentURL .= "&amp;"; } 
        $currentURL .= $key."=".$value; 
    } 
    return $currentURL; 
} 

/* 
these are functions I found @...
	http://webcheatsheet.com/php/get_current_page_url.php
*/
// 	CURRENTLY REPLACED BY OTHER FUNCTION I FOUND IN THE COMMENTS @ http://php.net/manual/en/control-structures.foreach.php
// function curPageURL() {
//  $pageURL = 'http';
//  if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
//  $pageURL .= "://";
//  if ($_SERVER["SERVER_PORT"] != "80") {
//   $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
//  } else {
//   $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
//  }
//  return $pageURL;
// }

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function curPageNameClean() {
	$path_parts = pathinfo(curPageURL());
	$filename_  = $path_parts['filename'];
	return $filename_;
}

function newline($bool){
	if ($bool === true) {
		$nline = "\n";
		return $nline;
	} else { return false; }
}

function br($bool){
	if ($bool === true) {
		$br = "<br />";
		return $br;
	} else { return false; }
}

?>