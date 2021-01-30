<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

process_form();

function process_form() {
  try {
    //if post, we cool here
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      encode_textarea();
      save_handover_file();
    }
    else {
      throw new Exception("An error occured with processing the handover form. Please try again.");
    }
  }
  catch (Throwable $t) {
    echo $t->getMessage();
  }
}


//encode all (potentially naughty) input
function encode_textarea() {
  $_POST['textarea_datecentre'] = htmlspecialchars($_POST['textarea_datecentre']);
  $_POST['textarea_office'] = htmlspecialchars($_POST['textarea_office']);
  $_POST['textarea_core'] = htmlspecialchars($_POST['textarea_core']);
}

/**
 * Set shift file extension based on the current time of day
 *
 **/
function set_filename() {
  $filename = date("Ymd") . "_" . date("Hi") . ".json";
  return $filename;
}


/**
 * Function to check/create relative path to save out forms. The path will always work off the current year/month 
 * returned by inbuilt function
 *
 **/
function set_directory_structure() {
  include './filepath.php';

  $handover_dir = $BASE_PATH;
  //current year
  $the_year = date("Y");
  //current month
  $the_month = date("m");

  //check directory exists and create if doesn't
  if (!is_dir($handover_dir)) {
    mkdir($handover_dir);
  }

  //if current year directory doesn't exist, create it
  if (!is_dir($handover_dir . DIRECTORY_SEPARATOR . $the_year)) {
    mkdir($handover_dir . DIRECTORY_SEPARATOR . $the_year);
  }

  //if current month directory doesn't exist, create it
  if (!is_dir($handover_dir . DIRECTORY_SEPARATOR . $the_year . DIRECTORY_SEPARATOR . $the_month)) {
    mkdir($handover_dir . DIRECTORY_SEPARATOR . $the_year . DIRECTORY_SEPARATOR . $the_month);
  }

  //get current working directory to pass to file
  $current_dir = $handover_dir . DIRECTORY_SEPARATOR . $the_year . DIRECTORY_SEPARATOR . $the_month;

  return $current_dir;
}


/**
 * Save out all post values to file
 *
 **/
function save_handover_file() {
  //get current (relevant) directory
  $get_dir = set_directory_structure();
  //encocde post values 
  $encoded_form = json_encode($_POST);
  //filename is Ydm (ex 20201001_12:00.json)
  $the_file = set_filename();

  try {
    //try to save out file, handle accordingly if failure
    $save_out_file = file_put_contents("{$get_dir}/{$the_file}", $encoded_form, LOCK_EX);
    if ($save_out_file) {
      redirect();
    }
    else {
      throw new Exception("Unable to save handover form to file. Please try again.");
    }
  }
  catch (Throwable $t) {
    echo $t->getMessage();
  }
}


//once saved, move across to view saved handover.
function redirect() {
  header('Location: ../../index.php');
  exit();
}