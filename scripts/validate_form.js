/**
 * AUTHOR: 
 * MATTHEW ABLOTT
 **/

 const FIRST_DROPDOWN_OPTION = 0;

/**
 * form validation handler goes here. Calls all validation functions
 *
 **/
function form_validation() {
  if (dropdown_error()
    && check_datacentre_fields()
  	&& check_office_fields()
    && check_core_fields()) {
    //form looks good
    return true;
  }
  else {
    //form not so good
    return false;
  }
}


/**
 * check if user has selected a name option for first dropdown
 *
 **/
function check_outgoing_dropdown_value() {
  //outgoing dropdown
  let outgoing = document.querySelector("#outgoing select").value;
  return (outgoing.localeCompare(dcops_names[FIRST_DROPDOWN_OPTION])) ? true : false;
}

function check_incoming_dropdown_value() {
  //incoming dropdown
  let incoming = document.querySelector("#incoming select").value;
  return (incoming.localeCompare(dcops_names[FIRST_DROPDOWN_OPTION])) ? true : false;
}



const error = [ 
  "Required."
];
/**
 * display error if dropdown unselected
 *
 **/
function dropdown_error() {
  if (!check_outgoing_dropdown_value()) {
    document.getElementById('outgoing_dropdown_error').innerHTML = error;
    scroll_into_view();
    return false;
  }

  if (!check_incoming_dropdown_value()) {
    document.getElementById('incoming_dropdown_error').innerHTML = error;
    scroll_into_view();
    return false;
  }

  //if all good, clear both errors
  document.getElementById('outgoing_dropdown_error').innerHTML = "";
  document.getElementById('incoming_dropdown_error').innerHTML = "";
  return true;
}


/**
 * check radio buttons filled. If any missing per section, call corresponding textarea to check for a user input
 *
 **/
function check_datacentre_fields() {
  const radios_datacentre = document.getElementsByClassName('data_centre');
  let clear_error = false;

  for (let index = 0; index < radios_datacentre.length; index++) {
    //if any radios aren't checked, call to see if textarea has any input
    if (radios_datacentre[index].checked) {
      continue;
    }
    else {
      if (check_datacentre_textarea()) {
        display_error_datacentre_textarea(clear_error);
        return false;
      }
    }
  }
  //all good so clear error
  display_error_datacentre_textarea(clear_error = true);
  return true;
}


function check_office_fields() {
  const radios_office = document.getElementsByClassName('office');
  let clear_error = false;

  for (let index = 0; index < radios_office.length; index++) {
    //if any radios aren't checked, call to see if textarea has any input
    if (radios_office[index].checked) {
      continue;
    }
    else {
      if (check_office_textarea()) {
        display_error_office_textarea(clear_error);
        return false;
      }
    }
  }
  //all good so clear error
  display_error_office_textarea(clear_error = true);
  return true;
}


function check_core_fields() {
  const radios_core = document.getElementsByClassName('core');
  let clear_error = false;

  for (let index = 0; index < radios_core.length; index++) {
    //if any radios aren't checked, call to see if textarea has any input
    if (radios_core[index].checked) {
      continue;
    }
    else {
      if (check_core_textarea()) {
        display_error_core_textarea();
        return false;
      }
    }
  }
  //all good so clear error
  display_error_core_textarea(clear_error = true);
  return true;
}


/**
 * check through textareas to see if input is found. This is called if one or more radio
 * buttons has not been selected.
 *
**/
function check_datacentre_textarea() {
  return (document.getElementById('textarea_datecentre').value.trim() == "") ? true : false;
}

function check_office_textarea() {
  return (document.getElementById('textarea_office').value.trim() == "") ? true : false;
}

function check_core_textarea() {
  return (document.getElementById('textarea_core').value.trim() == "") ? true : false;
}


/**
 * display the error messages for textareas
 *
 **/
const error_array = [ 
  "You can't leave the Data Centre field blank.", 
  "You can't leave the Office field blank.", 
  "You can't leave the Core field blank."
];

function display_error_datacentre_textarea(clear_error) {
  return (clear_error) ? document.getElementById('display_datacentre_error').innerHTML = "" : document.getElementById('display_datacentre_error').innerHTML = error_array[0];
}


function display_error_office_textarea(clear_error) {
  return (clear_error) ? document.getElementById('display_office_error').innerHTML = "" : document.getElementById('display_office_error').innerHTML = error_array[1];
}


function display_error_core_textarea(clear_error) {
  return (clear_error) ? document.getElementById('display_core_error').innerHTML = "" : document.getElementById('display_core_error').innerHTML = error_array[2];
}
