<?php

function set_nav_paths() {
  $archived_path_uri = array(
    "index.php" => "./ui/archived_handover_year.php",
    "create_new_handover.php" => "./archived_handover_year.php",
    "archived_handover_year.php" => "./archived_handover_year.php",
    "archived_handover_month.php" => "./archived_handover_year.php",
    "archived_handover_list.php" => "./archived_handover_year.php",
    "view_archived_handover.php" => "./archived_handover_year.php"
  );

  $current_page = basename($_SERVER['PHP_SELF']);

  foreach ($archived_path_uri as $filename => $path) { 
    if ($filename == $current_page) {
      echo $path;
    } 
  }
}
