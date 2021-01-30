<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

include 'filepath.php';
include 'set_file_creation_time.php';

$build_url_path = $BASE_PATH . DIRECTORY_SEPARATOR . $_GET['file'];

try {
  $file_creation_time = set_file_time($build_url_path);

  if (!$file_creation_time) {
  	throw new Exception("Unable to set file time.");
  }
}
catch (Throwable $t) {
  echo $t->getMessage();
}

$data = file_get_contents($build_url_path);
$json = json_decode($data, true);