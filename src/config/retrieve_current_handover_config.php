<!--
  AUTHOR:
  MATTHEW ABLOTT
-->
<?php

include 'filepath.php';
include 'set_file_creation_time.php';

define("FIRST_DIR", 0);

/**
 * returns the most recently created year directory
 *
 **/
function get_most_recent_year() {
  include 'filepath.php';

  $files = scandir($BASE_PATH, SCANDIR_SORT_DESCENDING);

  //exclude both . & .. for unix-like systems
  if(is_dir($BASE_PATH) && !in_array($files, array('.', '..'))) {
    $current_year = $files[FIRST_DIR];
  }
  //return most recent year
  return $current_year;
}


/**
 * returns the most recently created month directory
 *
 **/
function get_most_recent_month() {
  include 'filepath.php';

  $newest_year_dir = get_most_recent_year();

  $newest_month_dir = $BASE_PATH . DIRECTORY_SEPARATOR . $newest_year_dir;

  $files = scandir($newest_month_dir, SCANDIR_SORT_DESCENDING);

  //exclude both . & .. for unix-like systems
  if(is_dir($BASE_PATH) && !in_array($files, array('.', '..'))) {
    $current_month = $files[FIRST_DIR];
  }
  //return most recent month
  return $current_month;
}


/**
 * retrieve the most recently completed handover
 *
 **/
function get_most_recent_handover() {
  include 'filepath.php';

  $the_year = get_most_recent_year();
  $the_month = get_most_recent_month();

  $the_path = $BASE_PATH . DIRECTORY_SEPARATOR . $the_year . DIRECTORY_SEPARATOR . $the_month;

  $latest_mtime = 0;
  $latest_filename = "";

  if (is_dir($the_path)) {
    $handle = opendir($the_path);

    while (($file = readdir($handle))) {
      $filepath = "$the_path/$file";
      // could do also other checks than just checking whether the entry is a file
      if (is_file($filepath) && filemtime($filepath) > $latest_mtime) {
        $latest_mtime = filemtime($filepath);
        $latest_filename = $file;
      }
    }
    closedir($handle);
  }
  return $the_path . DIRECTORY_SEPARATOR . $latest_filename;
}


//fetch most recent handover
$file_path = get_most_recent_handover();

try {
  $file_creation_time = set_file_time($file_path);

  if (!$file_creation_time) {
    throw new Exception("Unable to set file time.");
  }
}
catch (Throwable $t) {
  echo $t->getMessage();
}

//retrieve file data and decode the json
$data = file_get_contents($file_path);
$json = json_decode($data, true);
