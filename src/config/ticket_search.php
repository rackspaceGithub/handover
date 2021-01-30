<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

include 'filepath.php';
include 'archived_directories_config.php';

//file results index
define("FILE_RESULTS_INDEX", 0);
//min search char count
define("MIN_STRLEN", 2);
//number search results
define("MAX_SEARCH_RESULTS", 13);

session_start();
$file_list = array();
$matched_files = array();
$matched_files_description = array();

//grab the handover year array
$handover_year = $_SESSION['file_path'];
//user searched string
$searched = $_GET['search'] ?? "";

//iterate over each year / month and list all files in all subdirectories of handover
foreach($handover_year as $year):
	foreach(get_year_month($BASE_PATH . DIRECTORY_SEPARATOR . $year) as $month):
		$dir = $BASE_PATH . DIRECTORY_SEPARATOR . $year . DIRECTORY_SEPARATOR . $month;
		$files = scandir($dir);

	  //return each file
	  foreach ($files as $value) {
	    $file_path = realpath($dir . DIRECTORY_SEPARATOR . $value);
	    if (!is_dir($file_path)) {
	      $file_list[] = $file_path;
	    }
	  }
	endforeach;
endforeach;

//open each file and find matching criterion; results are saved out
foreach($file_list as $files):
  $file = file_get_contents($files);
  $json = json_decode($file, true);

  if (!empty($searched)) {
	  if (!strpos($file, $searched)) {
	  	continue;
	  }
	  $matched_files[] = substr($files, -26);
	  //get all found textarea fields
	  $matched_files_description[] = $json['textarea_datecentre'] . '<br><br>'
	  . $json['textarea_office'] . '<br><br>'
	  . $json['textarea_core'];
	}
endforeach;


//output each found match (or appropriate message) to user
if (strlen($searched) > MIN_STRLEN) {
	if (!empty($matched_files) && !empty($matched_files_description)) {
	  for ($iterator = FILE_RESULTS_INDEX; $iterator < MAX_SEARCH_RESULTS; $iterator++) {
	  	if (array_key_exists($iterator, $matched_files)) {
	      echo '<p><a id="search_result" href="../../ui/view_archived_handover.php?file=' . $matched_files[$iterator] . '">' . $matched_files[$iterator] . '</a></p>' . '<br>';
	      echo '<p class="result_description" id="search_result">' . $matched_files_description[$iterator] . '</p>' . '<br>';
	    }
	  }
	}
	else {
	  echo '<p id="search_result_error">' . "Nothing to be found..." . '</p>';
  }
}
else {
	echo '<p id="search_result_error">' . "Please enter at least 3 characters" . '</p>';
}