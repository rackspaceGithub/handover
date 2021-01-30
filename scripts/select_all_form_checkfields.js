/**
 * AUTHOR: 
 * MATTHEW ABLOTT
 **/
 
/**
 * function to "check al" radio buttons in checklist section of the form
 *
 **/
function check_all_radio_boxes() {
  let form_radio_checkfields =  document.getElementsByName('form_checked_fields[]');
  checked = document.getElementById('check_all_fields').checked;
	 
  for (let index = 0; index < form_radio_checkfields.length; index++) {
	form_radio_checkfields[index].checked = checked;
  }
}
