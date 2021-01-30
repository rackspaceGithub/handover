<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

include '../src/config/archived_directories_config.php';
include '../src/config/filepath.php';
include '../src/error_checks/empty_list.php';

session_start();

//full url eg. /home/matt/Documents/Handover/2020/10/20201013_2153.json
$get_years = get_year_dir($BASE_PATH);
//checks for empty dirs/files list
$empty_check = check_empty_list($get_years);

//copy year dirs into session superglobal
$_SESSION['file_path'] = $get_years;

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
    <link rel="stylesheet" href="../css/ticket_search.css">
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
						Year directories
					  </h2>
					</th>
				  </tr>

				  <tr>
				  	<td>
					  <?php foreach($get_years as $year_dirs):
					    echo '<a class="dir_links" href="./archived_handover_month.php?year=' . $year_dirs . '">' . $year_dirs . '</a>' . '<br>';
					  endforeach; ?>
					  <!-- if empty list display message -->
					  <div id="empty_dirs">
					  	<?= $empty_check; ?>
					  </div>
				  	</td>
				  </tr>
				</table>
			</div>

			<!-- column 2 -->
	  	<div class="column" id="ticket_search_container">
	  		<table class="searched_file_results">
				  <tr>
						<th id="search_file_header">
							<h2>
								Search handover files
							</h2>
						</th>
				  </tr>
				  <tr>
	  		    <td id="search_file"> 	
				  	  <label for="Search">
				  	  	Search:
				  	  </label>	
							<input type="text" id="ticket_search_bar" onkeyup="fetch_results(this.value)">
			  			<div id="results">
			  				<!-- INJECT RETREIVED SEARCHED FILES HERE -->
			  			</div>
		  	    </td>
		  	  </tr>
		  	</table>
	  	</div>
	  </div>


	</body>
    <script src="../scripts/fetch_ticket_search_results.js"></script>
</html>