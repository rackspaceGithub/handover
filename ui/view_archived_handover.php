<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

include '../src/config/url_ticket_link.php';
include '../src/config/retrieve_archived_handover_config.php';
include '../src/config/filter_handover_form_output.php';

?>

<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="SYD2 DCOPS Handover Form">
    <title>DCOPS handover</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/resets.css">
    <link rel="stylesheet" href="../css/archived_handover_page.css">
  </head>

  <body>
    <!-- navbar -->
    <?php include_once '../ui/nav.php'; ?>

    <button id="back_button" onclick="window.history.go(-1)">Back</button>
    
  	<table id="archived_handover_file">
      <tr>
        <th>
          Completed time
        </th>
      </tr>
      <tr>
        <td>
          <?= $file_creation_time ?>
        </td>
      </tr>


      <!--OUTGOING/INCOMING SECTION -->
      <tr>
        <th>
          Outgoing
        </th>
      </tr>
      <?php foreach($json['outgoing'] as $outgoing): ?>
      	<tr>
          <td>
          	<?= $outgoing . '<br>' ?>
          </td>
        </tr>
      <?php endforeach; ?>

      <tr>
        <th>
          Incoming
        </th>
      </tr>
      <?php foreach($json['incoming'] as $incoming): ?>
      	<tr>
          <td>
          	<?= $incoming . '<br>' ?>
          </td>
        </tr>
      <?php endforeach; ?>

      <!-- DCOPS COMPLETED TASKS -->
      <tr>
        <th class="handover_table_header">
          DCOPS Tasks - Completed
        </th>
      </tr>

      <tr>
        <td class="table_grids">
          <ul>
            <h3>
              <?= $completed_tasks_titles[DC_SECTION]; ?> 
            </h3>
            <?php foreach($completed_data_centre_tasks as $completed_dc_task): ?>
              <li>
                <?= $completed_dc_task; ?>  
              </li>
            <?php endforeach; ?> 
          </ul>
        </td>
      </tr>

      <tr>
        <td class="table_grids">
          <ul>
            <h3>
              <?= $completed_tasks_titles[OFFICE_SECTION]; ?> 
            </h3>
            <?php foreach($completed_office_tasks as $completed_office_task): ?>
              <li>
                <?= $completed_office_task; ?>  
              </li>
            <?php endforeach; ?> 
          </ul>
        </td>
      </tr>

      <tr>
        <td class="table_grids">
          <ul>
            <h3>
              <?= $completed_tasks_titles[CORE_SECTION]; ?> 
            </h3>
            <?php foreach($completed_core_tasks as $completed_core_task): ?>
              <li>
                <?= $completed_core_task; ?>  
              </li>
            <?php endforeach; ?> 
          </ul>
        </td>
      </tr>


      <!-- DCOPS INCOMPLETED TASKS -->
      <tr>
        <th class="handover_table_header">
          DCOPS Tasks - Not Completed
        </th>
      </tr>

      <tr>
        <td class="table_grids">
          <ul>
            <h3>
              <?= $incompleted_tasks_titles[DC_SECTION]; ?>
            </h3>
            <?php foreach($incompleted_data_centre_tasks as $incompleted_dc_task): ?>
              <li>
                <?= $incompleted_dc_task; ?>  
              </li>
            <?php endforeach; ?> 
          </ul>
        </td>
      </tr>

      <tr>
        <td class="table_grids">
          <ul>
            <h3>
              <?= $incompleted_tasks_titles[OFFICE_SECTION]; ?> 
            </h3>
            <?php foreach ($incompleted_office_tasks as $incompleted_office_task): ?>
              <li>
                <?= $incompleted_office_task; ?>  
              </li>
            <?php endforeach; ?> 
          </ul>
        </td>
      </tr>

      <tr>
        <td class="table_grids">
          <ul>
            <h3>
              <?= $incompleted_tasks_titles[CORE_SECTION]; ?> 
            </h3>
            <?php foreach ($incompleted_core_tasks as $incompleted_core_task): ?>
              <li>
                <?= $incompleted_core_task; ?>  
              </li>
            <?php endforeach; ?> 
          </ul>
        </td>
      </tr>

      <!-- DATA CENTRE TEXTAREA -->
      <tr>
        <th class="handover_table_header">
          Data Centre
        </th>
      </tr>

      <tr>
        <td class="table_grids">
          <?= url_to_clickable_link($json['textarea_datecentre']) ?>
        </td>
      </tr>

      <!-- OFFICE TEXTAREA -->
      <tr>
        <th class="handover_table_header">
          Office
        </th>
      </tr>

      <tr>
        <td class="table_grids">
          <?= url_to_clickable_link($json['textarea_office']) ?>
        </td>
      </tr>

      <!-- CORE TEXTAREA -->
      <tr>
        <th class="handover_table_header">
          Core
        </th>
      </tr>

      <tr>
        <td class="table_grids">
          <?= url_to_clickable_link($json['textarea_core']) ?>
        </td>
      </tr>

    </table>

  </body>

</html>