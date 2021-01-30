<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php 

include '../src/config/archived_handovers_config.php';
include '../src/config/filepath.php';
include '../src/error_checks/empty_list.php';

$_GET['year'] = $_GET['year'] ?? "";
$_GET['month'] = $_GET['month'] ?? "";

//full url eg. /home/matt/Documents/Handover/2020/10/20201013_2153.json
$handover_files = get_files($BASE_PATH . DIRECTORY_SEPARATOR . $_GET['year'] . DIRECTORY_SEPARATOR . $_GET['month']);
//short url eg. /2020/10/20201013_2153.json
$shortened_file = filter_file_url($handover_files);
//checks for empty dirs/files list
$empty_check = check_empty_list($handover_files);

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
						  Current files
					  </h2>
					</th>
					<th>
					  <h2>
					  	Date created
					  </h2>
					</th>
			  </tr>

			  <tr>
			  	<!-- all handover files -->
			  	<td>
				  <?php foreach($shortened_file as $handover_file):
				    echo '<a class="dir_links" href="./view_archived_handover.php?file=' . $handover_file . '">' . $handover_file . '</a>' . '<br>';
				  endforeach; ?>
				  <!-- if empty list display message -->
				  <div id="empty_dirs">
				  	<?= $empty_check; ?>
				  </div>
			  	</td>
			  	<!-- corresponding file creation datetime -->
			  	<td>
			  	  <?php foreach($handover_files as $file_time):
			  		  echo get_file_creation_time($file_time);
				    endforeach; ?>
			  	</td>
			  </tr>
			</table>
	  	</div>
	</div>

  </body>
</html>