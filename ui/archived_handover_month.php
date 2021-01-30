<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

include '../src/config/archived_directories_config.php';
include '../src/config/filepath.php';
include '../src/error_checks/empty_list.php';

$_GET['year'] = $_GET['year'] ?? "";
//retrieve path including selected year
$get_months = get_year_month($BASE_PATH . DIRECTORY_SEPARATOR . $_GET['year']);
//checks for empty dirs/files list
$empty_check = check_empty_list($get_months);

?>

<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="SYD2 DCOPS Handover Form">
    <title>DCOPS handover</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/resets.css">
    <link rel="stylesheet" href="../css/archived_files.css">
  </head>
  <body>
  	<!-- navbar -->
  	<?php include_once '../ui/nav.php'; ?>

  	<div class="row">
  	  <!-- column 1 -->
  	  <div class="column">
		<table class="searched_file_results">
		  <tr>
			<th>
			  <h2>
				Month directories
			  </h2>
			</th>
		  </tr>

		  <tr>
		  	<td>
			  <?php foreach($get_months as $month_dirs):
	   			  echo '<a class="dir_links" href="./archived_handover_list.php?year=' . $_GET['year'] . "&month=" . $month_dirs . '">' . $month_dirs . '</a>' . '<br>';
			  endforeach; ?>
			  <!-- if empty list display message -->
			  <div id="empty_dirs">
			  	<?= $empty_check; ?>
			  </div>
		  	</td>
		  </tr>
		</table>
	  </div>
    </div>

  </body>
</html>