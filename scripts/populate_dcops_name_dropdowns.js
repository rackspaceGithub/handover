/**
 * AUTHOR: 
 * MATTHEW ABLOTT
 **/

/**
 * globals
 *
 **/
//count for keeping count for selected dropdowns
var outgoing_selected_count = 0;
//count for keeping count for selected dropdowns
var incoming_selected_count = 0;
//limit for number of dropdowns
const OUTGOING_DROPDOWN_LIMIT = 4;
//limit for number of dropdowns
const INCOMING_DROPDOWN_LIMIT = 4;


/**
 * List with names of staff. We populate the dropdown options with this list.
 *
 **/
const dcops_names = [
  "-", 
  "Andrew Petrus", 
  "Brian McTernan",
  "Edwin Swamy", 
  "Harry Galanos",
  "Iden Nikola",
  "Matthew Ablott",
  "Robbie Vong",
  "Ryan Frost"
];


//initial population of names lists
outgoing_dcops_list();
incoming_dcops_list();


/**
 * function to populate the outgoing shift list of names in dropdown
 *
 **/
function outgoing_dcops_list() {
  let select = document.createElement('select');
  select.id = "outgoing";
  select.name = "outgoing[]";
  select.classList.add("dc_names");
  //populate dropdown with names
  populate_list(select);
  document.getElementById('outgoing').appendChild(select);
}


/**
 * function to populate the incoming shift list of names in dropdown
 *
 **/
function incoming_dcops_list() {
  let select = document.createElement('select');
  select.id = "incoming";
  select.name = "incoming[]";
  select.classList.add("dc_names");
  //populate dropdown with names
  populate_list(select);
  document.getElementById('incoming').appendChild(select);
}

//helper function to populate the list of names for each dropdown created
function populate_list(select) {
  for (let index = 0; index < dcops_names.length; index++) {
    let option = document.createElement('option');
    option.value = dcops_names[index];
    option.text = dcops_names[index];
    select.appendChild(option);
  }
}


/**
 * keep count of dropdowns and limit to 4
 *
 **/
function outgoing_option_count() {
  return ((++outgoing_selected_count) < OUTGOING_DROPDOWN_LIMIT) ? true : false;
}

function incoming_option_count() {
  return ((++incoming_selected_count) < INCOMING_DROPDOWN_LIMIT) ? true : false;
}


/*
//reminants of some logic to dynamically update dropdown based on previous selected name
function check(sel) {
  let x = sel.options[sel.selectedIndex].text;
  console.log(sel.options[sel.selectedIndex].text);
  let filteredAry = copy.filter(e => e !== x);
  return filteredAry;
}

function get() {
  let new_arr = check();
  return new_arr;
}
*/


/**
 * create a new dropdown list when user clicks "add name"
 *
 **/
function create_new_dropdown(the_list) {
  switch(the_list) {
    case 'outgoing':
    if (outgoing_option_count()) {
      outgoing_dcops_list();
      break;
    }
    else {
      break;
    }

    case 'incoming':
    if (incoming_option_count()) {
      incoming_dcops_list();
      break;
    }
    else {
      break;
    }
  }
}