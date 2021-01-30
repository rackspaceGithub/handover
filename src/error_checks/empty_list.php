<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

function check_empty_list($array) {
  $error_message = "";
  if (empty($array)) {
  	$error_message = "No files or directories exist.";
  }
  return $error_message;
}
