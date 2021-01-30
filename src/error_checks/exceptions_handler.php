<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php

/**
 * unhandled exception handler
 *
 **/
function unhandled_exceptions($exception) {
  echo "<b>Exception:</b> " . $exception->getMessage();
}

set_exception_handler('unhandled_exceptions');

?>