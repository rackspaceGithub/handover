<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

/**
 * function to grab all files inside passed in directory
 *
 **/
function get_files($dir, &$file_list = array()) {
  $files = scandir($dir, 1);

  foreach ($files as $key => $value) {
    $file_path = realpath($dir . DIRECTORY_SEPARATOR . $value);
    if (!is_dir($file_path)) {
      $file_list[] = $file_path;
    } 
    else if (!in_array($value, array(".", ".."))) {
      get_files($file_path, $file_list);
    }
  }
  return $file_list;
}


/**
 * shorten file (purely for aesthetics to display nicely in list to user
 *
 **/
function filter_file_url($file) {
  $the_files = array();

  foreach($file as $the_file) {
    $each_file = substr($the_file, -26);
    $the_files[] = $each_file;
  }
  return $the_files;
}


/**
 * get the file creation time
 *
 **/
function get_file_creation_time($file) {
  if (file_exists($file)) {
    return date("F d Y - H:i", filemtime($file)) . '<br>';
  }
}