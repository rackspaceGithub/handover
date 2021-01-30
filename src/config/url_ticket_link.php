<?php 

/**
 * function to create "clicable" hyperlinks for ticket links (if in full url, eg. https://core.rackspace.com/ticket/000000-00000) in textareas
 *
 **/
function url_to_clickable_link($ticket_url) {
  return preg_replace(
  "%(https?|ftp)://([-A-Z0-9-./_*?&;=#]+)%i", 
  '<a target="blank" rel="nofollow" href="$0" target="_blank">$0</a>', $ticket_url);
}