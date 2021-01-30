<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

include 'filepath.php';

/**
 * grab the year directories
 *
 **/
function get_year_dir($dir) {
  $year_dirs = array();
  $hidden_dirs = array('.', '..');
  if ($handle = opendir($dir)) {
    while (($file = readdir($handle))) {
      if (!in_array($file, $hidden_dirs)) {
        $year_dirs[] = $file; 
      }
    }
    closedir($handle);
  }
  //sort dir
  arsort($year_dirs);

  return $year_dirs;
}


/**
 * get the current year/month files
 *
 **/
function get_year_month($dir) {
  $month_dirs = array();
  $hidden_dirs = array('.', '..');
  if ($handle = opendir($dir)) {
    while (($file = readdir($handle))) {
      if (!in_array($file, $hidden_dirs)) {
        $month_dirs[] = $file; 
      }
    }
    closedir($handle);
  }
  //sort dir
  arsort($month_dirs);

  return $month_dirs;
}