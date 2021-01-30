<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->

<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="SYD2 DCOPS Handover Form">
    <title>DCOPS handover</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/resets.css">
    <link rel="stylesheet" href="../css/handover_form.css">
  </head>

  <body>
    <noscript id="no_js">
      <h3>Enable Javascript in your browser.</h3>
    </noscript>

    <!-- navbar -->
    <?php include_once 'nav.php'; ?>

    <div id="handover_form_container">
      <!-- Banner -->
      <header>
        <img id="handover_top_banner" src="../assets/rackspace.png" alt="Rackspace Technology Logo"/>
      </header>
      
      <!-- HANDOVER TITLE -->
      <h2>
        Shift Handover Checklist v1.0.0
      </h2>

      <!-- FORM -->
      <form action="../src/config/save_current_handover.php" method="post" id="dcops_checklist_form" onsubmit="return form_validation()">

        <section>
          <table>
            <!-- Set date -->
            <tr>
              <th>
                <p id="the_date"></p>
              </th>
            </tr> 

            <!-- DROPDOWN NAMES - OUTGOING -->
            <td>
              <label for="Name:">
                <b>Outgoing:</b>
              </label>
              <div id="outgoing" class="dcops" name="outgoing">
                <!-- Dropdowns injected here -->
              </div>
              <button type="button" id="" onclick="create_new_dropdown('outgoing')">Add another name</button>
              <div class="dropdown_error" id="outgoing_dropdown_error"></div>
            </td>

            <!-- DROPDOWN NAMES - INCOMING -->
            <td>
              <label for="Name:">
                <b>Incoming:</b>
              </label>
              <div id="incoming" class="dcops" name="incoming">
                <!-- Dropdowns injected here -->
              </div>
              <button type="button" id="b" onclick="create_new_dropdown('incoming')">Add another name</button>
              <div class="dropdown_error" id="incoming_dropdown_error"></div>
            </td>
          </table>
        </section>

        <br><br>
           
        <section>
          <div id="form_table">
            <!-- inject form here -->
          </div>
        </section>

        <br><br>

        <section>
          <!-- Textarea fields -->
          <h2 id="textarea_header">
            Provide additional (detailed) notes below as required
          </h2>

          <label class="form_textarea_label" for="Data Centre">
            <h1>Data Centre:</h1>
          </label>
          <textarea id="textarea_datecentre" name="textarea_datecentre" class="textarea" oninput="auto_grow(this)"></textarea>
          <!-- form errors -->
          <div id="display_datacentre_error" class="form_errors"></div>

          <br><br>

          <label class="form_textarea_label" for="Office">
            <h1>Office:</h1>
          </label>
          <textarea id="textarea_office" name="textarea_office" class="textarea" oninput="auto_grow(this)"></textarea>
          <!-- form errors -->
          <div id="display_office_error" class="form_errors"></div>

          <br><br>

          <label class="form_textarea_label" for="Core">
            <h1>Core:</h1>
          </label>
          <textarea id="textarea_core" name="textarea_core" class="textarea" oninput="auto_grow(this)"></textarea>
          <!-- form errors -->
          <div id="display_core_error" class="form_errors"></div>

          <br><br>

          <input type="submit" id="submit" value="Submit" disabled>

          <br><br><br><br>
          
        </section>
          
      </form>

      <!-- imported scripts -->
      <script src="../scripts/helpers/check_js.js" defer></script>
      <script src="../scripts/helpers/helpers.js" defer></script>
      <script src="../scripts/set_date.js" defer></script>
      <script src="../scripts/populate_dcops_name_dropdowns.js" defer></script>
      <script src="../scripts/create_dcops_tasks.js" defer></script>
      <script src="../scripts/select_all_form_checkfields.js" defer></script>
      <script src="../scripts/textarea_grow.js" defer></script>
      <script src="../scripts/validate_form.js" defer></script>

    </div>
  </body>
</html>