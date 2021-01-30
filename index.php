<!--
  AUTHOR:
  MATTHEW ABLOTT
-->
<?php

include './src/config/url_ticket_link.php';
include './src/config/retrieve_current_handover_config.php';
include './src/config/filter_handover_form_output.php';

?>

<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="SYD2 DCOPS Handover Form">
    <title>DCOPS handover</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/resets.css">
    <link rel="stylesheet" href="../css/current_handover_page.css">
  </head>

  <body>
    <!-- navbar -->
    <?php include_once './ui/nav.php'; ?>

    <div id="table_container">

      <h1>
        Current Handover
      </h1>

      <table>
        <tr class="handover_table_header">
          <th>
            Completed time
          </th>
        </tr>
        <tr>
          <td class="table_grids" id="handover_time_section">
            <?= $file_creation_time ?>
          </td>
        </tr>

        <!--OUTGOING/INCOMING SECTION -->
        <tr class="handover_table_header">
          <th>
            Outgoing
          </th>
          <th>
            Incoming
          </th>
        </tr>

        <tr>
          <td class="table_grids">
            <?php foreach($json['outgoing'] as $outgoing):
              echo $outgoing . '<br>';
            endforeach; ?>
          </td>
          <td class="table_grids">
            <?php foreach($json['incoming'] as $incoming):
              echo $incoming . '<br>';
            endforeach; ?>
          </td>
        </tr>

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
      </table>

      <table id="textarea_section">
        <!-- DATA CENTRE TEXTAREA -->
        <tr>
          <th class="handover_table_header">
            Data Centre
          </th>
        </tr>

        <tr>
          <td id="textarea_section_output" class="table_grids">
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
          <td id="textarea_section_output" class="table_grids">
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
          <td id="textarea_section_output" class="table_grids">
            <?= url_to_clickable_link($json['textarea_core']) ?>
          </td>
        </tr>
      </table>

      <!-- SUBSECTION - BUTTON TO CREATE NEW HANDOVER -->
      <div class="navigation_buttons_container">
        <a id="button_nav" href="./ui/create_new_handover.php">
          <button class="navigation_buttons">Create new handover</button>
        </a>
      </div>

    </div>

  </body>
</html>
