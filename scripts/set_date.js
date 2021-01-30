/**
 * Set current date
 *
**/
set_date();

function set_date() {
   document.getElementById('the_date').innerHTML = Date().toLocaleString('en-AU', { timeZone: 'AEST' });
}