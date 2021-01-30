<!-- 
  AUTHOR: 
  MATTHEW ABLOTT
-->
<?php 

if (basename($_SERVER['PHP_SELF']) == "index.php") {
  include './src/config/nav_config.php';
}
else {
  include '../src/config/nav_config.php';
}

?>

<link rel="stylesheet" href="../css/nav.css">

<nav>
  <ul>
    <li>
      <a id="nav_link" href="../index.php">Home</a>
    </li>
    <li>
      <a id="nav_link" href="<?php set_nav_paths() ?>">Archived handovers</a>
    </li>
    <li id="nav_image">
      <a href="../index.php">
        <img id="handover_top_banner_side_small" src="../assets/rackspace.png" alt="Rackspace Technology Logo"/>
      </a>
    </li>
  </ul>
</nav>