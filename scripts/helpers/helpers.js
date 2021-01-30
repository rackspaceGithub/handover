function create_row(tableBody) {
  let table_row = document.createElement('tr');
  tableBody.appendChild(table_row);
  return table_row;
}

function create_input_element() {
  let the_input = document.createElement('input');
  the_input.type = "checkbox";
  the_input.name = "form_checked_fields[]";
  return the_input;
}

function create_hidden_input_element() {
  let the_input = document.createElement('input');
  the_input.type = "hidden";
  the_input.name = "form_fields[]";
  return the_input;
}

//scroll to error
function scroll_into_view() {
  window.scroll({ top: 0, left: 0, behavior: 'smooth'});
}