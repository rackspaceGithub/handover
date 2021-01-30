/**
 * AUTHOR: 
 * MATTHEW ABLOTT
 **/

//all dcops tasks
const datacentre_tasks = [
  "Completed all 5S tasks in accordance with the 5S tasks board:",
  "Returned all tools and crash carts to their demarcation point:", 
  "Emailed Inventory (cc DCOPS) for any stock/stationery replenishment requests:", 
  "Escalated any issues to the DC manager:"
];

const office_tasks = [
  "Placed the DCOPS mobile with the handover folder. Ensure min. 50% charge:",
  "Checked the DCOPS Phone is at full volume and 'mute' switch is in the up position:", 
  "Placed both DC Cam phones with the handover folder. Ensure min. 50% charge:", 
  "Escalated any issues to the DC manager:",
];

const core_tasks = [
  "Completed all 5S tasks in accordance with the 5S tasks board:",
  "Completed any expedited requests/builds assigned to your shift:", 
  "Thorough handover of anything outstanding, include ticket numbers:"
];

/**
 * section form titles
 *
 **/
const datacentre_form_heading = [
  "Data Centre:",
  "Completed:"
];

const office_form_heading = [
  "Office:"
];

const core_form_heading = [
  "Core:"
];

/**
 * build the form table which contains all dcops tasks and checkboxes
 *
 **/
build_form_table();
 
function build_form_table() {
  let myTableDiv = document.getElementById('form_table');

  let table = document.createElement('table');
  let tableBody = document.createElement('tbody');
  tableBody.id = "table_checklist";
  table.appendChild(tableBody);

  add_check_all_radios(tableBody);
  add_datacentre_tasks(tableBody);
  add_office_tasks(tableBody);
  add_core_tasks(tableBody);

  myTableDiv.appendChild(table);
}


function add_datacentre_section_header(tableBody) {
  let table_row = create_row(tableBody);
    
  for (let index = 0; index < datacentre_form_heading.length; index++) {
    let th = document.createElement('th');
    th.id = "table_head";
    th.appendChild(document.createTextNode(datacentre_form_heading[index]));
    table_row.appendChild(th);
  }
}

function add_office_section_header(tableBody) {
  let table_row = create_row(tableBody);
    
  for (let index = 0; index < office_form_heading.length; index++) {
    let th = document.createElement('th');
    th.id = "table_head";
    th.appendChild(document.createTextNode(office_form_heading[index]));
    table_row.appendChild(th);
  }
}

function add_core_section_header(tableBody) {
  let table_row = create_row(tableBody);
    
  for (let index = 0; index < core_form_heading.length; index++) {
    let th = document.createElement('th');
    th.id = "table_head";
    th.appendChild(document.createTextNode(core_form_heading[index]));
    table_row.appendChild(th);
  }
}


/**
 * Build each section of the form and populate the table with dcops tasks descriptions
 *
 **/
function add_datacentre_tasks(tableBody) {
  for (let index = 0; index < datacentre_tasks.length; index++) {
    let table_row = create_row(tableBody);

    for (let j = 0; j < 1; j++) {
      let td = document.createElement('td');
      td.appendChild(document.createTextNode(datacentre_tasks[index]));
      table_row.appendChild(td);

      let input_field = create_input_element();
      input_field.classList.add("data_centre");
      input_field.value = datacentre_tasks[index] + input_field.classList;
      table_row.appendChild(input_field);
      //hidden field for form
      let hidden_input_field = create_hidden_input_element();
      hidden_input_field.value = datacentre_tasks[index] + input_field.classList;
      table_row.appendChild(hidden_input_field);
    }
  }
}

function add_office_tasks(tableBody) {
  add_office_section_header(tableBody);

  for (let index = 0; index < office_tasks.length; index++) {
    let table_row = create_row(tableBody);

    for (let j = 0; j < 1; j++) {
      let td = document.createElement('td');
      td.appendChild(document.createTextNode(office_tasks[index]));
      table_row.appendChild(td);

      let input_field = create_input_element();
      input_field.classList.add("office");
      input_field.value = office_tasks[index] + input_field.classList;
      table_row.appendChild(input_field);
      //hidden field for form
      let hidden_input_field = create_hidden_input_element();
      hidden_input_field.value = office_tasks[index] + input_field.classList;
      table_row.appendChild(hidden_input_field);
    }
  }
}

function add_core_tasks(tableBody) {
  add_core_section_header(tableBody);

  for (let index = 0; index < core_tasks.length; index++) {
    let table_row = create_row(tableBody);

    for (let j = 0; j < 1; j++) {
      let td = document.createElement('td');
      td.appendChild(document.createTextNode(core_tasks[index]));
      table_row.appendChild(td);

      let input_field = create_input_element();
      input_field.classList.add("core");
      input_field.value = core_tasks[index] + input_field.classList;
      table_row.appendChild(input_field);
      //hidden field for form
      let hidden_input_field = create_hidden_input_element();
      hidden_input_field.value = core_tasks[index] + input_field.classList;
      table_row.appendChild(hidden_input_field);
    }
  }
}


/**
 * check-all fields box in form
 *
 **/
 
function add_check_all_radios(tableBody) {
  const the_row = 2;
  const second_column = 1;
  add_datacentre_section_header(tableBody);

  let table_header = document.createElement('tr');
  tableBody.appendChild(table_header);
    
  /* 
  //function to add select all checkbox
  for (let index = 0; index < the_row; index++) {
    let th = document.createElement('th');
    if (index === second_column) {
      let input = document.createElement('input');
      input.type = "checkbox";
      input.id = "check_all_fields";
      input.setAttribute('onclick','check_all_radio_boxes();');
      th.appendChild(input);
    }
    table_header.appendChild(th);
  }
  */
}