<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

/**
 * get file last modified time
 *
 **/
function set_file_time($latest_filename) {
  $remove_extension = explode(".json", $latest_filename);
  //get last 13 characters of filename (example: 20200101_1200)
  $get_file_datetime = substr($remove_extension[0], -13);
  //seperate out the date and the time
  $seperate_datetime = explode("_", $get_file_datetime);
  $set_date = format_file_creation_time($seperate_datetime[0]);
  $set_time = substr_replace($seperate_datetime[1], ':', 2, 0);
  return $set_date . " - " . $set_time;
}

//helper function for get_file_time that converts file cretion time to date timestamp, then back to a formatted date
function format_file_creation_time($filedate) {
  $converted_time = strtotime($filedate);
  return date('Y/m/d', $converted_time);
}